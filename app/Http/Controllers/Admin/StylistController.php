<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StylistController extends Controller
{
    public $model = User::class;

    public function index(){
        return view('admin.stylist.index');
    }
}
