<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\Http\Request;

class AppController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $apps = App::paginate(10);
        return view('admin.apps.index',['apps'=>$apps]);
    }

    public function create()
    {
        return view('admin.apps.create');
    }

    public function store(Request $r)
    {
        $this->validate($r,[
            'name' => 'required',
            'resolution'=>'required',
            'tag'=>'required',
            'type'=>'required'
        ]);

        App::create($r->all());

        return redirect()->back()->with('status','App successfully created.');

    }

    public function edit(App $app)
    {
        return view('admin.apps.edit',['app'=>$app]);
    }

    public function update(Request $r)
    {
        $this->validate($r,[
            'name' => 'required',
            'resolution'=>'required',
            'tag'=>'required',
            'type'=>'required'
        ]);

        $app = App::where('id',$r->id)->update([
            'name' => $r->name,
            'resolution' => $r->resolution,
            'tag' => $r->tag,
            'type'=>$r->type
        ]);

        return redirect()->route('apps.index')->with('status', 'App successfully updated!');
        
    }

    public function delete(Request $r)
    {
        $app = App::find($r->id);
        if($app !== null){
            $app->delete();
            session()->flash('status','App'.$r->name.' deleted successfully!');
            return redirect()->route('apps.index');
        }
        session()->flash('error','App does not exist!');
        return redirect()->route('apps.index');
    }
}
