@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h2>Fans</h2>
    <a href="{{ route('fans.create', []) }}">
        <button class="btn btn-success ml-5">New Fan</button>
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
                        <th>MSPR</th>
                        <th>Manufacturer</th>
                        <th>Power Connector</th>
                        <th>RPM</th>
                        <th>Air Flow</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($fans as $fan)
                        <tr>
                            <td class="text-center">{{ $fan->id }}</td>
                            <td>{{ $fan->name }}</td>
                            <td>{{ $fan->price }}</td>
                            <td>{{ $fan->manufacturer->name }}</td>
                            <td>{{ $fan->power_connector }}</td>
                            <td>{{ $fan->speed }}</td>
                            <td>{{ $fan->air_flow }}</td>
                            
                            <td class="td-actions text-right">
                                <a href="{{ route('fans.edit', ['fan'=>$fan->id]) }}">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-settings"></i>
                                    </button>
                                 </a>
                                
                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm" data-target="#deleteModal{{ $fan->id }}" data-toggle="modal">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <x-deleteModals.fan :fan="$fan"/>
                    @endforeach
                   
                </tbody>
            </table>
            <div >
                {{ $fans->links('pagination::bootstrap-4') }}
            </div>
        </div>
       
         
    @endsection