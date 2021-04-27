@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h2>Kućišta</h2>
    <a href="{{ route('cases.create', []) }}">
        <button class="btn btn-success ml-5">Novo kućište</button>
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
                        <th>Tip</th>
                        <th>Broj slotova za proširenje</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($cases as $case)
                        <tr>
                            <td class="text-center">{{ $case->id }}</td>
                            <td>{{ $case->name }}</td>
                            <td>{{ $case->price }}</td>
                            <td>{{ $case->manufacturer->name }}</td>
                            <td>{{ $case->length }}</td>
                            <td>{{ $case->type }}</td>
                            <td>{{ $case->expansion_slots }}</td>
                            
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" class="btn btn-info btn-link btn-icon btn-sm">
                                    <i class="tim-icons icon-single-02"></i>
                                </button>
                                <a href="{{ route('cases.edit', ['case'=>$case->id]) }}">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-settings"></i>
                                    </button>
                                 </a>
                                
                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm" data-target="#deleteModal{{ $case->id }}" data-toggle="modal">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <x-deleteModals.case :case="$case"/>
                    @endforeach
                   
                </tbody>
            </table>
            <div >
                {{ $cases->links('pagination::bootstrap-4') }}
            </div>
        </div>
       
         
    @endsection