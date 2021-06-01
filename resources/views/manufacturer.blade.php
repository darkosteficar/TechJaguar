@extends('layouts.app')

@section('content')
    <div class="lg:flex  justify-between my-12 ">
        <div class="lg:w-2/12  w-11/12 bg-gray-900 bg-opacity-70 lg:ml-2 ml-4 border border-white rounded-sm">
            
            <p class="font-semibold text-xl text-green-500 ml-2 my-2 ">BROWSE</p>
            @foreach ($allManus as $manu)
                <a href="{{ route('manufacturer', ['manufacturer'=>$manu->id]) }}">
                @if ($manu->name == $manufacturer->name)
                    <p class="bg-green-500 font-light text-xl text-gray-800 pl-5 py border border-transparent hover:border-green-400">{{ $manu->name }}</p>
                
                @else
                    <p class=" font-light text-xl text-gray-200 pl-5 py hover:bg-green-500 hover:text-gray-800 border-2 border-transparent hover:border-green-400">{{ $manu->name }}</p>
                </a> 
                @endif   
               
            @endforeach
            
        
        </div>
        <div class="lg:w-8/12 w-full px-5 ">
            <p class="my-2 ml-2 font-bold text-3xl text-green-500 ">{{ $manufacturer->name }}</p>
            <div class="flex flex-wrap">
                @foreach ($posts as $post)
               
                    <div class=" lg:w-1/3 w-2/4 p-2 ">
                        <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                        <div class="relative ">
                            <img src="../images/{{ $post->post_image }}" alt="" class="object-cover lg:h-72 h-48  border-2 border-gray-600 hover:border-green-500 duration-300 ease-in">
                            <div class="absolute top-1 left-1">
                                <p class="text-green-400 px-1 font-semibold bg-gray-600 border-2 border-transparent">{{ $post->manufacturer->name }}</p>
                            </div>
                            <div class="mx-1 relative ">
                                <div class="absolute bottom-1  w-full pr-2  bg-opacity-80 bg-gray-900">
                                    <div class="opacity-100 ">
                                        <div class="flex items-center ">
                                            <i class="fas fa-calendar-alt mx-1 text-green-400"></i>
                                            <p class=" font-semibold text-md text-green-500  ">{{ $post->created_at->isoFormat('LLL') }}</p>
                                        </div>
                                        
                                        <p class="border-l-4 border-green-500 text-gray-100 text-xl font-semibold pl-2 pb-1">{{ $post->post_title }}</p>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </a>  
                    </div>   
                
                @endforeach
                
                
            </div>
            {{ $posts->links('pagination::tailwind-jag') }}
        
        </div>
        <div class="lg:w-2/12  w-11/12 bg-gray-900 bg-opacity-70 mr-2 mt-4 ml-4 rounded-sm border border-white">           
            <p class="font-semibold text-xl text-green-500 ml-5 my-2 text-left">POPULAR THIS WEEK</p>
            @foreach ($postsPopular as $post)
                <div class="flex border border-transparent hover:border-white justify-between bg-gray-800 pt-1 hover:bg-green-500 text-green-400 hover:text-gray-800 mb-1">
                    <div class="w-1/2 ml-3">
                        <img src="../images/{{ $post->post_image }}" alt="" width="200" class="border border-transparent hover:border-green-300">    
                    </div>
                    <div class="w-1/2 px-2 pb-1">
                        <p class=" ">{{ $post->post_title }}</p>
                        <div class="flex items-center ">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            <p class="text-white">{{ $post->created_at->isoFormat('L') }}</p>
                        </div>
                        
                    </div>
                </div>
            @endforeach
           
            
        </div>
        


    </div>
@endsection