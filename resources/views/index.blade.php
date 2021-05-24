@extends('layouts.app')

@section('content')

    
</div>
<div class="w-3/4 mx-auto">
    <section>
        <!-- top section -->
        
        <div class="mt-20 w-3/4 lg:relative mx-auto ">
            <div class="absolute w-full  left-24  ">
                <div class="lg:flex lg:relative shadow-2xl ">
                    <div class="w-3/4 bg-gray-800">
                        <img src="images/{{ $popular[0]->post_image }}" alt="" class="">
                    </div>

                    <div class="bg-gray-900 bg-opacity-60 p-4 w-1/4 shadow-2xl  font-semibold text-lg text-white ">
                        <p class="">{!! $popular[0]->body !!}</p>
                    </div>
                    <!--
                <div class="absolute w-3/6 -right-20 bottom-10">
                    <button
                        class="bg-gradient-to-r from-green-500 to-green-600 p-2 text-green-100 font-normal  shadow-2xl ">More
                        reading
                        <img src="images/rightArrow.png" alt="" width="20" class="inline-block"> </button>
                </div>
                -->
                </div>


            </div>

            <div class="lg:relative right-44 top-6 ">
                <div class="w-4/6 bg-gray-900 p-4 bg-opacity-70">
                    <p class="font-semibold text-green-400 text-2xl ">Popularno danas</p>
                    <a href="">
                        <p
                            class="font-bold text-white text-6xl  hover:text-gray-600 transition duration-100 ease-in ">
                            {{ $popular[0]->post_title }}</p>
                    </a>

                </div>

            </div>
        </div>

        <!-- top section -->
    </section>

</div>

    <div class=" mx-auto pt-20 ">
        <div class=" my-80 flex items-center  ">
            <div class=" relative w-full">
                <p
                    class="font-semibold text-2xl text-green-400 pl-10  w-full py-14  bg-gray-900  bg-opacity-70">
                    Najnovije</p>
                <div class="lg:flex absolute  left-64 top-12 ">
                    @foreach ($news as $post)
                        <div class="mr-6 ">
                            <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                <div class="image image__overlay_border border border-green-400  ">
                                    <img src="{{ '/images/'. $post->post_image }}" alt="" width="320" height="180" >
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

    <div class="flex mx-10 -mt-16">
        <div class="w-2/3 mx-auto mb-6 border border-green-400  flex justify-between">
            <div>
                <div class="flex bg-gray-900 bg-opacity-70 pr-4">
                    <div class="w-1/2 px-5">
                        <p class="text-green-400 text-2xl font-semibold my-6">GRAFIČKE KARTICE</p>
                        <div class="image image__overlay_border">
                            <img src="images/{{ $categories['gpus'][0]->post_image }}" alt="" class="w-full ">
                            <div class="image__overlay "></div>
                        </div>
                
                        <p class="text-white text-2xl  my-2">{{ $categories['gpus'][0]->post_title }}</p>
                        <p class="text-gray-300 font-light my-5"> {{  $categories['gpus'][0]->body  }}</p>
                        <button
                            class="bg-gradient-to-r from-green-600 to-green-700 py-1 px-5 text-green-100 font-normal  shadow-2xl rounded-sm mb-4">More
                            reading
                        </button>
                    </div>
                    <div class="flex flex-wrap w-1/2 mt-12">
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

        <div class="w-2/3 mx-auto mb-6 border border-green-400  flex justify-between">
                <div class="flex bg-gray-800 bg-opacity-70 pr-4">
                    <div class="w-1/2 px-5">
                        <p class="text-green-400 text-2xl font-semibold my-6">PROCESORI</p>
                        <div class="image image__overlay_border">
                            <img src="images/{{ $news[0]->post_image }}" alt="" class="w-full ">
                            <div class="image__overlay "></div>
                        </div>
                
                        <p class="text-white text-2xl  my-2">{{ $news[0]->post_title }}</p>
                        <p class="text-gray-300 font-light my-5"> Ut enim ad minim
                            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Duis aute irure dolor i...</p>
                        <button
                            class="bg-gradient-to-r from-green-600 to-green-700 py-1 px-5 text-green-100 font-normal  shadow-2xl rounded-sm mb-4">More
                            reading
                        </button>
                    </div>
                    <div class="w-1/2"> 
                        <div class="flex flex-wrap mt-12">
                        @foreach ($news as $key => $post)
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


    <div class="flex mx-10 ">
        <div class="w-2/3 mx-auto mb-32 border border-green-400  flex justify-between">
            <div>
                <div class="flex bg-gray-800 bg-opacity-70 pr-4">
                    <div class="w-1/2 px-5">
                        <p class="text-green-400 text-2xl font-semibold my-6">RADNE MEMORIJE</p>
                        <div class="image image__overlay_border">
                            <img src="images/{{ $news[0]->post_image }}" alt="" class="w-full ">
                            <div class="image__overlay "></div>
                        </div>
                
                        <p class="text-white text-2xl  my-2">{{ $news[0]->post_title }}</p>
                        <p class="text-gray-300 font-light my-5"> Ut enim ad minim
                            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Duis aute irure dolor i...</p>
                        <button
                            class="bg-gradient-to-r from-green-600 to-green-700 py-1 px-5 text-green-100 font-normal  shadow-2xl rounded-sm mb-4">More
                            reading
                        </button>
                    </div>
                    <div class="flex flex-wrap w-1/2 mt-12">
                            @foreach ($news as $key => $post)
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

        <div class="w-2/3 mx-auto mb-32 border border-green-400  flex justify-between">
                <div class="flex bg-gray-900 bg-opacity-70 pr-4">
                    <div class="w-1/2 px-5">
                        <p class="text-green-400 text-2xl font-semibold my-6">SOFTVER</p>
                        <div class="image image__overlay_border">
                            <img src="images/{{ $news[0]->post_image }}" alt="" class="w-full ">
                            <div class="image__overlay "></div>
                        </div>
                
                        <p class="text-white text-2xl  my-2">{{ $news[0]->post_title }}</p>
                        <p class="text-gray-300 font-light my-5"> Ut enim ad minim
                            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Duis aute irure dolor i...</p>
                        <button
                            class="bg-gradient-to-r from-green-600 to-green-700 py-1 px-5 text-green-100 font-normal  shadow-2xl rounded-sm mb-4">More
                            reading
                        </button>
                    </div>
                    <div class="w-1/2"> 
                        <div class="flex flex-wrap mt-12">
                        @foreach ($news as $key => $post)
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



    <div class=" mx-32 mb-16 ">
        <div class="bg-gray-900 bg-opacity-80 pb-2 pt-4">
            <p class="font-semibold text-4xl text-gray-200 pl ml-10  pb-4 text-green-400  w-1/4">AMD</p>
            <hr class="mb-6">
            <div class="w-5/6 mx-auto ">
            
                <div class=" mb-52 flex items-center">
                    <div class=" relative w-full">
                        <p class="font-semibold text-xl text-green-400 pl-14 bg-gray-900 bg-opacity-60 w-full py-6 border border-green-400 ">
                            HARDWARE</p>
                        <div class="lg:flex absolute  left-64 top-12 ">
                            @foreach ($news as $post)
                                <div class="mr-6 " style="width: 170px; ">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border border border-green-400  ">
                                            <img src="{{ '/images/'. $post->post_image }}" alt="" width="170"  >
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                    <p class="font-semibold text-white text-base bg-gray-900 bg-opacity-90 p-2 ">{{ $post->post_title }}</p>
                                </div>    
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class=" mb-40 flex items-center">
                    <div class=" relative w-full">
                        <p class="font-semibold text-xl text-green-400 pl-14 bg-gray-900 bg-opacity-60 w-full py-6 border border-green-400 ">
                            SOFTWARE</p>
                        <div class="lg:flex absolute  left-64 top-12 ">
                            @foreach ($news as $post)
                                <div class="mr-6 " style="width:170px">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border border border-green-400 ">
                                            <img src="{{ '/images/'. $post->post_image }}" alt="" width="170"  >
                                            <div class="image__overlay "></div>
                                        </div>
                                </a>
                                    <p class="font-semibold text-white text-md bg-gray-900 bg-opacity-90 p-2">{{ $post->post_title }}</p>
                                </div>    
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        
        </div>

        
    </div>

    <div class=" mx-32 mb-16 ">
        <div class="bg-gray-900 bg-opacity-70 pb-2 pt-4">
            <p class="font-semibold text-4xl text-gray-200 pl ml-10  pb-4 text-green-400  w-1/4">AMD</p>
            <hr class="mb-6">
            <div class="w-5/6 mx-auto ">
            
                <div class=" mb-52 flex items-center">
                    <div class=" relative w-full">
                        <p class="font-semibold text-xl text-green-400 pl-14 bg-gray-900 bg-opacity-60 w-full py-6 border border-green-400 ">
                            HARDWARE</p>
                        <div class="lg:flex absolute  left-64 top-12 ">
                            @foreach ($news as $post)
                                <div class="mr-6 " style="width: 170px; ">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border border border-green-400  ">
                                            <img src="{{ '/images/'. $post->post_image }}" alt="" width="170"  >
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                    <p class="font-semibold text-white text-base bg-gray-900 bg-opacity-90 p-2 ">{{ $post->post_title }}</p>
                                </div>    
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class=" mb-40 flex items-center">
                    <div class=" relative w-full">
                        <p class="font-semibold text-xl text-green-400 pl-14 bg-gray-900 bg-opacity-60 w-full py-6 border border-green-400 ">
                            SOFTWARE</p>
                        <div class="lg:flex absolute  left-64 top-12 ">
                            @foreach ($news as $post)
                                <div class="mr-6 " style="width:170px">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border border border-green-400 ">
                                            <img src="{{ '/images/'. $post->post_image }}" alt="" width="170"  >
                                            <div class="image__overlay "></div>
                                        </div>
                                </a>
                                    <p class="font-semibold text-white text-md bg-gray-900 bg-opacity-90 p-2">{{ $post->post_title }}</p>
                                </div>    
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        
        </div>

        
    </div>

    <div class=" mx-32 mb-16 ">
        <div class="bg-gray-900 bg-opacity-70 pb-2 pt-4">
            <p class="font-semibold text-4xl text-gray-200 pl ml-10  pb-4 text-green-400  w-1/4">AMD</p>
            <hr class="mb-6">
            <div class="w-5/6 mx-auto ">
            
                <div class=" mb-52 flex items-center">
                    <div class=" relative w-full">
                        <p class="font-semibold text-xl text-green-400 pl-14 bg-gray-900 bg-opacity-60 w-full py-6 border border-green-400 ">
                            HARDWARE</p>
                        <div class="lg:flex absolute  left-64 top-12 ">
                            @foreach ($news as $post)
                                <div class="mr-6 " style="width: 170px; ">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border border border-green-400  ">
                                            <img src="{{ '/images/'. $post->post_image }}" alt="" width="170"  >
                                            <div class="image__overlay "></div>
                                        </div>
                                    </a>
                                    <p class="font-semibold text-white text-base bg-gray-900 bg-opacity-90 p-2 ">{{ $post->post_title }}</p>
                                </div>    
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class=" mb-40 flex items-center">
                    <div class=" relative w-full">
                        <p class="font-semibold text-xl text-green-400 pl-14 bg-gray-900 bg-opacity-60 w-full py-6 border border-green-400 ">
                            SOFTWARE</p>
                        <div class="lg:flex absolute  left-64 top-12 ">
                            @foreach ($news as $post)
                                <div class="mr-6 " style="width:170px">
                                    <a href="{{ route('post.view', ['post'=>$post->id]) }}">
                                        <div class="image image__overlay_border border border-green-400 ">
                                            <img src="{{ '/images/'. $post->post_image }}" alt="" width="170"  >
                                            <div class="image__overlay "></div>
                                        </div>
                                </a>
                                    <p class="font-semibold text-white text-md bg-gray-900 bg-opacity-90 p-2">{{ $post->post_title }}</p>
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
    <div class="flex w-1/2 mx-auto space-x-3 mt-6">

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