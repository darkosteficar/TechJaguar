<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Post;
use App\Models\Category;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $popular = Post::take(1)->orderByDesc('views')->get();
        $body = preg_replace('/<img[\s\S]+?>/', '', $popular[0]->body);
        $body = substr($body,0,400) . '...';
        $popular[0]->body = $body;
        $news = Post::take(5)->orderByDesc('created_at')->get();
        $categories = $manu_hard = $manu_soft = array();
        $keys = array('gpus'=>'Grafičke kartice','cpus'=>'Procesori','rams'=>'Radne memorije','soft'=>'Softver');
        foreach($keys as $key => $value){
            $categories_news = Category::where('name',$value)->first()->posts;
            if(sizeof($categories_news) != 0){
                $body = $this->filter_body($categories_news[0]);
                $categories_news[0]->body = $body;
                $categories[$key] = $categories_news;
            }
        }
        $keys1 = array('amd'=>'AMD','intel'=>'Intel','nvidia'=>'Nvidia');
        foreach($keys1 as $key => $value){
            $manu_news = Manufacturer::where('name',$value)->first()->posts;
            $array = $array1 = array();
            foreach($manu_news as $post){
                if($post->category->name == 'Softver' ){
                    if(sizeof($array) < 6){
                        array_push($array,$post);
                    }
                }
                else{
                    if(sizeof($array1) < 6){
                        array_push($array1,$post);
                    }
                }
            }
            $manu_hard[$key] = $array1;
            $manu_soft[$key] = $array;
        }
        
        return view('index',['news'=>$news,'popular'=>$popular,'manu_soft'=>$manu_soft,'manu_hard'=>$manu_hard,'categories'=>$categories]);
    }

    public function post(Post $post)
    {
        $posts = Post::take(3)->orderByDesc('created_at')->get();
        $post->loadCount('comments');
        
        $post->views = $post->views + 1;
        $post->save();
        return view('post',['post'=>$post,'posts'=>$posts]);
    }

    public function category(Category $category)
    {
        $jj = (new DateTime('now -7 days'))->format('Y-m-d H:i:s');
        $postsPopular = Post::whereDate('created_at','>=',$jj)->orderBy('views','DESC')->take(5)->get();
        $posts = $category->posts()->paginate(10);
        
        return view('category',['postsPopular'=>$postsPopular,'category'=>$category,'posts'=>$posts]);
    }

    public function manufacturer(Manufacturer $manufacturer)
    {
        $jj = (new DateTime('now -7 days'))->format('Y-m-d H:i:s');
        $posts = $manufacturer->posts()->paginate(10);
        $postsPopular = Post::whereDate('created_at','>=',$jj)->orderBy('views','DESC')->take(5)->get();
        return view('manufacturer',['manufacturer'=>$manufacturer,'posts'=>$posts,'postsPopular'=>$postsPopular]);
    }

    public function filter_body($categories_news)
    {
        $body = preg_replace('/<img[\s\S]+?>/', '', $categories_news->body);
        $body = preg_replace('/<[^>]*>/', '', $categories_news->body);
        $body = substr($body,0,150) . '...';
        return $body;
    }
}
