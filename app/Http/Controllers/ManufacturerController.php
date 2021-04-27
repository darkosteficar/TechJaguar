<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function read_manufacturers()
    {
        $manufacturer = Manufacturer::paginate(10);
        return view('admin.components.manufacturers.index',['manufacturer'=>$manufacturer]);
    }

    public function create_manufacturers()
    {
        $manufacturers = Manufacturer::all();
        $chipsets = Chipset::all();
        return view('admin.components.cpus.create',['manufacturers'=>$manufacturers,'chipsets'=>$chipsets]);
    }

    public function store_manufacturers(Request $r)
    {
        $this->validate($r,[
            'name'=>'required',
            'price'=>'required|numeric',
            'manufacturer_id'=>'required|integer',
            'socket'=>'required',
            'base_clock'=>'required|decimal',
            'boost_clock'=>'required|decimal',
            'tdp'=>'required|integer',
            'core_count'=>'required|integer',
            'microarchitecture'=>'required',
            'litography'=>'required|integer',
            'series'=>'required',
            'integrated_graphics'=>'required',
            'smt'=>'required',
            'images'=>"required|array",
            'images.*'=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);
    
        $mobo = Mobo::create([
            'name'=>$r->name,
            'price'=>$r->price,
            'manufacturer_id'=>$r->manufacturer_id,
            'socket'=>$r->socket,
            'base_clock'=>$r->base_clock,
            'boost_clock'=>$r->boost_clock,
            'tdp'=>$r->tdp,
            'core_count'=>$r->core_count,
            'microarchitecture'=>$r->microarchitecture,
            'litography'=>$r->litography,
            'series'=>$r->series,
            'integrated_graphics'=>$r->integrated_graphics,
            'smt'=>$r->smt,
        ]);

        foreach($r->cpu_chipsets as $chipset){
            ChipsetCpu::create([
                'cpu_id'=>$cpu->id,
                'chipset_id'=>$chipset,
            ]);
        }

        foreach($r->images as $image){
            $imageName = time().rand().'.'.$image->extension();  
            $image->move(public_path('images'), $imageName);
            Image::create([
                'path'=>$imageName,
                'imageable_id' => $cpu->id,
                'imageable_type'=> 'App\Models\Cpu',
            ]);
        }
        
        session()->flash('status','Procesor uspješno dodan.');
        return redirect()->route('cpus.index');
       
    }

    public function delete_manufacturers(Request $r)
    {
        $cpu = Cpu::find($r->id);
        $cpu->delete();
        $array = array();
        $imagesToDelete = Image::where('imageable_type','App\Models\Cpu')->where('imageable_id',$r->id)->get();
        $images = Image::where('imageable_type','App\Models\Cpu')->where('imageable_id',$r->id);
        foreach($imagesToDelete as $image){
            File::delete(public_path('images/'.$image->path));
        }
        $images->delete();
        session()->flash('status','Procesor '.$r->name.' uspješno obrisan.');
        return redirect()->back();
    }

    public function edit_manufacturers(Manufacturer $manufacturer)
    {
        $images = Image::where('imageable_type','App\Models\Cpu')->where('imageable_id',$cpu->id)->get();
        $manu = Manufacturer::all();
        $chip = Chipset::all();
        $appliedChipsets = ChipsetCpu::where('cpu_id',$cpu->id)->get();
        dd($appliedChipsets);
        return view('admin.components.cpus.edit',['cpu'=>$cpu,'manufacturers'=>$manu,'images'=>$images,'chipsets'=>$chip,'appliedChipsets'=>$appliedChipsets]);
    }

    public function update_manufacturers(Request $request)
    {
        
        $imagesToDelete = Image::where('imageable_type','App\Models\Cpu')->where('imageable_id',$request->id)->get();
        $imagesModel = Image::where('imageable_type','App\Models\Cpu')->where('imageable_id',$request->id);
        $cpu = Cpu::find($request->id);
        if($cpu !== null){
            $this->validate($request,[
                'name'=>'required',
                'price'=>'required|numeric',
                'manufacturer_id'=>'required|integer',
                'socket'=>'required',
                'base_clock'=>'required|float',
                'boost_clock'=>'required|float',
                'tdp'=>'required|integer',
                'core_count'=>'required|integer',
                'microarchitecture'=>'required',
                'litography'=>'required|integer',
                'series'=>'required',
                'integrated_graphics'=>'required',
                'smt'=>'required',
                
            ]);
            $cpu->name = $request->name;
            $cpu->price = $request->price;
            $cpu->manufacturer_id = $request->manufacturer_id;
            $cpu->socket = $request->socket;
            $cpu->base_clock = $request->base_clock;
            $cpu->boost_clock = $request->boost_clock;
            $cpu->tdp = $request->tdp;
            $cpu->core_count = $request->core_count;
            $cpu->microarchitecture = $request->microarchitecture;
            $cpu->litography = $request->litography;
            $cpu->series = $request->series;
            $cpu->integrated_graphics = $request->integrated_graphics;
            $cpu->smt = $request->smt;

            $chipsetReset = ChipsetCpu::where('cpu_id',$request->id)->delete();

            foreach($r->cpu_chipsets as $chipset){
                ChipsetCpu::create([
                    'cpu_id'=>$cpu->id,
                    'chipset_id'=>$chipset,
                ]);
            }

            if($request->images !== null){
                $this->validate($request,[
                    'images'=>"required|array",
                    'images.*'=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
                ]);
                foreach($imagesToDelete as $image){
                    File::delete(public_path('images/'.$image->path));
                }
                $imagesModel->delete();
                foreach($request->images as $image){
                    $imageName = time().rand().'.'.$image->extension();  
                    $image->move(public_path('images'), $imageName);
                    Image::create([
                        'path'=>$imageName,
                        'imageable_id' => $cpu->id,
                        'imageable_type'=> 'App\Models\Cpu',
                    ]);
                }
            }
           

            $cpu->save();
            
            session()->flash('status','Procesor uspješno ažuriran.');
            return redirect()->route('cpus.index');
    
        }

        session()->flash('error','Procesor ne postoji!');
        return redirect()->route('cpus.index');
    
    
    }
}
