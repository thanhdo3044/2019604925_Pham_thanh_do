<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FaqController extends Controller
{
    public function index()
    {
        $faqs= Faq::get();
        return view('/faq/index',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/faq/add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $faq=new Faq();
        $faq->question=$request->question;  
        $faq->answer=$request->answer;
        $request->validate([
            'question' => 'required', 
            'answer' => 'required',    
        ],
        [
            'question.required' => 'Hãy nhập câu hỏi.',
            'answer.required' => 'Câu trả lời không được để trống.',
        ]);
        $faq->save();
        return redirect()->route('faqs.index');
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
    public function edit(Faq $faq)
    {
        return view('/faq/edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
                $faq->question=$request->question;
                $faq->answer=$request->answer;
                $request->validate([
                    'question' => 'required', 
                    'answer' => 'required',    
                ],
                [
                    'question.required' => 'Hãy nhập câu hỏi.',
                    'answer.required' => 'Câu trả lời không được để trống.',
                ]);
           $faq->save();
           return redirect()->route('faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index');
    }
}

