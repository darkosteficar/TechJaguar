@extends('layouts.app')

@section('content')

@php
    if(str_contains($post->comments_count,'1')){
        $pad = 'komentar';
    }
    else{
        $pad = 'komentara';
    }
@endphp

<div class="mt-5  bg-gray-900 ml-2 md:ml-32">
    <div class="bg-green-400 inline-block">
        <p class="text-2xl font-semibold text-white inline-block px-3 py-1">{{ $post->category->name }}</p>
    </div>
    <div class="mt-2 ml-3">
        <p class="text-white font-bold text-2xl">{{ $post->post_title }}</p>
    </div>
    <div class="flex items-center mt-2">
        <p class="text-gray-500 text-lg mx-3">Objavljeno: {{ $post->created_at->isoFormat('LLL') }}</p>
        <i class="fas fa-comments text-green-400 ml-2"></i>
        <p class="text-gray-500 text-lg ml-2">{{ $post->comments_count }} {{ $pad }}</p>
    </div>
    <div class=" flex">
        <div class="m-3 border border-gray-700 text-gray-500 px-2 py-1 font-semibold">
            RTX 3000
        </div>

    </div>

</div>


<div class="w-5/6 mx-auto mt-4 bg-gray-900  pb-12">
    <div class="lg:flex mb-12">
        
        <div class="lg:w-10/12 w-full mx-auto pt-4 px-5 text-gray-200">
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
        <div class="lg:w-2/12 w-2/4 mx-auto">
            <div class="bg-green-400 text-white font-semibold text-center">
                <p>Timeline</p>
            </div>
            @foreach ($posts as $post2)
            <a href="{{ route('post.view', ['post'=>$post2->id]) }}">
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
            </a> 
            @endforeach
        </div>
    </div>
            <!-- component -->
    <livewire:comments :post="$post"/>
</div>


@endsection