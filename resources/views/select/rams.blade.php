@extends('layouts.app')

@section('content')
    <div class="flex mt-10">
        <div class="w-1/6 border border-green-400 h-52 mr-2 mt-24">
            <p class="font-semibold text-green-400 text-xl pl-3 pt-1">Filters</p>
            <div class="ml-4">
                <p class="font-medium text-green-400 text-md mt-3">Manufacturer</p>
                <div class="w-1/2 mb-1">
                    <hr class="border border-green-400">
                </div>
                <div>
                    <label class="inline-flex items-center mt-1  ">
                        <input type="checkbox"
                            class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                            checked><span class="ml-2 text-gray-300 font-semibold ">AMD</span>
                    </label>
                </div>

                <div>
                    <label class="inline-flex items-center mt-1  ">
                        <input type="checkbox"
                            class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                            checked><span class="ml-2 text-gray-300 font-semibold ">Intel</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center mt-1  ">
                        <input type="checkbox"
                            class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                            checked><span class="ml-2 text-gray-300 font-semibold ">Nvidia</span>
                    </label>
                </div>
            </div>

        </div>
        <div class="w-5/6 mx-auto my-5 font-semibold text-green-400 ">
            <div class="">
                <div class="flex justify-between mb-2 pl-3">
                    <p class="w-4/12">Name</p>
                    <p class="w-2/12">Chipset</p>
                    <p class="w-2/12">Memory</p>
                    <p class="w-1/12">Core Clock</p>
                    <p class="w-1/12">Boost Clock</p>
                    <p class="w-1/12">Length</p>
                    <p class="w-1/12"></p>
                </div>

                <div class="flex items-center  pl-3 bg-gray-700 border border-green-400">

                    <div class="w-4/12">
                        <div class="flex items-center py-2 space-x-3">
                            <img src="images/topImage.jpg" alt="" width="70">
                            <p>AMD Radeon RX 6800 XT</p>
                        </div>

                    </div>
                    <div class="flex w-2/12">
                        <p>RX 6800 XT</p>
                    </div>
                    <div class="w-2/12 mr-3">
                        <p>12 GB GDDR5</p>
                    </div>
                    <div class="w-1/12">
                        <p>1251 MHz</p>
                    </div>
                    <div class="w-1/12">
                        <p>1351 MHz</p>
                    </div>
                    <div class="w-1/12">
                        <p>225 mm</p>
                    </div>
                    <div class="w-1/12 flex justify-center">
                        <a href="">
                            <button
                                class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center">
                                ADD
                            </button>
                        </a>
                    </div>



                </div>

                <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                    <p class="w-2/12 ">CPU</p>
                    <div class="w-9/12">
                        <div class="flex items-center p-3 space-x-3">
                            <img src="images/topImage.jpg" alt="" width="100">
                            <p>AMD Radeon RX 6800 XT</p>
                        </div>

                    </div>
                    <div class="flex">

                    </div>
                    <p class="w-2/12">11,022.02 kn</p>
                    <div class="w-1/12">
                        <a href="">
                            <p class=" text-center hover:text-gray-300 text-xl">X</p>
                        </a>
                    </div>



                </div>

                <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                    <p class="w-1/5">RAM</p>
                    <div class="w-30">
                        <div> <button
                                class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none my-2">
                                Select RAM
                            </button>
                        </div>
                    </div>

                </div>
                <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                    <p class="w-1/5">STORAGE</p>
                    <div class="w-30">
                        <div> <button
                                class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none my-2">
                                Select HDD/SSD
                            </button>
                        </div>
                    </div>

                </div>
                <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                    <p class="w-1/5">MOBO</p>
                    <div class="w-30">
                        <div> <button
                                class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none my-2">
                                Select Motherboard
                            </button>
                        </div>
                    </div>

                </div>
                <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                    <p class="w-1/5">PSU</p>
                    <div class="w-30">
                        <div> <button
                                class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none my-2">
                                Select Power Supply
                            </button>
                        </div>
                    </div>

                </div>


            </div>

        </div>



    </div>

@endsection