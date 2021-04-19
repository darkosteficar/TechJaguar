@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h2>CHIPSETOVI</h2>
    <a href="{{ route('chipsets.create', []) }}">
        <button class="btn btn-success ml-5">Novi chipset</button>
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
                        <th>Opis</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($chipsets as $chipset)
                        <tr>
                            <td class="text-center">{{ $chipset->id }}</td>
                            <td>{{ $chipset->name }}</td>
                            <td>{{ Str::limit($chipset->description,50)  }}</td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" class="btn btn-info btn-link btn-icon btn-sm">
                                    <i class="tim-icons icon-single-02"></i>
                                </button>
                                <a href="{{ route('chipsets.edit', ['chipset'=>$chipset->id]) }}">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-settings"></i>
                                    </button>
                                 </a>
                                
                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm" data-target="#deleteModal{{ $chipset->id }}" data-toggle="modal">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <x-deleteModals.chipset :chipset="$chipset"/>
                    @endforeach
                   
                </tbody>
            </table>
            <div >
                {{ $chipsets->links('pagination::bootstrap-4') }}
            </div>
        </div>
       
         
    @endsection