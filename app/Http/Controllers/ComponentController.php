<?php

namespace App\Http\Controllers;

use App\Models\Cpu;
use App\Models\Fan;
use App\Models\Gpu;
use App\Models\Psu;
use App\Models\Ram;
use App\Models\Mobo;
use App\Models\Image;
use App\Models\Cooler;
use App\Models\PcCase;
use App\Models\Chipset;
use App\Models\Storage;
use App\Models\ChipsetCpu;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ComponentController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

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

        session()->flash('status','Chipset successfully created');
        return redirect()->back();
    }

    public function delete_chipset(Request $request)
    {
        $chipset = Chipset::find($request->id);
        $chipset->delete();

        session()->flash('status','The following Chipset is successfully deleted: ');
        session()->flash('title', $request->chipset_name );
        return redirect()->route('chipsets.index');
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

            session()->flash('status','Chipset successfully updated.');
            return redirect()->route('chipsets.index');
        }
        
        session()->flash('error','Chipset does not exist!');
        return redirect()->route('chipsets.index');
    }


    // Processors

    public function read_cpu()
    {
        $cpus = Cpu::paginate(10);
        return view('admin.components.cpus.index',['cpus'=>$cpus]);
    }

    public function create_cpu()
    {
        $manufacturers = Manufacturer::all();
        $chipsets = Chipset::all();
        return view('admin.components.cpus.create',['manufacturers'=>$manufacturers,'chipsets'=>$chipsets]);
    }

    public function store_cpu(Request $r)
    {
        $this->validate($r,[
            'name'=>'required',
            'price'=>'required|numeric',
            'manufacturer_id'=>'required|integer',
            'socket'=>'required',
            'base_clock'=>'required|numeric',
            'boost_clock'=>'required|numeric',
            'tdp'=>'required|integer',
            'core_count'=>'required|integer',
            'microarchitecture'=>'required',
            'litography'=>'required|integer',
            'series'=>'required',
            'integrated_graphics'=>'required',
            'smt'=>'required',
            'core_family'=>'required',
            'images'=>"required|array",
            'images.*'=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);
    
        $cpu = Cpu::create([
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
            'core_family'=>$r->core_family,
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
        
        session()->flash('status','CPU added successfully.');
        return redirect()->route('cpus.index');
       
    }

    public function delete_cpu(Request $r)
    {
        $cpu = Cpu::find($r->id);
        $deleteChildren = ChipsetCpu::where('cpu_id',$r->id)->delete();
        $cpu->delete();
       
        
        $array = array();
        $imagesToDelete = Image::where('imageable_type','App\Models\Cpu')->where('imageable_id',$r->id)->get();
        $images = Image::where('imageable_type','App\Models\Cpu')->where('imageable_id',$r->id);
        foreach($imagesToDelete as $image){
            File::delete(public_path('images/'.$image->path));
        }
        $images->delete();
        session()->flash('status','Processor '.$r->name.' deleted successfully.');
        return redirect()->back();
    }

    public function edit_cpu(Cpu $cpu)
    {
        //$images = Image::where('imageable_type','App\Models\Cpu')->where('imageable_id',$cpu->id)->get();
        $images = $cpu->images;
        $manu = Manufacturer::all();
        $chip = Chipset::all();
        $chipsets = array();
        $appliedChipsets = ChipsetCpu::where('cpu_id',$cpu->id)->get()->toArray();
        foreach($appliedChipsets as $chipset){
            array_push($chipsets,$chipset['chipset_id']);
        }
        return view('admin.components.cpus.edit',['cpu'=>$cpu,'manufacturers'=>$manu,'images'=>$images,'chipsets'=>$chip,'appliedChipsets'=>$chipsets]);
    }

    public function update_cpu(Request $request)
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
                'base_clock'=>'required|numeric',
                'boost_clock'=>'required|numeric',
                'tdp'=>'required|integer',
                'core_count'=>'required|integer',
                'microarchitecture'=>'required',
                'litography'=>'required|integer',
                'series'=>'required',
                'integrated_graphics'=>'required',
                'smt'=>'required',
                'core_family'=>'required',
                
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
            $cpu->core_family = $request->core_family;

            $chipsetReset = ChipsetCpu::where('cpu_id',$request->id)->delete();

            foreach($request->cpu_chipsets as $chipset){
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
            
            session()->flash('status','Processor successfully updated.');
            return redirect()->route('cpus.index');
    
        }

        session()->flash('error','Processor does not exist!');
        return redirect()->route('cpus.index');
    
    
    }

    // Gpus

    public function read_gpu()
    {
        $gpus = Gpu::paginate(10);
        return view('admin.components.gpus.index',['gpus'=>$gpus]);
    }

    public function create_gpu()
    {
        $manufacturers = Manufacturer::all();
        $chipsets = Chipset::all();
        return view('admin.components.gpus.create',['manufacturers'=>$manufacturers,'chipsets'=>$chipsets]);
    }

    public function store_gpu(Request $r)
    {
        $this->validate($r,[
            'name'=>'required',
            'price'=>'required|numeric',
            'manufacturer_id'=>'required|integer',
            'chipset_id'=>'required|integer',
            'series'=>'required',
            'gpu_bus'=>'required',
            'process_size'=>'required',
            'tdp'=>'required',
            'memory_clock'=>'required',
            'base_clock'=>'required',
            'boost_clock'=>'required',
            'vram_type'=>'required',
            'vram'=>'required|integer',
            'length'=>'required',
            'interface'=>'required',
            'power_connector'=>'required',
            'power_req'=>'required',
            'crossfire'=>'required',
            'images'=>"required|array",
            'images.*'=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);
    
        $gpu = Gpu::create([
            'name'=>$r->name,
            'price'=>$r->price,
            'manufacturer_id'=>$r->manufacturer_id,
            'chipset_id'=>$r->chipset_id,
            'series'=>$r->series,
            'gpu_bus'=>$r->gpu_bus,
            'process_size'=>$r->process_size,
            'tdp'=>$r->tdp,
            'memory_clock'=>$r->memory_clock,
            'boost_clock'=>$r->boost_clock,
            'base_clock'=>$r->base_clock,
            'vram_type'=>$r->vram_type,
            'vram'=>$r->vram,
            'length'=>$r->length,
            'interface'=>$r->interface,
            'power_connector'=>$r->power_connector,
            'crossfire'=>$r->crossfire,
            'power_req'=>$r->power_req,
        ]);

        foreach($r->images as $image){
            $imageName = time().rand().'.'.$image->extension();  
            $image->move(public_path('images'), $imageName);
            Image::create([
                'path'=>$imageName,
                'imageable_id' => $gpu->id,
                'imageable_type'=> 'App\Models\Gpu',
            ]);
        }
        
        session()->flash('status','Graphics Card added successfully.');
        return redirect()->route('gpus.index');
       
    }

    public function delete_gpu(Request $r)
    {
        $gpu = Gpu::find($r->id);
        $gpu->delete();
        $array = array();
        $imagesToDelete = Image::where('imageable_type','App\Models\Gpu')->where('imageable_id',$r->id)->get();
        $images = Image::where('imageable_type','App\Models\Gpu')->where('imageable_id',$r->id);
        foreach($imagesToDelete as $image){
            File::delete(public_path('images/'.$image->path));
        }
        $images->delete();
        session()->flash('status','Graphics Card '.$r->name.' deleted successfully.');
        return redirect()->back();
    }

    public function edit_gpu(Gpu $gpu)
    {
        $images = Image::where('imageable_type','App\Models\Gpu')->where('imageable_id',$gpu->id)->get();
        $manu = Manufacturer::all();
        $chip = Chipset::all();
        return view('admin.components.gpus.edit',['gpu'=>$gpu,'manufacturers'=>$manu,'images'=>$images,'chipsets'=>$chip]);
    }

    public function update_gpu(Request $request)
    {
        
        $imagesToDelete = Image::where('imageable_type','App\Models\Gpu')->where('imageable_id',$request->id)->get();
        $imagesModel = Image::where('imageable_type','App\Models\Gpu')->where('imageable_id',$request->id);
        $gpu = Gpu::find($request->id);
        if($gpu !== null){
            $this->validate($request,[
                'name'=>'required',
                'price'=>'required|numeric',
                'manufacturer_id'=>'required|integer',
                'chipset_id'=>'required|integer',
                'series'=>'required',
                'gpu_bus'=>'required',
                'process_size'=>'required',
                'tdp'=>'required',
                'memory_clock'=>'required',
                'base_clock'=>'required',
                'boost_clock'=>'required',
                'vram_type'=>'required',
                'vram'=>'required|integer',
                'length'=>'required',
                'interface'=>'required',
                'power_connector'=>'required',
                'power_req'=>'required',
                'crossfire'=>'required',
                
            ]);
            $gpu->name = $request->name;
            $gpu->price = $request->price;
            $gpu->manufacturer_id = $request->manufacturer_id;
            $gpu->chipset_id = $request->chipset_id;
            $gpu->series = $request->series;
            $gpu->gpu_bus = $request->gpu_bus;
            $gpu->tdp = $request->tdp;
            $gpu->process_size = $request->process_size;
            $gpu->base_clock = $request->base_clock;
            $gpu->boost_clock = $request->boost_clock;
            $gpu->memory_clock = $request->memory_clock;
            $gpu->vram_type = $request->vram_type;
            $gpu->vram = $request->vram;
            $gpu->length = $request->length;
            $gpu->power_connector = $request->power_connector;
            $gpu->interface = $request->interface;
            $gpu->power_req = $request->power_req;
            $gpu->crossfire = $request->crossfire;

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
                        'imageable_id' => $gpu->id,
                        'imageable_type'=> 'App\Models\Gpu',
                    ]);
                }
            }
           

            $gpu->save();
            
            session()->flash('status','Graphics Card updated successfully.');
            return redirect()->route('gpus.index');
    
        }

        session()->flash('error','GPU does not exist!');
        return redirect()->route('gpus.index');
    
    
    }


    // Rams

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
        
        session()->flash('status','RAM added successfully.');
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
        session()->flash('status','RAM '.$r->ram_name.' deleted successfully.');
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
            
            session()->flash('status','RAM updated successfully.');
            return redirect()->route('rams.index');
    
        }

        session()->flash('error','RAM does not exist!');
        return redirect()->route('rams.index');
    
    
    }

    // Storage

    public function read_storage()
    {
        $storages = Storage::paginate(10);
        return view('admin.components.storages.index',['storages'=>$storages]);
    }

    public function create_storage()
    {
        $manufacturers = Manufacturer::all();
        return view('admin.components.storages.create',['manufacturers'=>$manufacturers]);
    }

    public function store_storage(Request $r)
    {
        $this->validate($r,[
            'name'=>'required',
            'cache'=>'required|integer',
            'capacity'=>'required|integer',
            'type'=>'required',
            'manufacturer_id'=>'required',
            'interface'=>'required',
            'nvme'=>'required|boolean',
            'price'=>'required|numeric',
            'images'=>"required|array",
            'images.*'=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);
        
        $storage = Storage::create([
            'name'=>$r->name,
            'capacity'=>$r->capacity,
            'type'=>$r->type,
            'cache'=>$r->cache,
            'manufacturer_id'=>$r->manufacturer_id,
            'interface'=>$r->interface,
            'nvme'=>$r->nvme,
            'price'=>$r->price,
        ]);

        foreach($r->images as $image){
            $imageName = time().rand().'.'.$image->extension();  
            $image->move(public_path('images'), $imageName);
            Image::create([
                'path'=>$imageName,
                'imageable_id' => $storage->id,
                'imageable_type'=> 'App\Models\Storage',
            ]);
        }
        
        session()->flash('status','Storage Device added successfully.');
        return redirect()->route('storages.index');
       
    }

    public function delete_storage(Request $r)
    {
        $storage = Storage::find($r->id);
        $storage->delete();
        $array = array();
        $imagesToDelete = Image::where('imageable_type','App\Models\Storage')->where('imageable_id',$r->id)->get();
        $images = Image::where('imageable_type','App\Models\Storage')->where('imageable_id',$r->id);
        foreach($imagesToDelete as $image){
            File::delete(public_path('images/'.$image->path));
        }
        $images->delete();
        session()->flash('status','Storage Device '.$r->name.' deleted successfully.');
        return redirect()->back();
    }

    public function edit_storage(Storage $storage)
    {
        $images = Image::where('imageable_type','App\Models\Storage')->where('imageable_id',$storage->id)->get();
        $manu = Manufacturer::all();
        return view('admin.components.storages.edit',['storage'=>$storage,'manufacturers'=>$manu,'images'=>$images]);
    }

    public function update_storage(Request $request)
    {
        
        $imagesToDelete = Image::where('imageable_type','App\Models\Storage')->where('imageable_id',$request->id)->get();
        $imagesModel = Image::where('imageable_type','App\Models\Storage')->where('imageable_id',$request->id);
        $storage = Storage::find($request->id);
        if($storage !== null){
            $this->validate($request,[
                'name'=>'required',
                'cache'=>'required|integer',
                'capacity'=>'required|integer',
                'type'=>'required',
                'manufacturer_id'=>'required',
                'interface'=>'required',
                'nvme'=>'required|boolean',
                'price'=>'required|numeric',
                
            ]);
            $storage->name = $request->name;
            $storage->cache = $request->cache;
            $storage->capacity = $request->capacity;
            $storage->type = $request->type;
            $storage->manufacturer_id = $request->manufacturer_id;
            $storage->interface = $request->interface;
            $storage->nvme = $request->nvme;
            $storage->price = $request->price;
            if($request->images !== null){
                $this->validate($request,[
                    'images'=>"required|array",
                    'images.*'=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
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
                        'imageable_id' => $cooler->id,
                        'imageable_type'=> 'App\Models\Storage',
                    ]);
                }
            }
           

            $storage->save();
            
            session()->flash('status','Storage Device updated successfully.');
            return redirect()->route('storages.index');
    
        }

        session()->flash('error','Storage Device does not exist!');
        return redirect()->route('storages.index');
    
    
    }

    // Cpu coolers

    public function read_cooler()
    {
        $coolers = Cooler::paginate(10);
        return view('admin.components.coolers.index',['coolers'=>$coolers]);
    }

    public function create_cooler()
    {
        $manufacturers = Manufacturer::all();
        return view('admin.components.coolers.create',['manufacturers'=>$manufacturers]);
    }

    public function store_cooler(Request $r)
    {
        $this->validate($r,[
            'name'=>'required',
            'max_power'=>'required|integer',
            'manufacturer_id'=>'required|integer',
            'fan_rpm'=>'required|',
            'length'=>'required|numeric',
            'height'=>'required|numeric',
            'width'=>'required|numeric',
            'noise_level'=>'required',
            'water_cooled'=>'required|boolean',
            'price'=>'required|numeric',
            'images'=>"required|array",
            'images.*'=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);
        
        $cooler = Cooler::create([
            'name'=>$r->name,
            'max_power'=>$r->max_power,
            'fan_rpm'=>$r->fan_rpm,
            'length'=>$r->length,
            'manufacturer_id'=>$r->manufacturer_id,
            'height'=>$r->height,
            'width'=>$r->width,
            'noise_level'=>$r->noise_level,
            'water_cooled'=>$r->water_cooled,
            'price'=>$r->price,
        ]);

        foreach($r->images as $image){
            $imageName = time().rand().'.'.$image->extension();  
            $image->move(public_path('images'), $imageName);
            Image::create([
                'path'=>$imageName,
                'imageable_id' => $cooler->id,
                'imageable_type'=> 'App\Models\Cooler',
            ]);
        }
        
        session()->flash('status','Cooler added successfully.');
        return redirect()->route('coolers.index');
       
    }

    public function delete_cooler(Request $r)
    {
        $cooler = Cooler::find($r->id);
        $cooler->delete();
        $array = array();
        $imagesToDelete = Image::where('imageable_type','App\Models\Cooler')->where('imageable_id',$r->id)->get();
        $images = Image::where('imageable_type','App\Models\Cooler')->where('imageable_id',$r->id);
        foreach($imagesToDelete as $image){
            File::delete(public_path('images/'.$image->path));
        }
        $images->delete();
        session()->flash('status','Cooler '.$r->name.' deleted successfully.');
        return redirect()->back();
    }

    public function edit_cooler(Cooler $cooler)
    {
        $images = Image::where('imageable_type','App\Models\Cooler')->where('imageable_id',$cooler->id)->get();
        $manu = Manufacturer::all();
        return view('admin.components.coolers.edit',['cooler'=>$cooler,'manufacturers'=>$manu,'images'=>$images]);
    }

    public function update_cooler(Request $request)
    {
        
        $imagesToDelete = Image::where('imageable_type','App\Models\Cooler')->where('imageable_id',$request->id)->get();
        $imagesModel = Image::where('imageable_type','App\Models\Cooler')->where('imageable_id',$request->id);
        $cooler = Cooler::find($request->id);
        if($cooler !== null){
            $this->validate($request,[
                'name'=>'required',
                'max_power'=>'required|integer',
                'manufacturer_id'=>'required|integer',
                'fan_rpm'=>'required|',
                'length'=>'required|numeric',
                'height'=>'required|numeric',
                'width'=>'required|numeric',
                'noise_level'=>'required',
                'water_cooled'=>'required|boolean',
                'price'=>'required|numeric',
                
            ]);
            $cooler->name = $request->name;
            $cooler->max_power = $request->max_power;
            $cooler->fan_rpm = $request->fan_rpm;
            $cooler->length = $request->length;
            $cooler->manufacturer_id = $request->manufacturer_id;
            $cooler->width = $request->width;
            $cooler->height = $request->height;
            $cooler->noise_level = $request->noise_level;
            $cooler->water_cooled = $request->water_cooled;
            $cooler->price = $request->price;
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
                        'imageable_id' => $cooler->id,
                        'imageable_type'=> 'App\Models\Cooler',
                    ]);
                }
            }
           

            $cooler->save();
            
            session()->flash('status','Cooler updated successfully.');
            return redirect()->route('coolers.index');
    
        }

        session()->flash('error','Cooler does not exist!');
        return redirect()->route('coolers.index');
    
    
    }


    // Power supplies

    public function read_psu()
    {
        $psus = Psu::paginate(10);
        return view('admin.components.psus.index',['psus'=>$psus]);
    }

    public function create_psu()
    {
        $manufacturers = Manufacturer::all();
        return view('admin.components.psus.create',['manufacturers'=>$manufacturers]);
    }

    public function store_psu(Request $r)
    {
        $this->validate($r,[
            'name'=>'required',
            'price'=>'required|numeric',
            'manufacturer_id'=>'required|integer',
            'efficiency_rating'=>'required',
            'molex_4pin_connectors'=>'required|integer',
            'sata_connectors'=>'required|integer',
            'pcie_6_2_pin_connectors'=>'required|integer',
            'length'=>'required|integer',
            'type'=>'required',
            'modular'=>'required',
            'wattage'=>'required|integer',
            'images'=>"required|array",
            'images.*'=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);
    
        $psu = Psu::create([
            'name'=>$r->name,
            'price'=>$r->price,
            'manufacturer_id'=>$r->manufacturer_id,
            'efficiency_rating'=>$r->efficiency_rating,
            'molex_4pin_connectors'=>$r->molex_4pin_connectors,
            'pcie_6_2_pin_connectors'=>$r->pcie_6_2_pin_connectors,
            'sata_connectors'=>$r->sata_connectors,
            'type'=>$r->type,
            'length'=>$r->length,
            'modular'=>$r->modular,
            'wattage'=>$r->wattage,
        ]);

        foreach($r->images as $image){
            $imageName = time().rand().'.'.$image->extension();  
            $image->move(public_path('images'), $imageName);
            Image::create([
                'path'=>$imageName,
                'imageable_id' => $psu->id,
                'imageable_type'=> 'App\Models\Psu',
            ]);
        }
        
        session()->flash('status','Power Supply created successfully.');
        return redirect()->route('psus.index');
       
    }

    public function delete_psu(Request $r)
    {
        $psu = Psu::find($r->id);
        $psu->delete();
        $array = array();
        $imagesToDelete = Image::where('imageable_type','App\Models\Psu')->where('imageable_id',$r->id)->get();
        $images = Image::where('imageable_type','App\Models\Psu')->where('imageable_id',$r->id);
        foreach($imagesToDelete as $image){
            File::delete(public_path('images/'.$image->path));
        }
        $images->delete();
        session()->flash('status','Power Supply '.$r->name.' deleted successfully.');
        return redirect()->back();
    }

    public function edit_psu(Psu $psu)
    {
        $images = Image::where('imageable_type','App\Models\Psu')->where('imageable_id',$psu->id)->get();
        $manu = Manufacturer::all();
        return view('admin.components.psus.edit',['psu'=>$psu,'manufacturers'=>$manu,'images'=>$images]);
    }

    public function update_psu(Request $request)
    {
        
        $imagesToDelete = Image::where('imageable_type','App\Models\Psu')->where('imageable_id',$request->id)->get();
        $imagesModel = Image::where('imageable_type','App\Models\Psu')->where('imageable_id',$request->id);
        $psu = Psu::find($request->id);
        if($psu !== null){
            $this->validate($request,[
                'name'=>'required',
                'price'=>'required|numeric',
                'manufacturer_id'=>'required|integer',
                'efficiency_rating'=>'required',
                'molex_4pin_connectors'=>'required|integer',
                'sata_connectors'=>'required|integer',
                'pcie_6_2_pin_connectors'=>'required|integer',
                'length'=>'required|integer',
                'type'=>'required',
                'modular'=>'required',
                'wattage'=>'required|integer',
                
            ]);
            $psu->name = $request->name;
            $psu->price = $request->price;
            $psu->manufacturer_id = $request->manufacturer_id;
            $psu->efficiency_rating = $request->efficiency_rating;
            $psu->molex_4pin_connectors = $request->molex_4pin_connectors;
            $psu->length = $request->length;
            $psu->sata_connectors = $request->sata_connectors;
            $psu->pcie_6_2_pin_connectors = $request->pcie_6_2_pin_connectors;
            $psu->type = $request->type;
            $psu->modular = $request->modular;
            $psu->wattage = $request->wattage;
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
                        'imageable_id' => $psu->id,
                        'imageable_type'=> 'App\Models\Psu',
                    ]);
                }
            }
           

            $psu->save();
            
            session()->flash('status','Power Supply updated successfully.');
            return redirect()->route('psus.index');
    
        }

        session()->flash('error','Power Supply does not exist!');
        return redirect()->route('psus.index');
    
    
    }

    // Cases

    public function read_pcCase()
    {
        $cases = PcCase::paginate(10);
        return view('admin.components.cases.index',['cases'=>$cases]);
    }

    public function create_pcCase()
    {
        $manufacturers = Manufacturer::all();
        return view('admin.components.cases.create',['manufacturers'=>$manufacturers]);
    }

    public function store_pcCase(Request $r)
    {
        $this->validate($r,[
            'name'=>'required',
            'price'=>'required|numeric',
            'manufacturer_id'=>'required|integer',
            'height'=>'required|integer',
            'width'=>'required|integer',
            'type'=>'required',
            'num_2_5_bays'=>'required|integer',
            'length'=>'required|integer',
            'num_3_5_bays'=>'required',
            'max_gpu_length'=>'required',
            'expansion_slots'=>'required|integer',
            'front_panel_usb'=>'required|integer',
            'motherboard_form_factor'=>'required',
            'side_panel_glass'=>'required|integer',
            'power_supply_shroud'=>'required|integer',
            'images'=>"required|array",
            'images.*'=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);
    
        $case = PcCase::create([
            'name'=>$r->name,
            'price'=>$r->price,
            'manufacturer_id'=>$r->manufacturer_id,
            'height'=>$r->height,
            'width'=>$r->width,
            'type'=>$r->type,
            'num_2_5_bays'=>$r->num_2_5_bays,
            'num_3_5_bays'=>$r->num_3_5_bays,
            'length'=>$r->length,
            'max_gpu_length'=>$r->max_gpu_length,
            'expansion_slots'=>$r->expansion_slots,
            'front_panel_usb'=>$r->front_panel_usb,
            'motherboard_form_factor'=>$r->motherboard_form_factor,
            'side_panel_glass'=>$r->side_panel_glass,
            'power_supply_shroud'=>$r->power_supply_shroud,
            
        ]);

        foreach($r->images as $image){
            $imageName = time().rand().'.'.$image->extension();  
            $image->move(public_path('images'), $imageName);
            Image::create([
                'path'=>$imageName,
                'imageable_id' => $case->id,
                'imageable_type'=> 'App\Models\PcCase',
            ]);
        }
        
        session()->flash('status','Case created successfully.');
        return redirect()->route('cases.index');
       
    }

    public function delete_pcCase(Request $r)
    {
        $case = PcCase::find($r->id);
        $case->delete();
        $array = array();
        $imagesToDelete = Image::where('imageable_type','App\Models\PcCase')->where('imageable_id',$r->id)->get();
        $images = Image::where('imageable_type','App\Models\PcCase')->where('imageable_id',$r->id);
        foreach($imagesToDelete as $image){
            File::delete(public_path('images/'.$image->path));
        }
        $images->delete();
        session()->flash('status','Case '.$r->name.' deleted successfully.');
        return redirect()->back();
    }

    public function edit_pcCase(PcCase $case)
    {
        $images = Image::where('imageable_type','App\Models\PcCase')->where('imageable_id',$case->id)->get();
        $manu = Manufacturer::all();
        return view('admin.components.cases.edit',['case'=>$case,'manufacturers'=>$manu,'images'=>$images]);
    }

    public function update_pcCase(Request $request)
    {
        
        $imagesToDelete = Image::where('imageable_type','App\Models\PcCase')->where('imageable_id',$request->id)->get();
        $imagesModel = Image::where('imageable_type','App\Models\PcCase')->where('imageable_id',$request->id);
        $case = PcCase::find($request->id);
        if($case !== null){
            $this->validate($request,[
                'name'=>'required',
                'price'=>'required|numeric',
                'manufacturer_id'=>'required|integer',
                'height'=>'required|integer',
                'width'=>'required|integer',
                'type'=>'required',
                'num_2_5_bays'=>'required|integer',
                'length'=>'required|integer',
                'num_3_5_bays'=>'required',
                'max_gpu_length'=>'required',
                'expansion_slots'=>'required|integer',
                'front_panel_usb'=>'required|integer',
                'motherboard_form_factor'=>'required',
                'side_panel_glass'=>'required|integer',
                'power_supply_shroud'=>'required|integer',
                
            ]);
            $case->name = $request->name;
            $case->price = $request->price;
            $case->manufacturer_id = $request->manufacturer_id;
            $case->length = $request->length;
            $case->height = $request->height;
            $case->width = $request->width;
            $case->num_2_5_bays = $request->num_2_5_bays;
            $case->num_3_5_bays = $request->num_3_5_bays;
            $case->max_gpu_length = $request->max_gpu_length;
            $case->expansion_slots = $request->expansion_slots;
            $case->front_panel_usb = $request->front_panel_usb;
            $case->type = $request->type;
            $case->motherboard_form_factor = $request->motherboard_form_factor;
            $case->side_panel_glass = $request->side_panel_glass;
            $case->power_supply_shroud = $request->power_supply_shroud;
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
                        'imageable_id' => $case->id,
                        'imageable_type'=> 'App\Models\PcCase',
                    ]);
                }
            }
           

            $case->save();
            
            session()->flash('status','Case updated successfully.');
            return redirect()->route('cases.index');
    
        }

        session()->flash('error','Case does not exist!');
        return redirect()->route('cases.index');
    
    
    }

    // Motherboards

    public function read_mobo()
    {
        $mobos = Mobo::paginate(10);
        return view('admin.components.mobos.index',['mobos'=>$mobos]);
    }

    public function create_mobo()
    {
        $manufacturers = Manufacturer::all();
        $chipsets = Chipset::all();
        return view('admin.components.mobos.create',['manufacturers'=>$manufacturers,'chipsets'=>$chipsets]);
    }

    public function store_mobo(Request $r)
    {
        $this->validate($r,[
            'name'=>'required',
            'price'=>'required|numeric',
            'manufacturer_id'=>'required|integer',
            'chipset_id'=>'required|integer',
            'socket'=>'required',
            'max_memory'=>'required|integer',
            'memory_slots'=>'required|integer',
            'form_factor'=>'required',
            'memory_type'=>'required',
            'pci_e_x16_slots'=>'required|integer',
            'pci_e_x8_slots'=>'required|integer',
            'pci_e_x4_slots'=>'required|integer',
            'pci_e_x1_slots'=>'required|integer',
            'm_2_slots'=>'required|integer',
            'sata_ports'=>'required|integer',
            'usb_2_0_headers'=>'required|integer',
            'usb_3_2_gen1_headers'=>'required|integer',
            'usb_3_2_gen2_headers'=>'required|integer',
            'wireless_support'=>'required',
            'images'=>"required|array",
            'images.*'=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);
    
        $mobo = Mobo::create([
            'name'=>$r->name,
            'price'=>$r->price,
            'manufacturer_id'=>$r->manufacturer_id,
            'chipset_id'=>$r->chipset_id,
            'socket'=>$r->socket,
            'max_memory'=>$r->max_memory,
            'memory_slots'=>$r->memory_slots,
            'form_factor'=>$r->form_factor,
            'memory_type'=>$r->memory_type,
            'pci_e_x16_slots'=>$r->pci_e_x16_slots,
            'pci_e_x8_slots'=>$r->pci_e_x8_slots,
            'pci_e_x4_slots'=>$r->pci_e_x4_slots,
            'pci_e_x1_slots'=>$r->pci_e_x1_slots,
            'm_2_slots'=>$r->m_2_slots,
            'sata_ports'=>$r->sata_ports,
            'usb_2_0_headers'=>$r->usb_2_0_headers,
            'usb_3_2_gen1_headers'=>$r->usb_3_2_gen1_headers,
            'usb_3_2_gen2_headers'=>$r->usb_3_2_gen2_headers,
            'wireless_support'=>$r->wireless_support,
        ]);

        foreach($r->images as $image){
            $imageName = time().rand().'.'.$image->extension();  
            $image->move(public_path('images'), $imageName);
            Image::create([
                'path'=>$imageName,
                'imageable_id' => $mobo->id,
                'imageable_type'=> 'App\Models\Mobo',
            ]);
        }
        
        session()->flash('status','Motheboard created successfully.');
        return redirect()->route('mobos.index');
       
    }

    public function delete_mobo(Request $r)
    {
        $mobo = Mobo::find($r->id);
        $mobo->delete();
        $array = array();
        $imagesToDelete = Image::where('imageable_type','App\Models\Mobo')->where('imageable_id',$r->id)->get();
        $images = Image::where('imageable_type','App\Models\Mobo')->where('imageable_id',$r->id);
        foreach($imagesToDelete as $image){
            File::delete(public_path('images/'.$image->path));
        }
        $images->delete();
        session()->flash('status','Motherboard '.$r->name.' deleted successfully.');
        return redirect()->back();
    }

    public function edit_mobo(Mobo $mobo)
    {
        $images = Image::where('imageable_type','App\Models\Mobo')->where('imageable_id',$mobo->id)->get();
        $manu = Manufacturer::all();
        $chip = Chipset::all();
        return view('admin.components.mobos.edit',['mobo'=>$mobo,'manufacturers'=>$manu,'images'=>$images,'chipsets'=>$chip]);
    }

    public function update_mobo(Request $request)
    {
        
        $imagesToDelete = Image::where('imageable_type','App\Models\Mobo')->where('imageable_id',$request->id)->get();
        $imagesModel = Image::where('imageable_type','App\Models\Mobo')->where('imageable_id',$request->id);
        $mobo = Mobo::find($request->id);
        if($mobo !== null){
            $this->validate($request,[
                'name'=>'required',
                'price'=>'required|numeric',
                'manufacturer_id'=>'required|integer',
                'chipset_id'=>'required|integer',
                'socket'=>'required',
                'max_memory'=>'required|integer',
                'memory_slots'=>'required|integer',
                'form_factor'=>'required',
                'memory_type'=>'required',
                'pci_e_x16_slots'=>'required|integer',
                'pci_e_x8_slots'=>'required|integer',
                'pci_e_x4_slots'=>'required|integer',
                'pci_e_x1_slots'=>'required|integer',
                'm_2_slots'=>'required|integer',
                'sata_ports'=>'required|integer',
                'usb_2_0_headers'=>'required|integer',
                'usb_3_2_gen1_headers'=>'required|integer',
                'usb_3_2_gen2_headers'=>'required|integer',
                'wireless_support'=>'required',
                
            ]);
            $mobo->name = $request->name;
            $mobo->price = $request->price;
            $mobo->manufacturer_id = $request->manufacturer_id;
            $mobo->chipset_id = $request->chipset_id;
            $mobo->socket = $request->socket;
            $mobo->max_memory = $request->max_memory;
            $mobo->memory_slots = $request->memory_slots;
            $mobo->form_factor = $request->form_factor;
            $mobo->memory_type = $request->memory_type;
            $mobo->pci_e_x16_slots = $request->pci_e_x16_slots;
            $mobo->pci_e_x8_slots = $request->pci_e_x8_slots;
            $mobo->pci_e_x4_slots = $request->pci_e_x4_slots;
            $mobo->pci_e_x1_slots = $request->pci_e_x1_slots;
            $mobo->m_2_slots = $request->m_2_slots;
            $mobo->sata_ports = $request->sata_ports;
            $mobo->usb_2_0_headers = $request->usb_2_0_headers;
            $mobo->usb_3_2_gen1_headers = $request->usb_3_2_gen1_headers;
            $mobo->usb_3_2_gen2_headers = $request->usb_3_2_gen2_headers;
            $mobo->wireless_support = $request->wireless_support;

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
                        'imageable_id' => $mobo->id,
                        'imageable_type'=> 'App\Models\Mobo',
                    ]);
                }
            }
           

            $mobo->save();
            
            session()->flash('status','Motherboard updated successfully.');
            return redirect()->route('mobos.index');
    
        }

        session()->flash('error','Motheboard does not exist!');
        return redirect()->route('mobos.index');
    
    
    }




     // Fans

     public function read_fan()
     {
         $fans = Fan::paginate(10);
         return view('admin.components.fans.index',['fans'=>$fans]);
     }
 
     public function create_fan()
     {
         $manufacturers = Manufacturer::all();
         return view('admin.components.fans.create',['manufacturers'=>$manufacturers]);
     }
 
     public function store_fan(Request $r)
     {
         $this->validate($r,[
             'name'=>'required',
             'manufacturer_id'=>'required|integer',
             'diameter'=>'required|integer',
             'led'=>'required',
             'speed'=>'required',
             'noise'=>'required',
             'bearings'=>'required',
             'power_connector'=>'required',
             'air_flow'=>'required',
             'life'=>'required',
             'power_consumption'=>'required|numeric',
             'price'=>'required|numeric',
             'images'=>"required|array",
             'images.*'=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
         ]);
         
         $fan = Fan::create([
             'name'=>$r->name,
             'diameter'=>$r->diameter,
             'led'=>$r->led,
             'speed'=>$r->speed,
             'manufacturer_id'=>$r->manufacturer_id,
             'noise'=>$r->noise,
             'bearings'=>$r->bearings,
             'power_connector'=>$r->power_connector,
             'price'=>$r->price,
             'air_flow'=>$r->air_flow,
             'life'=>$r->life,
             'power_consumption'=>$r->power_consumption,
         ]);
 
         foreach($r->images as $image){
             $imageName = time().rand().'.'.$image->extension();  
             $image->move(public_path('images'), $imageName);
             Image::create([
                 'path'=>$imageName,
                 'imageable_id' => $fan->id,
                 'imageable_type'=> 'App\Models\Fan',
             ]);
         }
         
         session()->flash('status','Fan created successfully.');
         return redirect()->route('fans.index');
        
     }
 
     public function delete_fan(Request $r)
     {
         $fan = Fan::find($r->id);
         $fan->delete();
         $array = array();
         $imagesToDelete = Image::where('imageable_type','App\Models\Fan')->where('imageable_id',$r->id)->get();
         $images = Image::where('imageable_type','App\Models\Fan')->where('imageable_id',$r->id);
         foreach($imagesToDelete as $image){
             File::delete(public_path('images/'.$image->path));
             $array[] = $image->path;
         }
         $images->delete();
         session()->flash('status','Fan '.$r->name.' deleted successfully.');
         return redirect()->back();
     }
 
     public function edit_fan(Fan $fan)
     {
         $images = Image::where('imageable_type','App\Models\Fan')->where('imageable_id',$fan->id)->get();
         $manu = Manufacturer::all();
         return view('admin.components.fans.edit',['fan'=>$fan,'manufacturers'=>$manu,'images'=>$images]);
     }
 
     public function update_fan(Request $request)
     {
         $imagesToDelete = Image::where('imageable_type','App\Models\Fan')->where('imageable_id',$request->id)->get();
         $imagesModel = Image::where('imageable_type','App\Models\Fan')->where('imageable_id',$request->id);
         $fan = Fan::find($request->id);
         if($fan !== null){
            $this->validate($request,[
                'name'=>'required',
                'manufacturer_id'=>'required|integer',
                'diameter'=>'required|integer',
                'led'=>'required',
                'speed'=>'required',
                'noise'=>'required',
                'bearings'=>'required',
                'power_connector'=>'required',
                'air_flow'=>'required',
                'life'=>'required',
                'power_consumption'=>'required|numeric',
                'price'=>'required|numeric',
                
            ]);
             $fan->name = $request->name;
             $fan->speed = $request->speed;
             $fan->diameter = $request->diameter;
             $fan->led = $request->led;
             $fan->manufacturer_id = $request->manufacturer_id;
             $fan->speed = $request->speed;
             $fan->noise = $request->noise;
             $fan->bearings = $request->bearings;
             $fan->price = $request->price;
             $fan->power_connector = $request->power_connector;
             $fan->air_flow = $request->air_flow;
             $fan->life = $request->life;
             $fan->power_consumption = $request->power_consumption;
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
                         'imageable_id' => $fan->id,
                         'imageable_type'=> 'App\Models\Fan',
                     ]);
                 }
             }
            
 
             $fan->save();
             
             session()->flash('status','Fan updated successfully.');
             return redirect()->route('fans.index');
     
         }
 
        session()->flash('error','Fan does not exist!');
        return redirect()->route('fans.index');
     
     
     }
 
    

}
