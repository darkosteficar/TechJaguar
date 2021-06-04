@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h2>REZULTATI</h2>
    <a href="{{ route('results.create', []) }}">
        <button class="btn btn-success ml-5">Novi rezultat</button>
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
                        <th>Rezultat</th>
                        <th>Aplikacija</th>
                        <th>Procesor</th>
                        <th>Grafička kartica</th>
                        <th>Radna memorija</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($results as $result)
                        <tr>
                            <td class="text-center">{{ $result->id }}</td>
                            <td>{{ $result->score }}</td>
                            <td>{{ $result->app->name}}</td>
                            <td>{{ $result->cpu->name }}</td>
                            <td>{{ $result->gpu->name }}</td>
                            <td>{{ $result->ram->name }}</td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" class="btn btn-info btn-link btn-icon btn-sm">
                                    <i class="tim-icons icon-single-02"></i>
                                </button>
                                <a href="{{ route('results.edit', ['result'=>$result->id]) }}">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-settings"></i>
                                    </button>
                                 </a>
                                
                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm" data-target="#deleteModal{{ $result->id }}" data-toggle="modal">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <x-deleteModals.result :result="$result"/>
                    @endforeach
                   
                </tbody>
            </table>
            <div >
                {{ $results->links('pagination::bootstrap-4') }}
            </div>
        </div>
       
         
    @endsection