@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="d-flex">
        <h1>Ažuriranje rezultata</h1>
        <a href="{{ route('results.index', []) }}">
            <button class="btn btn-success ml-5">Rezultati</button>
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
                <form method="post" action="{{ route('results.update', []) }}" enctype="multipart/form-data">
                    <input type="hidden" value="{{ $result->id }}" name="id">
                    @csrf
                    <div class="form-group w-50 mx-auto">
                        <div class="row">

                        <div class="col-sm-6">
                            <label for="chipset_name">Rezultat</label>
                            <input class="form-control" type="text" name="score" data="green" value="{{ $result->score }}">
                        </div>
                        <div class="col-sm-6">
                            <label for="chipset_name">Minimalni rezultat</label>
                            <input class="form-control" type="text" name="min_score" data="green" value="{{ $result->min_score }}">  
                        </div>
                       
                        
                    </div>
                    </div>
                    <div class="container">
                        <div class="row mb-3">
                           
                            <div class="col-sm">
                                <label for="">Procesor</label>
                                <select name="cpu_id" id="">
                                    @foreach ($cpus as $cpu)
                                        <option value="{{ $cpu->id }}" @if ($cpu->id == $result->cpu_id)
                                            selected
                                        @endif>{{ $cpu->name }}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                            
                            <div class="col-sm-6">
                                <label for="gpu">Grafička kartica</label>
                                <select name="gpu_id" id="">
                                    @foreach ($gpus as $gpu)
                                        <option value="{{ $gpu->id }}" @if ($gpu->id == $result->gpu_id)
                                            selected
                                        @endif>{{ $gpu->name }}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <label for="app">Aplikacija</label>
                                <select name="app_id" id="">
                                    @foreach ($apps as $app)
                                        <option value="{{ $app->id }}" @if ($app->id == $result->app_id)
                                            selected
                                        @endif>{{ $app->name }}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                            <div class="col-sm">
                                <label for="">Matična ploča</label>
                                <select name="mobo_id" id="">
                                    @foreach ($mobos as $mobo)
                                        <option value="{{ $mobo->id }}" @if ($mobo->id == $result->mobo_id)
                                            selected
                                        @endif>{{ $mobo->name }}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                            <div class="col-sm">
                                <label for="ram">Radna memorija</label>
                                <select name="ram_id" id="">
                                    @foreach ($rams as $ram)
                                        <option value="{{ $ram->id }}" @if ($ram->id == $result->ram_id)
                                            selected
                                        @endif>{{ $ram->name }}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                            
                        </div>
                       
                    </div>
                   
                  
                   <button type="submit" class="btn btn-success">Spremi</button>
                </form>
            </div>
        </div>
        
</div>
@section('scriptsSelectize')
<script>
  
    $(document).ready(function() {
        $("select").selectize({
            sortField: "text"
        });
    
        
    });

</script>
@endsection
@endsection