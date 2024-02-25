<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BannerSettingCtl extends Controller
{
    //
    public $model = Banner::class;
    public $route = 'banner';
    public $pathViews = 'admin.banner';
    public $columns = [
        'key' => 'Từ khóa',
        'image' => 'Hình ảnh'
    ];

    /**
     * Display a listing of the resource.
     * @throws BindingResolutionException
     */




    public function __construct()
    {
        if (class_exists($this->model)) {
            $this->model = app()->make($this->model);
        } else {
            $this->model = null;
        }
    }

    public function index(Request $request)
    {
        if ($this->model !== null) {
            $data = $this->model->paginate();
        } else {
            $data = [];
        }


        if ($request->post() && $request->searchBanner) {
            $data = DB::table('banners')->where('key', 'like', '%' . $request->searchBanner . '%')->get();
        }
        return view($this->pathViews . '.' . __FUNCTION__, compact('data'))
            ->with('columns', $this->columns);
    }

    public function create()
    {
        return view($this->pathViews . '.' . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'key' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'img/';
            $bannerImage = time() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $bannerImage);
            $input['image'] = "$bannerImage";
        }
        Banner::create($input);;
        return redirect()->route($this->route . '.' . 'index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $data = Banner::findOrFail($id);

        if ($request->isMethod('POST')) {

            $input = $request->all();
            if ($image = $request->file('image')) {
                $destinationPath = 'img/';
                if(file_exists($destinationPath.$data->image)){
                    unlink($destinationPath.$data->image);
                }
                $bannerImage = time() . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $bannerImage);
                $input['image'] = "$bannerImage";
            } else {
                unset($input['image']);
            }

            $data->update($input);
            return redirect()->route($this->route . '.' . 'index')->with('success', 'Product created successfully.');
        }
        return view($this->pathViews . '.' . __FUNCTION__, compact('data'));
    }
    public function checkDelete(Request $request)
    {
        $ids = $request->ids;
        Banner::withTrashed()->whereIn('id', $ids)->forceDelete();
        return response()->json(["success" => "Banner delete success"]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request, $id)
    {
        // $banner = Banner::where('id', $id)->delete(); Xóa Mềm
        $banner = Banner::withTrashed()->where('id', $id)->forceDelete(); //Xóa cứng đây😁
        return redirect()->route($this->route . '.' . 'index');
    }
}
