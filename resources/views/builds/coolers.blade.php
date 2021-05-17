@extends('layouts.app')

@section('content')
    

    <div class="flex mt-10 mx-6">
        <div class="w-1/6 mt-24">
            <a href="{{ route('build', []) }}">
                <button class="inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center">
                    Back to the build
                </button>
            </a>
            <div class="border border-green-400 h-52 mr-2 ">
            
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
        </div>
       
        <div class="w-5/6 mx-auto my-5 font-semibold text-green-400 ">
            <p class="mb-1 font-semibold text-3xl text-gray-200">HLADNJACI</p>
            <hr class="mb-6 border border-green-400">
            <div class="">
                <div class="flex justify-left pl-3 text-lg items-center font-semibold text-gray-200  bg-green-600 py-2 rounded-t-md border-b border-b-white">
                    <p class="w-1/12 "></p>
                    <p class="w-3/12" style="cursor: pointer">IME</p>
                    <p class="w-2/12">PROIZVOĐAČ</p>
                    <p class="w-2/12">EFIKASNOST</p>
                    <p class="w-1/12">TIP</p>
                    <p class="w-1/12">SNAGA</p>
                    <p class="w-2/12"></p>
                </div>

                @foreach ($coolers as $cooler)
                    <div class="flex items-center pl-3 bg-gray-700 border border-green-400">

                        <div class="w-1/12">
                            <div class="flex items-center py-2 ">
                                <img src="../images/{{ $cooler->images()->first()->path }}" alt="" width="70" class="border-green-500 border">
                            </div>
                        </div>
                        <div class="flex w-3/12" >
                            <p class="">{{ $cooler->name }}</p>
                        </div>
                        <div class="flex w-2/12">
                            <p>{{ $cooler->manufacturer->name }}</p>
                        </div>
                        <div class="w-2/12 ">
                            <p>12 GB GDDR5</p>
                        </div>
                        <div class="w-1/12">
                            <p>1251 MHz</p>
                        </div>
                        <div class="w-1/12">
                            <p>1351 MHz</p>
                        </div>
                        
                        <div class="w-1/12 flex justify-center">
                            
                            
                            <form action="{{ route('build.cooler.add', []) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $cooler->id }}">
                                
                                <button class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-700 uppercase transition bg-green-400 rounded shadow ripplehover:shadow-lg hover:bg-green-600 focus:outline-none my-2 self-center">
                                    DODAJ
                                </button>
                            </form>
    
                        </div>
                        <div class="w-1/12 flex justify-center">
                            <a href="">
                                <button
                                    class="inline-block px-6 py-2 text-sm font-semibold leading-6 text-center text-gray-700 uppercase transition bg-white rounded shadow ripple hover:shadow-lg hover:bg-green-300 focus:outline-none my-2 self-center">
                                    DETALJI
                                </button>
                            </a>
                        </div>


                    </div>
                @endforeach

            </div>

        </div>



    </div>



@endsection