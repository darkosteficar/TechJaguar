<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Cpu;
use App\Models\Gpu;
use App\Models\Ram;
use App\Models\Mobo;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompareController extends Controller
{
    public function compareCpu(Request $request)
    {
        $cpu_win =array();
        $gpus = $graph1 = array();
        $appNames = array();
        $cpus = Cpu::all();
        if($request->has('cpu1') && $request->has('cpu2')){
            if($request->cpu1 != null && $request->cpu2 != null && ($request->cpu1 != $request->cpu2)){
                $cpu1 = Cpu::find($request->cpu1);
                $cpu2 = Cpu::find($request->cpu2);
                $cpu1_id = $cpu1->id;
                $cpu2_id = $cpu2->id;
                $cpu_ids = array($cpu1_id,$cpu2_id);
                $names = array($cpu1->name,$cpu2->name);
                $picked = array($cpu1,$cpu2);
                $overall = array();
                $apps = App::all();
        
                foreach($apps as $app){
                    $graph = Result::where('app_id','=',$app->id)->where(function($query) use($cpu1_id,$cpu2_id){
                        $query->where('cpu_id','=',$cpu1_id)->orWhere('cpu_id','=',$cpu2_id);
                    })->get()->toArray();
                    if(count($graph) >= 2){
                        
                        foreach($graph as $graphy){
                            array_push($gpus,$graphy['gpu_id']);
                        }
                        
                        $duplicateGpus = array_values(array_unique(array_diff_assoc($gpus,array_unique($gpus))));
                        
                        foreach($graph as $graphy){
                            if($graphy['gpu_id'] == $duplicateGpus[0]){
                                if(count($graph1) < 2){
                                    array_push($graph1,$graphy);
                                }
                            }
                        }
                        $gpuName = Gpu::find($graphy['gpu_id']);
                        $moboName = Mobo::find($graphy['mobo_id']);
                        $ramName = Ram::find($graphy['ram_id']);

                        $cpu_win = $this->calcPercent($graph[0]['score'],$graph[1]['score'],$graph1,'cpu');
                        $graph1 = $cpu_win[1];
                        $cpuWin = $cpu_win[0];

                        array_push($graph1,$app->name,$app->type,$gpuName->name,$cpuWin);
                        array_push($overall,$graph1);
                        $graph1 = $gpus = array();
                       
                    }
                }
               array_push($names,$moboName->name,$ramName->name);
               //dd($overall);
                if(count($overall) == 0){
                    session()->flash('status','No matching comparisons found');
                    return redirect()->route('compareCpu');
                }
                
                foreach($overall as $result){
                    array_push($appNames, $result[2]);
                }
                $apps = App::whereIn('name',$appNames)->get();
                //dd($usedApps[2][0]->id);
               
                return view('compareCpu',['results'=>$overall,'apps'=>$apps,'names'=>$names,'cpus'=>$cpus,'cpu_ids'=>$cpu_ids,'picked'=>$picked]);
            }

            session()->flash('error','You have to select different and both CPUs for a comparison');
            return redirect()->route('compareCpu');
        }
       
        return view('compareCpu',['cpus'=>$cpus]);

    }

    public function compareGpu(Request $request)
    {
        $gpu_win = array();
        $cpus = $graph1 = array();
        $appNames = array();
        $gpus = Gpu::all();
        if($request->has('gpu1') && $request->has('gpu1')){
            if($request->gpu1 != null && $request->gpu2 != null  && ($request->gpu1 != $request->gpu2)){
                $gpu1 = Gpu::find($request->gpu1);
                $gpu2 = Gpu::find($request->gpu2);
                $gpu1_id = $gpu1->id;
                $gpu2_id = $gpu2->id;
                $gpu_ids = array($gpu1_id,$gpu2_id);
                $names = array($gpu1->name,$gpu2->name);
                $picked = array($gpu1,$gpu2);
                $overall = array();
                $apps = App::all();
                
                foreach($apps as $app){
                    $cpus = array();
                    $graph = Result::where('app_id','=',$app->id)->where(function($query) use($gpu1_id,$gpu2_id){
                        $query->where('gpu_id','=',$gpu1_id)->orWhere('gpu_id','=',$gpu2_id);
                    })->get()->toArray();
                    if(count($graph) >= 2){
                        
                        foreach($graph as $graphy){
                            array_push($cpus,$graphy['cpu_id']);
                        }
                      
                        $duplicateCpus = array_values(array_unique(array_diff_assoc($cpus,array_unique($cpus))));
                        
                        
                        foreach($graph as $graphy){
                            if($graphy['cpu_id'] == $duplicateCpus[0]){
                                if(count($graph1) < 2){
                                    array_push($graph1,$graphy);
                                }
                            }
                        }
                        $cpuName = Cpu::find($graphy['cpu_id']);
                        $moboName = Mobo::find($graphy['mobo_id']);
                        $ramName = Ram::find($graphy['ram_id']);

                        $gpu_win = $this->calcPercent($graph[0]['score'],$graph[1]['score'],$graph1,'gpu');
                        $graph1 = $gpu_win[1];
                        $gpuWin = $gpu_win[0];

                        array_push($graph1,$app->name,$app->type,$cpuName->name,$gpuWin,$moboName->name,$ramName->name);
                        array_push($overall,$graph1);
                        $graph1 = array();
                        
                    }
                }

               array_push($names,$moboName->name,$ramName->name);
              
                if(count($overall) == 0){
                    session()->flash('status','No matching comparisons found');
                    return redirect()->route('compareGpu');
                }
                //dd($overall);
                foreach($overall as $result){
                    array_push($appNames, $result[2]);
                }
                $apps = App::whereIn('name',$appNames)->get();
                //dd($usedApps[2][0]->id);
                //dd($apps);
                return view('compareGpu',['results'=>$overall,'apps'=>$apps,'names'=>$names,'gpus'=>$gpus,'gpu_ids'=>$gpu_ids,'picked'=>$picked]);
            }

            session()->flash('error','You have to select both and different GPUs for a comparison');
            return redirect()->route('compareGpu');
        }
       
        return view('compareGpu',['gpus'=>$gpus]);

    }

    public function calcPercent($score1,$score2,$graph1,$component)
    {
        $array = array();
        if($score1 > $score2){
            $cpu_win = $component .'1_win';
            $calc = $score1 - $score2;
            $percent = ($calc / $score2) * 100;
            if($percent > 15){
                $graph1['perDiff'] = 'bigDiff';
            }
            else{
                $graph1['perDiff'] = 'smallDiff';
            }
        }
        else{
            $cpu_win = $component . '2_win';
            $calc = $score2 - $score1;
            $percent = ($calc / $score1) * 100;
            if($percent > 15){
                 $graph1['perDiff'] = 'bigDiff';
            }
            else{
                $graph1['perDiff'] = 'smallDiff';
            }
        }
        array_push($array,$cpu_win,$graph1);
        return $array;
    }
}
