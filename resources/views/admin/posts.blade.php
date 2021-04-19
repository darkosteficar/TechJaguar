@extends('admin.layouts.app')

@section('content')
        <h2>OBJAVE</h2>

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
                        <th>Autor</th>
                        <th>Naslov</th>
                        <th>Broj komentara</th>
                        <th>Kategorija</th>
                        <th>Proizvođač</th>
                        <th>Vrijeme</th>
                        <th class="text-right">Slika</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($posts as $post)
                        <tr>
                            <td class="text-center">{{ $post->id }}</td>
                            <td>{{ $post->user->username }}</td>
                            <td>{{ $post->post_title }}</td>
                            <td>33</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->manufacturer->name }}</td>
                            <td>{{ $post->created_at }}</td>
                            
                            <td class="text-right">&euro; 92,144</td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" class="btn btn-info btn-link btn-icon btn-sm">
                                    <i class="tim-icons icon-single-02"></i>
                                </button>
                                <a href="{{ route('posts.update', ['post'=>$post->id]) }}">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-settings"></i>
                                    </button>
                                 </a>
                                
                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm" data-target="#deleteModal{{ $post->id }}" data-toggle="modal">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <x-deleteModals.post :post="$post"/>
                    @endforeach
                   
                </tbody>
            </table>
            <div >
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        </div>
       
         
    @endsection