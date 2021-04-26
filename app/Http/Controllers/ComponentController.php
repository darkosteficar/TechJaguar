<?php

namespace App\Http\Controllers;

use App\Models\Cpu;
use App\Models\Ram;
use App\Models\Image;
use App\Models\Chipset;
use App\Models\ChipsetCpu;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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


    public function read_ram()
    {
        $rams = Ram::paginate(10);
        return view('admin.components.rams.index',['rams'=>$rams]);
    }

    public function create_ram()
    {
        $manufacturers = Manufacturer::all();
        return view('admin.components.rams.create',['manufacturers'=>$manufacturers]);
    }

    public function store_ram(Request $r)
    {
        $this->validate($r,[
            'ram_name'=>'required',
            'ram_speed'=>'required|integer',
            'ram_size'=>'required|integer',
            'ram_type'=>'required',
            'ram_manufacturer'=>'required',
            'ram_heat_spreader'=>'required|boolean',
            'ram_voltage'=>'required|numeric',
            'ram_timings'=>'required',
            'ram_price'=>'required|numeric',
            'ram_images'=>"required|array",
            'ram_images.*'=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);
        
        $ram = Ram::create([
            'name'=>$r->ram_name,
            'size'=>$r->ram_size,
            'type'=>$r->ram_type,
            'speed'=>$r->ram_speed,
            'manufacturer_id'=>$r->ram_manufacturer,
            'voltage'=>$r->ram_voltage,
            'timings'=>$r->ram_timings,
            'heat_spreader'=>$r->ram_heat_spreader,
            'price'=>$r->ram_price,
        ]);

        foreach($r->ram_images as $image){
            $imageName = time().rand().'.'.$image->extension();  
            $image->move(public_path('images'), $imageName);
            Image::create([
                'path'=>$imageName,
                'imageable_id' => $ram->id,
                'imageable_type'=> 'App\Models\Ram',
            ]);
        }
        
        session()->flash('status','Radna memorija uspješno dodana.');
        return redirect()->route('rams.index');
       
    }

    public function delete_ram(Request $r)
    {
        $ram = Ram::find($r->id);
        $ram->delete();
        $array = array();
        $imagesToDelete = Image::where('imageable_type','App\Models\Ram')->where('imageable_id',$r->id)->get();
        $images = Image::where('imageable_type','App\Models\Ram')->where('imageable_id',$r->id);
        foreach($imagesToDelete as $image){
            File::delete(public_path('images/'.$image->path));
            $array[] = $image->path;
        }
        $images->delete();
        session()->flash('status','Radna memorija '.$r->ram_name.' uspješno obrisana.');
        return redirect()->back();
    }

    public function edit_ram(Ram $ram)
    {
        $images = Image::where('imageable_type','App\Models\Ram')->where('imageable_id',$ram->id)->get();
        $manu = Manufacturer::all();
        return view('admin.components.rams.edit',['ram'=>$ram,'manufacturers'=>$manu,'images'=>$images]);
    }

    public function update_ram(Request $request)
    {
        $imagesToDelete = Image::where('imageable_type','App\Models\Ram')->where('imageable_id',$request->ram_id)->get();
        $imagesModel = Image::where('imageable_type','App\Models\Ram')->where('imageable_id',$request->ram_id);
        $ram = Ram::find($request->ram_id);
        if($ram !== null){
            $this->validate($request,[
                'ram_name'=>'required',
                'ram_speed'=>'required|integer',
                'ram_size'=>'required|integer',
                'ram_type'=>'required',
                'ram_manufacturer'=>'required',
                'ram_heat_spreader'=>'required|boolean',
                'ram_voltage'=>'required|numeric',
                'ram_timings'=>'required',
                'ram_price'=>'required|numeric',
                
            ]);
            $ram->name = $request->ram_name;
            $ram->speed = $request->ram_speed;
            $ram->size = $request->ram_size;
            $ram->type = $request->ram_type;
            $ram->manufacturer_id = $request->ram_manufacturer;
            $ram->heat_spreader = $request->ram_heat_spreader;
            $ram->voltage = $request->ram_voltage;
            $ram->timings = $request->ram_timings;
            $ram->price = $request->ram_price;
            if($request->ram_images !== null){
                $this->validate($request,[
                    'ram_images'=>"required|array",
                    'ram_images.*'=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
                ]);
                foreach($imagesToDelete as $image){
                    File::delete(public_path('images/'.$image->path));
                }
                $imagesModel->delete();
                foreach($request->ram_images as $image){
                    $imageName = time().rand().'.'.$image->extension();  
                    $image->move(public_path('images'), $imageName);
                    Image::create([
                        'path'=>$imageName,
                        'imageable_id' => $ram->id,
                        'imageable_type'=> 'App\Models\Ram',
                    ]);
                }
            }
           

            $ram->save();
            
            session()->flash('status','Radna memorija uspješno ažurirana.');
            return redirect()->route('rams.index');
    
        }

        session()->flash('error','Radna memorija ne postoji!');
        return redirect()->route('rams.index');
    
    
    }
}
