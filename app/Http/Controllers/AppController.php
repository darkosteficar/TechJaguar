<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function create()
    {
        return view('admin.apps.create');
    }

    public function store(Request $r)
    {
        $this->validate($r,[
            'app_name' => 'required',
        ]);

        App::create([
            'name' => $r->app_name,
        ]);

        session()->flash('status','Aplikacija je uspješno dodana.');
        return redirect()->back();

    }
}
