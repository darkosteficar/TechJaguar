<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Cpu;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompareController extends Controller
{
    public function compare(Request $request)
    {
        $appNames = array();
        $cpus = Cpu::all();
        if($request->has('cpu1') && $request->has('cpu2')){
            if($request->cpu1 != null && $request->cpu2 != null){
                $cpu1 = Cpu::find($request->cpu1);
                $cpu2 = Cpu::find($request->cpu2);
                $cpu1_id = $cpu1->id;
                $cpu2_id = $cpu2->id;
                $cpu_ids = array($cpu1_id,$cpu2_id);
                $names = array($cpu1->name,$cpu2->name);
                $overall = array();
                $apps = App::all();
        
                foreach($apps as $app){
                    $graph = Result::where('app_id','=',$app->id)->where(function($query) use($cpu1_id,$cpu2_id){
                        $query->where('cpu_id','=',$cpu1_id)->orWhere('cpu_id','=',$cpu2_id);
                    })->get()->toArray();
                    if(count($graph) == 2){
                        array_push($graph,$app->name);
                        array_push($overall,$graph);
                    }
                }
              
                if(count($overall) == 0){
                    session()->flash('status','No matching comparisons found');
                    return redirect()->route('compare');
                }
          
                foreach($overall as $result){
                    array_push($appNames, $result[2]);
                }
                $apps = App::whereIn('name',$appNames)->get();
                //dd($usedApps[2][0]->id);
                //dd($apps);
                return view('compare',['results'=>$overall,'apps'=>$apps,'names'=>$names,'cpus'=>$cpus,'cpu_ids'=>$cpu_ids]);
            }

            session()->flash('error','You have to select both CPUs for comparison');
            return redirect()->route('compare');
        }
       
        return view('compare',['cpus'=>$cpus]);
        
        
      
    }
}
