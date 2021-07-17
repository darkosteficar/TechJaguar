<?php

namespace App\Http\Controllers;

use App\Models\Cpu;
use App\Models\Gpu;
use App\Models\Mobo;
use App\Models\Post;
use App\Models\Category;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function store(Request $request)
    {
     
        $this->validate($request,[
            'post_title'=>'required|max:100',
            'post_content'=>'required',
            'post_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id'=> 'required',
            'manufacturer_id' => 'required'
        ]);
        /*
        $imageName = time().'.'.$request->post_image->extension();  
      
        $image = $request->file('post_image');
        $filePath = public_path('/thumbnails');
        $img = Image::make($image->path());    
        $img->resize(110, 110);
        $request->post_image->move(public_path('images'), $imageName);
            */

        $image = $request->file('post_image');
        $input['imagename'] = time().'.'.$image->extension();
     
        $filePath = public_path('images');

        $img = Image::make($image->path());
        //$img->resize(1920, 1080)->save($filePath.'/'.$input['imagename']);
        $img->crop(940, 530)->save($filePath.'/'.$input['imagename']);

        
        auth()->user()->posts()->create([
            'post_title'=>request()->post_title,
            'body'=>request()->post_content,
            'category_id'=>request()->category_id,
            'gpu_id' =>$request->gpu,
            'cpu_id' => $request->cpu,
            'mobo_id' => $request->mobo,
            'manufacturer_id'=>request()->manufacturer_id,
            'post_image'=>$input['imagename'],
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
        $gpus = Gpu::all();
        $mobos = Mobo::all();
        $cpus = Cpu::all();

        return view('admin.create',['categories'=>$categories,'manufacturers'=>$manufacturers,'gpus'=>$gpus,'cpus'=>$cpus,'mobos'=>$mobos]);
    }

    public function read()
    {

        $posts = Post::withCount('comments')->paginate(10);
        
        return view('admin.posts',['posts'=>$posts]);
    }

    public function delete(Request $request)
    {
        $post = Post::find($request->id);
        $post->delete();

        session()->flash('status','The following post is deleted successfully: ');
        session()->flash('title', $request->post_title );
        return redirect()->route('posts.read');
    }

    public function update(Post $post)
    {
        $categories = Category::all();
        $gpus = Gpu::all();
        $mobos = Mobo::all();
        $cpus = Cpu::all();
        $manufacturers = Manufacturer::all();
        return view('admin.update',['post'=>$post,'categories'=>$categories,'manufacturers'=>$manufacturers,'gpus'=>$gpus,'cpus'=>$cpus,'mobos'=>$mobos]);
    }

    public function save(Request $request)
    {
        
        $post = Post::find($request->post_id);
        if($post !== null){
            $this->validate($request,[
                'post_title'=>'required|max:100',
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

                $image = $request->file('post_image');
                $input['imagename'] = time().'.'.$image->extension();
            
                $filePath = public_path('images');

                $img = Image::make($image->path());
                $img->crop(940, 530)->save($filePath.'/'.$input['imagename']);
                $post->post_image = $input['imagename'];

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
            
            session()->flash('status','Post updated successfully.');
            return redirect()->route('posts.read');
    
        }

        session()->flash('error','Post does not exist!');
        return redirect()->route('posts.read');
        
    }
}
