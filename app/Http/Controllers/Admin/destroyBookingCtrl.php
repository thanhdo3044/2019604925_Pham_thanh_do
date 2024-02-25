<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\mailUserDestroy;
use App\Models\Booking;
use App\Models\destroyBooking;
use App\Models\payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class destroyBookingCtrl extends Controller
{
    //
    public function index(){
        $data = destroyBooking::orderBy('created_at','desc')->get();
        return view('admin.destroyBooking.index', compact('data'));
    }
    //Xác nhận hủy lịch
    public function confirm(Request $request , $id)  {
        $payment = payment::where('booking_id', $id)->first(); //lấy dữ liệu bảng thanh toán
        $data = destroyBooking::where('booking_id', $id)->first(); //lấy dữ liệu bảng thanh toán hủy lịch(destroyBooking)
        Mail::to($payment->email)->queue(new mailUserDestroy($data)); // admin xác nhận hủy lịch thì send mail cho khách hàng
        $destroy = destroyBooking::where('booking_id', $id)->update(['status'=> 1]); //cập nhật trạng thái status của destroyBooking = 1 là đã xác nhận hủy lịch
        $payment->delete();
        return redirect()->route('destroy.index');
    }
    //Khôi phục lại lịch của khách hàng
    public function restore($id) {
        $booking = Booking::withTrashed()->find($id);
        $booking->restore();
        $booking->update(['status' => 2]);
        $destroy = destroyBooking::where('booking_id', $id)->update(['status'=> 2]);

        return redirect()->route('destroy.index');
    }
}
