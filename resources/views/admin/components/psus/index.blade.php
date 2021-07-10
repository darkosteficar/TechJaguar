@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h2>Power Supplies</h2>
    <a href="{{ route('psus.create', []) }}">
        <button class="btn btn-success ml-5">New Power Supply</button>
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
                        <th>Wattage</th>
                        <th>Type</th>
                        <th>Efficiency</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($psus as $psu)
                        <tr>
                            <td class="text-center">{{ $psu->id }}</td>
                            <td>{{ $psu->name }}</td>
                            <td>{{ $psu->price }} kn</td>
                            <td>{{ $psu->manufacturer->name }}</td>
                            <td>{{ $psu->wattage }} W</td>
                            <td>{{ $psu->type }}</td>
                            <td>{{ $psu->efficiency_rating }}</td>
                            
                            <td class="td-actions text-right">
                                <a href="{{ route('psus.edit', ['psu'=>$psu->id]) }}">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-settings"></i>
                                    </button>
                                 </a>
                                
                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm" data-target="#deleteModal{{ $psu->id }}" data-toggle="modal">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <x-deleteModals.psu :psu="$psu"/>
                    @endforeach
                   
                </tbody>
            </table>
            <div >
                {{ $psus->links('pagination::bootstrap-4') }}
            </div>
        </div>
       
         
    @endsection