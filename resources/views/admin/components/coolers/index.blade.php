@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h2>Hladnjaci procesora</h2>
    <a href="{{ route('coolers.create', []) }}">
        <button class="btn btn-success ml-5">Novi hladnjak procesora</button>
    </a>
</div>
     
        @if (Session::has('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
        @elseif(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
            @if (session('title'))
               <strong> {{ session('title') }} </strong>
            @endif
        </div>
        
        @endif
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Ime</th>
                        <th>Cijena</th>
                        <th>Proizvođač</th>
                        <th>Vodeno hlađenje</th>
                        <th>Razina buke</th>
                        <th>Potrošnja</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($coolers as $cooler)
                        <tr>
                            <td class="text-center">{{ $cooler->id }}</td>
                            <td>{{ $cooler->name }}</td>
                            <td>{{ $cooler->price }}</td>
                            <td>{{ $cooler->manufacturer->name }}</td>
                            <td>{{ $cooler->water_cooled }}</td>
                            <td>{{ $cooler->noise_level }}</td>
                            <td>{{ $cooler->max_power }}</td>
                            
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" class="btn btn-info btn-link btn-icon btn-sm">
                                    <i class="tim-icons icon-single-02"></i>
                                </button>
                                <a href="{{ route('coolers.edit', ['cooler'=>$cooler->id]) }}">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-settings"></i>
                                    </button>
                                 </a>
                                
                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm" data-target="#deleteModal{{ $cooler->id }}" data-toggle="modal">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <x-deleteModals.cooler :cooler="$cooler"/>
                    @endforeach
                   
                </tbody>
            </table>
            <div >
                {{ $coolers->links('pagination::bootstrap-4') }}
            </div>
        </div>
       
         
    @endsection