<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StylistTimeSheet extends Model
{
    use HasFactory;
    protected $table = 'stylist_time_sheet';
    protected $fillable = [
        'id',
        'user_id',
        'timesheet_id',
        'work_day_id',
        'is_active',
        'is_block',
    ];
    public function stylist(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function workDay(){
        return $this->belongsTo(WorkDay::class,'work_day_id','id');
    }
    public function TimeSheet(){
        return $this->belongsTo(Timesheet::class,'timesheet_id','id');
    }
}
