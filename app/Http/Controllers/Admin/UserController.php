<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends AdminBaseController
{
    public $model = User::class;
    public $route = 'user';
    public $pathViews = 'admin.user';
    public $columns = [
        'phone_number' => 'Phone number',
        'role' => 'Vai Trò'
    ];

}
