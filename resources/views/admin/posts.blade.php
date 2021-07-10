@extends('admin.layouts.app')

@section('content')
        <h2>POSTS</h2>

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
                        <th>Author</th>
                        <th>Title</th>
                        <th>Comment Count</th>
                        <th>Category</th>
                        <th>Manufacturer</th>
                        <th>Time</th>
                        <th class="text-center">Cover Image</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($posts as $post)
                        <tr>
                            <td class="text-center">{{ $post->id }}</td>
                            <td>{{ $post->user->username }}</td>
                            <td>{{ $post->post_title }}</td>
                            <td>{{ $post->comments_count }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->manufacturer->name }}</td>
                            <td>{{ $post->created_at }}</td>
                            
                            <td class="text-right"><img src="{{ asset('images/'.$post->post_image) }}" alt="" style="height: 50px"></td>
                            <td class="td-actions text-right">
                                
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