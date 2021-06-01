<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Cpu;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::paginate(20);

        return view('admin.results.index',['results'=>$results]);
        
    }

    public function create()
    {
        $cpus = Cpu::all();
        $apps = App::all();
        return view('admin.results.create',['cpus'=>$cpus,'apps'=>$apps]);
    }

    public function store(Request $r)
    {
        $this->validate($r,[
            'result'=> 'required',
            'app'=>'required',
            'cpu'=>'required',
        ]);

        Result::create([
            'score'=>$r->result,
            'app_id'=>$r->app,
            'cpu_id'=>$r->cpu
        ]);

        session()->flash('status','Rezultat uspješno kreiran.');
        return redirect()->back();

    }

    public function delete(Request $request)
    {
        $result = Result::find($request->id);
        $result->delete();
        session()->flash('status','Rezultat uspješno izbrisan');
        return redirect()->route('results.index');
    }

    
}
