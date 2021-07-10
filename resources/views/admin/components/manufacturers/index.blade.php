@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h2>Manufacturers</h2>
    <a href="{{ route('manufacturers.create', []) }}">
        <button class="btn btn-success ml-5">New Manufacturer</button>
    </a>
</div>

        @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
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
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($manufacturers as $manufacturer)
                        <tr>
                            <td class="text-center">{{ $manufacturer->id }}</td>
                            <td>{{ $manufacturer->name }}</td>
                            
                            <td class="td-actions text-right">
                                <a href="{{ route('manufacturers.edit', ['manufacturer'=>$manufacturer->id]) }}">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-settings"></i>
                                    </button>
                                 </a>
                                
                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm" data-target="#deleteModal{{ $manufacturer->id }}" data-toggle="modal">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <x-deleteModals.manufacturer :manufacturer="$manufacturer"/>
                    @endforeach
                   
                </tbody>
            </table>
            <div >
                {{ $manufacturers->links('pagination::bootstrap-4') }}
            </div>
        </div>
       
         
    @endsection