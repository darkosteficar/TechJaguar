<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $popular = Post::take(1)->orderByDesc('views')->get();
        $body = preg_replace('/<img[\s\S]+?>/', '', $popular[0]->body);
        $body = substr($body,0,280) . '...';
        $popular[0]->body = $body;

        $news = Post::take(5)->get();
        return view('index',['news'=>$news,'popular'=>$popular]);
    }

    public function post(Post $post)
    {
        $post->views = $post->views + 1;
        $post->save();
        return view('post',['post'=>$post]);
    }

    public function category()
    {
        return view('category');
    }
}
