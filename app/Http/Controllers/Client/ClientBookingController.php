<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Interfaces\NotificationInterface;
use App\Models\Booking;
use App\Models\Booking_service;
use App\Models\payment;
use App\Models\Reviews;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientBookingController extends Controller
{
    public function index(Request $request)
    {
        return view('client.booking.index');
    }

    public function bookingDone(NotificationInterface $notification, $booking_id)
    {
        $bookings = Booking::with('timeSheet')
            ->where('id', $booking_id)
            // ->orderBy('create_at', 'desc')
            ->first();
        $stylist = User::where('id', $bookings->stylist_id)->first();
        // dd($stylist);
        $combo = Booking_service::with('service')
            ->where('booking_id', $booking_id)
            ->get();

            
        $payment = payment::where('booking_id', $booking_id)->first();

        // dd($combo);

        $notification->sendMessage($booking_id, 'Thông báo có lịch đặt mới.');
        return view('client.booking.bookingDone', compact('booking_id', 'bookings', 'combo', 'payment', 'stylist'));
    }
}
