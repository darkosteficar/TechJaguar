<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function compare()
    {

        $apps = array('Cinebench','Tomb raider');
        $result1 = array('Cinebench','i7 7700k','G Skill Ripjaws 3300 mHz','3002');
        $result2 = array('Cinebench','i5 5500k','G Skill Ripjaws 3300 mHz','4002');
        $graph1 = array($result1,$result2);
        $result3 = array('Tomb raider','i7 7700k','G Skill Ripjaws 3300 mHz','3002');
        $result4 = array('Tomb raider','i5 5500k','G Skill Ripjaws 3300 mHz','4002');
        $graph2 = array($result3,$result4);
        $overall = array($graph1,$graph2);

        return view('compare',['results'=>$overall,'apps'=>$apps]);
    }
}
