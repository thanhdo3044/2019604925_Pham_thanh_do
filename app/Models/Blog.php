<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        // 'is_vip',
    ];

    public function timeSheet(){
        return $this->belongsToMany(Timesheet::class);
    }
    public function booking(){
        return $this->hasOne(Booking::class);
    }
    public function imageUrl(){
        return '/images/blog/'.$this->image;
    }
}
