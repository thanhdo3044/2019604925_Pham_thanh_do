<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\AdminMail;
use App\Models\Booking;
use App\Models\payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailSend;
use App\Models\Booking_service;
use App\Models\Results;
use App\Models\User;
use Illuminate\Contracts\Queue\Queue as QueueQueue;
use Illuminate\Queue\Queue as IlluminateQueueQueue;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Str;

class paymentController extends Controller
{
    //
    public function index(Request $request, $user_phone)
    {
        // $user = auth()->user()->phone_number;

        $url = "+84" . $user_phone; // Sử dụng đường dẫn URL động được truyền từ route.
        // dd($url);
        $booking = Booking::where('user_phone', $url)->orderBy('created_at', 'desc')->first();
        // dd($booking);

        return view('client.vnpay.index', compact('booking'));
    }


    public function create_vnpay(Request $request)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('client.return.vnpay');
        $vnp_TmnCode = "TTVOYSZW"; //Mã website tại VNPAY
        $vnp_HashSecret = "DHWPAHJHGIHXDUCOQWAOJSDMOBMIIUNW"; //Chuỗi bí mật
        $vnp_TxnRef = $_POST['booking_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo =  $_POST['email'];
        $vnp_OrderType = "Haircut payment";
        $vnp_Amount = $_POST['money'] * 100;
        $vnp_Locale =  $_POST['language'];
        $vnp_BankCode = $_POST['bankCode'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //127.0.0.1

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            // "vnp_Email" => $vnp_Email,
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        // dd($inputData);
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        // var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        // dd($vnp_Url);
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        // dd($vnp_Url);
        header('Location: ' . $vnp_Url);
        // dd(header('Location: ' . $vnp_Url));
        die();
    }

    public function return(Request $request)
    {
        // dd($request->all());
        $vnp_HashSecret = "DHWPAHJHGIHXDUCOQWAOJSDMOBMIIUNW";
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = $request->all();

        // dd($inputData);
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        if ($secureHash == $vnp_SecureHash) {
            if ($_GET['vnp_ResponseCode'] == '00') {
                // echo "GD Thanh cong";
                // dd($inputData);

                //kiểm tra db có dữ liệu chưa, nếu có rồi thì ko cho insert
                $existingPayment = payment::query()
                    ->where('booking_id', $inputData['vnp_TxnRef'])
                    ->first();

                if (!$existingPayment) {
                    payment::query()->create([
                        "booking_id" => $inputData['vnp_TxnRef'],
                        "money" => $inputData['vnp_Amount'] / 100,
                        "email" => $inputData['vnp_OrderInfo'],
                        "note" => "Chuyển khoản BarBer-Shop",
                        "vnp_response_code" => $inputData['vnp_ResponseCode'],
                        "code_vnpay" => $inputData['vnp_BankTranNo'],
                        "code_bank" => $inputData['vnp_BankCode'],
                        "time" => $inputData['vnp_PayDate'],
                    ]);

                    $mailData = [
                        'title' => 'Mail from Webappfix',
                        'body' => 'This is for testing email usign smtp',
                    ];
                    $combo = Booking_service::with('service')
                        ->where('booking_id', $inputData['vnp_TxnRef'])
                        ->get();
                    $inputDatas = $inputData;
                    $booking = Booking::with('timeSheet')->where('id', $inputData['vnp_TxnRef'])->first();
                    $stylist = User::where('id', $booking->stylist_id)->first();
//                     dd($booking->user_phone);
                    // dd($mailData,$combo,$booking,$inputDatas);

                        Mail::to($inputData['vnp_OrderInfo'])->queue(new MailSend($mailData, $combo, $booking, $inputDatas, $stylist));
                    $this->sendSms($booking->user_phone);

                }

                //mail gửi admin khi có người dùng thanh toán thành công
                $payment = payment::orderBy('created_at', 'desc')->first();
                    $payment = payment::find($payment->id); // Lấy lại đối tượng payment để đảm bảo thông tin mới nhất
                    Mail::to('thanhdodh3004@gmail.com')->queue(new AdminMail($payment));


                return view('client.vnpay.vnpay_return', compact('inputData'));
            } else {
                $booking = Booking::where('id',$inputData['vnp_TxnRef'])->first();
                Booking::withTrashed()->where('id', $inputData['vnp_TxnRef'])->forceDelete();
                return redirect()->route('client.booking', ['phone' => str_replace('+84', '',$booking->user_phone)])->with('default', "Thanh toán thất bại");
            }
        } else {
            $booking = Booking::where('id',$inputData['vnp_TxnRef'])->first();
            Booking::withTrashed()->where('id', $inputData['vnp_TxnRef'])->forceDelete();
            echo "Chu ky khong hop le";
            return redirect()->route('client.booking', ['phone' => str_replace('+84', '',$booking->user_phone)])->with('default', "Thanh toán thất bại");
        }
    }
    public function sendSms($phoneNumber)
    {
        if (Str::startsWith($phoneNumber, '+84')) {
            // Nếu có, loại bỏ tiền tố "+84"
            $phoneNumber = Str::substr($phoneNumber, 3);
        }
                $APIKey = "DA549A5A42CFAEA8824C0CE30C0DEF";
                $SecretKey = "6302BDD6EE57AB25612AEBDC6CD87E";
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
