@extends('admin.layouts.app')

@section('content')
<div>
   
    
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm">
            <h2>Komponente</h2>
            <div class="container">
                <div class="row ">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h3 class="my-auto mr-4">Procesori</h3>
                        <a href="{{ route('cpus.index', []) }}">
                            <button class="btn btn-success btn-small">Pregled</button>
                        </a>
                        
                    </div>
                </div>
                <hr>
                <div class="row ">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h3 class="my-auto mr-4">Grafičke kartice</h3>
                        <a href="{{ route('gpus.index', []) }}">
                            <button class="btn btn-success btn-small">Pregled</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row ">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h3 class="my-auto mr-4">Radne memorije</h3>
                        <a href="{{ route('rams.index', []) }}">
                            <button class="btn btn-success btn-small">Pregled</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row ">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h3 class="my-auto mr-4">Pohrana podataka</h3>
                        <a href="{{ route('storages.index', []) }}">
                            <button class="btn btn-success btn-small">Pregled</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h3 class="my-auto mr-4">Matične ploče</h3>
                        <a href="{{ route('mobos.index', []) }}">
                            <button class="btn btn-success btn-small">Pregled</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h3 class="my-auto mr-4">Kućišta</h3>
                        <a href="{{ route('cases.index', []) }}">
                            <button class="btn btn-success btn-small">Pregled</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h3 class="my-auto mr-4">Napajanja</h3>
                        <a href="{{ route('psus.index', []) }}">
                            <button class="btn btn-success btn-small">Pregled</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h3 class="my-auto mr-4">Hlađenje</h3>
                        <a href="{{ route('coolers.index', []) }}">
                            <button class="btn btn-success btn-small">Pregled</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h3 class="my-auto mr-4">Ventilatori</h3>
                        <a href="{{ route('fans.index', []) }}">
                            <button class="btn btn-success btn-small">Pregled</button>
                        </a>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-sm">
            <h2>Ostalo</h2>
            <div class="container">
                <div class="row ">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h4 class="my-auto mr-4">Proizvođači</h4>
                        <a href="{{ route('manufacturers.index', []) }}">
                            <button class="btn btn-success btn-small">Pregled</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row ">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h4 class="my-auto mr-4">Kategorije</h4>
                        <a href="{{ route('categories.index', []) }}">
                            <button class="btn btn-success btn-small">Pregled</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row ">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h4 class="my-auto mr-4">Chipsetovi</h4>
                        <a href="{{ route('chipsets.index', []) }}">
                            <button class="btn btn-success btn-small">Pregled</button>
                        </a>
                        
                    </div>
                </div>
                <hr>
                
            </div>
          </div>
          
        </div>
      </div>

</div>
@endsection

