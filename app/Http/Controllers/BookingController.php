<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
   
    public function getBookingStatistics()
{
    $statistics = DB::table('bookings')
        ->select(
            'user_phone',
            'stylist_id',
            'timesheet_id',
            'date',
            'special_requirement',
            'is_consultant',
            'is_accept_take_a_photo',
            'status',
            DB::raw('COUNT(*) as total')
        )
        ->groupBy(
            'user_phone',
            'stylist_id',
            'timesheet_id',
            'date',
            'special_requirement',
            'is_consultant',
            'is_accept_take_a_photo',
            'status'
        )
        ->get();

    return view('admin.dashboard.index', ['statistics' => $statistics]);
}

    
}






