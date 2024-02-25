<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Service_categories extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'service_categories';

    protected $fillable = ['id','name', 'is_active'];

    public function service(){
        return $this->hasMany(Service::class, 'category_id');
    }
}
