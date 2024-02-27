<?php

namespace App\Http\Controllers\Client\API;

use App\Http\Controllers\Controller;
use App\Mail\AdminMail;
use App\Mail\destroyBooking;
use App\Mail\MailStylist;
use App\Models\Booking;
use App\Models\Booking_service;
use App\Models\destroyBooking as ModelsDestroyBooking;
use App\Models\Service;
use App\Models\Service_categories;
use App\Models\Stylist;
use App\Models\StylistTimeSheet;
use App\Models\Timesheet;
use App\Models\User;
use App\Models\Notification;
use App\Models\payment;
use App\Models\WorkDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    // đang kế thừa class base
    public $model = Stylist::class;
    public $modelChooService = Service_categories::class;
    public $imgService = Service::class;
    public $booking = Booking::class;
    private $user_phone = '';
    public function index()
    {
        //        $data = $this->model::all();
        $data = User::query()->where('user_type', 'STYLIST')->get();
        return response()->json($data);
    }
    public function timeSheetDetail(string $id)
    {
        $dataStylist = User::query()->with('timeSheet','workDay')->where('id', $id)->first();
        $dataTimeSheet = Timesheet::all();
        $workDay = WorkDay::all();
        $stylist_time_sheet = StylistTimeSheet::query()->where('user_id',$id)->get();
        return response()->json(['dataStylist' => $dataStylist,
                                'dataTimeSheet' => $dataTimeSheet,
                                 'workDay' => $workDay,
                                 'stylist_time_sheet' => $stylist_time_sheet]);
    }

    public function randomStylist()
    {
        $stylist = User::inRandomOrder()->where('user_type', 'STYLIST')->first();
        return response()->json($stylist);
    }

    // hàm loadService dùng khi chọn dịch vụ cắt
    public function loadService()
    {
        $data = $this->modelChooService::query()->with('service')->get();
        $service = $this->imgService::query()->with('images')->get();
        return response()->json(['data' => $data, 'service' => $service]);
    }

    public function pullRequest(Request $request)
    {
//        Log::info($request->all());
        $booking = $request->all();
        $model = new $this->booking;
        $model->fill($booking);
        $model->save();

        $bookingDone_id = $model->id;
        $service = $request->arrayIDService;


        foreach ($service as $value) {
            $booking_service = new Booking_service;
            $booking_service->fill([
                'booking_id' => $bookingDone_id,
                'service_id' => $value,
            ]);
            $booking_service->save();
        }
        //Send mail tới stylist khi có đơn hàng mới
        $service = Booking_service::with('service')->where('booking_id', $bookingDone_id)->get();
        $stylist = User::query()->where('id', $request->stylist_id)->first();
        Mail::to($stylist->email)->queue(new MailStylist($booking, $service));
        //end send mail stylis
        if ($request->pttt == 1){
            $this->sendSms($request->user_phone);
        }

        return response()->json(['success' => $bookingDone_id]);
    }

    public function bookingDate(Request $request){
       $value = WorkDay::all();
       return response()->json($value);
    }
    public function blockWorkDay(Request $request){
        $data = StylistTimeSheet::all();
        foreach ($data as $key=>$value){
            if ($value->user_id == $request->user_id &&
                $value->timesheet_id == $request->timesheet_id &&
                $value->work_day_id == $request->work_day_id){
                if ($value->is_block == 0){
                    return response()->json(['success'=>0]);
                }else{
                    $value->update(['is_block' => 0]);
                    return response()->json(['success'=>'success']);
                }
            }
        }
    }
    public function updateRequest(Request $request, $id)
    {
        $bookingData = $request->all();

        // Tìm booking theo $id
        $booking = Booking::findOrFail($id);

        // Cập nhật thông tin của booking
        $booking->update($bookingData);

        // Lấy danh sách service từ request
        $serviceIds = $request->arrayIDService;

        // Xóa tất cả các dịch vụ cũ liên quan đến booking
        Booking_service::where('booking_id', $id)->delete();

        // Thêm các dịch vụ mới vào booking
        foreach ($serviceIds as $serviceId) {
            Booking_service::create([
                'booking_id' => $id,
                'service_id' => $serviceId,
            ]);
        }
        //Send mail tới stylist khi có đơn hàng mới
        $service = Booking_service::with('service')->where('booking_id', $id)->get();
        $stylist = User::query()->where('id', $request->stylist_id)->first();

        $noti = Notification::query()->where('booking_id', $id)->first();
        $noti->delete();

        Mail::to($stylist->email)->queue(new MailStylist($booking, $service));
        //end send mail stylist
//        $this->sendSms($request->user_phone);
        return response()->json(['success' => $id]);
    }

    public function stylistDetail(string $id)
    {
        $data = User::query()->where('id', $id)->first();
        return response()->json($data);
    }

    public function bookingDone($id)
    {
        $data = $this->booking::query()->where('id', $id)->with('service', 'timeSheet')->first();
        return response()->json($data);
    }
    public function bookingDestroy($id)
    {
        $bk_workID = null;
        $booking = Booking::query()->where('id',$id)->first();
        $workDay = WorkDay::all();
        $bk_stylist = $booking->stylist_id;
        $bk_time = $booking->timesheet_id;
        $bk_work = $booking->date;

        foreach ($workDay as $value){
            if ($bk_work == $value->day){
                $bk_workID = $value->id;
                break;
            }
        }
        $stylistTimeSheet = StylistTimeSheet::all();
        foreach ($stylistTimeSheet as $key=>$value){
            if ($value->user_id == $bk_stylist &&
                $value->timesheet_id == $bk_time &&
                $value->work_day_id == $bk_workID){
                $value->update(['is_block' => 1]);
            }
        }
        //-----------------------------------------------------------
        $this->booking::where('id', $id)->update(['status' => 0]);
        $this->booking::where('id', $id)->delete();
        Notification::where('booking_id', $id)->delete();
        Booking_service::where('booking_id', $id)->delete();
        $softDelete = $this->booking::onlyTrashed()->where('id', $id)->first();
        if ($softDelete->pttt == 2) {
            $payment = payment::where('booking_id', $id)->first();
            if ($payment && $softDelete->pttt == 2) {
                ModelsDestroyBooking::create([
                    'booking_id' => $softDelete->id,
                    'user_phone' => $softDelete->user_phone,
                    'price' => $softDelete->price,
                    'status' => '0'
                ]);
                $payment = payment::where('booking_id', $id)->first(); //lấy thông tin payment
                Mail::to('pvviet2k3@gmail.com')->queue(new destroyBooking($softDelete, $payment));
            }
        }
        return response()->json(['success' => 'Xóa thành công']);
    }
    function setUserPhone(Request $request)
    {
        $user_phone = $request->user_phone;
        return response()->json(['user_phone' => $user_phone])->view('client.booking.index');
    }
    public function bookingNotification($id)
    {
        $bookings = Booking::query()
            ->with(['timeSheet' , 'stylist'])
            ->where('user_id', $id)
            ->where('status', 1)
            ->whereDoesntHave('results')
            ->orderBy('date', 'asc')
            ->orderBy('timesheet_id','asc')
            ->orderBy('created_at', 'asc')
            ->get();
        return response()->json($bookings);
    }
    public function sendSms($phoneNumber)
    {
        if (Str::startsWith($phoneNumber, '+84')) {
            // Nếu có, loại bỏ tiền tố "+84"
            $phoneNumber = Str::substr($phoneNumber, 3);
        }
                $APIKey = "DA549A5A42CFAEA8824C0CE30C0DEF";
                $SecretKey = "6302BDD6EE57AB25612AEBDC6CD87E";
//        $APIKey = "CC51F14733C7A913F98530858AFDC7";
//        $SecretKey = "79E1CE633349FD7FA5BB95D7C51F65";
        $YourPhone = $phoneNumber;
        $Content = "Cam on quy khach da su dung dich vu cua chung toi. Chuc quy khach mot ngay tot lanh!";

        $SendContent = urlencode($Content);
        $data = "http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_get?Phone=$YourPhone&ApiKey=$APIKey&SecretKey=$SecretKey&Content=$SendContent&Brandname=Baotrixemay&SmsType=2";

        $curl = curl_init($data);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);

        $obj = json_decode($result, true);
        if ($obj['CodeResult'] == 100) {
            Log::info("thành công ");
        } else {
            Log::info("lỗi  ");
        }
    }
}
