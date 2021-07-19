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

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $results = Result::paginate(20);
        
        return view('admin.results.index',['results'=>$results]);
        
    }

    public function create()
    {
        $cpus = Cpu::all();
        $apps = App::all();
        $gpus = Gpu::where('aib',0)->get();
        $mobos = Mobo::all();
        $rams = Ram::all();
        return view('admin.results.create',['cpus'=>$cpus,'apps'=>$apps,'gpus'=>$gpus,'mobos'=>$mobos,'rams'=>$rams]);
    }

    public function store(Request $r)
    {
        $this->validate($r,[
            'score'=> 'required',
            'app_id'=>'required',
            'cpu_id'=>'required',
            'gpu_id'=>'required',
            'mobo_id'=>'required',
            'ram_id'=>'required',

        ]);
        Result::create($r->all());
        /*
        Result::create([
            'score'=>$r->score,
            'app_id'=>$r->app,
            'cpu_id'=>$r->cpu,
            'gpu_id'=>$r->gpu,
            'mobo_id'=>$r->mobo,
            'ram_id'=>$r->ram,
        ]);
        */

        session()->flash('status','Result created successfully.');
        return redirect()->back();

    }

    public function edit(Result $result)
    {
        $cpus = Cpu::all();
        $apps = App::all();
        $gpus = Gpu::all();
        $mobos = Mobo::all();
        $rams = Ram::all();
        
        return view('admin.results.edit',['cpus'=>$cpus,'apps'=>$apps,'gpus'=>$gpus,'mobos'=>$mobos,'rams'=>$rams,'result'=>$result]);
        
    }

    public function update(Request $r)
    {
        $result = Result::find($r->id);
        if(!empty($result)){
            $this->validate($r,[
                'score'=> 'required',
                'app_id'=>'required',
                'cpu_id'=>'required',
                'gpu_id'=>'required',
                'mobo_id'=>'required',
                'ram_id'=>'required',
            ]);

            $result->score = $r->score;
            $result->app_id = $r->app_id;
            $result->cpu_id = $r->cpu_id;
            $result->gpu_id = $r->gpu_id;
            $result->mobo_id = $r->mobo_id;
            $result->ram_id = $r->ram_id;
            if(!empty($r->min_score)){
                $result->min_score = $r->min_score;
            }
            $result->save();
            return redirect()->route('results.index')->with('status','Result updated successfully!');
        }
        return redirect()->route('results.index')->with('error','Result does not exist!');
    }

    public function delete(Request $request)
    {
        $result = Result::find($request->id);
        $result->delete();
        session()->flash('status','Result deleted successfully.');
        return redirect()->route('results.index');
    }

    
}
