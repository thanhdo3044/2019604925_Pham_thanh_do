<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\service_categories;
use Illuminate\Http\Request;

class CategoryServiceController extends AdminBaseController
{
    public $model = service_categories::class;
    public $route = 'category';
    public $pathViews = 'admin.categoryService';
    public $columns = [
        'name' => 'Tên danh mục',
        'is_active' => 'Trạng thái hoạt động',
    ];

//    public function update(Request $request, $id)
//    {
//        $data = $request->except('_token');
//        $model = $this->model->findOrFail($id);
//        $model->update($data);
//
//        return response()->json(['success','sửa thành công']);
//    }

}
