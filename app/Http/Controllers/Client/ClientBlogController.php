<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;

class ClientBlogController extends Controller
{
    public function index(){
        $blogs= Blog::all();
        return view('client.display.blog',compact('blogs'));
    }
    public function detailBlog($id){
        $detailBlog = Blog::findOrFail($id);
        return view('client.display.post',compact('detailBlog'));
    }
}
