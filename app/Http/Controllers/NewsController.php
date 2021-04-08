<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = Post::get();
        return view('index',['news'=>$news]);
    }

    public function post()
    {
        $post = Post::where('id','3')->get();
        
        return view('post',['post'=>$post]);
    }
}
