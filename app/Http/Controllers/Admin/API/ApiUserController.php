<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $data = User::query()->where('user_type', 'USER')->get();
        $data = User::query()->with('roles')->get();
        return response()->json($data);
    }
    public function roles()
    {
        $data = Role::query()->orderByDesc('id')->get();
        return response()->json($data);
//        return view(self::PATH . __FUNCTION__, compact('data'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new User;
        $data->fill($request->except('_token'));
        $data->save();
        if ($request->has('role')) {
            $data->assignRole($request->input('role'));
        }
        return response()->json(['success','Thêm mới thành công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::query()->findOrFail($id);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $model = User::query()->findOrFail($id);
        $model->update($data);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $model->assignRole($request->input('role'));
        return response()->json(['success','Cập nhật thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find($id);
        $data->delete();
        return response()->json(['success','Đã vào thùng rác']);
    }
}
