<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class ApiStylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::query()->whereNotIn('user_type', ['USER','ADMIN'])->with('roles')->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data = $request->all();
            $image = uploadFile('images',$file,false);
            $data['image'] = $image;
            $model = new User;
            $model->fill($data);
            $model->save();
            if ($request->has('role')){
                $model->assignRole($request->input('role'));
            }
        }

        return response()->json(['success','Thêm mới thành công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::query()->findOrFail($id);
        $data->roles;
        $role = Role::all();
        return response()->json(['stylist' => $data, 'role'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stylist = User::query()->findOrFail($id);
        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $data = $request->all();
                $data['image'] = uploadFile('images',$file, false);
                $stylist->fill($data);
                $stylist->save();
                Storage::delete('public/images/'.$stylist->image);

                if ($request->has('role')){
                    DB::table('model_has_roles')->where('model_id',$id)->delete();
                    $stylist->assignRole($request->input('role'));
                }
            } else {
                $data = $request->all();
                $stylist->fill($data);
                $stylist->save();
                if ($request->has('role')){
                    DB::table('model_has_roles')->where('model_id',$id)->delete();
                    $stylist->assignRole($request->input('role'));
                }
            }

            return response()->json(['success' => 'Cập nhật thành công']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
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
