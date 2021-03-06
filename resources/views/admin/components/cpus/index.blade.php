@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h2>Processor</h2>
    <a href="{{ route('cpus.create', []) }}">
        <button class="btn btn-success ml-5">New Processor</button>
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
                        <th>Litography</th>
                        <th>Socket</th>
                        <th>Core Family</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($cpus as $cpu)
                        <tr>
                            <td class="text-center">{{ $cpu->id }}</td>
                            <td>{{ $cpu->name }}</td>
                            <td>{{ $cpu->price }}</td>
                            <td>{{ $cpu->manufacturer->name }}</td>
                            <td>{{ $cpu->litography }}</td>
                            <td>{{ $cpu->socket }}</td>
                            <td>{{ $cpu->core_family }}</td>
                            
                            <td class="td-actions text-right">
                                <a href="{{ route('cpus.edit', ['cpu'=>$cpu->id]) }}">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-settings"></i>
                                    </button>
                                 </a>
                                
                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm" data-target="#deleteModal{{ $cpu->id }}" data-toggle="modal">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <x-deleteModals.cpu :cpu="$cpu"/>
                    @endforeach
                   
                </tbody>
            </table>
            <div >
                {{ $cpus->links('pagination::bootstrap-4') }}
            </div>
        </div>
       
         
    @endsection