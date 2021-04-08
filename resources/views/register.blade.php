@extends('layouts.app')

@section('content')
<form action="{{ route('register', []) }}" method="post">
<div class="w-1/2 mx-auto my-20 shadow-2xl">
    <div class="bg-gray-900 p-5 flex flex-col content-center ">
        <p class="text-gray-300 font-bold text-3xl pb-10 text-center">Sign up to BCompare</p>
            @csrf
            <label for="" class="self-center font-bold text-gray-600 w-9/12 text-lg">Name</label>
            <input type="text" class="input-registration form-input @error('name')
                border-red-500
            @enderror" placeholder="Name" name="name">
            @error('name')
            <div class="text-red-500 w-9/12 self-center">
                {{ $message }}
            </div> 
            @enderror
            
            <label for="" class="self-center font-bold text-gray-600 w-9/12 text-lg">Surname</label>
            <input type="text" class="input-registration form-input @error('surname')
                border-red-500
            @enderror" placeholder="Surname" name="surname">
            @error('surname')
            <div class="text-red-500 w-9/12 self-center">
                {{ $message }}
            </div> 
            @enderror

            <label for="" class="self-center font-bold text-gray-600 w-9/12 text-lg">Username</label>
            <input type="text" class="input-registration form-input @error('username')
            border-red-500
            @enderror" placeholder="Username " name="username">
            @error('username')
            <div class="text-red-500 w-9/12 self-center">
                {{ $message }}
            </div> 
            @enderror

            <label for="" class="self-center font-bold text-gray-600 w-9/12 text-lg">Email</label>
            <input type="email" class="input-registration @error('email')
            border-red-500
            @enderror" placeholder="Email" name="email">
            @error('email')
            <div class="text-red-500 w-9/12 self-center">
                {{ $message }}
            </div> 
            @enderror
            
            <label for="" class="self-center font-bold text-gray-600 w-9/12 text-lg">Password</label>
            <input type="password" class="input-registration @error('password')
            border-red-500
            @enderror" placeholder="Password" name="password">
            @error('password')
            <div class="text-red-500 w-9/12 self-center">
                {{ $message }}
            </div> 
            @enderror

            <label for="" class="self-center font-bold text-gray-600 w-9/12 text-lg">Confirm Password</label>
            <input type="password" class="input-registration" placeholder="Confirm Password" name="password_confirmation">
            
            <div class="flex w-9/12 items-center justify-center mb-2 mx-auto">
                <p class="text-gray-300 font-semibold">Already a member? Sign in </p>
                <a href="{{ route('login', []) }}"><p class="text-green-500 font-bold text-lg ml-1"> here </p>
                </a>
            </div>

            <button class="btn-green" type="submit">
                SIGN UP</button>
        
      
        
    </div>
</div>
</form>
@endsection