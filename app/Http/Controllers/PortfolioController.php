<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios= Portfolio::get();
        return view('/portfolio/index',compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/portfolio/add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $portfolio=new Portfolio();
        if($request->image){
            $image=$request->image->getClientOriginalName();
            $request->image->storeAs('public/image/', $image);
            $portfolio->image=$image;
        }
        $request->validate([
            'image' => 'required', 
        ],
        [
            'image.required' => 'Ảnh không được để trống.',
        ]);
        $portfolio->save();
        return redirect()->route('portfolios.index');
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
    public function edit(Portfolio $portfolio)
    {
        return view('/portfolio/edit',compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        if($request->image){
            $image=$request->image->getClientOriginalName();
            $request->image->storeAs('public/image/', $image);
            $portfolio->image=$image;
        }
        $request->validate([
            'image' => 'required', 
        ],
        [
            'image.required' => 'Ảnh không được để trống.',
        ]);
           $portfolio->save();
           return redirect()->route('portfolios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('portfolios.index');
    }
}
