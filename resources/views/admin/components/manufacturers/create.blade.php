@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h1>New Manufacturer</h1>
    <a href="{{ route('manufacturers.index', []) }}">
        <button class="btn btn-success ml-5">Manufacturers</button>
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
                <form method="post" action="{{ route('manufacturers.store', []) }}" enctype="multipart/form-data">
        
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
                    
                  
                    <div class=" form-row">
                        <label for="image"> &nbsp; Logo: &nbsp; </label>
                        <input class="form-control" type="file" id="uploadImageFileAddPost" name="image" onchange="showImageHereFuncAddPost();"  />
                        <label for="showImageHere" class="mr-3">Preview of an Image -></label>
                        <div id="showImageHereAddPost"></div>
                    </div>
                    
                  
                   <button type="submit" class="btn btn-success">Create</button>
                </form>
            </div>
        </div>
        
       
    
        <script>
            function showImageHereFuncAddPost() {
               $("#showImageHereAddPost").empty();
               var total_file = document.getElementById("uploadImageFileAddPost").files
                   .length;
               for (var i = 0; i < total_file; i++) {
                   $("#showImageHereAddPost").append(

                       "<img src='" +
                       URL.createObjectURL(event.target.files[i]) +
                       "' height='200px' width=' 400px' style='border-style: solid; border-color:#00f2c3;border-width:1px ' class='mr-2 mb-2'>"
                   );
               }
           }
       </script>
@endsection
