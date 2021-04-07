@extends('admin.layouts.app')

@section('content')
        <h1>All posts</h1>

        @if (Session::has('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
        
            
        @elseif(session('post-created-message'))
        <div class="alert alert-success">
            {{ session('post-created-message') }}
        </div>
        
        @endif
        <table id="table_id" class="display" style="background: linear-gradient(to bottom, #01f2c4 0%, #00C6D9 100%);">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Owner</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Updated At</th>  
                    <th>Edit</th>
                    <th>Delete</th>
                   
                </tr>
              </thead>
              <tfoot>
                <tr>
                 <th>Id</th>
                 <th>Owner</th>
                 <th>Title</th>
                 <th>Image</th>
                 <th>Created At</th>
                 <th>Updated At</th>  
                 <th>Edit</th>
                 <th>Delete</th>
                </tr>
              </tfoot>
              <tbody>
               @foreach ($posts as $post)
                   <tr>
                       <td>
                         {{ $post->id }}
                       </td>
                       <td>
                        {{ $post->user->name }}
                    </td>
                       <td>
                           {{ $post->post_title }}
                       </td>
                       <td>
                           <image height="40px" src="{{ asset($post->post_image)  }}"></image>
                           
                       </td>
                       <td>
                           {{ $post->created_at->diffForHumans() }}
                       </td>
                       <td>
                        {{ $post->updated_at->diffForHumans() }}
                    </td>
                    <td>
                        <a href="{{ route('post.edit', [$post->id]) }}"><button class="btn btn-primary">Edit</button></a></td>
                    <td>
                        @can('view', $post)
                            <form action="{{ route('post.destroy',$post->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
    
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endcan                                                                                
                    </td>
                   </tr>
               @endforeach
              </tbody>
        </table>
           {{ $posts->links() }}
    @endsection