@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h2>Grafičke kartice</h2>
    <a href="{{ route('gpus.create', []) }}">
        <button class="btn btn-success ml-5">Nova grafička kartica</button>
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
                        <th>Dužina</th>
                        <th>Serija</th>
                        <th>Chipset</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($gpus as $gpu)
                        <tr>
                            <td class="text-center">{{ $gpu->id }}</td>
                            <td>{{ $gpu->name }}</td>
                            <td>{{ $gpu->price }} kn</td>
                            <td>{{ $gpu->manufacturer->name }}</td>
                            <td>{{ $gpu->length }} mm</td>
                            <td>{{ $gpu->series }}</td>
                            <td>{{ $gpu->chipset->name }}</td>
                            
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" class="btn btn-info btn-link btn-icon btn-sm">
                                    <i class="tim-icons icon-single-02"></i>
                                </button>
                                <a href="{{ route('gpus.edit', ['gpu'=>$gpu->id]) }}">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-settings"></i>
                                    </button>
                                 </a>
                                
                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm" data-target="#deleteModal{{ $gpu->id }}" data-toggle="modal">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <x-deleteModals.gpu :gpu="$gpu"/>
                    @endforeach
                   
                </tbody>
            </table>
            <div >
                {{ $gpus->links('pagination::bootstrap-4') }}
            </div>
        </div>
       
         
    @endsection