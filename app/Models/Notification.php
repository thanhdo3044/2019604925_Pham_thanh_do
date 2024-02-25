<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'messege'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
