<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store()
    {
        $inputs = request();
        Post::create([
            'post_title'=>request()->post_title,
            'body'=>request()->post_content
        ]);
    }
}
