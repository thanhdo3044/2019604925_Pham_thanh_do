<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName); 

            $banner = new Banner();
            $banner->image = 'images/' . $imageName;
            $banner->save();

            return redirect()->route('banners.index')->with('success', 'Ảnh đã được tải lên thành công.');
        }

        return redirect()->route('banners.create')->with('error', 'Có lỗi xảy ra khi tải lên ảnh.');
    }



    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    $banner = Banner::find($id);

    if (!$banner) {
        return redirect()->route('banners.index')->with('error', 'Không tìm thấy banner để cập nhật.');
    }

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);

        $banner->image = 'images/' . $imageName;
    }

    $banner->save();

    return redirect()->route('banners.index')->with('success', 'Banner đã được cập nhật thành công.');
}


    public function delete($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        return redirect()->route('banners.index')->with('success', 'Banner đã được xóa ');
    }

    
}
