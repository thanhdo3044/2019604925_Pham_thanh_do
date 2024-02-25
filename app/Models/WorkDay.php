<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkDay extends Model
{
    use HasFactory;
    protected $fillable = [
        'day',
        'is_active',
    ];

    public function workDay(){
        return $this->belongsToMany(WorkDay::class, 'stylist_time_sheet');
    }
    public function timeSheet(){
        return $this->belongsToMany(Timesheet::class, 'stylist_time_sheet');
    }
    public function stylist() {
        return $this->belongsTo(User::class, 'stylist_time_sheet');
    }
}
