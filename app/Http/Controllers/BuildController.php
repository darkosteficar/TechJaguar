<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildController extends Controller
{
    public function index()
    {
        return view('build');
    }

    public function select_ram()
    {
        $rams = Ram::all();

        dd($rams);
        return view('select.rams');
        
    }
}
