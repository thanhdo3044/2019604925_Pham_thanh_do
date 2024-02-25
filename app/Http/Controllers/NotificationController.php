<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\NotificationInterface;
use App\Models\Booking;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    public $route = 'notification';
    public $pathViews = 'admin.notification';
    public function index(){
        $user = Auth::user()->user_type;
        if ($user === 'STYLIST') {
            $stylistId = Auth::user()->id; // ID của stylist bạn muốn truy vấn
            // đầu tiên lấy ra " CỘT " id của bảng "BOOKING" theo id của stylist đang đăng nhập hiện tại (dòng 49)
            $stylist = Booking::query()->where('stylist_id', $stylistId)->pluck('id');
            // Sau đó sẽ lấy ra các bản ghi trong bảng thông báo dựa vào "MẢNG" id của booking đã lấy ở trên
            $notifications = Notification::whereIn('booking_id', $stylist)
                ->with('booking')
                ->orderBy('id', 'desc')
                ->get();
        }
        if ($user === 'ADMIN') {
            $notifications = Notification::query()
                ->with('booking')
                ->orderBy('id', 'desc')
                ->get();
        }
        return view('admin.notification.index', compact('notifications'));
    }

    public function laySoLuongThongBao() {
        $user = Auth::user()->user_type;
        if ($user === 'STYLIST') {
            $stylistId = Auth::user()->id; // ID của stylist bạn muốn truy vấn
            // đầu tiên lấy ra " CỘT " id của bảng "BOOKING" theo id của stylist đang đăng nhập hiện tại (dòng 49)
            $stylist = Booking::query()->where('stylist_id', $stylistId)->pluck('id');
            // Sau đó sẽ lấy ra các bản ghi trong bảng thông báo dựa vào "MẢNG" id của booking đã lấy ở trên
            $notifications = Notification::whereIn('booking_id', $stylist)
                ->with('booking')
                ->orderBy('id', 'desc')
                ->get();
        }
        if ($user === 'ADMIN') {
            $notifications = Notification::query()
                ->with('booking')
                ->orderBy('id', 'desc')
                ->get();
        }
        $soLuongThongBao = count($notifications);
        return response()->json(['so_luong_thong_bao' => $soLuongThongBao]);
    }
    public function delete($id) {
        // Xóa thông báo từ cơ sở dữ liệu
        $notification = Notification::find($id);
        Log::info($notification);
        if ($notification) {
            Log::info('Điều kiện đúng');
            $notification->delete();
            $id = $notification->booking_id;
            $booking = Booking::find($id);
            $booking->status = 0;
            $booking->save();
            return response()->json(['success' => true]);
        } else {
            Log::info('Điều kiện sai');
            return response()->json(['success' => false]);
        }
    }

    public function confirmBooking($id)
    {
        $booking = Booking::find($id);
        if (Auth::check()) {
            $user = Auth::user();
            log:info($user);
            if (($user->user_type === 'STYLIST' && $booking->stylist_id === $user->id) || $user->user_type === 'ADMIN') {
                // Người dùng là stylist và có quyền xác nhận đặt lịch
                // Xử lý xác nhận đặt lịch tại đây
                if ($booking) {
                    $booking->status = 2; // Cập nhật trạng thái
                    $booking->save();
                    return response()->json(['message' => 'Đã xác nhận lịch đặt.'], 200);
                }
            }
        }
    }

    public function deleteAll(){
        Notification::truncate();
    }

}
