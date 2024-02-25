<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class destroyBooking extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'destroy_booking';
    protected $fillable = [
        'booking_id',
        'user_phone',
        'price',
        'status',
    ];
    public function booking(){
        return $this->belongsTo(Booking::class, 'booking_id');
    }
    public function payment(){
        return $this->belongsTo(payment::class, 'booking_id');
    }
}
