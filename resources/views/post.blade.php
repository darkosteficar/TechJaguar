@extends('layouts.app')

@section('content')

<div class="mt-5 bg-gray-900">
    <div class="bg-green-400 inline-block">
        <p class="text-2xl font-semibold text-white inline-block px-3 py-1">Leak</p>
    </div>
    <div class="mt-2 ml-3">
        <p class="text-white font-bold text-2xl">NVIDIA GeForce RTX 3050 Ti Laptop GPU to get 2560 CUDA cores,
            4GB memory according to Geekbench leak</p>
    </div>
    <div class="flex items-center mt-2">
        <p class="text-gray-500 text-lg ml-3">Published: 17th Mar 2021, 08:25 GMT</p>
        <img src="images/comment.png" alt="" width="20" class="h-5 ml-2">
        <p class="text-gray-500 text-lg ml-2">10 Comments</p>
    </div>
    <div class=" flex">
        <div class="m-3 border border-gray-700 text-gray-500 px-2 py-1 font-semibold">
            RTX 3000
        </div>

    </div>

</div>
</div>

<div class="w-5/6 mx-auto mt-4 bg-gray-900 flex ">
<div class="w-2/12">

    <div class="bg-green-400 text-white font-semibold text-center">
        <p>Timeline</p>
    </div>
    <div class="bg-gray-900 mt-2 border-2 border-gray-700 hover:border-green-400 transition ease-in">
        <div class="flex h-20 ">
            <div class="w-1/4 text-center  ">
                <div class="font-bold text-lg text-gray-200 h-1/2 flex items-center justify-center ">
                    <p>
                        6:25
                    </p>
                </div>
                <div
                    class="bg-gray-700 text-gray-200 h-1/2 flex items-center justify-centerflex items-center justify-center">
                    <p class="font-semibold">Mar 17</p>
                </div>
            </div>
            <div class="w-3/4">
                <img src="images/topImage.jpg" alt="" class="w-full h-full">
            </div>
        </div>
        <div class="p-2">
            <p class="font-semibold text-gray-300">NVIDIA GeForce RTX 3050 Ti Laptop GPU to get 2560 CUDA cores,
                4GB memory according to Geekbench
                leak</p>
        </div>
    </div>
    <div class="bg-gray-900 mt-2 border-2 border-gray-700 hover:border-green-400 transition ease-in">
        <div class="flex h-20 ">
            <div class="w-1/4 text-center  ">
                <div class="font-bold text-lg text-gray-200 h-1/2 flex items-center justify-center ">
                    <p>
                        6:25
                    </p>
                </div>
                <div
                    class="bg-gray-700 text-gray-200 h-1/2 flex items-center justify-centerflex items-center justify-center">
                    <p class="font-semibold">Mar 17</p>
                </div>
            </div>
            <div class="w-3/4">
                <img src="images/topImage.jpg" alt="" class="w-full h-full">
            </div>
        </div>
        <div class="p-2">
            <p class="font-semibold text-gray-300">NVIDIA GeForce RTX 3050 Ti Laptop GPU to get 2560 CUDA cores,
                4GB memory according to Geekbench
                leak</p>
        </div>
    </div>
    <div class="bg-gray-900 mt-2 border-2 border-gray-700 hover:border-green-400 transition ease-in">
        <div class="flex h-20 ">
            <div class="w-1/4 text-center  ">
                <div class="font-bold text-lg text-gray-200 h-1/2 flex items-center justify-center ">
                    <p>
                        6:25
                    </p>
                </div>
                <div
                    class="bg-gray-700 text-gray-200 h-1/2 flex items-center justify-centerflex items-center justify-center">
                    <p class="font-semibold">Mar 17</p>
                </div>
            </div>
            <div class="w-3/4">
                <img src="images/topImage.jpg" alt="" class="w-full h-full">
            </div>
        </div>
        <div class="p-2">
            <p class="font-semibold text-gray-300">NVIDIA GeForce RTX 3050 Ti Laptop GPU to get 2560 CUDA cores,
                4GB memory according to Geekbench
                leak</p>
        </div>
    </div>

</div>
<div class="w-10/12 mx-auto pt-10 px-5 text-gray-200">
    <p class="text-semibold  text-lg ">
        {!! $post[0]->body !!}
    </p>

    <div class="w-11/12 mx-auto">
        <table class="bg-gray-600 w-full border-2  border-green-400 mb-96 table-auto">
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

    <!-- component -->
    <div class="bg-white rounded-sm w-full border-2 border-green-400">
        <div class="flex justify-center w-full py-2 bg-gray-800">
            <p class=" text-2xl font-bold text-gray-400 text-center  py-1">
                RTX
                3000
                Series</p>
        </div>

        <div class="overflow-x-auto ">
            <table class="table-auto border-collapse w-full">
                <thead>
                    <tr class="rounded-lg text-sm font-medium text-gray-700 text-left bg-green-400"
                        style="font-size: 0.9674rem">
                        <th class="px-4 py-2  ">Title</th>
                        <th class="px-4 py-2 ">Author</th>
                        <th class="px-4 py-2 ">Views</th>
                    </tr>
                </thead>
                <tbody class="text-sm font-normal text-gray-300">
                    <tr class=" hover:bg-gray-500  border-transparent py-10  ">
                        <td class="px-4 py-4 bg-gray-800">Intro to CSS</td>
                        <td class="px-4 py-4 ">Adam</td>
                        <td class="px-4 py-4 ">858</td>
                    </tr>
                    <tr class="hover:bg-gray-500  border-transparent py-4">

                        <td class="px-4 py-4 bg-gray-800">Adam</td>
                        <td class="px-4 py-4">112</td>
                    </tr>
                    <tr class="hover:bg-gray-500  border-transparent">
                        <td class="px-4 py-4 bg-gray-800 text-gray-300 font-semibold">Intro to JavaScript
                        </td>
                        <td class="px-4 py-4">Chris</td>
                        <td class="px-4 py-4">1,280</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
</div>
@endsection