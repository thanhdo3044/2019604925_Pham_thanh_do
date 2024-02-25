<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\Stylist;

class MemberController extends AdminBaseController
{
    public $model = Stylist::class;
    public $pathViews = 'admin.member';

}
