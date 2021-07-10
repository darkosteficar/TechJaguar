<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function read_category()
    {
        $categories = Category::paginate(10);

        return view('admin.components.categories.index',['categories'=>$categories]);
    }

    public function create_category()
    {
        return view('admin.components.categories.create');
    }


    public function store_category(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required'
        ]);

        $category = Category::create([
            'name'=>$request->name,
            'description'=>$request->description
        ]);
        $category->save();
        session()->flash('status','Kategorija uspješno kreirana!');
        return redirect()->route('categories.index');
    }

    public function delete_category(Request $request)
    {
        $cat = Category::find($request->id);
        if(!$cat->isEmpty()){
            $cat->delete();
            session()->flash('status','Kategorija'.$r->name.' uspješno obrisana!');
            return redirect()->route('categories.index');
        }
        session()->flash('error','Kategorija ne postoji!');
        return redirect()->route('categories.index');
    }

    public function edit_category(Category $category)
    {
        return view('admin.components.categories.edit',['category'=>$category]);
    }

    public function update_category(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required'
        ]);
        $cat = Category::find($request->id);
        if($cat){
            $cat->name = $request->name;
            $cat->description = $request->description;
            $cat->save();
            session()->flash('status','Kategorija uspješno ažurirana!');
            return redirect()->route('categories.index');
        }
        session()->flash('error','Kategorija ne postoji!');
        return redirect()->route('categories.index');
    }
}
