@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h1>Updating Fan</h1>
    <a href="{{ route('fans.index', []) }}">
        <button class="btn btn-success ml-5">Fans</button>
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
                <form method="post" action="{{ route('fans.update', []) }}" enctype="multipart/form-data">
        
                    @csrf
                    <input type="hidden" name="id" id="" value="{{ $fan->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-5">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" data="green" value="{{ $fan->name }}">
                            </div>
                            <div class="col-3">
                                <label for="diameter">Diameter</label>
                                <input class="form-control" type="text" name="diameter" data="green" value="{{ $fan->diameter }}">     
                            </div>
                        </div>
                       
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="price">MSRP</label>
                                <input class="form-control" type="text" name="price" data="green" value="{{ $fan->price }}">
                            </div>
                            <div class="col-3">
                                <label for="led">LED</label>
                                <input class="form-control" type="text" name="led" data="green" value="{{ $fan->led }}">
                            </div>
                            <div class="col-3">
                                <label for="speed">Fan Speed</label>
                                <input class="form-control" type="text" name="speed" data="green" value="{{ $fan->speed }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="noise">Noise Level</label>
                                <input class="form-control" type="text" name="noise" data="green" value="{{ $fan->noise }}">
                            </div>
                            <div class="col-3">
                                <label for="bearings">Bearings</label>
                                <input class="form-control" type="text" name="bearings" data="green" value="{{ $fan->bearings }}">
                            </div>
                            <div class="col-3">
                                <label for="power_consumption">Power Consumption (MAX)</label>
                                <input class="form-control" type="text" name="power_consumption" data="green" value="{{ $fan->power_consumption }}">
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="air_flow">Air Flow</label>
                                <input class="form-control" type="text" name="air_flow" data="green" value="{{ $fan->air_flow }}">     
                            </div>
                            <div class="col-3">
                                <label for="life">Life Span</label>
                                <input class="form-control" type="text" name="life" data="green" value="{{ $fan->life }}">     
                            </div>
                            <div class="col-3">
                                <label for="power_connector">Power Connector</label>
                                <input class="form-control" type="text" name="power_connector" data="green" value="{{ $fan->power_connector }}">     
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-4">
                                <label for="manufacturer_id">Manufacturer</label>
                                <select class="form-control" style="background-color: #27293D" name="manufacturer_id">
                                    @foreach ($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->id }}" @if ($fan->manufacturer_id == $manufacturer->id) selected
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
