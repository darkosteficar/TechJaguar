<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Cpu;
use App\Models\Gpu;
use App\Models\Ram;
use App\Models\Mobo;
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
        $gpus = Gpu::all();
        $mobos = Mobo::all();
        $rams = Ram::all();
        return view('admin.results.create',['cpus'=>$cpus,'apps'=>$apps,'gpus'=>$gpus,'mobos'=>$mobos,'rams'=>$rams]);
    }

    public function store(Request $r)
    {
        $this->validate($r,[
            'result'=> 'required',
            'app'=>'required',
            'cpu'=>'required',
            'gpu'=>'required',
            'mobo'=>'required',
            'ram'=>'required',

        ]);
        Result::create($r->all());
        Result::create([
            'score'=>$r->result,
            'app_id'=>$r->app,
            'cpu_id'=>$r->cpu,
            'gpu_id'=>$r->gpu,
            'mobo_id'=>$r->mobo,
            'ram_id'=>$r->ram,
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
