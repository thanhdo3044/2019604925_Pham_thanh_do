<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{

    use HasFactory,SoftDeletes;
    protected $table = 'bookings';
//    public $timestamps = false;
    protected $fillable = [
        'user_phone',
        'user_id',
        'stylist_id',
        'timesheet_id',
        'price',
        'date',
        'special_requirements',
        'is_consultant',
        'is_accept_take_a_photo',
        'status',
        'pttt'
    ];

    public function service(){
        return $this->belongsToMany(Service::class, 'booking_service');
    }
//    public function service(){
//        return $this->belongsToMany(Service::class, 'booking_services');
//    }

    public function results()
    {
        return $this->hasMany(Results::class);
    }

    public function timeSheet(){
        return $this->belongsTo(Timesheet::class, 'timesheet_id');
    }

    public function stylist()
    {
        return $this->belongsTo(User::class, 'stylist_id');
    }
    public function reviews(){
        return $this->hasMany(Reviews::class, 'booking_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
