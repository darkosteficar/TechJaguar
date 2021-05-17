<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\PcCase;
use Illuminate\Http\Request;

class PcCaseController extends Controller
{
    public function index()
    {
        $pc_cases = PcCase::all();
        return view('builds.pc_cases',['pc_cases'=>$pc_cases]);
    }

    public function add(Request $r)
    {
        $build = Build::find(1);
        $build->pc_case_id = $r->id;
        $build->save();
        $pc_case = PcCase::find($r->id);
        session()->flash('item',$pc_case->name);
        session()->flash('success', 'Kućište ' );
        session()->flash('success2', ' uspješno dodano!' );
        return redirect()->route('build');
    }

    public function remove(Request $r)
    {
        $build = Build::find(1);
        $build->pc_case_id = null;
        $build->save();
        session()->flash('success', 'Kućište uspješno obrisano!' );
        return redirect()->route('build');
    }
}
