@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h2>Radne memorije</h2>
    <a href="{{ route('rams.create', []) }}">
        <button class="btn btn-success ml-5">Nova radna memorija</button>
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
                        <th>Brzina</th>
                        <th>Kapacitet</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($rams as $ram)
                        <tr>
                            <td class="text-center">{{ $ram->id }}</td>
                            <td>{{ $ram->name }}</td>
                            <td>{{ $ram->price }}</td>
                            <td>{{ $ram->manufacturer->name }}</td>
                            <td>{{ $ram->type }}</td>
                            <td>{{ $ram->speed }}</td>
                            <td>{{ $ram->size }}</td>
                            
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" class="btn btn-info btn-link btn-icon btn-sm">
                                    <i class="tim-icons icon-single-02"></i>
                                </button>
                                <a href="{{ route('chipsets.edit', ['chipset'=>$ram->id]) }}">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-settings"></i>
                                    </button>
                                 </a>
                                
                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm" data-target="#deleteModal{{ $ram->id }}" data-toggle="modal">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <x-deleteModals.ram :ram="$ram"/>
                    @endforeach
                   
                </tbody>
            </table>
            <div >
                {{ $rams->links('pagination::bootstrap-4') }}
            </div>
        </div>
       
         
    @endsection