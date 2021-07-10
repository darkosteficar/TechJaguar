@extends('admin.layouts.app')

@section('content')
    <h1>Updating the chipset</h1>
   
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
                <form method="post" action="{{ route('chipsets.update', []) }}" enctype="multipart/form-data">
        
                    @csrf
                    <input type="hidden" value="{{ $chipset->id }}" name="chipset_id">
                    <div class="form-group">
                        <label for="chipset_name">Name</label>
                        <input class="form-control" type="text" name="chipset_name" data="green" value="{{ $chipset->name }}">
                    </div>
                    <div class="form-group">
                        <label for="chipset_description">Description</label>
                        <textarea class="form-control" name="chipset_description" data="green" style=" height:750px;">{{ $chipset->description }}</textarea>
                    </div>
                  
                   <button type="submit" class="btn btn-success">Save Changes</button>
                </form>
            </div>
        </div>
        
       
    

@endsection
