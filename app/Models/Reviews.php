<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'rating',
        'comment',
        'reply'
    ];

    public function booking(){
        return $this->belongsTo(Booking::class, 'booking_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
