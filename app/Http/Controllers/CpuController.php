<?php

namespace App\Http\Controllers;

use App\Models\Cpu;
use App\Models\Build;
use Illuminate\Http\Request;

class CpuController extends Controller
{
    public function index()
    {
        $cpus = Cpu::all();
        return view('builds.cpus',['cpus'=>$cpus]);
    }

    public function add(Request $r)
    {
        $build = Build::find(request()->cookie('build_id'));
        $build->cpu_id = $r->id;
        $build->save();
        $cpu = Cpu::find($r->id);
        session()->flash('item',$cpu->name);
        session()->flash('success', 'Procesor ' );
        session()->flash('success2', ' uspješno dodan!' );
        return redirect()->route('build');

    }
    public function remove(Request $r)
    {
        $build = Build::find(request()->cookie('build_id'));
        $build->cpu_id = null;
        $build->save();
        session()->flash('success', 'Procesor uspješno obrisan!' );
        return redirect()->route('build');   
    }
}
