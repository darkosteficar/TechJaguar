@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h1>Updating Power Supply</h1>
    <a href="{{ route('psus.index', []) }}">
        <button class="btn btn-success ml-5">Power Supplies</button>
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
                <form method="post" action="{{ route('psus.update', []) }}" enctype="multipart/form-data">
        
                    @csrf
                    <input type="hidden" name="id" id="" value="{{ $psu->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-5">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" data="green" value="{{  $psu->name }}">
                            </div>
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="price">MSRP</label>
                                <input class="form-control" type="text" name="price" data="green" value="{{  $psu->price }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="efficiency_rating">Efficiency Rating</label>
                                <input class="form-control" type="text" name="efficiency_rating" data="green" value="{{  $psu->efficiency_rating }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="type">Type</label>
                                <input class="form-control" type="text" name="type" data="green" value="{{  $psu->type }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="modular">Modular</label>
                                <input class="form-control" type="text" name="modular" data="green" value="{{  $psu->modular }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="wattage">Wattage</label>
                                <input class="form-control" type="text" name="wattage" data="green" value="{{  $psu->wattage }}">     
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="length">Length</label>
                                <input class="form-control" type="text" name="length" data="green" value="{{  $psu->length }}">     
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="molex_4pin_connectors"> MOLEX 4-pin Connectors</label>
                                <input class="form-control" type="text" name="molex_4pin_connectors" data="green" value="{{  $psu->molex_4pin_connectors }}">     
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="sata_connectors"> SATA Connectors</label>
                                <input class="form-control" type="text" name="sata_connectors" data="green" value="{{  $psu->sata_connectors }}">     
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="pcie_6_2_pin_connectors"> PCIE 6+2-pin Connectors</label>
                                <input class="form-control" type="text" name="pcie_6_2_pin_connectors" data="green" value="{{  $psu->pcie_6_2_pin_connectors }}">     
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="row">
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
