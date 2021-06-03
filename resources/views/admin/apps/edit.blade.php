@extends('admin.layouts.app')

@section('content')
@php
    $resolutions = ['1080p'=>'1920x1080 piksela','1440p'=>'2560x1440 piksela','4K'=>'3840x2160 piksela'];
@endphp
<div class="d-flex">
    <h1>Ažuriranje aplikacije</h1>
    <a href="{{ route('chipsets.index', []) }}">
        <button class="btn btn-success ml-5">Aplikacije</button>
    </a>
</div>
   
        @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
            <br/>
        @endif
        @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('apps.update', []) }}" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{ $app->id }}">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3"> 
                                <label for="chipset_name">Ime</label>
                                <input class="form-control" type="text" name="name" data="green" value="{{ $app->name }}">
                            </div>
                            <div class="col-4">
                                <label for="smt">Rezolucija</label>
                                <select class="form-control"  style="background-color: #27293D" name="resolution">
                                    @foreach ($resolutions as $key => $res)
                                        <option value="{{ $key }}" @if ($key == $app->resolution)
                                            selected
                                        @endif>{{ $res }}</option>
                                    @endforeach
                                 
                               </select>
                            </div>
                            <div class="col-3">
                                 <label for="chipset_name">Tag</label>
                                <input class="form-control" type="text" name="tag" data="green" value="{{ $app->tag }}">
                            </div>
                        </div>
                       
                       
                       
                    </div>
                    
                  
                   <button type="submit" class="btn btn-success">Spremi</button>
                </form>
            </div>
        </div>
        
       
    
@endsection