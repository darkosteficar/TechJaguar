<?php

namespace App\Http\Controllers;

use App\Models\Mobo;
use App\Models\Build;
use Illuminate\Http\Request;

class MoboController extends Controller
{
    public function index()
    {
        $mobos = Mobo::all();
        return view('builds.mobos',['mobos'=>$mobos]);
    }

    public function add(Request $r)
    {
        $build = Build::find(1);
        $build->mobo_id = $r->id;
        $build->save();
        $mobo = Mobo::find($r->id);
        session()->flash('item',$mobo->name);
        session()->flash('success', 'Matična ploča ' );
        session()->flash('success2', ' uspješno dodana!' );
        return redirect()->route('build');
    }

    public function remove(Request $r)
    {
        $build = Build::find(1);
        $build->mobo_id = null;
        $build->save();
        session()->flash('success', 'Matična ploča uspješno obrisana!' );
        return redirect()->route('build');
    }
}
