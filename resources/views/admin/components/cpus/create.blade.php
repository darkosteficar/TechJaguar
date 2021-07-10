@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h1>New Processor</h1>
    <a href="{{ route('cpus.index', []) }}">
        <button class="btn btn-success ml-5">Processors</button>
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
                <form method="post" action="{{ route('cpus.store', []) }}" enctype="multipart/form-data">
        
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-5">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" data="green" >
                            </div>
                            <div class="col-3">
                                <label for="core_family">Core Family</label>
                                <input class="form-control" type="text" name="core_family" data="green" >
                            </div>
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="price">MSRP</label>
                                <input class="form-control" type="text" name="price" data="green" >
                            </div>
                            <div class="col-3">
                                <label for="socket">Socket</label>
                                <input class="form-control" type="text" name="socket" data="green" >
                            </div>
                            <div class="col-3">
                                <label for="base_clock">Base Clock</label>
                                <input class="form-control" type="text" name="base_clock" data="green" >
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="boost_clock">Boost Clock</label>
                                <input class="form-control" type="text" name="boost_clock" data="green" >
                            </div>
                            <div class="col-3">
                                <label for="tdp">TDP</label>
                                <input class="form-control" type="text" name="tdp" data="green" >
                            </div>
                            <div class="col-3">
                                <label for="microarchitecture">Microarchitecture</label>
                                <input class="form-control" type="text" name="microarchitecture" data="green" >
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="core_count">Core Count</label>
                                <input class="form-control" type="text" name="core_count" data="green" >     
                            </div>
                            <div class="col-3">
                                <label for="litography">Litography</label>
                                <input class="form-control" type="text" name="litography" data="green" >     
                            </div>
                            <div class="col-3">
                                <label for="series">Series</label>
                                <input class="form-control" type="text" name="series" data="green" >     
                            </div>
                        </div>
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
                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-4">
                                <label for="smt">SMT</label>
                                <select class="form-control" name="smt" style="background-color: #27293D">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                               </select>
                            </div>
                            <div class="col-4">
                                <label for="integrated_graphics">Integrated Graphics</label>
                                <select class="form-control" name="integrated_graphics" style="background-color: #27293D">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                               </select>
                            </div>
                            <div class="col-4">
                                <label for="manufacturer_id">Manufacturer</label>
                                <select class="form-control" style="background-color: #27293D" name="manufacturer_id">
                                    @foreach ($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
