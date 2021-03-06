<?php

namespace App\Http\Controllers;

use App\Models\Ram;
use App\Models\Build;
use App\Models\Buildable;
use Illuminate\Http\Request;

class RamController extends Controller
{
    public function index()
    {
        return view('components',['component'=>'rams']);
    }

    public function add(Request $r)
    {
        $build = Build::find(request()->cookie('build_id'));
        Buildable::create([
            'build_id'=>$build->id,
            'buildable_id' => $r->id,
            'buildable_type'=> 'App\Models\Ram',
        ]);
        $ram = Ram::find($r->id);
        session()->flash('item',$ram->name);
        session()->flash('success', 'Memory ' );
        session()->flash('success2', ' added successfully!' );
        return redirect()->route('build');

    }
    public function remove(Request $r)
    {
        $build = Build::find(request()->cookie('build_id'));
        $ram = Buildable::where('build_id', $build->id)->where('buildable_type','App\Models\Ram')->where('buildable_id',$r->id)->first();
        $ram->delete();
        session()->flash('success', 'Memory removed successfully!' );
        return redirect()->route('build');   
    }
}
