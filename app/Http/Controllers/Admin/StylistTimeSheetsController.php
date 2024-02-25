<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\StylistTimeSheet;
use Illuminate\Http\Request;

class StylistTimeSheetsController extends AdminBaseController
{
    public $model = StylistTimeSheet::class;
    public $route = 'stylistTimeSheets';
    public $pathViews = 'admin.stylistTimeSheets';
    public $columns = [
        'user_id' => 'ID Stylist',
        'timesheet_id' => 'ID Time Sheet',
        'is_active' => 'Active',
        'is_block' => 'Block',
    ];



}
