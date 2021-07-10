<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ManufacturerController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function read_manufacturer()
    {
        $manufacturers = Manufacturer::paginate(10);
        return view('admin.components.manufacturers.index',['manufacturers'=>$manufacturers]);
    }

    public function create_manufacturer()
    {
        return view('admin.components.manufacturers.create');
    }

    public function store_manufacturer(Request $r)
    {
        $this->validate($r,[
            'name'=>'required',
            'description'=>'required',
            'image'=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);
        $imageName = time().rand().'.'.$r->image->extension();  
        $manu = Manufacturer::create([
            'name'=>$r->name,
            'description'=>$r->description,
            'image'=>$imageName
        ]);
        $r->image->move(public_path('images'), $imageName);
       
        session()->flash('status','Proizvođač uspješno dodan.');
        return redirect()->route('manufacturers.index');
       
    }

    public function delete_manufacturer(Request $r)
    {
        $manu = Manufacturer::find($r->id);
        File::delete(public_path('images/'.$manu->image));
        $manu->delete();
        session()->flash('status','Proizvođač '.$r->name.' uspješno obrisan.');
        return redirect()->back();
    }

    public function edit_manufacturer(Manufacturer $manufacturer)
    {
        return view('admin.components.manufacturers.edit',['manufacturer'=>$manufacturer]);
    }

    public function update_manufacturer(Request $request)
    {

        $manu = Manufacturer::find($request->id);
        if($manu !== null){
            $this->validate($request,[
                'name'=>'required',
                'description'=>'required',
            ]);
            $manu->name = $request->name;
            $manu->description = $request->description;
    
            if($request->image !== null){
                $this->validate($request,[
                    'image'=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
                ]);
                File::delete(public_path('images/'.$manu->image));
                
                $imageName = time().rand().'.'.$request->image->extension();  
                $request->image->move(public_path('images'), $imageName);
                $manu->image = $imageName;
                
            }

            $manu->save();
           
            session()->flash('status','Proizvođač uspješno ažuriran.');
            return redirect()->route('manufacturers.index');
        }
        session()->flash('error','Proizvođač ne postoji!');
        return redirect()->route('manufacturers.index');
    
    
    }
}
