<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techuar</title>
    <link rel="icon" href="{{ URL::asset('images/logo.png') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <script src="{{ asset('js/chartjs.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

</head>

<body class="bg-gray-800 font-poppins bg-vanishing-stripes ">
    
    <div class="bg-gray-900 pb-3 bg-opacity-70 ">
        <div class="w-3/4 mx-auto "> 
            <nav>
                <div class="lg:flex justify-between mt-5 pt-2 ">
                    <div class="lg:flex items-center ">
                        
                        <div class="flex lg:mb-0 mb-3 items-center text-green-400 hover:text-gray-600">
                            <!-- Logo 2 <img src="../images/logo.png" alt="" width="40" class="mr-4"> -->
                            <!-- Logo -->
                            <div class="w-10 mr-2 ">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 239.74 286.87" class="fill-current h-full transition ease-in-out duration-500"><defs>
                                <style></style></defs><path class="cls-1" d="M432.17,302.26s10-16.43,20-16.43c.69,0,.05,5.91.05,5.91s-.41,8.24-9.59,10.08c-4.89,1-7.58.29-7.58.29a4.42,4.42,0,0,0-2.44,1.13C432,303.68,432.17,302.26,432.17,302.26Z" transform="translate(-276.3 -164.52)"/><path class="cls-1" d="M359.21,302s-10-16.44-20-16.44c-.68,0-.05,5.92-.05,5.92s.41,8.24,9.59,10.08c4.89,1,7.58.29,7.58.29a4.47,4.47,0,0,1,2.45,1.13C359.35,303.42,359.21,302,359.21,302Z" transform="translate(-276.3 -164.52)"/><path class="cls-1" d="M395.65,420.83s-4,6.78-23.87,8.34-24.26-4.3-24.26-4.3.78,7.56,4.18,12a32.88,32.88,0,0,0,7.17,6.91,16.41,16.41,0,0,0,.11-3.57c-.21-1-.83-3.06-.83-3.06s12.2,15.18,37.37,14.2S432.37,438,432.37,438a14.39,14.39,0,0,1,.13,2.67,14.94,14.94,0,0,1-.39,2.68s4.11-.72,8.54-7.57,3.26-10.69,3.26-10.69-10.89,5.47-26.67,3.58S395.65,420.83,395.65,420.83Z" transform="translate(-276.3 -164.52)"/><path class="cls-1" d="M439,308.83a22.62,22.62,0,0,1,2.76-1A13,13,0,0,0,439,308.83Z" transform="translate(-276.3 -164.52)"/><path class="cls-1" d="M503.78,250.48c-5.87-13.39-36.26-41.74-36.26-41.74s3.65,2.35,6,2.61,9.13,3.13,9.13,3.13,1.05,1.56,3.65-13-2.6-18.26.79-16.43,7.3,12,7.3,12,1.83-6.52-2.09-17.74S484,164.65,484,164.65s-8,0-24.26,5.74c-11.42,4-26.87,22.44-26.87,22.44s.71-1,1.2-4.73,1.27-4.4,1.27-4.4a88.43,88.43,0,0,0-40.2-11.35c-18-.7-39.33,11.44-39.33,11.44s.88.2,1.86,3.53a19.67,19.67,0,0,1,.88,5.77s-11.25-13.7-23-21-28.37-7.53-28.37-7.53-2.64,2.94-6.65,11.55-3.13,22.2-3.13,22.2,1-4,2-6.85,6-7.24,6-7.24.2,3.82-.29,13.11,4.5,18.85,4.5,18.85,2.64-2,5.09-3.68,10.66-3.72,10.66-3.72-18.78,12.33-35,37.27-13.8,49.21-13.8,49.21a39.82,39.82,0,0,1,4.41-9.88,15.91,15.91,0,0,1,7.85-6.26c-.46,1.57-1.09,7.73-1.17,29.18-.13,34.83,20.09,54.52,20.09,54.52a60.58,60.58,0,0,0-3.52-9.39c-2-3.78-1.44-15.52-1.44-15.52s3.92,10.7,8.48,18.13,17.74,14.87,17.74,14.87,2.22-3.39,6-8.87c2.73-3.95,7.55-6.07,10-6.94a15.28,15.28,0,0,0-3.51,4.33,51.55,51.55,0,0,0-4.56,8.74,78.13,78.13,0,0,0,4.43,8.22c3.91,6.78,17.35,12.26,17.35,12.26a37.35,37.35,0,0,1-11.74-1.7c-6.13-2-11.74-6.91-11.74-6.91l-.26,9.39a92.54,92.54,0,0,0,7.7,8.35c3.91,3.65,14.73,8.09,14.73,8.09a26.8,26.8,0,0,1-5.87-.13A71.32,71.32,0,0,1,341,403.61s2.35,13.3,26.22,13.43,24.52-8.87,24.52-8.87L387.57,405l-1.44-7s-4.83-8.87-8.22-9.91-3,4.82-3,4.82-3-6.65-4.43-7.69S366.3,373,366.3,373s16.9,11,32,10c13.7-.91,26.35-10.43,26.35-10.43s-1.7,6.91-2,9.26-6.39,11.08-6.39,11.08.39-4.82-3.39-4.3-2.87,3-5.35,5.09S404.39,405,404.39,405l-5,3.66s4.7,9.78,28.83,7.82c15.75-1.28,21.91-13.17,21.91-13.17s-3.39,1.17-5.6,1.95-9.92.4-9.92.4,9.13-4.44,13.05-6.53,8.34-9.39,8.34-9.39l-.26-10.17a33.12,33.12,0,0,0-6,4.69c-2.87,2.87-17.48,5.74-17.48,5.74s9.13-7.3,13.83-9.65,7.57-9.65,7.57-9.65,1.82-5.22-1.57-8.35a40.67,40.67,0,0,1-6.26-8.09s5.48,4.44,9.65,7.57,7.05,8.61,7.05,8.61,11.21-6.52,16.43-12,9.65-20.09,9.65-20.09-.32,3.65-.65,10.89c-.16,3.54-3.52,13.63-3.52,13.63s14.22-19.69,18-38.87c2.56-13,.52-45.39.52-45.39a21.31,21.31,0,0,0,6,6c4.17,2.87,7,11.74,7,11.74S516.43,279.3,503.78,250.48ZM308.42,282.21c-.5,4.44-3.06,9.25-4.89,9s-2.76-5.24-2.44-9.1c.38-4.62,2.82-9.78,4.69-9.59S308.91,277.91,308.42,282.21Zm47.13-32.58s8,6.45,10.11,12.78,1.44,19.17,1.44,19.17-7.89-13.37-13-18.78-19.43-8.54-19.43-8.54,8.08-.85,11.6-1,11,3.72,11,3.72C358.29,251.85,355.55,249.63,355.55,249.63ZM336.89,210c4.4-3.36,10.49-6.22,11.35-5.09s-3,5.71-7.14,8.71c-4.41,3.21-10.21,5.33-11,4.21S333.57,212.54,336.89,210Zm-15.26,31.4c3.33-4.08,8.9-7.43,10.57-6.06s-.6,7.31-3.72,11.25c-3.34,4.2-9,7.72-10.66,6.36S318.32,245.48,321.63,241.41Zm-6.46,75.72c-1.68-.13-3-4.29-2.83-7.63s2-7.5,3.71-7.43,3,3.65,3.13,6.55C319.35,312.76,317,317.27,315.17,317.13ZM367.27,307c-1.83,23.21-18,28.17-18,28.17s11.1-21.13,9.07-22.44c0,0-3.51-6.35-12.22-5.9l-1.63.11a22.12,22.12,0,0,1,12.6,4.3S356,321.6,355,319.08c-5.58-14.92-28.69-6.91-16.14-11.22.44-.16.88-.28,1.32-.4a11.29,11.29,0,0,0-1.79.51,4.51,4.51,0,0,0-1.14-.14h-.2l2.75-2.85c-10.13-3-10.43-20.55-10.43-20.55l-7.72.56s10.11-6.59,18.46-5.81,12.78,2.87,15.78,4.7-1.83-7.11-3-8.48C352.92,275.41,369.09,283.76,367.27,307ZM352,235.35c-1.67-2.57,3.54-9,7.43-12.33,5.86-5.06,14.94-8.65,17.22-6.06,2,2.25,1.86,7.14-5.48,13.11C364.1,235.78,353.85,238.25,352,235.35Zm28.76,21.42c-3,1.74-7.4,1.4-8-.19-.55-1.39,1.75-3.69,3.71-4.8,2.87-1.62,7-1.83,7.83-.29C384.92,252.85,382.92,255.51,380.72,256.77Zm-3.13-60c-4.64,1.71-10.49,2.09-11,.69s4-4.33,8.12-5.77c4.54-1.6,10.21-1.87,10.66-.49S381.41,195.4,377.59,196.8Zm92.23,45.14c3.31,4.06,5.49,10.19,3.82,11.54s-7.33-2.15-10.67-6.36c-3.12-3.93-5.36-9.89-3.71-11.25S466.49,237.85,469.82,241.94Zm-26.61-36.49c.86-1.14,7,1.73,11.35,5.09,3.32,2.53,7.49,6.72,6.75,7.82s-6.55-1-11-4.2C446.24,211.16,442.4,206.52,443.21,205.45ZM406,191.75c.45-1.38,6.12-1.11,10.66.49,4.09,1.45,8.58,4.43,8.12,5.77s-6.32,1-10.95-.68C410,195.92,405.6,193.09,406,191.75Zm12.72,65.35c-.63,1.59-5,1.94-8,.2-2.21-1.27-4.21-3.93-3.53-5.29.78-1.53,5-1.32,7.83.3C417,253.41,419.3,255.72,418.76,257.1Zm-3.92-39.62c2.28-2.59,11.36,1,17.22,6.07,3.9,3.37,9.11,9.76,7.44,12.32-1.89,2.91-12.15.44-19.18-5.28C413,224.62,412.87,219.73,414.84,217.48Zm9.44,64.37s-.65-12.85,1.44-19.18,10.11-12.78,10.11-12.78-2.74,2.22-1.7,7.31c0,0,7.44-3.92,11-3.72s11.61,1,11.61,1-14.35,3.13-19.44,8.55S424.28,281.85,424.28,281.85Zm38.49,3.25s-.31,17.53-10.44,20.54l2.77,2.87-.11.25c6.9,2.46-13.22-3.34-18.38,10.45-.77,2.08-1.66-4.57-2-7a10.39,10.39,0,0,0-.83,1.16c-2,1.3,9.08,22.43,9.08,22.43s-16.18-4.95-18-28.17,14.34-31.56,14.34-31.56c-1.17,1.36-6,10.3-3,8.47s7.44-3.91,15.79-4.69,18.45,5.8,18.45,5.8Zm13.51,32.56c-1.82.13-4.18-4.38-4-8.51.11-2.9,1.51-6.5,3.13-6.56s3.55,4,3.72,7.44S478,317.53,476.28,317.66Zm11.64-25.93c-1.82.25-4.39-4.56-4.89-9s.83-9.49,2.64-9.68,4.31,5,4.7,9.58C490.68,286.49,489.69,291.49,487.92,291.73Z" transform="translate(-276.3 -164.52)"/><path class="cls-2 " d="M307.15,164.52" transform="translate(-276.3 -164.52)"/></svg>
                            </div>
                            <p class="  font-semibold text-3xl mr-20  transition ease-in-out duration-500">
                                <a href="{{ route('index', []) }}">Techuar</a>
                            </p>
                           
                        </div>
                    
                        <div class="relative " x-data="{show: false}">
                            <button  @click="show = true" class="border-t-4  border-transparent rounded-sm
                            hover:text-green-50 transition ease-in duration-500 hover:border-green-400 mr-12 ">
                                <p class="text-green-400 font-bold text-xl  ">
                            News</p>
                            </button>
                        
                            <div  x-show.transition.origin.top.left="show" @click.away="show = false" class=" absolute top-10 z-20 bg-gray-900  justify-between  px-5 pb-4 pt-2 text-green-400 font-semibold text-xl rounded-sm border border-green-100 flex lg:w-[450px]" id="news-dropdown">
                                <div class="mr-4">
                                    <div class="bg-gray-700 mt-2 py-1 ">
                                        <p class="text-center text-xl bg-gray-900 bg-opacity-80 px-4 py-2 text-white ">PROIZVOĐAČI</p>
                                    </div>
                                    @foreach ($allManus as $manu)
                                        <div class="bg-gray-900 bg-opacity-80 p-1 border border-gray-700 hover:border-green-500 hover:bg-gray-800 hover:text-gray-200 transition ease-in duration-500 rounded-sm ">
                                            <a href="{{ route('manufacturer', ['manufacturer'=>$manu->id]) }}"><p class="text-center">{{ $manu->name }}</p></a>
                                        </div>
                                    @endforeach
                                    
                                    
                                </div>
                                <div class="lg:mr-4">
                                    <div class="bg-gray-700 mt-2 py-1 ">
                                        <p class="text-center text-xl bg-gray-900 bg-opacity-80 px-4 py-2 text-white ">KATEGORIJE</p>
                                    </div>
                                    @foreach ($allCats as $cat)
                                        <div class="bg-gray-900 bg-opacity-80 py-1 px-4 border border-gray-700 hover:border-green-500 hover:bg-gray-800 hover:text-gray-200 transition ease-in duration-500 rounded-sm">
                                            <a href="{{ route('category', ['category'=>$cat->id]) }}"><p class="text-center">{{ $cat->name }}</p></a>
                                        </div>
                                    @endforeach
                                   
                                    
                                   
                                </div>
                            </div>
                        </div>
                           
                        <div class="relative " x-data="{show: false}">
                            <button  @click="show = true" class="border-t-4  border-transparent rounded-sm
                            hover:text-green-50 transition ease-in duration-500 hover:border-green-400 mr-12 ">
                                <p class="text-green-400 font-bold text-xl  ">
                            Compare</p>
                            </button>
                        
                            <div  x-show.transition.origin.top.left="show" @click.away="show = false" class=" absolute top-10 z-20 bg-gray-900  justify-between   pl-5 pb-4 pt-2 text-green-400 font-semibold text-xl rounded-sm border border-green-100 flex w-64" id="news-dropdown">
                                <div class="ml-2">
                                    <div class="bg-gray-700 mt-2 py-1 ">
                                        <p class="text-center text-xl bg-gray-900 bg-opacity-80 px-4 py-2 text-white ">Komponente</p>
                                    </div>
                                    
                                    <div class="bg-gray-900 bg-opacity-80 p-2 border border-gray-700 hover:border-green-500 hover:bg-gray-800 hover:text-gray-200 transition ease-in duration-500 rounded-sm ">
                                        <a href="{{ route('compareCpu', []) }}"><p class="text-center">Procesori</p></a>
                                    </div>
                                    <div class="bg-gray-900 bg-opacity-80 py-2 px-4 border border-gray-700 hover:border-green-500 hover:bg-gray-800 hover:text-gray-200 transition ease-in duration-500 rounded-sm ">
                                        <a href="{{ route('compareGpu', []) }}"><p class="text-center">Grafičke kartice</p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('build', []) }}">
                        <p class="text-green-400 font-bold text-xl mr-12 border-t-4  border-transparent rounded-sm
                        hover:text-green-50 transition duration-500 ease-in hover:border-green-400">
                            Build</p>
                        </a>
                    </div>
                    <div class="lg:flex lg:items-center">
                        @auth
                        <a href="{{ route('profile.index', []) }}"><p class="text-green-400 font-bold text-xl mr-12 border-t-4  border-transparent rounded-sm
                            hover:text-green-50 transition ease-in duration-500 hover:border-green-400">
                        {{ auth()->user()->username }}</p>
                        </a>
                        <a href="{{ route('admin.dashboard', []) }}"><p class="text-green-400 font-bold text-xl mr-12 border-t-4  border-transparent rounded-sm
                            hover:text-green-50 transition ease-in duration-500 hover:border-green-400">
                        Admin Panel</p>
                        </a>
                        <form action="{{ route('logout', []) }}" method="post">
                            @csrf
                            <button type="submit" class="text-green-400 font-bold text-xl mr-12 border-t-4  border-transparent rounded-sm
                            hover:text-green-50 transition ease-in duration-500 hover:border-green-400">Logout
                            </button>
                        
                        </form>
                        
                        @endauth
                        
                        @guest
                        <a href="{{ route('login', []) }}"><p class="text-green-400 font-bold text-xl mr-12 border-t-4  border-transparent rounded-sm
                            hover:text-green-50 transition ease-in duration-500 hover:border-green-400">
                        Login</p>
                        </a>
                        @endguest
                        
                        

                        <div class="pt-2 relative mx-auto text-white">
                            <form action="{{ route('search', []) }}">
                                <input type="text"
                                    class=" bg-gray-800 border-green-400 border-2 w-full h-10 rounded-sm focus:border-gray-600 focus:bg-gray-700 pl-4 text-white  font-semibold focus:outline-none focus:ring-0"
                                    placeholder="Pretraga" name="key">
                                <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                                    <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                        viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                        xml:space="preserve" width="512px" height="512px">
                                        <path
                                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                    </svg>
                                </button>
                            </form>
                          
                        </div>
                    </div>
                </div>
            
            </nav>
        </div>
    </div>
    <div class="mx-auto">
        @yield('content')
    </div>
   
    


    <footer>
        <div class="w-3/4 mx-auto ">
            <div class="bg-gray-900 bg-opacity-70 text-gray-400  ">
                <p class="text-center pt-10 pb-5 font-semibold">BCompare Copyright &copy;2021. All rights reserved.</p>

            </div>

        </div>
    </footer>
    <script>
      
            /*
            const menuBtn = document.querySelector('#news-dropdown-button')
            const dropdown = document.querySelector('#news-dropdown')

            menuBtn.addEventListener('click', () => {
                dropdown.classList.toggle('hidden')
                dropdown.classList.toggle('flex')
            })
            */
        
    </script>
    
    
    @livewire('livewire-ui-modal')
    @livewireUIScripts
    @livewireScripts

</body>

</html>