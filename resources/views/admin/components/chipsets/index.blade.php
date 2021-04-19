@extends('admin.layouts.app')

@section('content')
    <h1>Novi chipset</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div><br />
        @endif
        @if (session()->has('status'))
            {{ session('status') }}
        @endif
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('chipset.store', []) }}" enctype="multipart/form-data">
        
                    @csrf
                    <div class="form-group">
                        <label for="chipset_name">Ime</label>
                        <input class="form-control" type="text" name="chipset_name" data="green">
                    </div>
                    <div class="form-group">
                        <label for="chipset_description">Opis</label>
                        <textarea class="form-control" name="chipset_description" data="green"></textarea>
                    </div>
                  
                   <button type="submit" class="btn btn-success">Kreiraj</button>
                </form>
            </div>
        </div>
        
       
    

@endsection
