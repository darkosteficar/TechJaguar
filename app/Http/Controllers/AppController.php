<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\Http\Request;

class AppController extends Controller
{
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
            'tag'=>'required'
        ]);

        App::create($r->all());

        return redirect()->back()->with('status','Aplikacija je uspješno dodana.');

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
            'tag'=>'required'
        ]);

        $app = App::where('id',$r->id)->update([
            'name' => $r->name,
            'resolution' => $r->resolution,
            'tag' => $r->tag
        ]);

        return redirect()->route('apps.index')->with('status', 'Aplikacija uspješno ažurirana!');
        
    }
}
