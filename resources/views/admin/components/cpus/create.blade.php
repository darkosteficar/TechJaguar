@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h1>Novi procesor</h1>
    <a href="{{ route('chipsets.index', []) }}">
        <button class="btn btn-success ml-5">Chipsetovi</button>
    </a>
</div>
        @error('error')
            <div class="alet alert-danger">
                {{ $message }}
            </div>
        @enderror
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
                <form method="post" action="{{ route('cpus.store', []) }}" enctype="multipart/form-data">
        
                    @csrf
                    <div class="form-group">
                        <label for="chipset_name">Ime</label>
                        <input class="form-control" type="text" name="cpu_name" data="green">
                    </div>
                    
                    @foreach ($chipsets as $chipset)
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="{{ $chipset->id }}" name="cpu_chipsets[]">
                            {{ $chipset->name }}
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                    @endforeach
                    <hr>
                   <button type="submit" class="btn btn-success">Kreiraj</button>
                </form>
            </div>
        </div>
     
        
       
    

@endsection