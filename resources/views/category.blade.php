@extends('layouts.app')

@section('content')
    <div class="flex justify-between mt-12 ">
        <div class="w-2/12 bg-gray-700 ml-2 ">
            
            <p class="font-normal text-3xl text-green-500 ml-2 my-2 ">BROWSE</p>
            <p class="bg-green-500 font-light text-xl text-gray-800 pl-5 py border border-transparent hover:border-green-400">News</p>
            <p class=" font-light text-xl text-gray-200 pl-5 py hover:bg-green-500 hover:text-gray-800 border-2 border-transparent hover:border-green-400">Leaks</p>
            <p class=" font-light text-xl text-gray-200 pl-5 py hover:bg-green-500 hover:text-gray-800 border-2 border-transparent hover:border-green-400">Rumours</p>
            <p class=" font-light text-xl text-gray-200 pl-5 py hover:bg-green-500 hover:text-gray-800 border-2 border-transparent hover:border-green-400">AMD</p>
            <p class=" font-light text-xl text-gray-200 pl-5 py hover:bg-green-500 hover:text-gray-800 border-2 border-transparent hover:border-green-400">Nvidia</p>
            <p class=" font-light text-xl text-gray-200 pl-5 py hover:bg-green-500 hover:text-gray-800 border-2 border-transparent hover:border-green-400">Sapphire</p>
            <p class=" font-light text-xl text-gray-200 pl-5 py hover:bg-green-500 hover:text-gray-800 border-2 border-transparent hover:border-green-400">ASUS</p>
            <p class=" font-light text-xl text-gray-200 pl-5 py hover:bg-green-500 hover:text-gray-800 border-2 border-transparent hover:border-green-400">MSI</p>
            <p class=" font-light text-xl text-gray-200 pl-5 py hover:bg-green-500 hover:text-gray-800 border-2 border-transparent hover:border-green-400">Graphics Cards</p>
        
        </div>
        <div class="w-8/12 px-5 ">
            <p class="mt-2 ml-2 font-bold text-2xl text-green-500 ">AMD</p>
            <div class="flex  flex-wrap">
                <div class=" w-1/3 p-2 ">
                    <div class="relative ">
                        <img src="https://cdn.vox-cdn.com/thumbor/cwVnQuFa-mDsY5MCNygm0IEBCzI=/0x0:1260x709/1200x800/filters:focal(530x255:730x455)/cdn.vox-cdn.com/uploads/chorus_image/image/69092746/762922_amd_radeon_rx_6800xt_black_box_1260x709.0.jpg" alt="" class="object-cover h-72 border-2 border-gray-600 hover:border-green-500">
                        <div class="absolute top-1 left-1">
                            <p class="text-green-400 px-1 font-semibold bg-gray-600 border-2 border-transparent">PRESS RELEASE</p>
                        </div>
                        <div class="mx-1 relative ">
                            <div class="absolute bottom-1  w-full pr-2  bg-opacity-40 bg-gray-400">
                                <div class="opacity-100">
                                    <p class="border-l-4 border-green-500">Date</p>
                                    <p class="border-l-4 border-green-500">Title</p>
                                </div>
                               
                            </div>
                        </div>
                        
                    </div>
                  
                </div>
                <div class="relative w-1/3">
                    <img src="https://cdn.vox-cdn.com/thumbor/cwVnQuFa-mDsY5MCNygm0IEBCzI=/0x0:1260x709/1200x800/filters:focal(530x255:730x455)/cdn.vox-cdn.com/uploads/chorus_image/image/69092746/762922_amd_radeon_rx_6800xt_black_box_1260x709.0.jpg" alt="" class="object-cover h-72">
                </div>
                <div class="relative w-1/3">
                    <img src="https://cdn.vox-cdn.com/thumbor/cwVnQuFa-mDsY5MCNygm0IEBCzI=/0x0:1260x709/1200x800/filters:focal(530x255:730x455)/cdn.vox-cdn.com/uploads/chorus_image/image/69092746/762922_amd_radeon_rx_6800xt_black_box_1260x709.0.jpg" alt="" class="object-cover h-72">
                </div>
                <div class="relative w-1/3">
                    <img src="https://cdn.vox-cdn.com/thumbor/cwVnQuFa-mDsY5MCNygm0IEBCzI=/0x0:1260x709/1200x800/filters:focal(530x255:730x455)/cdn.vox-cdn.com/uploads/chorus_image/image/69092746/762922_amd_radeon_rx_6800xt_black_box_1260x709.0.jpg" alt="" class="object-cover h-72">
                </div>
            </div>
           
        
        </div>
        <div class="w-2/12 bg-gray-700 mr-2 rounded-sm">           
            <p class="font-normal text-2xl text-green-500 ml-2 my-2 text-center">POPULAR THIS WEEK</p>
            <div class="flex border border-transparent hover:border-white justify-between bg-gray-500 pt-1 hover:bg-green-500 text-green-400 hover:text-gray-800 mb-1">
                <div class="w-1/2 ml-3">
                    <img src="https://static.gamespot.com/uploads/original/1568/15683559/3336534-graphics%20rx%2064.png" alt="" width="200" class="border border-transparent hover:border-green-300">    
                </div>
                <div class="w-1/2 px-2 pb-1">
                    <p class=" ">New AMD GPUs leaked in the public benchmarks</p>
                    <div class="flex">
                        <img src="images/date-icon.png" alt="" width="15" class="object-scale-down mr-1">
                        <p class="text-gray-800">12.4.2021</p>
                    </div>
                    
                </div>
            </div>
            <div class="flex border border-transparent hover:border-white justify-between bg-gray-500 pt-1 hover:bg-green-500 text-green-400 hover:text-gray-800">
                <div class="w-1/2 ml-3">
                    <img src="https://static.gamespot.com/uploads/original/1568/15683559/3336534-graphics%20rx%2064.png" alt="" width="200" class="border border-transparent hover:border-green-300">    
                </div>
                <div class="w-1/2 px-2 pb-1">
                    <p class=" ">New AMD GPUs leaked in the public benchmarks</p>
                    <div class="flex">
                        <img src="images/date-icon.png" alt="" width="15" class="object-scale-down mr-1">
                        <p class="text-gray-800">12.4.2021</p>
                    </div>
                    
                </div>
            </div>
        </div>
        


    </div>
@endsection