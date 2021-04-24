@extends('layouts.app')


@section('content')
<div class="flex mt-24 justify-between mx-24">
    <div class="w-1/5">
        <div class=" bg-gray-900 border border-green-400 p-2">
            <div class="flex mb-2">
                <img src="images/wattage.png" alt="" width="30">
                <p class="font-medium text-gray-300 text-lg">Estimated Wattage: </p>
                <p class="font-semibold text-green-400 text-xl ml-1"> 422W</p>
            </div>

            <div class="flex mb-2">
                <img src="images/wattage.png" alt="" width="30">
                <p class="font-medium text-gray-300 text-lg">CPU Manufacturer: </p>
                <p class="font-semibold text-green-400 text-xl ml-1"> AMD</p>
            </div>
            <div class="flex mb-2">
                <img src="images/wattage.png" alt="" width="30">
                <p class="font-medium text-gray-300 text-lg">CPU Socket: </p>
                <p class="font-semibold text-green-400 text-xl ml-1"> AM4</p>
            </div>


        </div>
        <div class="border border-red-500 font-semibold text-lg mt-2 text-gray-300 p-2 bg-gray-900">
            <p>Compatibility Issues:</p>
            <p>None</p>
        </div>
    </div>
    <div class="w-4/5  mb-5 font-semibold text-green-400 ml-6">
        <div class="">
            <div class="flex mb-2 pl-3">
                <p class="w-2/12">Component</p>
                <p class="w-9/12">Selection</p>
                <p class="w-2/12">Base Price</p>
                <p class="w-1/12 pl-3">Remove</p>
            </div>

            <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                <p class="w-2/12 ">GPU</p>
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
                <p class="w-2/12 ">CPU</p>
                <div class="w-9/12">
                    <div class="flex items-center p-3 space-x-3">
                        <img src="images/topImage.jpg" alt="" width="100">
                        <p>Intel Core i7 7700K</p>
                    </div>

                </div>
                <div class="flex">

                </div>
                <p class="w-2/12">6,012.22 kn</p>
                <div class="w-1/12">
                    <a href="">
                        <p class=" text-center hover:text-gray-300 text-xl">X</p>
                    </a>
                </div>



            </div>

            <div class="flex items-center pl-3 bg-gray-700 border border-green-400">
                <p class="w-1/5">RAM</p>
                <div class="w-30">
                    <div> 
                        <a href="{{ route('build.rams', []) }}"> 
                            <button
                            class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none my-2">
                            Select RAM
                            </button>
                        </a>
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
            <div class="flex items-center  bg-gray-700 border border-green-400 text-xl p-4">
                <p class="text-gray-300 mr-2 font-medium">TOTAL:</p>
                <p class="font-semibold">4,291.21 kn</p>

            </div>

        </div>

    </div>
    


</div>

@endsection