<?php

namespace App\Http\Controllers;

use App\Models\Cpu;
use App\Models\Psu;
use App\Models\Mobo;
use App\Models\Build;
use App\Models\Cooler;
use App\Models\PcCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class BuildController extends Controller
{
    public function index(Request $request)
    {
        if($request->hasCookie('build_id') != false){
            $build = Build::find(request()->cookie('build_id'));
            if($build != null){
                $components = array();
                if($build->psu_id != null){
                    $psu = Psu::find($build->psu_id);
                    $components['psu'] = $psu;
                    //return view('build',['psu'=>$psu]);
                }
                if($build->mobo_id != null){
                    $mobo = Mobo::find($build->mobo_id);
                    $components['mobo'] = $mobo;
                }
                if($build->cpu_id != null){
                    $cpu = Cpu::find($build->cpu_id);
                    $components['cpu'] = $cpu;
                }
                if($build->cooler_id != null){
                    $cooler = Cooler::find($build->cooler_id);
                    $components['cooler'] = $cooler;
                }
        
                if($build->pc_case_id != null){
                    $pc_case = PcCase::find($build->pc_case_id);
                    $components['pc_case'] = $pc_case;
                }
                $gpus = $build->gpus;
                if(!$gpus->isEmpty()){
                    $components['gpus'] = $gpus;
                }
        
                $rams = $build->rams;
                if(!$rams->isEmpty()){
                    $components['rams'] = $rams;
                }
        
                $storages = $build->storages;
                if(!$storages->isEmpty()){
                    $components['storages'] = $storages;
                }
                
                $fans = $build->fans;
                if(!$fans->isEmpty()){
                    $components['fans'] = $fans;
                }
                
                return view('build',['components'=>$components]);
            }
            else{
                $build = Build::create();
                $duration = 60 * 24 * 365;
                Cookie::queue('build_id', $build->id, $duration);
                return view('build',[]);
            }
            
        }
        else{ 
            $build = Build::create();
            $duration = 60 * 24 * 365;
            //request()->cookie('build_id', $build->id, $duration);
            Cookie::queue('build_id', $build->id, $duration);
            return view('build',[]);
        }
       
    }

    

    
}
