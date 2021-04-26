<?php

namespace App\Http\Controllers;

use App\Models\Cpu;
use App\Models\Psu;
use App\Models\Ram;
use App\Models\Image;
use App\Models\Cooler;
use App\Models\Chipset;
use App\Models\Storage;
use App\Models\ChipsetCpu;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        
        session()->flash('status','Uređaj uspješno dodan.');
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
        session()->flash('status','Uređaj '.$r->name.' uspješno obrisan.');
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
            
            session()->flash('status','Uređaj uspješno ažuriran.');
            return redirect()->route('storages.index');
    
        }

        session()->flash('error','Uređaj ne postoji!');
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
        
        session()->flash('status','Hladnjak uspješno dodan.');
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
        session()->flash('status','Hladnjak '.$r->name.' uspješno obrisan.');
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
                'heigth'=>'required|numeric',
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
            $cooler->heigth = $request->heigth;
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
                foreach($request->ram_images as $image){
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
            
            session()->flash('status','Hladnjak uspješno ažuriran.');
            return redirect()->route('coolers.index');
    
        }

        session()->flash('error','Hladnjak ne postoji!');
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
        
        session()->flash('status','Napajanje uspješno dodano.');
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
        session()->flash('status','Napajanje '.$r->name.' uspješno obrisano.');
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
            
            session()->flash('status','Napajanje uspješno ažurirano.');
            return redirect()->route('psus.index');
    
        }

        session()->flash('error','Napajanje ne postoji!');
        return redirect()->route('psus.index');
    
    
    }

    // Cases

    public function read_pcCase()
    {
        $cases = PcCase::paginate(10);
        return view('admin.components.psus.index',['cases'=>$cases]);
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
            'height'=>'required',
            'width'=>'required|integer',
            'type'=>'required|integer',
            '2_5_bays'=>'required|integer',
            'length'=>'required|integer',
            '3_5_bays'=>'required',
            'max_gpu_length'=>'required',
            'expansion_slots'=>'required|integer',
            'front_panel_usb'=>'required|integer',
            'motherboard_form_factor'=>'required|integer',
            'side_panel_glass'=>'required|integer',
            'power_supply_shroud'=>'required|integer',
            'images'=>"required|array",
            'images.*'=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);
    
        $psu = Psu::create([
            'name'=>$r->name,
            'price'=>$r->price,
            'manufacturer_id'=>$r->manufacturer_id,
            'height'=>$r->height,
            'width'=>$r->width,
            'type'=>$r->type,
            '2_5_bays'=>$r->2_5_bays,
            '3_5_bays'=>$r->3_5_bays,
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
                'imageable_id' => $psu->id,
                'imageable_type'=> 'App\Models\Psu',
            ]);
        }
        
        session()->flash('status','Napajanje uspješno dodano.');
        return redirect()->route('psus.index');
       
    }

    public function delete_pcCase(Request $r)
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
        session()->flash('status','Napajanje '.$r->name.' uspješno obrisano.');
        return redirect()->back();
    }

    public function edit_pcCase(PcCase $case)
    {
        $images = Image::where('imageable_type','App\Models\Psu')->where('imageable_id',$psu->id)->get();
        $manu = Manufacturer::all();
        return view('admin.components.psus.edit',['psu'=>$psu,'manufacturers'=>$manu,'images'=>$images]);
    }

    public function update_pcCase(Request $request)
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
            
            session()->flash('status','Napajanje uspješno ažurirano.');
            return redirect()->route('psus.index');
    
        }

        session()->flash('error','Napajanje ne postoji!');
        return redirect()->route('psus.index');
    
    
    }

}
