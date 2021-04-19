<?php

namespace App\Http\Controllers;

use App\Models\Chipset;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function index()
    {
        return view('admin.components.index');
    }

    public function create_chipset()
    {
        return view('admin.components.chipsets.index');
    }

    public function store_chipset(Request $r)
    {
        $this->validate($r,[
            'chipset_name'=>'required|max:40',
            'chipset_description'=>'required',
        ]);

        Chipset::create([
            'name'=>$r->chipset_name,
            'description'=>$r->chipset_description,
        ]);

        session()->flash('status','Chipset uspješno kreiran');
        return redirect()->back();
    }
}
