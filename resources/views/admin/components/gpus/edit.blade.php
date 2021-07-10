@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h1>Updating the GPU</h1>
    <a href="{{ route('gpus.index', []) }}">
        <button class="btn btn-success ml-5">Graphics Cards</button>
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
                <form method="post" action="{{ route('gpus.update', []) }}" enctype="multipart/form-data">
        
                    @csrf
                    <input type="hidden" value="{{ $gpu->id }}" name="id">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-5">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" data="green" value="{{ $gpu->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="series">Series</label>
                                <input class="form-control" type="text" name="series" data="green" value="{{ $gpu->series }}">
                            </div>
                            <div class="col-3">
                                <label for="gpu_bus">GPU Bus </label>
                                <input class="form-control" type="text" name="gpu_bus" data="green" value="{{ $gpu->gpu_bus }}">
                            </div>
                            <div class="col-3">
                                <label for="price">MSRP</label>
                                <input class="form-control" type="text" name="price" data="green" value="{{ $gpu->price }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="length">Length</label>
                                <input class="form-control" type="text" name="length" data="green" value="{{ $gpu->length }}">
                            </div>
                            <div class="col-3">
                                <label for="vram">VRAM Type</label>
                                <input class="form-control" type="text" name="vram" data="green" value="{{ $gpu->vram }}">
                            </div>
                            <div class="col-3">
                                <label for="vram_type">Vrsta VRAM-a</label>
                                <input class="form-control" type="text" name="vram_type" data="green" value="{{ $gpu->vram_type }}">
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="power_req">Power Requirement</label>
                                <input class="form-control" type="text" name="power_req" data="green" value="{{ $gpu->power_req }}">
                            </div>
                            <div class="col-3">
                                <label for="power_connector">Power Connector</label>
                                <input class="form-control" type="text" name="power_connector" data="green" value="{{ $gpu->power_connector }}">
                            </div>
                            <div class="col-3">
                                <label for="interface">Interface</label>
                                <input class="form-control" type="text" name="interface" data="green" value="{{ $gpu->interface }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="interface">TDP</label>
                                <input class="form-control" type="text" name="tdp" data="green" value="{{ $gpu->tdp }}">
                            </div>
                            <div class="col-3">
                                <label for="power_req">Process Node</label>
                                <input class="form-control" type="text" name="process_size" data="green" value="{{ $gpu->process_size }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="interface">Memory Clock</label>
                                <input class="form-control" type="text" name="memory_clock" data="green" value="{{ $gpu->memory_clock }}">
                            </div>
                            <div class="col-3">
                                <label for="power_req">Base Clock</label>
                                <input class="form-control" type="text" name="base_clock" data="green" value="{{ $gpu->base_clock }}">
                            </div>
                            <div class="col-3">
                                <label for="power_connector">Boost Clock</label>
                                <input class="form-control" type="text" name="boost_clock" data="green" value="{{ $gpu->boost_clock }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-4">
                                <label for="crossfire">Crossfire/SLI Support</label>
                                <select class="form-control" name="crossfire" style="background-color: #27293D">
                                    @if ($gpu->crossfire == 0)
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    @else
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    @endif
                               </select>
                            </div>
                            <div class="col-4">
                                <label for="chipset_id">Chipset</label>
                                <select class="form-control" style="background-color: #27293D" name="chipset_id">
                                    @foreach ($chipsets as $chipset)
                                        <option value="{{ $chipset->id }}" @if ($gpu->chipset_id == $chipset->id) selected
                                        @endif>{{ $chipset->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="manufacturer_id">Manufacturer</label>
                                <select class="form-control" style="background-color: #27293D" name="manufacturer_id">
                                    @foreach ($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->id }}" @if ($gpu->manufacturer_id == $manufacturer->id) selected
                                        @endif>{{ $manufacturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
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
