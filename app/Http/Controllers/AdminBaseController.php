<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBaseController extends Controller
{
    /**
     * @var Builder $model
     */
    public $model;
    public $pathViews;
    public $route;
    public $fieldImage;
    public $folderImage;
    public $columns = [];
    public $title;
    /**
     * Display a listing of the resource.
     * @throws BindingResolutionException
     */


    public function __construct()
    {
        if (class_exists($this->model)) {
            $this->model = app()->make($this->model);
        }else{
            $this->model = null;
        }
    }

    public function index()
    {
        if ($this->model !== null){
            $data = $this->model->paginate();
        }else{
            $data = [];
        }
        return view($this->pathViews. '.' . __FUNCTION__,compact('data'))
            ->with('columns', $this->columns);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->pathViews. '.' . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $model = new $this->model;
        $data = $request->except('_token');
        $model->fill($data);
        if ($request->hasFile($this->fieldImage)){
            $tmpPath = Storage::put($this->folderImage, $request->{$this->fieldImage});
            $model->{$this->fieldImage} = 'storage/' . $tmpPath;
        }

        $model->save();
        return redirect()->route($this->route .'.'. 'index');
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
    public function edit(string $id)
    {
        $data = $this->model->findOrFail($id);
        return view($this->pathViews. '.' . __FUNCTION__, compact('data'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = $this->model->findOrFail($id);
        $model->fill($request->except('_token'));

        if ($request->hasFile($this->fieldImage)){
            $oldImage = $model->{$this->fieldImage};
            $tmpPath = Storage::put($this->folderImage, $request->{$this->fieldImage});
            $model->{$this->fieldImage} = 'storage/' . $tmpPath;
        }

        $model->save();
        if ($request->hasFile($this->fieldImage)){
            $oldImage = str_replace('storage/', '', $oldImage);
            Storage::delete($oldImage);

        }
        return redirect()->route($this->route .'.'. 'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = $this->model->findOrFail($id);
        $model->delete();
        if (Storage::exists($model->{$this->fieldImage})){
            $oldImage = str_replace('storage/', '', $model->{$this->fieldImage});
            Storage::delete($oldImage);
        }
    }
}
