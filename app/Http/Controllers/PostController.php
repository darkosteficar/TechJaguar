<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'post_title'=>'required|max:40',
            'post_content'=>'required',
            'post_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $imageName = time().'.'.$request->post_image->extension();  
      
        $request->post_image->move(public_path('images'), $imageName);
        
        Post::create([
            'post_title'=>request()->post_title,
            'body'=>request()->post_content,
            'post_image'=>$imageName
        ]);

        session()->flash('status','Post has been succesfully created!');
        return redirect()->route('posts.create');
        
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function create()
    {
        return view('admin.create');
    }
}
