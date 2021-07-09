@extends('layouts.app') 

@section('content')

<div class="bg-gray-900 bg-opacity-70 w-10/12 mx-auto my-12 p-4 ">
    @if (count($posts) < 1)
    
        <p class="text-green-400 text-xl ">No results for this search: {{ request()->key }} </p>
    
    @else
    <p class="text-green-400 text-xl pb-2 border-b border-green-400 mb-6">Search results for: {{ request()->key }} </p>
    @foreach ($posts as $post)
     <div class="lg:flex lg:space-x-10 justify-center mb-4 ">
         
        <a href="{{ route('post.view', ['post'=>$post->id]) }}">
         <img src="images/{{ $post->post_image }}" alt="" class="lg:w-80 border-green-400 border hover:border-white">
        </a>
         <div class="bg-gray-900 bg-opacity-80 flex flex-col justify-between lg:w-1/2 w-full lg:border-t border-white">
            <div class="flex justify-between lg:mb-0 mb-2">
                <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                    <p class="text-green-400 hover:text-green-100 font-semibold lg:text-xl lg:pt-5 pt-2 lg:pl-5">{{ $post->post_title }}</p>
                </a>
                <div class="text-green-400 w-2/12">
                    <div class="flex mt-5 pr-5 space-x-2 lg:ml-12">
                        <p class="lg:text-lg">{{ $post->comments_count }}</p>
                        <i class="fas fa-comments mt-1 fa-lg"></i>
                    </div>
                    
                </div>
            </div>
            <div class="flex justify-between items-center">
                <div class=" lg:text-base text-sm">
                    <p class="text-gray-300 mb-2 mx-3">{{ $post->created_at->isoFormat('LLL') }}</p>
                    <p class="text-gray-300 mb-2 mx-3 text-sm">Autor: {{ $post->user->username }}</p>
                </div>
                
                <div class=" flex lg:text-base text-sm">
                    <p class="text-gray-300 border border-gray-300 mb-2 mx-3 py-1 px-2">{{ $post->category->name }}</p>
                    <p class="text-gray-300 border border-gray-300 mb-2 mx-3 py-1 px-2">{{ $post->manufacturer->name }}</p>
                </div>
            </div>
           
         </div>
         
     </div>
    @endforeach
    {{ $posts->appends(request()->input())->links('pagination::tailwind-jag') }}
    @endif
</div>
@endsection
