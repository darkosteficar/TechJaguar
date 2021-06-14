@extends('layouts.app')

@section('content')
<div class="w-3/5 mx-auto mt-10">
    <div class="flex bg-green-400 p-3 items-center justify-between">
        <p class=" text-xl font-semibold">{{ $user->username }}</p>
        <p>KORISNIČKI RAČUN</p>
    </div>
   

    <form action="{{ route('profile.update', []) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="bg-gray-900 bg-opacity-70 px-8 py-4 mb-24 ">
            <div class="flex space-x-10">
                <div class="w-1/3">
                    <div class="flex-col flex ">
                            
                        <label for="username" class="text-white mr-2 ml-2 ">* KORISNIČKO IME:</label>
                        <input type="text" class="@error('username')
                        border-red-500
                        @enderror bg-green-400 text-gray-900 p-2 focus:bg-gray-900 focus:text-green-400 focus:outline-none  rounded-sm border focus:border-green-600" value="{{ $user->username }}" name="username">
                        @error('username')
                            <div class="text-red-500 mt-1 text-sm ">
                                {{ $message }}
                            </div> 
                        @enderror
                        
                        <label for="name" class="text-white mr-2 ml-2 mt-4">* IME:</label>
                        <input type="text" class="bg-green-400 @error('name')
                        border-red-500
                        @enderror text-gray-900 p-2 focus:bg-gray-900 focus:text-green-400 focus:outline-none  rounded-sm border focus:border-green-600 " value="{{ $user->name }}" name="name">
                        @error('name')
                            <div class="text-red-500 mt-1 text-sm ">
                                {{ $message }}
                            </div> 
                        @enderror
                        <label for="surname" class="text-white mr-2 ml-2 mt-4">* PREZIME:</label>
                        <input type="text" class="@error('surname')
                            border-red-500
                        @enderror bg-green-400 text-gray-900 p-2 focus:bg-gray-900 focus:text-green-400 focus:outline-none  rounded-sm border focus:border-green-600 " value="{{ $user->surname }}" name="surname">
                        @error('surname')
                            <div class="text-red-500 mt-1 text-sm ">
                                {{ $message }}
                            </div> 
                        @enderror
                        <label for="username" class="text-white mr-2 mt-4">EMAIL:</label>
                        <input type="text" class="  p-2 bg-gray-800 text-gray-400 focus:outline-none border-green-400 rounded-sm border " value="{{ $user->email }}" disabled name="email">
                    </div>
                </div>
                <div class="w-1/3">
                    <div class="flex-col flex ">
                        <label for="username" class="text-white mr-2 ml-2">NOVA LOZINKA:</label>
                        <input type="password" class="bg-green-400 text-gray-900 p-2 focus:bg-gray-900 focus:text-green-400 focus:outline-none border-gray-900 rounded-sm border focus:border-green-600" name="password">
                        <label for="name" class="text-white mr-2 ml-2 mt-4">POTVRDA LOZINKE:</label>
                        <input type="password" class="bg-green-400 text-gray-900 p-2 focus:bg-gray-900 focus:text-green-400 focus:outline-none border-gray-900 rounded-sm border focus:border-green-600 " name="password_confirmation" >
                        <label for="name" class="text-white mr-2 ml-2 mt-4 mb-2">TRENUTNA SLIKA PROFILA:</label>
                        <img src="images/{{ $user->image }}" alt="" width="200" class="ml-12">
                        <label for="name" class="text-white mr-2 ml-2 mt-4">NOVA SLIKA PROFILA:</label>
                        <input type="file" class="text-white bg-green-500" name="image">
                    </div>
                </div>
            </div>
            <div class="flex">
                <button class="btn-green-select mt-10" type="submit">SPREMI PROMJENE</button>
                <a href="{{ route('index', []) }}">
                <button class="btn-invisible mt-10 ml-5">ODUSTANI</button>
            </a>
            </div>
            <p class="text-sm text-gray-500">* ova polja su obavezna</p>
            
            
        </div>
    </form>
    
   
    
</div>
   
@endsection