@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h1>New Category</h1>
    <a href="{{ route('categories.index', []) }}">
        <button class="btn btn-success ml-5">Categories</button>
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
                <form method="post" action="{{ route('categories.store', []) }}" enctype="multipart/form-data">
        
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-5">
                                <label for="name">Name:</label>
                                <input class="form-control" type="text" name="name" data="green" >
                            </div>
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="post_content" cols="30" rows="10" class="form-control my-editor"></textarea>
                    </div>
                    
                  
                   <button type="submit" class="btn btn-success">Create</button>
                </form>
            </div>
        </div>
        
       
    
       
@endsection
