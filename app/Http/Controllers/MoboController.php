<?php

namespace App\Http\Controllers;

use App\Models\Mobo;
use App\Models\Build;
use Illuminate\Http\Request;

class MoboController extends Controller
{
    public function index()
    {
        return view('components',['component'=>'mobos']);
    }

    public function add(Request $r)
    {
        $build = Build::find(request()->cookie('build_id'));
        $build->mobo_id = $r->id;
        $build->save();
        $mobo = Mobo::find($r->id);
        session()->flash('item',$mobo->name);
        session()->flash('success', 'Motherboard ' );
        session()->flash('success2', ' successfully added!' );
        return redirect()->route('build');
    }

    public function remove(Request $r)
    {
        $build = Build::find(request()->cookie('build_id'));
        $build->mobo_id = null;
        $build->save();
        session()->flash('success', 'Motherboard removed successfully!' );
        return redirect()->route('build');
    }
}
