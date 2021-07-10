@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h2>Coolers</h2>
    <a href="{{ route('coolers.create', []) }}">
        <button class="btn btn-success ml-5">New Cooler</button>
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
                        <th>Water Cooling</th>
                        <th>Noise Level</th>
                        <th>Max TDP</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($coolers as $cooler)
                        <tr>
                            <td class="text-center">{{ $cooler->id }}</td>
                            <td>{{ $cooler->name }}</td>
                            <td>{{ $cooler->price }} kn</td>
                            <td>{{ $cooler->manufacturer->name }}</td>
                            <td> @if ($cooler->water_cooled == 1)Yes @else No @endif</td>
                            <td>{{ $cooler->noise_level }} db</td>
                            <td>{{ $cooler->max_power }} W</td>
                            
                            <td class="td-actions text-right">
                               
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