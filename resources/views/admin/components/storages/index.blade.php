@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h2>Pohrana podataka</h2>
    <a href="{{ route('storages.create', []) }}">
        <button class="btn btn-success ml-5">Novi uređaj</button>
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
                        <th>Tip</th>
                        <th>Cache</th>
                        <th>Sučelje</th>
                        <th>Kapacitet</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($storages as $storage)
                        <tr>
                            <td class="text-center">{{ $storage->id }}</td>
                            <td>{{ $storage->name }}</td>
                            <td>{{ $storage->price }}</td>
                            <td>{{ $storage->manufacturer->name }}</td>
                            <td>{{ $storage->type }}</td>
                            <td>{{ $storage->capacity }}</td>
                            <td>{{ $storage->interface }}</td>
                            <td>{{ $storage->cache }}</td>
                            
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" class="btn btn-info btn-link btn-icon btn-sm">
                                    <i class="tim-icons icon-single-02"></i>
                                </button>
                                <a href="{{ route('storages.edit', ['storage'=>$storage->id]) }}">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-settings"></i>
                                    </button>
                                 </a>
                                
                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm" data-target="#deleteModal{{ $storage->id }}" data-toggle="modal">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <x-deleteModals.storage :storage="$storage"/>
                    @endforeach
                   
                </tbody>
            </table>
            <div >
                {{ $storages->links('pagination::bootstrap-4') }}
            </div>
        </div>
       
         
    @endsection