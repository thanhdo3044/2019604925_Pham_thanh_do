<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    const PATH = 'admin.roles.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Role::query()->with('users')->get();
//        dd($data[0]->users);
        return view(self::PATH . __FUNCTION__, compact('data'));
    }
}
