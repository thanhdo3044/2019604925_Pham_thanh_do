<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewController extends AdminBaseController
{
    public $model = Reviews::class;
    public $route = 'review';
    public $pathViews = 'admin.review';
    public $columns = [
        'booking_id' => 'Booking_id',
        'rating' => 'Rating',
        'comment' => 'Comment',
        'reply' => 'Reply'
    ];

    public function admin()
    {
        
        $data = Reviews::with('Booking.User')->get();
        return view('admin.review.index',compact('data'));
    }

    public function reply(Request $request)
    {
        $data = Reviews::find($request->id);
        
        $data->update([
            'reply'=> $request->input('reply'),
        ]);
        return redirect()->route('review.index');
    }
}
