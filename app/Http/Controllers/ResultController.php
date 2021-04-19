<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Cpu;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function create()
    {
        $cpus = Cpu::all();
        $apps = App::all();
        return view('admin.results.create',['cpus'=>$cpus,'apps'=>$apps]);
    }
}
