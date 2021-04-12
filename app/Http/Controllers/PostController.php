<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
     
        $this->validate($request,[
            'post_title'=>'required|max:40',
            'post_content'=>'required',
            'post_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id'=> 'required',
            'manufacturer_id' => 'required'
        ]);
        $imageName = time().'.'.$request->post_image->extension();  
      
        $request->post_image->move(public_path('images'), $imageName);
        
        auth()->user()->posts()->create([
            'post_title'=>request()->post_title,
            'body'=>request()->post_content,
            'category_id'=>request()->category_id,
            'manufacturer_id'=>request()->manufacturer_id,
            'post_image'=>$imageName,
            'views' => 0
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
        $categories = Category::all();
        $manufacturers = Manufacturer::all();

        return view('admin.create',['categories'=>$categories,'manufacturers'=>$manufacturers]);
    }

    public function read()
    {

        $posts = Post::paginate(10);

        return view('admin.posts',['posts'=>$posts]);
    }

    public function delete(Request $request)
    {
        $post = Post::find($request->id);
        $post->delete();

        session()->flash('status','Sljedeća objava je uspješno obrisana: ');
        session()->flash('title', $request->post_title );
        return redirect()->route('posts.read');
    }

    public function update(Post $post)
    {
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('admin.update',['post'=>$post,'categories'=>$categories,'manufacturers'=>$manufacturers]);
    }

    public function save(Request $request)
    {
        
        $post = Post::find($request->post_id);
        if($post !== null){
            $this->validate($request,[
                'post_title'=>'required|max:40',
                'post_content'=>'required',
            ]);
            $post->post_title = $request->post_title;
            $post->body = $request->post_content;
            $post->category_id = $request->category_id;
            $post->manufacturer_id = $request->manufacturer_id;
            if($request->post_image !== null){
                $this->validate($request,[
                    'post_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);
                $imageName = time().'.'.$request->post_image->extension();  
            
                $request->post_image->move(public_path('images'), $imageName);
                $post->post_image = $imageName;
            }
            $optionals = array('gpu_id','cpu_id','mobo_id');
            foreach($optionals as $option){
                if($request->$option !== null){
                    $this->validate($request,[
                        $option=>'integer'
                    ]);
                    $post->$option = $request->$option;
                }
            }

            $post->save();
            
            session()->flash('status','Objava uspješno ažurirana.');
            return redirect()->route('posts.read');
    
        }

        session()->flash('error','Objava ne postoji!');
        return redirect()->route('posts.read');
        
    }
}
