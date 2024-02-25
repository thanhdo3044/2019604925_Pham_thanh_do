<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class payment extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'payment';
    protected $fillable = [
        "booking_id",
        "money",
        "email",
        "note",
        "vnp_response_code",
        "code_vnpay",
        "code_bank",
        "time"
    ];

    public function booking(){
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
