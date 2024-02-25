<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    function category(){
        $columns = [
            'name' => 'Tên danh mục',
            'is_active' => 'Trạng thái hoạt động',
        ];
        return view('admin.trash.category')
            ->with('columns', $columns);
    }


    function stylistTimeSheets(){
        $columns = [
            'stylist_id' => 'ID Stylist',
            'timeshhet_id' => 'ID Time Sheet',
            'is_active' => 'Active',
            'is_block' => 'Block',
        ];
        return view('admin.trash.stylistTimeSheets')
            ->with('columns', $columns);
    }

    function user()
    {
        $columns = [
            'name' => 'Name',
            'phone' => 'Phone Number'
        ];
        return view('admin.trash.user',compact('columns'));
    }
    function Service(){
        $columns = [
            'name' => 'Tên dịch vụ',
            'price' => 'Giá dịch vụ',
            'description' => 'Mô tả',
            'is_active' => 'Trạng thái hoạt động',
        ];
        return view('admin.trash.service')
            ->with('columns', $columns);
    }
}
