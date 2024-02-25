<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Timesheet extends Model
{
    use HasFactory;


    protected $fillable = [
        'hour',
        'minutes',
        'is_active',
    ];

    public function stylist(){
        return $this->belongsToMany(User::class, 'stylist_time_sheet');
    }
    public function booking(){
        return $this->hasOne(Booking::class);
    }
}
