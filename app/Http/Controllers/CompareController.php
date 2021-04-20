<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Cpu;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompareController extends Controller
{
    public function compare()
    {

        $cpu1= Cpu::find(1);
        $cpu2= Cpu::find(3);
        $cpu1_id = $cpu1->id;
        $cpu2_id = $cpu2->id;
        $names = array($cpu1->name,$cpu2->name);
        $overall = array();
        $apps = App::all();

        foreach($apps as $app){
            $graph = Result::where('app_id','=',$app->id)->where(function($query) use($cpu1_id,$cpu2_id){
                $query->where('cpu_id','=',$cpu1_id)->orWhere('cpu_id','=',$cpu2_id);
            })->get()->toArray();
            if(!count($graph) < 2){
                array_push($graph,$app->name);
                array_push($overall,$graph);
            }
        }
 
        return view('compare',['results'=>$overall,'apps'=>$apps,'names'=>$names]);
    }
}
