<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stylist extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'phone',
        'excerpt',
        'image',
    ];

    public $timestamps = true; // This line will enable the created_at and updated_at timestamps.

//    public function timeSheet(){
//        return $this->belongsToMany(Timesheet::class,'stylist_time_sheet');
//    }
//    public function booking(){
//        return $this->hasOne(Booking::class);
//    }

}


