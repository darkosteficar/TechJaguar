@extends('admin.layouts.app')

@section('content')
<div class="d-flex">
    <h2>COMMENTS</h2>
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
                        <th>Author</th>
                        <th>Post Title</th>
                        <th>Created At</th>
                        <th>Comment Content</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($comments as $comment)
                        <tr>
                            <td class="text-center">{{ $comment->id }}</td>
                            <td>{{ $comment->user->name }}</td>
                            <td>{{ $comment->post->post_title }}</td>
                            <td>{{ $comment->created_at }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td class="td-actions text-right">
                                
                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm" data-target="#deleteModal{{ $comment->id }}" data-toggle="modal">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <x-deleteModals.comment :comment="$comment"/>
                    @endforeach
                   
                </tbody>
            </table>
            <div >
                {{ $comments->links('pagination::bootstrap-4') }}
            </div>
        </div>
       
         
    @endsection