@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h1>Nova matična ploča</h1>
    <a href="{{ route('mobos.index', []) }}">
        <button class="btn btn-success ml-5">Matične ploče</button>
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
                <form method="post" action="{{ route('mobos.store', []) }}" enctype="multipart/form-data">
        
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
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="socket">Socket</label>
                                <input class="form-control" type="text" name="socket" data="green" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="max_memory">Maksimalan kapacitet memorije</label>
                                <input class="form-control" type="text" name="max_memory" data="green" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="memory_slots">Broj DIMM slotova</label>
                                <input class="form-control" type="text" name="memory_slots" data="green" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="form_factor">Veličina</label>
                                <input class="form-control" type="text" name="form_factor" data="green" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="pci_e_x16_slots">Broj PCI-E X16 slotova</label>
                                <input class="form-control" type="text" name="pci_e_x16_slots" data="green" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="pci_e_x8_slots">Broj PCI-E X8 slotova</label>
                                <input class="form-control" type="text" name="pci_e_x8_slots" data="green" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="pci_e_x4_slots">Broj PCI-E X4 slotova</label>
                                <input class="form-control" type="text" name="pci_e_x4_slots" data="green" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="pci_e_x1_slots">Broj PCI-E X1 slotova</label>
                                <input class="form-control" type="text" name="pci_e_x1_slots" data="green" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="memory_type">Vrsta memorije</label>
                                <input class="form-control" type="text" name="memory_type" data="green" >     
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="m_2_slots">Broj M.2 slotova</label>
                                <input class="form-control" type="text" name="m_2_slots" data="green" >     
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="sata_ports">Broj SATA portova</label>
                                <input class="form-control" type="text" name="sata_ports" data="green" >     
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="usb_2_0_headers">Broj USB 2.0 headera</label>
                                <input class="form-control" type="text" name="usb_2_0_headers" data="green" >     
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="usb_3_2_gen1_headers">Broj USB 3.0 gen 1 headera</label>
                                <input class="form-control" type="text" name="usb_3_2_gen1_headers" data="green" >     
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="usb_3_2_gen2_headers">Broj USB 3.0 gen 2 headera</label>
                                <input class="form-control" type="text" name="usb_3_2_gen2_headers" data="green" >     
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-4">
                                <label for="wireless_support">Podrška za bežičnu vezu</label>
                                <select class="form-control" name="wireless_support" style="background-color: #27293D">
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
