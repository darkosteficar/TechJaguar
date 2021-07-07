<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Storage;
use App\Models\Buildable;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function index()
    {
        return view('components',['component'=>'storages']);
    }

    public function add(Request $r)
    {
        $build = Build::find(request()->cookie('build_id'));
        Buildable::create([
            'build_id'=>$build->id,
            'buildable_id' => $r->id,
            'buildable_type'=> 'App\Models\storage',
        ]);
        $storage = Storage::find($r->id);
        session()->flash('item',$storage->name);
        session()->flash('success', 'Storage ' );
        session()->flash('success2', ' added successfully.' );
        return redirect()->route('build');

    }
    public function remove(Request $r)
    {
        $build = Build::find(request()->cookie('build_id'));
        $storage = Buildable::where('build_id', $build->id)->where('buildable_type','App\Models\storage')->where('buildable_id',$r->id)->first();
        $storage->delete();
        session()->flash('success', 'Storage component successfully removed.' );
        return redirect()->route('build');   
    }




    
}
