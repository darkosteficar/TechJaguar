@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h1>Nova radna memorija</h1>
    <a href="{{ route('rams.index', []) }}">
        <button class="btn btn-success ml-5">Radne memorije</button>
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
                <form method="post" action="{{ route('rams.store', []) }}" enctype="multipart/form-data">
        
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-5">
                                <label for="ram_name">Ime</label>
                                <input class="form-control" type="text" name="ram_name" data="green" value="{{ old('ram_name') }}">
                            </div>
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="ram_price">Cijena</label>
                                <input class="form-control" type="text" name="ram_price" data="green" value="{{ old('ram_price') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="ram_type">Tip memorije</label>
                                <input class="form-control" type="text" name="ram_type" data="green" value="{{ old('ram_type') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="ram_speed">Brzina memorije</label>
                                <input class="form-control" type="text" name="ram_speed" data="green" value="{{ old('ram_speed') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="ram_size">Kapacitet memorije</label>
                                <input class="form-control" type="text" name="ram_size" data="green" value="{{ old('ram_size') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="ram_voltage">Radni napon</label>
                                <input class="form-control" type="text" name="ram_voltage" data="green" value="{{ old('ram_voltage') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="ram_timings">Vremenena</label>
                                <input class="form-control" type="text" name="ram_timings" data="green" value="{{ old('ram_timings') }}">     
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-4">
                                <label for="exampleFormControlSelect1">Hlađenje</label>
                                <select class="form-control" name="ram_heat_spreader" style="background-color: #27293D">
                                    <option value="0">Ne</option>
                                    <option value="1">Da</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="exampleFormControlSelect1">Proizvođač</label>
                                <select class="form-control" style="background-color: #27293D" name="ram_manufacturer">
                                    @foreach ($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class=" form-row">
                        <label for="uploadImageFile"> &nbsp; Slike: &nbsp; </label>
                        <input class="form-control" type="file" id="uploadImageFileAddPost" name="ram_images[]" onchange="showImageHereFuncAddPost();" multiple />
                        <label for="showImageHere" class="mr-3">Preview slika -></label>
                        <div class="valid-feedback">
                            Super!
                        </div>
                        <div class="invalid-feedback">
                            Slika je obavezna.
                        </div>
                        <div id="showImageHereAddPost"></div>
                    </div>
                    
                  
                   <button type="submit" class="btn btn-success">Kreiraj</button>
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
