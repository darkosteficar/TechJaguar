@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h2>Categories</h2>
    <a href="{{ route('categories.create', []) }}">
        <button class="btn btn-success ml-5">New Category</button>
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
    
                    @foreach ($categories as $category)
                        <tr>
                            <td class="text-center">{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            
                            <td class="td-actions text-right">
                                <a href="{{ route('categories.edit', ['category'=>$category->id]) }}">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-settings"></i>
                                    </button>
                                 </a>
                                
                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm" data-target="#deleteModal{{ $category->id }}" data-toggle="modal">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <x-deleteModals.category :category="$category"/>
                    @endforeach
                   
                </tbody>
            </table>
            <div >
                {{ $categories->links('pagination::bootstrap-4') }}
            </div>
        </div>
       
         
    @endsection