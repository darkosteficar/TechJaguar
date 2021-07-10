@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h1>Updating Motherboard</h1>
    <a href="{{ route('mobos.index', []) }}">
        <button class="btn btn-success ml-5">Motherboards</button>
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
                <form method="post" action="{{ route('mobos.update', []) }}" enctype="multipart/form-data">
        
                    @csrf
                    <input type="hidden" value="{{ $mobo->id }}" name="id">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-5">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" data="green" value="{{ $mobo->name }}">
                            </div>
                            <div class="col-4">
                                <label for="price">MSRP</label>
                                <input class="form-control" type="text" name="price" data="green" value="{{ $mobo->price }}">
                            </div>
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="socket">Socket</label>
                                <input class="form-control" type="text" name="socket" data="green" value="{{ $mobo->socket }}">
                            </div>
                            <div class="col-3">
                                <label for="max_memory">Max Memory</label>
                                <input class="form-control" type="text" name="max_memory" data="green" value="{{ $mobo->max_memory }}">
                            </div>
                            <div class="col-3">
                                <label for="memory_slots"> DIMM Slots</label>
                                <input class="form-control" type="text" name="memory_slots" data="green" value="{{ $mobo->memory_slots }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="form_factor">Form Factor</label>
                                <input class="form-control" type="text" name="form_factor" data="green" value="{{ $mobo->form_factor }}">
                            </div>
                            <div class="col-3">
                                <label for="pci_e_x16_slots"> PCI-E X16 Slots</label>
                                <input class="form-control" type="text" name="pci_e_x16_slots" data="green" value="{{ $mobo->pci_e_x16_slots }}">
                            </div>
                            <div class="col-3">
                                <label for="pci_e_x8_slots"> PCI-E X8 Slots</label>
                                <input class="form-control" type="text" name="pci_e_x8_slots" data="green" value="{{ $mobo->pci_e_x8_slots }}">
                            </div>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="pci_e_x4_slots"> PCI-E X4 Slots</label>
                                <input class="form-control" type="text" name="pci_e_x4_slots" data="green" value="{{ $mobo->pci_e_x4_slots }}">
                            </div>
                            <div class="col-3">
                                <label for="pci_e_x1_slots"> PCI-E X1 Slots</label>
                                <input class="form-control" type="text" name="pci_e_x1_slots" data="green" value="{{ $mobo->pci_e_x1_slots }}">
                            </div>
                            <div class="col-3">
                                <label for="memory_type">Memory Type</label>
                                <input class="form-control" type="text" name="memory_type" data="green" value="{{ $mobo->memory_type }}">     
                            </div>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="m_2_slots"> M.2 Slots</label>
                                <input class="form-control" type="text" name="m_2_slots" data="green" value="{{ $mobo->m_2_slots }}">     
                            </div>
                            <div class="col-3">
                                <label for="sata_ports"> SATA Ports</label>
                                <input class="form-control" type="text" name="sata_ports" data="green" value="{{ $mobo->m_2_slots }}">     
                            </div>
                            <div class="col-3">
                                <label for="usb_2_0_headers"> USB 2.0 Headers</label>
                                <input class="form-control" type="text" name="usb_2_0_headers" data="green" value="{{ $mobo->usb_2_0_headers }}">     
                            </div>
                            
                        </div>
                    </div>
                 
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="usb_3_2_gen2_headers"> USB 3.0 Gen 2 Headers</label>
                                <input class="form-control" type="text" name="usb_3_2_gen2_headers" data="green" value="{{ $mobo->usb_3_2_gen2_headers }}">     
                            </div>
                            <div class="col-3">
                                <label for="usb_3_2_gen1_headers"> USB 3.0 Gen 1 Headers</label>
                                <input class="form-control" type="text" name="usb_3_2_gen1_headers" data="green" value="{{ $mobo->usb_3_2_gen1_headers }}">     
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-4">
                                <label for="wireless_support">Wireless Support</label>
                                <select class="form-control" name="wireless_support" style="background-color: #27293D">
                                    @if ($mobo->wireless_support == 0)
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
                                    <option value="{{ $chipset->id }}" @if ($mobo->chipset_id == $chipset->id) selected
                                        
                                    @endif>{{ $chipset->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="manufacturer_id">Manufacturer</label>
                                <select class="form-control" style="background-color: #27293D" name="manufacturer_id">
                                    @foreach ($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->id }}" @if ($mobo->manufacturer_id == $manufacturer->id) selected
                                            
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
