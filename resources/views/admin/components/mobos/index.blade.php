@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h2>Motherboards</h2>
    <a href="{{ route('mobos.create', []) }}">
        <button class="btn btn-success ml-5">New Motherboard</button>
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
                        <th>Name</th>
                        <th>MSRP</th>
                        <th>Manufacturer</th>
                        <th>Form Factor</th>
                        <th>Socket</th>
                        <th>Chipset</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($mobos as $mobo)
                        <tr>
                            <td class="text-center">{{ $mobo->id }}</td>
                            <td>{{ $mobo->name }}</td>
                            <td>{{ $mobo->price }}</td>
                            <td>{{ $mobo->manufacturer->name }}</td>
                            <td>{{ $mobo->form_factor }}</td>
                            <td>{{ $mobo->socket }}</td>
                            <td>{{ $mobo->chipset->name }}</td>
                            
                            <td class="td-actions text-right">
                                <a href="{{ route('mobos.edit', ['mobo'=>$mobo->id]) }}">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-settings"></i>
                                    </button>
                                 </a>
                                
                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm" data-target="#deleteModal{{ $mobo->id }}" data-toggle="modal">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <x-deleteModals.mobo :mobo="$mobo"/>
                    @endforeach
                   
                </tbody>
            </table>
            <div >
                {{ $mobos->links('pagination::bootstrap-4') }}
            </div>
        </div>
       
         
    @endsection