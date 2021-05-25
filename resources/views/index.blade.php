@extends('layouts.app')

@section('content')

    
</div>
    <div class="2xl:w-3/4 sm:w-full mx-auto 2xl:mb-44  sm:mb-2">
        <section>
            <!-- top section -->
            
            <div class="mt-20 w-3/4 lg:relative mx-auto ">
            
                <div class="  -top-2 lg:absolute z-10 lg:w-full lg:right-12">
                    <div class="2xl:w-4/6 bg-gray-900 p-4 bg-opacity-70 lg:w-2/4">
                        <p class="font-semibold text-green-400 text-2xl ">Popularno danas</p>
                        <a href="">
                            <p class="font-bold text-white 2xl:text-6xl md:text-4xl   hover:text-gray-600 transition duration-100 ease-in ">
                                {{ $popular[0]->post_title }}
                            </p>
                        </a>
                    </div>

                </div>

                <div class="lg:absolute lg:w-full  left-24 top-6  ">
                    <div class="lg:flex lg:relative  ">
                        <div class="2xl:w-3/4  xl:w-2/4 ">
                            <img src="images/{{ $popular[0]->post_image }}" alt="" class="object-fill shadow-2xl">
                        </div>

                        <div class="bg-gray-900 bg-opacity-60 p-4 2xl:w-1/4 xl:w-2/4 shadow-2xl  font-semibold text-lg text-white ">
                            <p class="">{!! $popular[0]->body !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- top section -->
        </section>

    </div>

    <div class=" mx-auto 2xl:pt-44 lg:pt-12 md:pt-2  pb-12">
        <div class=" lg:my-80 my-20  flex items-center  ">
            <div class=" relative w-full ">
                <p
                    class="font-semibold text-2xl text-green-400 pl-10  w-full py-14  bg-gray-900  bg-opacity-70">
                    Najnovije</p>
                <div class="lg:flex lg:absolute lg:w-10/12 left-64 top-12 md:w-7/12 md:mx-auto ">
                    @foreach ($news as $post)
                        <div class=" lg:mr-6 lg:ml-0 mx-24 my-2">
                            <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                <div class="image image__overlay_border border border-green-400  ">
                                    <img class="object-cover w-full " src="{{ '/images/'. $post->post_image }}" alt="" width="320" height="180" >
                                    <div class="image__overlay "></div>
                                </div>
                            </a>
                            <p class="font-semibold text-white text-lg bg-gray-900 bg-opacity-70 py-2 pl-2">{{ $post->post_title }}</p>
                        </div>    
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="lg:flex mx-10 -mt-16">
        <div class="lg:w-2/3 w-full mx-auto mb-6 border border-green-400  flex justify-between">
            <div class="bg-gray-900 bg-opacity-70">
                <div class="sm:flex flex-row  pr-4">
                    <div class="md:w-1/2 w-full px-5">
                        <p class="text-green-400 text-2xl font-semibold my-6">GRAFIČKE KARTICE</p>
                        <div class="image image__overlay_border">
                            <img src="images/{{ $categories['gpus'][0]->post_image }}" alt="" class="w-full ">
                            <div class="image__overlay "></div>
                        </div>
                
                        <p class="text-white text-2xl  my-2">{{ $categories['gpus'][0]->post_title }}</p>
                        <p class="text-gray-300 font-light my-5"> {{  $categories['gpus'][0]->body  }}</p>
                        <a href="{{ route('post.view', ['post'=>$categories['gpus'][0]->id]) }}"> 
                            <button
                            class="bg-gradient-to-r from-green-600 to-green-700 py-1 px-5 text-green-100 font-normal  shadow-2xl rounded-sm mb-4 hover:from-green-800 hover:to-green-900">Detaljnije
                            </button>
                        </a>
                        
                    </div>
                    <div class="flex flex-wrap md:w-1/2 w-full mt-12">
                            @foreach ($categories['gpus'] as $key => $post)
                                @if ($key !== 0)
                                    <div class="mb-8 w-1/2 pl-6">
                                        <a href="{{ route('post.view', ["post"=>$post->id]) }}">
                                        <div class="image image__overlay_border">
                                            <img src="images/{{ $post->post_image }}" alt="" class="">
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                        <p class="text-white text-xl font-normal my-2">{{ $post->post_title }}</p>
                                    </div> 
                                @endif
                            @endforeach
                    </div>
                </div>
            </div>
            
        </div>

        <div class="lg:w-2/3 w-full mx-auto mb-6 border border-green-400  flex justify-between">
                <div class="sm:flex flex-row sm:flex-col  bg-gray-800 bg-opacity-70 pr-4">
                    <div class="md:w-1/2 w-full px-5">
                        <p class="text-green-400 text-2xl font-semibold my-6">PROCESORI</p>
                        <div class="image image__overlay_border">
                            <img src="images/{{ $categories['cpus'][0]->post_image }}" alt="" class="w-full ">
                            <div class="image__overlay "></div>
                        </div>
                
                        <p class="text-white text-2xl  my-2">{{ $categories['cpus'][0]->post_title }}</p>
                        <p class="text-gray-300 font-light my-5"> {{ $categories['cpus'][0]->body }}</p>
                        <a href="{{ route('post.view', ['post'=>$categories['cpus'][0]->id]) }}">    
                            <button
                            class="bg-gradient-to-r from-green-600 to-green-700 py-1 px-5 text-green-100 font-normal  shadow-2xl rounded-sm mb-4 hover:from-green-800 hover:to-green-900">Detaljnije
                            </button>
                        </a>
                    </div>
                    <div class="md:w-1/2 w-full"> 
                        <div class="flex flex-wrap mt-12">
                        @foreach ($categories['cpus'] as $key => $post)
                            @if ($key !== 0)
                                <div class="mb-8 w-1/2 pl-6">
                                    
                                    <div class="image image__overlay_border">
                                        <img src="images/{{ $post->post_image }}" alt="" class="">
                                        <div class="image__overlay "></div>
                                    </div>
                                
                                    <p class="text-white text-xl font-normal my-2">{{ $post->post_title }}</p>
                                </div> 
                            @endif
                        @endforeach
                        </div>
                    </div>
                
                </div>
            
            
        </div>
    
    </div>


    <div class="lg:flex mx-10 mb-32 ">
        <div class="lg:w-2/3 w-full mx-auto mb-6 border border-green-400  flex justify-between">
            
                <div class="sm:flex flex-row bg-gray-800 bg-opacity-70 pr-4">
                    <div class="md:w-1/2 w-full px-5">
                        <p class="text-green-400 text-2xl font-semibold my-6">RADNE MEMORIJE</p>
                        <div class="image image__overlay_border">
                            <img src="images/{{ $categories['rams'][0]->post_image }}" alt="" class="w-full ">
                            <div class="image__overlay "></div>
                        </div>
                
                        <p class="text-white text-2xl  my-2">{{ $categories['rams'][0]->post_title }}</p>
                        <p class="text-gray-300 font-light my-5"> {{ $categories['rams'][0]->body }}</p>
                        <a href="{{ route('post.view', ['post'=>$categories['rams'][0]->id]) }}">
                            <button
                            class="bg-gradient-to-r from-green-600 to-green-700 py-1 px-5 text-green-100 font-normal  shadow-2xl rounded-sm mb-4 hover:from-green-800 hover:to-green-900">Detaljnije
                            </button>
                        </a>
                    </div>
                    <div class="flex flex-wrap md:w-1/2 w-full  mt-12">
                            @foreach ($categories['rams'] as $key => $post)
                                @if ($key !== 0)
                                    <div class="mb-8 w-1/2 pl-6">
                                        <a href="{{ route('post.view', ["post"=>$post->id]) }}">
                                        <div class="image image__overlay_border">
                                            <img src="images/{{ $post->post_image }}" alt="" class="">
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                        <p class="text-white text-xl font-normal my-2">{{ $post->post_title }}</p>
                                    </div> 
                                @endif
                            @endforeach
                    </div>
                </div>
          
            
        </div>

        <div class="lg:w-2/3 w-full mx-auto mb-6 border border-green-400  flex justify-between">
                <div class="sm:flex flex-row bg-gray-900 bg-opacity-70 pr-4">
                    <div class="md:w-1/2 w-full px-5">
                        <p class="text-green-400 text-2xl font-semibold my-6">SOFTVER</p>
                        <div class="image image__overlay_border">
                            <img src="images/{{ $categories['soft'][0]->post_image }}" alt="" class="w-full ">
                            <div class="image__overlay "></div>
                        </div>
                
                        <p class="text-white text-2xl  my-2">{{ $categories['soft'][0]->post_title }}</p>
                        <p class="text-gray-300 font-light my-5"> {{ $categories['soft'][0]->body }}</p>
                        <a href="{{ route('post.view', ['post'=>$categories['soft'][0]->id]) }}">
                            <button
                            class="bg-gradient-to-r from-green-600 to-green-700 py-1 px-5 text-green-100 font-normal  shadow-2xl rounded-sm mb-4 hover:from-green-800 hover:to-green-900">Detaljnije
                            </button>
                        </a>
                    </div>
                    <div class="md:w-1/2 w-full"> 
                        <div class="flex flex-wrap mt-12">
                        @foreach ($categories['soft'] as $key => $post)
                            @if ($key !== 0)
                                <div class="mb-8 w-1/2 pl-6">
                                    
                                    <div class="image image__overlay_border">
                                        <img src="images/{{ $post->post_image }}" alt="" class="">
                                        <div class="image__overlay "></div>
                                    </div>
                                
                                    <p class="text-white text-xl font-normal my-2">{{ $post->post_title }}</p>
                                </div> 
                            @endif
                        @endforeach
                        </div>
                    </div>
                
                </div>
            
            
        </div>
    
    </div>



    <div class="lg:mx-32 mx-16 mb-16 ">
        <div class="bg-gray-900 bg-opacity-70 pb-2 pt-4">
            <p class="font-semibold text-4xl text-gray-200 pl ml-10  pb-4 text-green-400  w-1/4">AMD</p>
            <hr class="mb-6">
            <div class="w-5/6 mx-auto ">
            
                <div class=" lg:mb-52 mb-12 flex items-center">
                    <div class=" relative w-full">
                        <p class="font-semibold text-xl text-green-400 pl-14 bg-gray-700 bg-opacity-20 w-full py-6 border border-green-400 ">
                            HARDWARE</p>
                        <div class="lg:flex lg:absolute grid md:grid-cols-3 grid-cols-2 left-64 top-12 ">
                            @foreach ($manu_hard['amd'] as $post)
                                <div class="mr-6 lg:mt-0 mt-2">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border border border-green-400  ">
                                            <img src="{{ '/images/'. $post->post_image }}" alt="" width="170" class="object-cover w-full" >
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                    <p class="font-semibold text-white text-base bg-gray-900 bg-opacity-90 p-2 ">{{ $post->post_title }}</p>
                                </div>    
                            @endforeach
                        </div>
                        
                    </div>
                </div>
                <div class=" lg:mb-52 mb-12 flex items-center">
                    <div class=" relative w-full">
                        <p class="font-semibold text-xl text-green-400 pl-14 bg-gray-700 bg-opacity-20 w-full py-6 border border-green-400 ">
                            SOFTWARE</p>
                        <div class="lg:flex lg:absolute grid md:grid-cols-3 grid-cols-2 left-64 top-12 ">
                            @foreach ($manu_hard['amd'] as $post)
                                <div class="mr-6 lg:mt-0 mt-2">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border border border-green-400  ">
                                            <img src="{{ '/images/'. $post->post_image }}" alt="" width="170" class="object-cover w-full" >
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                    <p class="font-semibold text-white text-base bg-gray-900 bg-opacity-90 p-2 ">{{ $post->post_title }}</p>
                                </div>    
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
        
        </div>

        
    </div>

    <div class="lg:mx-32 mx-16 mb-16 ">
        <div class="bg-gray-900 bg-opacity-70 pb-2 pt-4">
            <p class="font-semibold text-4xl text-gray-200 pl ml-10  pb-4 text-green-400  w-1/4">Nvidia</p>
            <hr class="mb-6">
            <div class="w-5/6 mx-auto ">
            
                <div class=" lg:mb-52 mb-12 flex items-center">
                    <div class=" relative w-full">
                        <p class="font-semibold text-xl text-green-400 pl-14 bg-gray-700 bg-opacity-20 w-full py-6 border border-green-400 ">
                            HARDWARE</p>
                        <div class="lg:flex lg:absolute grid md:grid-cols-3 grid-cols-2 left-64 top-12 ">
                            @foreach ($manu_hard['nvidia'] as $post)
                                <div class="mr-6 lg:mt-0 mt-2">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border border border-green-400  ">
                                            <img src="{{ '/images/'. $post->post_image }}" alt="" width="170" class="object-cover w-full" >
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                    <p class="font-semibold text-white text-base bg-gray-900 bg-opacity-90 p-2 ">{{ $post->post_title }}</p>
                                </div>    
                            @endforeach
                        </div>
                        
                    </div>
                </div>
                <div class=" lg:mb-52 mb-12 flex items-center">
                    <div class=" relative w-full">
                        <p class="font-semibold text-xl text-green-400 pl-14 bg-gray-700 bg-opacity-20 w-full py-6 border border-green-400 ">
                            SOFTWARE</p>
                        <div class="lg:flex lg:absolute grid md:grid-cols-3 grid-cols-2 left-64 top-12 ">
                            @foreach ($manu_hard['nvidia'] as $post)
                                <div class="mr-6 lg:mt-0 mt-2">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border border border-green-400  ">
                                            <img src="{{ '/images/'. $post->post_image }}" alt="" width="170" class="object-cover w-full" >
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                    <p class="font-semibold text-white text-base bg-gray-900 bg-opacity-90 p-2 ">{{ $post->post_title }}</p>
                                </div>    
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
        
        </div>

        
    </div>

    <div class="lg:mx-32 mx-16 mb-16 ">
        <div class="bg-gray-900 bg-opacity-70 pb-2 pt-4">
            <p class="font-semibold text-4xl text-gray-200 pl ml-10  pb-4 text-green-400  w-1/4">Intel</p>
            <hr class="mb-6">
            <div class="w-5/6 mx-auto ">
            
                <div class=" lg:mb-52 mb-12 flex items-center">
                    <div class=" relative w-full">
                        <p class="font-semibold text-xl text-green-400 pl-14 bg-gray-700 bg-opacity-20 w-full py-6 border border-green-400 ">
                            HARDWARE</p>
                        <div class="lg:flex lg:absolute grid md:grid-cols-3 grid-cols-2 left-64 top-12 ">
                            @foreach ($manu_hard['intel'] as $post)
                                <div class="mr-6 lg:mt-0 mt-2">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border border border-green-400  ">
                                            <img src="{{ '/images/'. $post->post_image }}" alt="" width="170" class="object-cover w-full" >
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                    <p class="font-semibold text-white text-base bg-gray-900 bg-opacity-90 p-2 ">{{ $post->post_title }}</p>
                                </div>    
                            @endforeach
                        </div>
                        
                    </div>
                </div>
                <div class=" lg:mb-52 mb-12 flex items-center">
                    <div class=" relative w-full">
                        <p class="font-semibold text-xl text-green-400 pl-14 bg-gray-700 bg-opacity-20 w-full py-6 border border-green-400 ">
                            SOFTWARE</p>
                        <div class="lg:flex lg:absolute grid md:grid-cols-3 grid-cols-2 left-64 top-12 ">
                            @foreach ($manu_hard['intel'] as $post)
                                <div class="mr-6 lg:mt-0 mt-2">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border border border-green-400  ">
                                            <img src="{{ '/images/'. $post->post_image }}" alt="" width="170" class="object-cover w-full" >
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                    <p class="font-semibold text-white text-base bg-gray-900 bg-opacity-90 p-2 ">{{ $post->post_title }}</p>
                                </div>    
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
        
        </div>

        
    </div>


    <div class="w-3/4 mx-auto mb-32">
    <p class="text-white text-3xl font-bold text-center">Sign Up for our Newsletter</p>
    <p class="text-white text-1xl font-semibold text-center mt-2">Get the lastest news and updates relevant to this
        website
    </p>
    <div class="lg:flex w-2/3 mx-auto lg:space-x-3 mt-6 space-y-2 lg:space-y-0 lg:items-center">

        <input type="text"
            class="outline-none bg-gray-800 border-green-400 border-2 w-full h-14 rounded-xl focus:border-gray-600 focus:bg-gray-700 pl-4 text-white text-xl font-semibold"
            placeholder="First Name">
        <input type="text"
            class="outline-none bg-gray-800 border-green-400 border-2 w-full h-14 rounded-xl focus:border-gray-600 focus:bg-gray-700 pl-4 text-white text-xl font-semibold"
            placeholder="Email">
    </div>
    </div>
</div>
@endsection