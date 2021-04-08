@extends('layouts.app')

@section('content')
<section>
    <!-- top section -->
    <div class="mt-32 w-2/3 lg:relative mx-auto">
        <div class="absolute w-full bg-white left-24  ">
            <div class="lg:flex lg:relative shadow-2xl ">
                <div class="w-3/4 bg-gray-800">
                    <img src="images/topImage.jpg" alt="" class="">
                </div>

                <div class="bg-gray-800 p-4 w-1/4 shadow-2xl border border-green-400 ">
                    <p class="font-semibold text-lg text-white">Lorem ipsum dolor sit amet, consectetur
                        adipiscing
                        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        <br>
                        <br>
                        Ut enim ad minim
                        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                        Duis aute irure dolor i...</p>
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

        <div class="lg:relative right-44">
            <div class="w-3/6">
                <p class="font-semibold text-green-400 text-2xl">Hot news</p>
                <a href="">
                    <p
                        class="font-bold text-white text-6xl hover:text-gray-600 transition duration-100 ease-in ">
                        New Gaming Equipment Trends in 2021</p>
                </a>

            </div>

        </div>
    </div>
    <!-- top section -->
</section>

</div>
<div class="w-5/6 mx-auto ">
<div class=" my-80 flex items-center  ">
    <div class=" relative w-full">
        <p
            class="font-semibold text-2xl text-green-400 pl-10 bg-gray-700 w-full py-10 border border-green-400 ">
            Updated news</p>
        <div class="lg:flex absolute  left-64 top-12 ">
            <div class="mr-6 ">
                <div class="image image__overlay_border  mb-4">
                    <img src="images/topImage.jpg" alt="" width="320">
                    <div class="image__overlay "></div>
                </div>
                <p class="font-semibold text-white text-lg">New Gaming Equipment Trends in 2021</p>
            </div>
            <div class="mr-6 ">
                <div class="image image__overlay_border  mb-4">
                    <img src="images/topImage.jpg" alt="" width="320">
                    <div class="image__overlay "></div>
                </div>
                <p class="font-semibold text-white text-lg">New Gaming Equipment Trends in 2021</p>
            </div>
            <div class="mr-6 ">
                <div class="image image__overlay_border  mb-4">
                    <img src="images/topImage.jpg" alt="" width="320">
                    <div class="image__overlay "></div>
                </div>
                <p class="font-semibold text-white text-lg">New Gaming Equipment Trends in 2021</p>
            </div>
            <div class="mr-6 ">
                <div class="image image__overlay_border  mb-4">
                    <img src="images/topImage.jpg" alt="" width="320">
                    <div class="image__overlay "></div>
                </div>
                <p class="font-semibold text-white text-lg">New Gaming Equipment Trends in 2021</p>
            </div>

        </div>
    </div>
</div>
</div>

<div class="w-2/3 mx-auto mb-32 border border-green-400 pr-4">
<div class="flex space-x-10">
    <div class="w-1/2 px-5">
        <p class="text-green-400 text-2xl font-semibold my-6">Gaming Gear</p>
        <div class="image image__overlay_border">
            <img src="images/topImage.jpg" alt="" class="w-full ">
            <div class="image__overlay "></div>
        </div>

        <p class="text-white text-2xl  my-2">Gaming gear that you need to become a compentent
            professional gamer</p>
        <p class="text-gray-300 font-light my-5"> Ut enim ad minim
            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor i...</p>
        <button
            class="bg-gradient-to-r from-green-600 to-green-700 py-1 px-5 text-green-100 font-normal  shadow-2xl rounded-sm">More
            reading
        </button>
    </div>
    <div class="flex w-1/2 space-x-4 mt-12">
        <div>
            <div class="mb-8">
                <div class="image image__overlay_border">
                    <img src="images/topImage.jpg" alt="" class="">
                    <div class="image__overlay "></div>
                </div>
                <p class="text-white text-xl font-normal my-2">Gaming gear that you need to become a
                    compentent
                    professional gamer</p>
            </div>
            <div class="mb-8">
                <div class="image image__overlay_border">
                    <img src="images/topImage.jpg" alt="" class="">
                    <div class="image__overlay "></div>
                </div>
                <p class="text-white text-xl font-normal my-2">Gaming gear that you need to become a
                    compentent
                    professional gamer</p>
            </div>
        </div>
        <div>
            <div class="mb-8">
                <div class="image image__overlay_border">
                    <img src="images/topImage.jpg" alt="" class="">
                    <div class="image__overlay "></div>
                </div>
                <p class="text-white text-xl font-normal my-2">Gaming gear that you need to become a
                    compentent
                    professional gamer</p>
            </div>
            <div class="mb-8">
                <div class="image image__overlay_border">
                    <img src="images/topImage.jpg" alt="" class="">
                    <div class="image__overlay "></div>
                </div>
                <p class="text-white text-xl font-normal my-2">Gaming gear that you need to become a
                    compentent
                    professional gamer</p>
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

@endsection