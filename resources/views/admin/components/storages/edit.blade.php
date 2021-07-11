@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h1>Updating Storage Device</h1>
    <a href="{{ route('storages.index', []) }}">
        <button class="btn btn-success ml-5">Storage Device</button>
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
                <form method="post" action="{{ route('storages.update', []) }}" enctype="multipart/form-data">
        
                    @csrf
                    <input type="hidden" name="id" id="" value="{{ $storage->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-5">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" data="green" value="{{  $storage->name }}">
                            </div>
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="price">MSRP</label>
                                <input class="form-control" type="text" name="price" data="green" value="{{  $storage->price }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="type">Type</label>
                                <input class="form-control" type="text" name="type" data="green" value="{{  $storage->type}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="capacity">Capacity</label>
                                <input class="form-control" type="text" name="capacity" data="green" value="{{  $storage->capacity }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="cache">Cache</label>
                                <input class="form-control" type="text" name="cache" data="green" value="{{  $storage->cache }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="interface">Interface</label>
                                <input class="form-control" type="text" name="interface" data="green" value="{{ $storage->interface }}">     
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-4">
                                <label for="nvme">NVME</label>
                                <select class="form-control" name="nvme" style="background-color: #27293D">
                                    @if ($storage->nvme == 0)
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    @else
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    @endif
                               </select>
                            </div>
                            <div class="col-4">
                                <label for="manufacturer_id">Manufacturer</label>
                                <select class="form-control" style="background-color: #27293D" name="manufacturer_id">
                                    @foreach ($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->id }}" @if ($storage->manufacturer_id == $manufacturer->id) selected
                                            
                                        @endif>{{ $manufacturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <label for="">Current Images</label>
                    <div class="form-row mb-3">
                        @foreach ($images as $image)
                            <img src=" {{ asset('images/'.$image->path) }}" alt="" width="200">
                        @endforeach
                       
                    </div>
                    <div class=" form-row">
                        <label for="uploadImageFile"> &nbsp; Images: &nbsp; </label>
                        <input class="form-control" type="file" id="uploadImageFileAddPost" name="images[]" onchange="showImageHereFuncAddPost();" multiple />
                        <label for="showImageHere" class="mr-3">Preview of Images -></label>
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
