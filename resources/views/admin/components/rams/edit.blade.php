@extends('admin.layouts.app')

@section('content')
    <h1>Updating RAM</h1>
   
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
                <form method="post" action="{{ route('rams.update', []) }}" enctype="multipart/form-data">
        
                    @csrf
                    <input type="hidden" value="{{ $ram->id }}" name="ram_id">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-5">
                                <label for="ram_name">Name</label>
                                <input class="form-control" type="text" name="ram_name" data="green" value="{{ $ram->name }}">
                            </div>
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="ram_price">Price</label>
                                <input class="form-control" type="text" name="ram_price" data="green" value="{{ $ram->price }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="ram_type">Type of Memory</label>
                                <input class="form-control" type="text" name="ram_type" data="green" value="{{$ram->type}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="ram_speed">Memory Speed</label>
                                <input class="form-control" type="text" name="ram_speed" data="green" value="{{ $ram->speed }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="ram_size">Capacity</label>
                                <input class="form-control" type="text" name="ram_size" data="green" value="{{ $ram->size }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="ram_voltage">Voltage</label>
                                <input class="form-control" type="text" name="ram_voltage" data="green" value="{{ $ram->voltage }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="ram_timings">Timings</label>
                                <input class="form-control" type="text" name="ram_timings" data="green" value="{{$ram->timings}}">     
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-4">
                                <label for="exampleFormControlSelect1">Header Spreader</label>
                                <select class="form-control" name="ram_heat_spreader" style="background-color: #27293D">
                                    @if ($ram->heat_spreader == 0)
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    @else
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="exampleFormControlSelect1">Manufacturer</label>
                                <select class="form-control" style="background-color: #27293D" name="ram_manufacturer">
                                    @foreach ($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->id }}" @if ($ram->manufacturer_id == $manufacturer->id) selected
                                            
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
                        <input class="form-control" type="file" id="uploadImageFileAddPost" name="ram_images[]" onchange="showImageHereFuncAddPost();" multiple />
                        <label for="showImageHere" class="mr-3">Preview of Images -></label>
                        <div id="showImageHereAddPost"></div>
                    </div>
                   
                  
                   <button type="submit" class="btn btn-success">Save Changes</button>
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
