<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class ApiRoleController extends Controller
{
    public function index(){
        $data = Role::all();
        return response()->json($data);
    }
    public function overView(){
        $data = Role::query()->with('users')->get();
        return response()->json($data);
    }

    public function store(Request $request){
        $model = new Role();
        $model->fill($request->all());
        $model->save();
        $model->syncPermissions($request->permissions);
        return response()->json(['success'=> 'Thêm mới thành công']);
    }

    public function edit(string $id)
    {
        $role = Role::query()->findOrFail($id);
        $permission = $role->permissions->pluck('name')->toArray();
        return response()->json(['role'=> $role, 'permission' => $permission]);
    }

    public function update(Request $request, string $id){
        $model = Role::query()->findOrFail($id);
        $model->fill($request->all());
        $model->save();
        $model->syncPermissions($request->permissions);
        return response()->json(['success'=> 'Cập nhật thành công']);
    }
    public function destroy($id)
    {
        $role = Role::query()->findOrFail($id);
        $role->delete();
        return response()->json(['success'=> 'Xóa thành công']);
    }
}
