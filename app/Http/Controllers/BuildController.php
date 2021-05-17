<?php

namespace App\Http\Controllers;

use App\Models\Cpu;
use App\Models\Psu;
use App\Models\Mobo;
use App\Models\Build;
use App\Models\Cooler;
use App\Models\PcCase;
use Illuminate\Http\Request;

class BuildController extends Controller
{
    public function index()
    {
        $build = Build::find(1);
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
        
            
        return view('build',['components'=>$components]);
    }

    public function select_ram()
    {
        $rams = Ram::all();

        dd($rams);
        return view('select.rams');
    }

    
}
