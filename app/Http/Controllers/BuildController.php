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
        return view('select.rams');
    }
}
