@extends('layouts.app')

@section('content')

<div class="mt-5 bg-gray-900 ml-32">
    <div class="bg-green-400 inline-block">
        <p class="text-2xl font-semibold text-white inline-block px-3 py-1">{{ $post->category->name }}</p>
    </div>
    <div class="mt-2 ml-3">
        <p class="text-white font-bold text-2xl">{{ $post->post_title }}</p>
    </div>
    <div class="flex items-center mt-2">
        <p class="text-gray-500 text-lg mx-3">Objavljeno: {{ $post->created_at->isoFormat('LLL') }}</p>
        <i class="fas fa-comments text-green-400 ml-2"></i>
        <p class="text-gray-500 text-lg ml-2">10 Comments</p>
    </div>
    <div class=" flex">
        <div class="m-3 border border-gray-700 text-gray-500 px-2 py-1 font-semibold">
            RTX 3000
        </div>

    </div>

</div>
</div>

<div class="w-5/6 mx-auto mt-4 bg-gray-900  pb-12">
    <div class="flex ">
        <div class="w-2/12">
            <div class="bg-green-400 text-white font-semibold text-center">
                <p>Timeline</p>
            </div>
            @foreach ($posts as $post2)
                <div class="bg-gray-900 mt-2 border-2 border-gray-700 hover:border-green-400 transition ease-in">
                    <div class="flex h-20 ">
                    
                        <div class="w-1/4 text-center  ">
                            <div class="font-bold text-lg text-gray-200 h-1/2 flex items-center justify-center ">
                                <p>
                                    {{ $post->created_at->isoFormat('HH') }}:{{ $post2->created_at->isoFormat('m') }}
                                </p>
                            </div>
                            <div
                                class="bg-gray-700 text-gray-200 h-1/2 flex items-center justify-centerflex items-center justify-center">
                                <p class="font-semibold">{{ $post2->created_at->isoFormat('DD') }} {{ $post2->created_at->isoFormat('MMM') }}</p>
                            </div>
                        </div>
                        <div class="w-3/4">
                            <img src="../images/{{ $post2->post_image }}" alt="" class="w-full h-full">
                        </div>
                    </div>
                    <div class="p-2">
                        <p class="font-semibold text-gray-300">{{ $post2->post_title }}</p>
                    </div>
                </div>     
            @endforeach
        </div>
        <div class="w-10/12 mx-auto pt-4 px-5 text-gray-200">
            <p class="bg-gray-800 opacity-90 inline-block border-l-8 border-green-400 font-semibold text-3xl py-2 px-4"> {{ $post->post_title }}</p>
            <p class="text-semibold mt-6 text-lg ">
                {!! $post->body !!}
            </p>
    
            <div class="w-11/12 mx-auto mt-12">
                <table class="bg-gray-600 w-full border-2  border-green-400 mb-32 table-auto">
                    <div>
                        <p
                            class="bg-gray-900 text-2xl font-bold text-gray-300 text-center border-green-400 border-2 py-1">
                            Nvidia RTX
                            3000
                            Series</p>
                    </div>
    
                    <tr class="bg-green-400  ">
                        <th class="font-semibold py-2 pl-2 w-42">BCompare.com</th>
                        <th class="font-semibold">GeForce RTX 3080</th>
                        <th class="font-semibold">GeForce RTX 3070</th>
                        <th class="font-semibold">GeForce RTX 3060</th>
                        <th class="font-semibold">GeForce RTX 3060 ti</th>
                        <th class="font-semibold">GeForce RTX 3050</th>
                    </tr>
                    <tbody class="text-center text-md font-medium text-gray-300 ">
                        <tr class=" hover:bg-gray-800 ">
                            <td class="bg-gray-800 text-gray-300 font-bold">Codename</td>
                            <td class="">GN20-B</td>
                            <td class="">GN20-B</td>
                            <td class="">GN20-B</td>
                            <td class="">GN20-B</td>
                            <td class="">GN20-B</td>
                        </tr>
                        <tr class="hover:bg-gray-800 bg-gray-700">
                            <td class="bg-gray-800 text-gray-300 font-bold">GPU</td>
                            <td class="">GA104-770</td>
                            <td class="">GA104-770</td>
                            <td class="">GA104-770</td>
                            <td class="">GA104-770</td>
                            <td class="">GA104-770</td>
                        </tr>
                        <tr class=" hover:bg-gray-800 ">
                            <td class="bg-gray-800 text-gray-300 font-bold">Codename</td>
                            <td class="">GN20-B</td>
                            <td class="">GN20-B</td>
                            <td class="">GN20-B</td>
                            <td class="">GN20-B</td>
                            <td class="">GN20-B</td>
                        </tr>
                        <tr class="hover:bg-gray-800 bg-gray-700">
                            <td class="bg-gray-800 text-gray-300 font-bold">GPU</td>
                            <td class="">GA104-770</td>
                            <td class="">GA104-770</td>
                            <td class="">GA104-770</td>
                            <td class="">GA104-770</td>
                            <td class="">GA104-770</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    
            
        </div>
    </div>
            <!-- component -->
    <div class="antialiased mx-auto w-3/4 ">
        <h3 class="mb-4 text-xl font-semibold text-green-400">Komentari</h3>
          <!-- comment form -->
          <div class="flex mx-auto items-center justify-center shadow-lg   mb-4 ">
            <form class="w-full  bg-gray-800 border border-green-400 rounded-lg px-4 pt-2 ">
            <div class="flex flex-wrap -mx-3 mb-6 ">
                <h2 class="px-4 pt-3 pb-2 text-gray-300 text-lg">Dodaj komentar</h2>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:border-green-500 focus:border-2 focus:outline-none focus:bg-white focus:ring-0" name="body" placeholder='Vaš komentar ' required></textarea>
                </div>
                <div class="w-full md:w-full flex items-end justify-end md:w-full px-3">

                    <div class="-mr-1">
                        <input type='submit' class="bg-green-400 text-gray-700 font-medium py-1 px-4 border border-green-400 rounded-lg tracking-wide mr-1 hover:bg-green-600 hover:text-white " value='Objavi'>
                    </div>
                </div>
            </form>
            </div>
        </div>
      
                <!-- component -->
        <div class="space-y-4">
            
        <div class="flex">
            <div class="flex-shrink-0 mr-3">
            <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
            </div>
            <div class="flex-1 border border-green-400 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed bg-gray-800">
                <strong class="text-green-400 text-lg">Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
                <p class="text-md text-white">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                    sed diam nonumy eirmod tempor invidunt ut labore et dolore
                    magna aliquyam erat, sed diam voluptua.
                </p>
                <div class="mt-4 flex items-center">
                    <div class="flex -space-x-2 mr-2">
                    <img class="rounded-full w-6 h-6 border border-green-400" src="https://images.unsplash.com/photo-1554151228-14d9def656e4?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80" alt="">
                    <img class="rounded-full w-6 h-6 border border-green-400" src="https://images.unsplash.com/photo-1513956589380-bad6acb9b9d4?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80" alt="">
                    </div>
                    <div class="text-sm text-gray-500 font-semibold">
                    5 Replies
                    </div>
                </div>
            </div>
        </div>
    
        <div class="flex">
            <div class="flex-shrink-0 mr-3">
            <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
            </div>
            <div class="flex-1 border border-green-400 bg-gray-800 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                <strong class="text-green-400 text-lg">Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
                <p class="text-md text-white">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                    sed diam nonumy eirmod tempor invidunt ut labore et dolore
                    magna aliquyam erat, sed diam voluptua.
                </p>
                
                <h4 class="my-5 uppercase tracking-wide text-gray-400 font-bold text-xs">Replies</h4>
        
                <div class="space-y-4">
                    <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <img class="mt-3 rounded-full w-6 h-6 sm:w-8 sm:h-8" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
                    </div>
                    <div class="flex-1 bg-gray-200 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                        <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
                        <p class="text-xs sm:text-sm">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                        sed diam nonumy eirmod tempor invidunt ut labore et dolore
                        magna aliquyam erat, sed diam voluptua.
                        </p>
                    </div>
                    </div>
                    <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <img class="mt-3 rounded-full w-6 h-6 sm:w-8 sm:h-8" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
                    </div>
                    <div class="flex-1 bg-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                        <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
                        <p class="text-xs sm:text-sm">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                        sed diam nonumy eirmod tempor invidunt ut labore et dolore
                        magna aliquyam erat, sed diam voluptua.
                        </p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </div>
</div>


@endsection