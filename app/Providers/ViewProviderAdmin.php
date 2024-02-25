<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\View;

class ViewProviderAdmin extends ServiceProvider
{
    /**
     * Register services.
     */
//    public function register(): void
//    {
//        //
//    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
//        dd(123);
        $this->Notification();
    }

    private function Notification()
    {

        View::composer('admin.layout.partials.topbar', function ($view) {
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
                $view->with('notification', $notifications);
            }
            if ($user === 'ADMIN') {
                $notifications = Notification::query()
                    ->with('booking')
                    ->orderBy('id', 'desc')
                    ->get();
                $view->with('notification', $notifications);
            }
        });


    }
}
