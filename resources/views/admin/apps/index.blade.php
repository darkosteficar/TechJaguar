@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h2>REZULTATI</h2>
    <a href="{{ route('apps.create', []) }}">
        <button class="btn btn-success ml-5">Nova aplikacija</button>
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
                        <th>Aplikacija</th>
                        <th>Rezolucija</th>
                        <th>Tag</th>
                        <th>Tip</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($apps as $app)
                        <tr>
                            <td class="text-center">{{ $app->id }}</td>
                            <td>{{ $app->name }}</td>
                            <td>{{ $app->resolution}}</td>
                            <td>{{ $app->tag }}</td>
                            <td>{{ $app->type }}</td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" class="btn btn-info btn-link btn-icon btn-sm">
                                    <i class="tim-icons icon-single-02"></i>
                                </button>
                                <a href="{{ route('apps.edit', ['app'=>$app->id]) }}">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-settings"></i>
                                    </button>
                                 </a>
                                
                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm" data-target="#deleteModal{{ $app->id }}" data-toggle="modal">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <x-deleteModals.app :app="$app"/>
                    @endforeach
                   
                </tbody>
            </table>
            <div >
                {{ $apps->links('pagination::bootstrap-4') }}
            </div>
        </div>
       
         
    @endsection