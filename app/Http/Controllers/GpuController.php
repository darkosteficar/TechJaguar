<?php

namespace App\Http\Controllers;

use App\Models\Gpu;
use App\Models\Build;
use App\Models\Buildable;
use Illuminate\Http\Request;

class GpuController extends Controller
{
    public function index()
    {
        return view('components',['component'=>'gpus']);
    }

    public function add(Request $r)
    {
        
        $build = Build::find(request()->cookie('build_id'));
        Buildable::create([
            'build_id'=>$build->id,
            'buildable_id' => $r->id,
            'buildable_type'=> 'App\Models\Gpu',
        ]);
        $gpu = Gpu::find($r->id);
        session()->flash('item',$gpu->name);
        session()->flash('success', 'Graphics card ' );
        session()->flash('success2', ' successfully added!' );
        return redirect()->route('build');

    }
    public function remove(Request $r)
    {
        $build = Build::find(request()->cookie('build_id'));
        $gpu = Buildable::where('build_id', $build->id)->where('buildable_type','App\Models\Gpu')->where('buildable_id',$r->id)->first();
        $gpu->delete();
        session()->flash('success', 'Graphics card removed successfully!' );
        return redirect()->route('build');   
    }
}
