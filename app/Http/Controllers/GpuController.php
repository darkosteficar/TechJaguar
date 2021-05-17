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
        $gpus = Gpu::all();
        return view('builds.gpus',['gpus'=>$gpus]);
    }

    public function add(Request $r)
    {
        $build = Build::find(1);
        Buildable::create([
            'build_id'=>$build->id,
            'buildable_id' => $r->id,
            'buildable_type'=> 'App\Models\Gpu',
        ]);
        $gpu = Gpu::find($r->id);
        session()->flash('item',$gpu->name);
        session()->flash('success', 'Grafička kartica ' );
        session()->flash('success2', ' uspješno dodana!' );
        return redirect()->route('build');

    }
    public function remove(Request $r)
    {
        $build = Build::find(1);
        $build->gpu_id = null;
        $build->save();
        session()->flash('success', 'Grafička kartica uspješno obrisana!' );
        return redirect()->route('build');   
    }
}
