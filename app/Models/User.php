<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    //
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'phone_number',
        'name',
        'email',
        'image',
        'excerpt',
        'user_type',
    ];



    public function isAdmin()
    {
        return $this->type === USER_TYPE_ADMIN;
    }

    public function isStylist()
    {
        return $this->type === USER_TYPE_STYLIST;
    }

    public function isUser()
    {
        return $this->type === USER_TYPE_USER;
    }
//    ----------------------- relation --------------------
    public function timeSheet()
    {
        return $this->belongsToMany(Timesheet::class, 'stylist_time_sheet');
    }
    public function workDay()
    {
        return $this->belongsToMany(WorkDay::class, 'stylist_time_sheet');
    }
    public function booking(){
        return $this->hasOne(Booking::class);
    }
}
