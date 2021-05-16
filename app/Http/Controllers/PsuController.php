<?php

namespace App\Http\Controllers;

use App\Models\Psu;
use Illuminate\Http\Request;

class PsuController extends Controller
{
    public function index()
    {
        $psus = Psu::all();
        return view('builds.psus',['psus'=>$psus]);
    }
}
