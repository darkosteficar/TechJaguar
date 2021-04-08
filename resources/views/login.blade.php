@extends('layouts.app')

@section('content')
<form action="{{ route('login', []) }}" method="post">
@csrf
<div class="w-1/2 mx-auto my-20 shadow-2xl">
    <div class="bg-gray-900 p-5 flex flex-col content-center ">
        <p class="text-gray-300 font-bold text-3xl pb-10 text-center">Sign in to BCompare</p>
        @if (session('status'))
            <div class="bg-red-500 text-gray-200 border-gray-200 border w-2/3 self-center text-center rounded p-2 text-lg font-semibold">
                {{ session('status') }}
            </div> 
        @endif
        <label for="" class="self-center font-bold text-gray-600 w-9/12 text-lg">Username</label>
        <input type="text"
            class="input-registration @error('username')
                border-red-500
            @enderror"
            placeholder="Username" name="username">

            @error('username')
            <div class="text-red-500 w-9/12 self-center">
                {{ $message }}
            </div> 
            @enderror
        <label for="" class="self-center font-bold text-gray-600 w-9/12 text-lg">Password</label>
        <input type="password"
            class="input-registration @error('password')
             border-red-500
            @enderror"
            placeholder="Password" name="password">
            @error('password')
            <div class="text-red-500 w-9/12 self-center">
                {{ $message }}
            </div> 
            @enderror
        <div class="flex w-9/12 items-center justify-center mb-2 mx-auto">
            <p class="text-gray-300 font-semibold">Not registered? Sign Up </p>
            <a href="{{ route('register', []) }}"><p class="text-green-500 font-bold text-lg ml-1"> here </p>
            </a>
            
        </div>

        <button
            class="bg-gradient-to-r hover:bg-green-400  p-2 w-1/3 self-center  font-medium hover:text-gray-800  text-lg shadow-2xl rounded-md bg-gray-800 text-green-400" type="submit">
            SIGN IN
            <img src="images/login.png" alt="" width="15" class="inline-block ml-1" > </button>
    </div>

</div>
</form>
@endsection