<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompareController extends Controller
{
    public function compare()
    {
        /*
        $result3 = array('Tomb raider','i7 7700k','G Skill Ripjaws 3300 mHz','3002');
        $result4 = array('Tomb raider','i5 5500k','G Skill Ripjaws 3300 mHz','4002');
        $graph2 = array($result3,$result4);
        //dd($graph2,$graph3);
        */
        $cpu1= 'i7 7700K';
        $cpu2= 'i5 6600K';
        $overall = array();
        $apps = array('Cinebench','Tomb raider');


        foreach($apps as $app){
            $graph = Result::where('app','=',$app)->where(function($query) use($cpu1,$cpu2){
                $query->where('cpu','=',$cpu1)->orWhere('cpu','=',$cpu2);
            })->get()->toArray();
            if(count($graph) == 2){
                array_push($overall,$graph);
            }
        }
        $query = Result::where('cpu','=',$cpu1)->orWhere('cpu','=',$cpu2)->where('app','=',$app)->toSql();
          
        dd($overall,$query);
        return view('compare',['results'=>$overall,'apps'=>$apps]);
    }
}
