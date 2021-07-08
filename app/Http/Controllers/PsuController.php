<?php

namespace App\Http\Controllers;

use App\Models\Psu;
use App\Models\Build;
use Illuminate\Http\Request;

class PsuController extends Controller
{
    public function index()
    {
        return view('components',['component'=>'psus']);
    }

    public function add(Request $r)
    {
        $build = Build::find(request()->cookie('build_id'));
        $build->psu_id = $r->id;
        $build->save();
        $psu = Psu::find($r->id);
        session()->flash('item',$psu->name);
        session()->flash('success', 'Power Supply ' );
        session()->flash('success2', ' added successfully!' );
        return redirect()->route('build');

    }
    public function remove(Request $r)
    {
        $build = Build::find(request()->cookie('build_id'));
        $build->psu_id = null;
        $build->save();
        session()->flash('success', 'Power supply removed successfully!' );
        return redirect()->route('build');   
    }
}
