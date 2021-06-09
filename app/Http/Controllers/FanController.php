<?php

namespace App\Http\Controllers;

use App\Models\Fan;
use App\Models\Build;
use App\Models\Buildable;
use Illuminate\Http\Request;

class FanController extends Controller
{
    public function index()
    {
        return view('components',['component'=>'fans']);
    }

    public function add(Request $r)
    {
        $build = Build::find(request()->cookie('build_id'));
        Buildable::create([
            'build_id'=>$build->id,
            'buildable_id' => $r->id,
            'buildable_type'=> 'App\Models\Fan',
        ]);
        $fan = Fan::find($r->id);
        session()->flash('item',$fan->name);
        session()->flash('success', 'Ventilator ' );
        session()->flash('success2', ' uspješno dodan!' );
        return redirect()->route('build');

    }
    public function remove(Request $r)
    {
        $build = Build::find(request()->cookie('build_id'));
        $fan = Buildable::where('build_id', $build->id)->where('buildable_type','App\Models\Fan')->where('buildable_id',$r->id)->first();
        $fan->delete();
        session()->flash('success', 'Ventilator uspješno obrisan!' );
        return redirect()->route('build');   
    }
}
