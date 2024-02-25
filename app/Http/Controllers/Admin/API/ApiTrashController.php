<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use App\Models\Service_categories;
use App\Models\User;
use Illuminate\Http\Request;

class ApiTrashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $model;
    public function index()
    {
        // show các value
        $data = $this->model::onlyTrashed()->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function restore(Request $request, $id)
    {
        $this->model::withTrashed()->where('id',$id)
            ->restore();
        return response()->json(['success','khôi phục thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->model::withTrashed()->where('id',$id)
            ->forceDelete();
        return response()->json(['success','Xóa thành công']);
    }

    public function user()
    {
        $data = User::onlyTrashed()->get();
        return response()->json($data);
    }

    public function destroyUser(string $id)
    {
        User::withTrashed()->where('id',$id)->forceDelete();
        return response()->json(['success','Delete successfully!']);
    }

    public function restoreUser(Request $request, $id){
        User::withTrashed()->where('id',$id)->restore();
        return response()->json(['success','Restore successfully!']);
    }

}
