<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Cooler;
use Illuminate\Http\Request;

class CoolerController extends Controller
{
    
    public function index()
    {
        return view('components',['component'=>'coolers']);
    }

    public function add(Request $r)
    {
        $build = Build::find(request()->cookie('build_id'));
        $build->cooler_id = $r->id;
        $build->save();
        $cooler = Cooler::find($r->id);
        session()->flash('item',$cooler->name);
        session()->flash('success', 'Hladnjak ' );
        session()->flash('success2', ' uspješno dodan!' );
        return redirect()->route('build');

    }
    public function remove(Request $r)
    {
        $build = Build::find(request()->cookie('build_id'));
        $build->cooler_id = null;
        $build->save();
        session()->flash('success', 'Hladnjak uspješno obrisan!' );
        return redirect()->route('build');   
    }
}
