@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h1>New Case</h1>
    <a href="{{ route('cases.index', []) }}">
        <button class="btn btn-success ml-5">Cases</button>
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
                <form method="post" action="{{ route('cases.store', []) }}" enctype="multipart/form-data">
        
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-5">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" data="green" >
                            </div>
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="price">MSRP</label>
                                <input class="form-control" type="text" name="price" data="green" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="length">Length</label>
                                <input class="form-control" type="text" name="length" data="green" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="height">Height</label>
                                <input class="form-control" type="text" name="height" data="green" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="width">Width</label>
                                <input class="form-control" type="text" name="width" data="green" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="type">Type</label>
                                <input class="form-control" type="text" name="type" data="green" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="num_2_5_bays">Number of 2,5" bays</label>
                                <input class="form-control" type="text" name="num_2_5_bays" data="green" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="num_3_5_bays">Number of 3,5" bays</label>
                                <input class="form-control" type="text" name="num_3_5_bays" data="green" >     
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="max_gpu_length">Max GPU length</label>
                                <input class="form-control" type="text" name="max_gpu_length" data="green" >     
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="expansion_slots">Expansion Slots</label>
                                <input class="form-control" type="text" name="expansion_slots" data="green" >     
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="front_panel_usb">Front Panel USB Headers Count</label>
                                <input class="form-control" type="text" name="front_panel_usb" data="green" >     
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="motherboard_form_factor">Supported Mobo Form Factor</label>
                                <input class="form-control" type="text" name="motherboard_form_factor" data="green" >     
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-4">
                                <label for="side_panel_glass">Glass Side Panel</label>
                                <select class="form-control" name="side_panel_glass" style="background-color: #27293D">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                               </select>
                            </div>
                            <div class="col-4">
                                <label for="power_supply_shroud">Power Supply Shroud</label>
                                <select class="form-control" name="power_supply_shroud" style="background-color: #27293D">
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
