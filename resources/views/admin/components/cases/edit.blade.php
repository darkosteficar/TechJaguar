@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h1>Promjena kućišta</h1>
    <a href="{{ route('cases.index', []) }}">
        <button class="btn btn-success ml-5">Kućišta</button>
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
                <form method="post" action="{{ route('cases.update', []) }}" enctype="multipart/form-data">
        
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-5">
                                <label for="name">Ime</label>
                                <input class="form-control" type="text" name="name" data="green" value="{{ $case->name }}">
                            </div>
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="price">Cijena</label>
                                <input class="form-control" type="text" name="price" data="green" value="{{ $case->price }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="length">Dužina</label>
                                <input class="form-control" type="text" name="length" data="green" value="{{ $case->length }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="height">Visina</label>
                                <input class="form-control" type="text" name="height" data="green" value="{{ $case->height }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="width">Širina</label>
                                <input class="form-control" type="text" name="width" data="green" value="{{ $case->width }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="type">Tip</label>
                                <input class="form-control" type="text" name="type" data="green" value="{{ $case->type }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="2_5_bays">Broj 2.5 inčnih postolja</label>
                                <input class="form-control" type="text" name="2_5_bays" data="green" value="{{ $case->2_5_bays }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="3_5_bays">Broj 3.5 inčnih postolja</label>
                                <input class="form-control" type="text" name="3_5_bays" data="green" value="{{ $case->3_5_bays }}">     
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="max_gpu_length">Maksimalna duljina grafičke kartice</label>
                                <input class="form-control" type="text" name="max_gpu_length" data="green" value="{{ $case->max_gpu_length }}">     
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="expansion_slots">Broj ekspanzijskih slotova</label>
                                <input class="form-control" type="text" name="expansion_slots" data="green" value="{{ $case->expansion_slots }}">     
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="front_panel_usb">Broj USB portova na prednjem panelu</label>
                                <input class="form-control" type="text" name="front_panel_usb" data="green" value="{{ $case->front_panel_usb }}">     
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="motherboard_form_factor">Podržane veličine matičnih ploča</label>
                                <input class="form-control" type="text" name="motherboard_form_factor" data="green" value="{{ $case->motherboard_form_factor }}">     
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-4">
                                <label for="side_panel_glass">Stakleni lijevi panel</label>
                                <select class="form-control" name="side_panel_glass" style="background-color: #27293D">
                                        <option value="0">Ne</option>
                                        <option value="1">Da</option>
                               </select>
                            </div>
                            <div class="col-4">
                                <label for="power_supply_shroud">Kavez za napajanje</label>
                                <select class="form-control" name="power_supply_shroud" style="background-color: #27293D">
                                        <option value="0">Ne</option>
                                        <option value="1">Da</option>
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
                    <label for="">Trenutne slike</label>
                    <div class="form-row mb-3">
                        @foreach ($images as $image)
                            <img src=" {{ asset('images/'.$image->path) }}" alt="" width="200">
                        @endforeach
                       
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
