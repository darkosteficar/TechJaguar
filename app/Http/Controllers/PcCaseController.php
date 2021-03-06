<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\PcCase;
use Illuminate\Http\Request;

class PcCaseController extends Controller
{
    public function index()
    {
        return view('components',['component'=>'pc-cases']);
    }

    public function add(Request $r)
    {
        $build = Build::find(request()->cookie('build_id'));
        $build->pc_case_id = $r->id;
        $build->save();
        $pc_case = PcCase::find($r->id);
        session()->flash('item',$pc_case->name);
        session()->flash('success', 'Case ' );
        session()->flash('success2', ' successfully added!' );
        return redirect()->route('build');
    }

    public function remove(Request $r)
    {
        $build = Build::find(request()->cookie('build_id'));
        $build->pc_case_id = null;
        $build->save();
        session()->flash('success', 'Case removed successfully!' );
        return redirect()->route('build');
    }
}
