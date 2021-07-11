@extends('admin.layouts.app')

@section('content')
<div>
   
    
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm">
            <h2>Components</h2>
            <div class="container">
                <div class="row ">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h3 class="my-auto mr-4">Processors</h3>
                        <a href="{{ route('cpus.index', []) }}">
                            <button class="btn btn-success btn-small">Overview</button>
                        </a>
                        
                    </div>
                </div>
                <hr>
                <div class="row ">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h3 class="my-auto mr-4">Graphics Cards</h3>
                        <a href="{{ route('gpus.index', []) }}">
                            <button class="btn btn-success btn-small">Overview</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row ">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h3 class="my-auto mr-4">RAMs</h3>
                        <a href="{{ route('rams.index', []) }}">
                            <button class="btn btn-success btn-small">Overview</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row ">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h3 class="my-auto mr-4">Storage Devices</h3>
                        <a href="{{ route('storages.index', []) }}">
                            <button class="btn btn-success btn-small">Overview</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h3 class="my-auto mr-4">Motherboards</h3>
                        <a href="{{ route('mobos.index', []) }}">
                            <button class="btn btn-success btn-small">Overview</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h3 class="my-auto mr-4">Cases</h3>
                        <a href="{{ route('cases.index', []) }}">
                            <button class="btn btn-success btn-small">Overview</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h3 class="my-auto mr-4">Power Supplies</h3>
                        <a href="{{ route('psus.index', []) }}">
                            <button class="btn btn-success btn-small">Overview</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h3 class="my-auto mr-4">Coolers</h3>
                        <a href="{{ route('coolers.index', []) }}">
                            <button class="btn btn-success btn-small">Overview</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h3 class="my-auto mr-4">Fans</h3>
                        <a href="{{ route('fans.index', []) }}">
                            <button class="btn btn-success btn-small">Overview</button>
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
                        <h4 class="my-auto mr-4">Manufacturers</h4>
                        <a href="{{ route('manufacturers.index', []) }}">
                            <button class="btn btn-success btn-small">Overview</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row ">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h4 class="my-auto mr-4">Categories</h4>
                        <a href="{{ route('categories.index', []) }}">
                            <button class="btn btn-success btn-small">Overview</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row ">
                    <div class="d-flex flex-row align-items-center justify-content-between w-50">
                        <h4 class="my-auto mr-4">Chipsets</h4>
                        <a href="{{ route('chipsets.index', []) }}">
                            <button class="btn btn-success btn-small">Overview</button>
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

