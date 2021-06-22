@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h1>Nova grafička kartica</h1>
    <a href="{{ route('gpus.index', []) }}">
        <button class="btn btn-success ml-5">Grafičke kartice</button>
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
                <form method="post" action="{{ route('gpus.store', []) }}" enctype="multipart/form-data">
        
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-5">
                                <label for="name">Ime</label>
                                <input class="form-control" type="text" name="name" data="green" >
                            </div>
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="price">Cijena</label>
                                <input class="form-control" type="text" name="price" data="green" >
                            </div>
                            <div class="col-3">
                                <label for="series">Serija</label>
                                <input class="form-control" type="text" name="series" data="green" >
                            </div>
                            <div class="col-3">
                                <label for="gpu_bus">GPU bus </label>
                                <input class="form-control" type="text" name="gpu_bus" data="green" >
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="vram_type">Vrsta VRAM-a</label>
                                <input class="form-control" type="text" name="vram_type" data="green" >
                            </div>
                            <div class="col-3">
                                <label for="vram">Količina VRAM-a</label>
                                <input class="form-control" type="text" name="vram" data="green" >
                            </div>
                            <div class="col-3">
                                <label for="length">Duljina grafičke kartice</label>
                                <input class="form-control" type="text" name="length" data="green" >
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="interface">Sučelje</label>
                                <input class="form-control" type="text" name="interface" data="green" >
                            </div>
                            <div class="col-3">
                                <label for="power_req">Minimalna snaga napajanja</label>
                                <input class="form-control" type="text" name="power_req" data="green" >
                            </div>
                            <div class="col-3">
                                <label for="power_connector">Priključak napajanja</label>
                                <input class="form-control" type="text" name="power_connector" data="green" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="interface">TDP</label>
                                <input class="form-control" type="text" name="tdp" data="green" >
                            </div>
                            <div class="col-3">
                                <label for="power_req">Veličina procesa</label>
                                <input class="form-control" type="text" name="process_size" data="green" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="interface">Takt memorije</label>
                                <input class="form-control" type="text" name="memory_clock" data="green" >
                            </div>
                            <div class="col-3">
                                <label for="power_req">Standarni takt</label>
                                <input class="form-control" type="text" name="base_clock" data="green" >
                            </div>
                            <div class="col-3">
                                <label for="power_connector">Maksimalni takt</label>
                                <input class="form-control" type="text" name="boost_clock" data="green" >
                            </div>
                        </div>
                    </div>
                  
                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-4">
                                <label for="crossfire">Crossfire/SLI podrška</label>
                                <select class="form-control" name="crossfire" style="background-color: #27293D">
                                        <option value="0">Ne</option>
                                        <option value="1">Da</option>
                               </select>
                            </div>
                            <div class="col-4">
                                <label for="chipset_id">Chipset</label>
                                <select class="form-control" style="background-color: #27293D" name="chipset_id">
                                    @foreach ($chipsets as $chipset)
                                        <option value="{{ $chipset->id }}">{{ $chipset->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="manufacturer_id">Proizvođač</label>
                                <select class="form-control" style="background-color: #27293D" name="manufacturer_id">
                                    @foreach ($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class=" form-row">
                        <label for="uploadImageFile"> &nbsp; Slike: &nbsp; </label>
                        <input class="form-control" type="file" id="uploadImageFileAddPost" name="images[]" onchange="showImageHereFuncAddPost();" multiple />
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
