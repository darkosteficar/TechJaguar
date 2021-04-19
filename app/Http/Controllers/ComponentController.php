<?php

namespace App\Http\Controllers;

use App\Models\Cpu;
use App\Models\Chipset;
use App\Models\ChipsetCpu;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function index()
    {
        return view('admin.components.index');
    }

    public function create_chipset()
    {
        return view('admin.components.chipsets.create');
    }

    public function read_chipset()
    {
        $chipsets = Chipset::paginate(20);
        return view('admin.components.chipsets.index',['chipsets'=>$chipsets]);
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

    public function delete_chipset(Request $request)
    {
        $chipset = Chipset::find($request->id);
        $chipset->delete();

        session()->flash('status','Sljedeći chipset je uspješno obrisan: ');
        session()->flash('title', $request->chipset_name );
        return redirect()->route('chipset.index');
    }

    public function edit_chipset(Chipset $chipset)
    {
        return view('admin.components.chipsets.edit',['chipset'=>$chipset]);
    }

    public function update_chipset(Request $request)
    {
        $chipset = Chipset::find($request->chipset_id);
        if($chipset != null){
            $this->validate($request,[
                'chipset_name' => 'required|max:40',
                'chipset_description' =>'required'
            ]);

            $chipset->name = $request->chipset_name;
            $chipset->description = $request->chipset_description;

            $chipset->save();

            session()->flash('status','Chipset uspješno ažuriran.');
            return redirect()->route('chipsets.index');
        }
        
        session()->flash('error','Chipset ne postoji!');
        return redirect()->route('chipsets.index');
    }


    public function create_cpu()
    {

        $chipsets = Chipset::all();
        return view('admin.components.cpus.create',['chipsets'=>$chipsets]);
    }

    public function store_cpu(Request $r)
    {

        $this->validate($r,[
            'cpu_name'=>'required|max:40',
            'cpu_chipsets'=>'required',
        ]);

        $cpu = Cpu::create([
            'name'=>$r->cpu_name,
        ]);
            
        foreach($r->cpu_chipsets as $chipset){
            ChipsetCpu::create([
                'cpu_id'=>$cpu->id,
                'chipset_id'=>$chipset,
            ]);
        }

        session()->flash('status','Procesor uspješno kreiran');
        return redirect()->back();
    }
}
