<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pricings= Pricing::get();
        return view('/pricing/index',compact('pricings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/pricing/add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pricing=new Pricing();
        $pricing->name=$request->name;  
        $pricing->description=$request->description;
        $pricing->price=$request->price;
        $request->validate([
            'name' => 'required', 
            'description' => 'required',   
            'price' => 'numeric',  
        ],
        [
            'name.required' => 'Hãy nhập tên stylist.',
            'description.required' => 'Mô tả không được để trống.',
            'price.numeric' => 'Giá tiền không được để trống và phải là số.',
        ]);
        $pricing->save();
        return redirect()->route('pricings.index');
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
    public function edit(Pricing $pricing)
    {
        return view('/pricing/edit',compact('pricing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pricing $pricing)
    {
            $pricing->name=$request->name;
            $pricing->description=$request->description;
            $pricing->price=$request->price;
            $request->validate([
                'name' => 'required', 
                'description' => 'required',   
                'price' => 'numeric',  
            ],
            [
                'name.required' => 'Hãy nhập tên stylist.',
                'description.required' => 'Mô tả không được để trống.',
                'price.numeric' => 'Giá tiền không được để trống và phải là số.',
            ]);
           $pricing->save();
           return redirect()->route('pricings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pricing $pricing)
    {
        $pricing->delete();
        return redirect()->route('pricings.index');
    }
}
