@extends('layouts.app')

@section('content')

    
</div>
    <div class="2xl:w-3/4 sm:w-full mx-auto 2xl:mb-44  sm:mb-2">
        <section>
            <!-- top section -->
            
            @if (session()->has('message'))
            <div class="bg-gray-900 bg-opacity-70 text-white font-semibold mt-2 p-2 border-green-400 border">
                {{ session('message') }}
            </div>
            @endif
            <div class="mt-20 w-3/4 lg:relative mx-auto ">
            
                <div class="  -top-2 lg:absolute z-10 lg:w-full lg:right-12 ">
                    <div class="2xl:w-4/6 bg-gray-900 p-4 bg-opacity-70 lg:w-2/4 border-t border-green-400">
                        <p class="font-semibold text-green-400 text-2xl ">Popularno danas</p>
                        <a href="">
                            <a href="{{ route('post.view', ['post'=>$popular[0]->id]) }}">
                            <p class="font-bold text-white 2xl:text-6xl md:text-4xl   hover:text-gray-600 transition duration-100 ease-in ">
                                {{ $popular[0]->post_title }}
                            </p>
                            </a>
                        </a>
                    </div>

                </div>

                <div class="lg:absolute lg:w-full  left-24 top-6  ">
                    <div class="lg:flex lg:relative  ">
                        <div class="2xl:w-3/4  xl:w-2/4 ">
                            <img src="images/{{ $popular[0]->post_image }}" alt="" class="object-fill shadow-2xl">
                        </div>

                        <div class="bg-gray-900 bg-opacity-60 p-4 2xl:w-1/4 xl:w-2/4 shadow-2xl  font-semibold lg:text-lg text-white border-t border-green-400 ">
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
                <p class="font-semibold text-2xl text-green-400 pl-10  w-full py-14  bg-gray-900 bg-opacity-70 border-t border-green-400">
                    Najnovije</p>
                <div class="lg:flex lg:absolute lg:w-10/12 left-60 top-12 md:w-7/12 md:mx-auto ">
                    @foreach ($news as $post)
                        <div class=" lg:mr-6 lg:ml-0 mx-24 my-2">
                            <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                <div class="image image__overlay_border   ">
                                    <img class="object-cover w-full " src="{{ '/images/'. $post->post_image }}" alt="" width="320" height="180" >
                                    <div class="image__overlay "></div>
                                </div>
                            </a>
                            <p class="font-semibold border-b border-white text-white  bg-gray-900 bg-opacity-70 py-2 pl-2 h-24">{{ $post->post_title }}</p>
                        </div>    
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="lg:flex mx-10 -mt-16">
        <div class="lg:w-2/3 w-full mx-auto mb-6 border border-green-400  flex justify-between">
            
            <div class="sm:flex flex-row bg-gray-900 bg-opacity-70 pr-4">
                <div class="md:w-1/2 w-full px-5">
                    <a href="{{ route('category', ['category'=>3]) }}">
                      <p class="text-green-400 text-2xl font-semibold my-6 border-b border-transparent hover:text-gray-200 hover:border-green-400 inline-block">GRAFIČKE KARTICE</p>
                    </a>
                    <a href="{{ route('post.view', ['post'=>$categories['gpus'][0]->id]) }}">
                    <div class="image image__overlay_border">
                        <img src="images/{{ $categories['gpus'][0]->post_image }}" alt="" class="w-full ">
                        <div class="image__overlay "></div>
                    </div>
                    </a>
            
                    <p class="text-white text-2xl  my-2">{{ $categories['gpus'][0]->post_title }}</p>
                    <p class="text-gray-300 font-light my-5"> {{ $categories['gpus'][0]->body }}</p>
                    <a href="{{ route('post.view', ['post'=>$categories['gpus'][0]->id]) }}">
                        <button
                        class="bg-gradient-to-r from-green-700 to-green-800 py-1 px-5 text-green-100 font-normal  shadow-2xl rounded-sm mb-4 hover:from-green-800 hover:to-green-900 hover:text-white hover:border-green-400 border border-transparent ">Detaljnije
                        </button>
                    </a>
                </div>
                <div class="md:w-1/2 w-full"> 
                    <div class="flex flex-wrap mt-12">
                    @foreach ($categories['gpus'] as $key => $post)
                        @if ($key !== 0)
                            <div class="mb-8 w-1/2 pl-6">
                                <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                    <div class="image image__overlay_border">
                                        <img src="images/{{ $post->post_image }}" alt="" class="">
                                        <div class="image__overlay "></div>
                                    </div>
                                </a>
                                <p class="text-white bg-gray-900 bg-opacity-70 border-t border-white pt-1 text-lg font-normal my-2">{{ $post->post_title }}</p>
                            </div> 
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
      
        
        </div>

        <div class="lg:w-2/3 w-full mx-auto mb-6 border border-green-400  flex justify-between">
            
            <div class="sm:flex flex-row bg-gray-900 bg-opacity-70 pr-4">
                <div class="md:w-1/2 w-full px-5">
                    <a href="{{ route('category', ['category'=>5]) }}">
                        <p class="text-green-400 text-2xl font-semibold my-6 border-b border-transparent hover:text-gray-200 hover:border-green-400 inline-block">PROCESORI</p>
                    </a>
                    <a href="{{ route('post.view', ['post'=>$categories['cpus'][0]->id]) }}">
                    <div class="image image__overlay_border">
                        <img src="images/{{ $categories['cpus'][0]->post_image }}" alt="" class="w-full ">
                        <div class="image__overlay "></div>
                    </div>
                    </a>
            
                    <p class="text-white text-2xl  my-2">{{ $categories['cpus'][0]->post_title }}</p>
                    <p class="text-gray-300 font-light my-5"> {{ $categories['cpus'][0]->body }}</p>
                    <a href="{{ route('post.view', ['post'=>$categories['cpus'][0]->id]) }}">
                        <button
                        class="bg-gradient-to-r from-green-700 to-green-800 py-1 px-5 text-green-100 font-normal  shadow-2xl rounded-sm mb-4 hover:from-green-800 hover:to-green-900 hover:text-white hover:border-green-400 border border-transparent ">Detaljnije
                        </button>
                    </a>
                </div>
                <div class="md:w-1/2 w-full"> 
                    <div class="flex flex-wrap mt-12">
                    @foreach ($categories['cpus'] as $key => $post)
                        @if ($key !== 0)
                            <div class="mb-8 w-1/2 pl-6">
                                <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                    <div class="image image__overlay_border">
                                        <img src="images/{{ $post->post_image }}" alt="" class="">
                                        <div class="image__overlay "></div>
                                    </div>
                                </a>
                                <p class="text-white bg-gray-900 bg-opacity-70 border-t border-white pt-1 text-lg font-normal my-2">{{ $post->post_title }}</p>
                            </div> 
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
      
        
        </div>
    
    </div>


    <div class="lg:flex mx-10 mb-12 ">
        <div class="lg:w-2/3 w-full mx-auto mb-6 border border-green-400  flex justify-between">
                <div class="sm:flex flex-row bg-gray-900 bg-opacity-70 pr-4">
                    <div class="md:w-1/2 w-full px-5">
                        <a href="{{ route('category', ['category'=>4]) }}">
                            <p class="text-green-400 text-2xl font-semibold my-6 border-b border-transparent hover:text-gray-200 hover:border-green-400 inline-block">RADNE MEMORIJE</p>
                        </a>
                        <a href="{{ route('post.view', ['post'=>$categories['rams'][0]->id]) }}">
                        <div class="image image__overlay_border">
                            <img src="images/{{ $categories['rams'][0]->post_image }}" alt="" class="w-full ">
                            <div class="image__overlay "></div>
                        </div>
                        </a>
                
                        <p class="text-white text-2xl  my-2">{{ $categories['rams'][0]->post_title }}</p>
                        <p class="text-gray-300 font-light my-5"> {{ $categories['rams'][0]->body }}</p>
                        <a href="{{ route('post.view', ['post'=>$categories['rams'][0]->id]) }}">
                            <button
                            class="bg-gradient-to-r from-green-700 to-green-800 py-1 px-5 text-green-100 font-normal  shadow-2xl rounded-sm mb-4 hover:from-green-800 hover:to-green-900 hover:text-white hover:border-green-400 border border-transparent ">Detaljnije
                            </button>
                        </a>
                    </div>
                    <div class="md:w-1/2 w-full"> 
                        <div class="flex flex-wrap mt-12">
                        @foreach ($categories['rams'] as $key => $post)
                            @if ($key !== 0)
                                <div class="mb-8 w-1/2 pl-6">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border">
                                            <img src="images/{{ $post->post_image }}" alt="" class="">
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                    <p class="text-white bg-gray-900 bg-opacity-70 border-t border-white pt-1 text-lg font-normal my-2">{{ $post->post_title }}</p>
                                </div> 
                            @endif
                        @endforeach
                        </div>
                    </div>
                </div>
          
            
        </div>

        <div class="lg:w-2/3 w-full mx-auto mb-6 border border-green-400  flex justify-between">
                <div class="sm:flex flex-row bg-gray-900 bg-opacity-70 pr-4">
                    <div class="md:w-1/2 w-full px-5">
                        <a href="{{ route('category', ['category'=>2]) }}">
                            <p class="text-green-400 text-2xl font-semibold my-6 border-b border-transparent hover:text-gray-200 hover:border-green-400 inline-block">SOFTVER</p>
                        </a>
                        <a href="{{ route('post.view', ['post'=>$categories['soft'][0]->id]) }}">
                        <div class="image image__overlay_border">
                            <img src="images/{{ $categories['soft'][0]->post_image }}" alt="" class="w-full ">
                            <div class="image__overlay "></div>
                        </div>
                        </a>
                
                        <p class="text-white text-2xl  my-2">{{ $categories['soft'][0]->post_title }}</p>
                        <p class="text-gray-300 font-light my-5"> {{ $categories['soft'][0]->body }}</p>
                        <a href="{{ route('post.view', ['post'=>$categories['soft'][0]->id]) }}">
                            <button
                            class="bg-gradient-to-r from-green-700 to-green-800 py-1 px-5 text-green-100 font-normal  shadow-2xl rounded-sm mb-4 hover:from-green-800 hover:to-green-900 hover:text-white hover:border-green-400 border border-transparent ">Detaljnije
                            </button>
                        </a>
                    </div>
                    <div class="md:w-1/2 w-full"> 
                        <div class="flex flex-wrap mt-12">
                        @foreach ($categories['soft'] as $key => $post)
                            @if ($key !== 0)
                                <div class="mb-8 w-1/2 pl-6">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border">
                                            <img src="images/{{ $post->post_image }}" alt="" class="">
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                    <p class="text-white bg-gray-900 bg-opacity-70 border-t border-white pt-1 text-lg font-normal my-2">{{ $post->post_title }}</p>
                                </div> 
                            @endif
                        @endforeach
                        </div>
                    </div>
                
                </div>
            
            
        </div>
    
    </div>



    <div class="lg:mx-32 mb-16 border-t border-green-400">
        <div class="bg-gray-900 bg-opacity-70 pb-2 pt-4">
            <a href="{{ route('manufacturer', ['manufacturer'=>2]) }}">
                <p class="font-semibold md:text-4xl text-2xl pl ml-10 pb-4 text-green-400 w-1/4 hover:text-gray-200 inline-block">AMD</p>
            </a>
           
            
            <div class="w-5/6 mx-auto ">
            
                <div class=" 2xl:mb-52  mb-12 flex items-center">
                    <div class=" relative w-full">
                        <p class="font-semibold text-xl text-green-400 pl-14 bg-gray-700 bg-opacity-20 w-full py-6 border-t border-green-400 ">
                            HARDVER</p>
                        <div class="2xl:flex 2xl:absolute grid xl:grid-cols-3 md:grid-cols-3 grid-cols-2 left-48 top-12 ">
                            @foreach ($manu_hard['amd'] as $post)
                                <div class="mr-6  mt-2 lg:w-4/6 mx-auto mb-2">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border border border-green-400 ">
                                            <img src="{{ '/images/'. $post->post_image }}" alt="" width="170" class="object-cover w-full" >
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                    <p class="h-16 font-semibold border-b  border-white text-white text-sm bg-gray-900 bg-opacity-90 p-2 ">{{ $post->post_title }}</p>
                                </div>    
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class=" 2xl:mb-52  mb-12 flex items-center">
                    <div class=" relative w-full">
                        <p class="font-semibold text-xl text-green-400 pl-14 bg-gray-700 bg-opacity-20 w-full py-6 border-t border-green-400 ">
                            SOFTVER</p>
                        <div class="2xl:flex 2xl:absolute grid xl:grid-cols-3 md:grid-cols-3 grid-cols-2 left-48 top-12 ">
                            @foreach ($manu_soft['amd'] as $post)
                                <div class="mr-6  mt-2 lg:w-4/6 mx-auto mb-2">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border border border-green-400 ">
                                            <img src="{{ '/images/'. $post->post_image }}" alt="" width="170" class="object-cover w-full" >
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                    <p class="h-16 font-semibold border-b  border-white text-white text-sm bg-gray-900 bg-opacity-90 p-2 ">{{ $post->post_title }}</p>
                                </div>    
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        
        </div>

        
    </div>

    <div class="lg:mx-32 mb-16 border-t border-green-400">
        <div class="bg-gray-900 bg-opacity-70 pb-2 pt-4">
            <a href="{{ route('manufacturer', ['manufacturer'=>2]) }}">
                <p class="font-semibold md:text-4xl text-2xl pl ml-10 pb-4 text-green-400 w-1/4 hover:text-gray-200 inline-block">Nvidia</p>
            </a>
           
            
            <div class="w-5/6 mx-auto ">
            
                <div class=" 2xl:mb-52  mb-12 flex items-center">
                    <div class=" relative w-full">
                        <p class="font-semibold text-xl text-green-400 pl-14 bg-gray-700 bg-opacity-20 w-full py-6 border-t border-green-400 ">
                            HARDVER</p>
                        <div class="2xl:flex 2xl:absolute grid xl:grid-cols-3 md:grid-cols-3 grid-cols-2 left-48 top-12 ">
                            @foreach ($manu_hard['nvidia'] as $post)
                                <div class="mr-6  mt-2 lg:w-4/6 mx-auto mb-2">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border border border-green-400 ">
                                            <img src="{{ '/images/'. $post->post_image }}" alt="" width="170" class="object-cover w-full" >
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                    <p class="h-16 font-semibold border-b  border-white text-white text-sm bg-gray-900 bg-opacity-90 p-2 ">{{ $post->post_title }}</p>
                                </div>    
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class=" 2xl:mb-52  mb-12 flex items-center">
                    <div class=" relative w-full">
                        <p class="font-semibold text-xl text-green-400 pl-14 bg-gray-700 bg-opacity-20 w-full py-6 border-t border-green-400 ">
                            SOFTVER</p>
                        <div class="2xl:flex 2xl:absolute grid xl:grid-cols-3 md:grid-cols-3 grid-cols-2 left-48 top-12 ">
                            @foreach ($manu_soft['nvidia'] as $post)
                                <div class="mr-6  mt-2 lg:w-4/6 mx-auto mb-2">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border border border-green-400 ">
                                            <img src="{{ '/images/'. $post->post_image }}" alt="" width="170" class="object-cover w-full" >
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                    <p class="h-16 font-semibold border-b  border-white text-white text-sm bg-gray-900 bg-opacity-90 p-2 ">{{ $post->post_title }}</p>
                                </div>    
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        
        </div>

        
    </div>

    <div class="lg:mx-32 mb-16 border-t border-green-400">
        <div class="bg-gray-900 bg-opacity-70 pb-2 pt-4">
            <a href="{{ route('manufacturer', ['manufacturer'=>2]) }}">
                <p class="font-semibold md:text-4xl text-2xl pl ml-10 pb-4 text-green-400 w-1/4 hover:text-gray-200 inline-block">Intel</p>
            </a>
           
            
            <div class="w-5/6 mx-auto ">
            
                <div class=" 2xl:mb-52  mb-12 flex items-center">
                    <div class=" relative w-full">
                        <p class="font-semibold text-xl text-green-400 pl-14 bg-gray-700 bg-opacity-20 w-full py-6 border-t border-green-400 ">
                            HARDVER</p>
                        <div class="2xl:flex 2xl:absolute grid xl:grid-cols-3 md:grid-cols-3 grid-cols-2 left-48 top-12 ">
                            @foreach ($manu_hard['intel'] as $post)
                                <div class="mr-6  mt-2 lg:w-4/6 mx-auto mb-2">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border border border-green-400 ">
                                            <img src="{{ '/images/'. $post->post_image }}" alt="" width="170" class="object-cover w-full" >
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                    <p class="h-16 font-semibold border-b  border-white text-white text-sm bg-gray-900 bg-opacity-90 p-2 ">{{ $post->post_title }}</p>
                                </div>    
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class=" 2xl:mb-52  mb-12 flex items-center">
                    <div class=" relative w-full">
                        <p class="font-semibold text-xl text-green-400 pl-14 bg-gray-700 bg-opacity-20 w-full py-6 border-t border-green-400 ">
                            SOFTVER</p>
                        <div class="2xl:flex 2xl:absolute grid xl:grid-cols-3 md:grid-cols-3 grid-cols-2 left-48 top-12 ">
                            @foreach ($manu_soft['intel'] as $post)
                                <div class="mr-6  mt-2 lg:w-4/6 mx-auto mb-2">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border border border-green-400 ">
                                            <img src="{{ '/images/'. $post->post_image }}" alt="" width="170" class="object-cover w-full" >
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                    <p class="h-16 font-semibold border-b  border-white text-white text-sm bg-gray-900 bg-opacity-90 p-2 ">{{ $post->post_title }}</p>
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