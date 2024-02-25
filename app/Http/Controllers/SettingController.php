<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|unique:settings',
            'value' => 'required',
        ]);

        Setting::create([
            'key' => $request->input('key'),
            'value' => $request->input('value'),
        ]);

        return redirect()->route('settings.index')->with('success', 'Setting created successfully');
    }

    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'key' => 'required|unique:settings,key,'.$id,
        //     'value' => 'required',
        // ]);

        $setting = Setting::findOrFail($id);
        $setting->update([
            'key' => $request->input('key'),
            'value' => $request->input('value'),
        ]);
        
        session()->flash('success', 'Cập nhật thành công');
        return redirect()->route('settings.index');    }

    // public function deleteConfirm($id)
    // {
    //     $setting = Setting::findOrFail($id);
    //     return view('settings.delete-confirm', compact('setting'));
    // }

    public function delete($id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();
        session()->flash('success', 'Xóa thành công');

        return redirect()->route('settings.index');
    }
}
