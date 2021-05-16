<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCompare</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <script src="{{ asset('js/chartjs.min.js') }}"></script>

</head>

<body class="bg-gray-800 font-source">
    <div class="w-3/4 mx-auto">
        <nav>
            <div class="lg:flex justify-between mt-10">
                <div class="lg:flex items-center">
                    <a href="{{ route('index', []) }}">
                    <div class="flex lg:mb-0 mb-3">
                        <img src="../images/logo.png" alt="" width="40" class="mr-4">
                        <p
                            class="text-green-400 font-semibold text-3xl mr-20 hover:text-green-50 transition ease-in-out duration-500">
                            BCompare</p>
                    </div>
                </a>
                    <div class="relative ">
                        <button id="news-dropdown-button" class="border-t-4  border-transparent rounded-sm
                        hover:text-green-50 transition ease-in duration-500 hover:border-green-400 mr-12 ">
                            <p class="text-green-400 font-bold text-xl  ">
                           News</p>
                        </button>
                       
                        <div class="hidden absolute top-10 z-20 bg-gray-700 justify-between  px-4 text-green-400 font-bold text-xl rounded-sm border border-green-500" id="news-dropdown">
                            <div class="mr-4">
                                <div class="bg-gray-700 mt-2 border border-gray-700 hover:border-green-500 hover:bg-gray-500 transition ease-in duration-500 ">
                                    <a href=""><p class="text-center text-xl text-gray-300 px-4 ">Manufacturers</p></a>
                                </div>
                                <hr class="mb-2">
                                <div class="bg-gray-700 border border-gray-700 hover:border-green-500 hover:bg-gray-800 hover:text-gray-200 transition ease-in duration-500 rounded-sm font-semibold">
                                    <a href="{{ route('post.category', []) }}"><p class="text-center">AMD</p></a>
                                </div>
                                
                                <div class="bg-gray-700 border border-gray-700 hover:border-green-500 hover:bg-gray-800 hover:text-gray-200 transition ease-in duration-500 rounded-sm font-semibold">
                                    <a href=""><p class="text-center">Nvidia</p></a>
                                </div>
                                <div class="bg-gray-700 border border-gray-700 hover:border-green-500 hover:bg-gray-800 hover:text-gray-200 transition ease-in duration-500 rounded-sm font-semibold">
                                    <a href=""><p class="text-center">Intel</p></a>
                                </div>
                            </div>
                            <div class="mx-4 my-2">
                                <div class="bg-gray-700 border border-gray-700 hover:border-green-500 hover:bg-gray-500 transition ease-in duration-500 ">
                                    <a href=""><p class="text-center text-xl text-gray-300 px-4">Categories</p></a>
                                </div>
                                <hr class="mb-2">
                                <div class="bg-gray-700 border border-gray-700 hover:border-green-500 hover:bg-gray-800 hover:text-gray-200 transition ease-in duration-500 rounded-sm">
                                    <a href=""><p class="text-center">News</p></a>
                                </div>
                                
                                <div class="bg-gray-700 border border-gray-700 hover:border-green-500 hover:bg-gray-800 hover:text-gray-200 transition ease-in duration-500 rounded-sm">
                                    <a href=""><p class="text-center">Hardware</p></a>
                                </div>
                                <div class="bg-gray-700 border border-gray-700 hover:border-green-500 hover:bg-gray-800 hover:text-gray-200 transition ease-in duration-500 rounded-sm">
                                    <a href=""><p class="text-center">Software</p></a>
                                </div>
                                <div class="bg-gray-700 border border-gray-700 hover:border-green-500 hover:bg-gray-800 hover:text-gray-200 transition ease-in duration-500 rounded-sm">
                                    <a href=""><p class="text-center">Leaks</p></a>
                                </div>
                                <div class="bg-gray-700 border border-gray-700 hover:border-green-500 hover:bg-gray-800 hover:text-gray-200 transition ease-in duration-500 rounded-sm">
                                    <a href=""><p class="text-center">Rumours</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('compare', []) }}">
                        <p class="text-green-400 font-bold text-xl mr-12 border-t-4  border-transparent rounded-sm
                            hover:text-green-50 transition duration-500 ease-in hover:border-green-400">
                            Compare</p>
                    </a>
                    <a href="{{ route('build', []) }}">
                    <p class="text-green-400 font-bold text-xl mr-12 border-t-4  border-transparent rounded-sm
                       hover:text-green-50 transition duration-500 ease-in hover:border-green-400">
                        Build</p>
                    </a>
                </div>
                <div class="lg:flex lg:items-center">
                    @auth
                    <a href="{{ route('login', []) }}"><p class="text-green-400 font-bold text-xl mr-12 border-t-4  border-transparent rounded-sm
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
                        <input type="text"
                            class="outline-none bg-gray-800 border-green-400 border-2 w-full h-10 rounded-xl focus:border-gray-600 focus:bg-gray-700 pl-4 text-white  font-semibold"
                            placeholder="Search">
                        <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                            <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                xml:space="preserve" width="512px" height="512px">
                                <path
                                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
           
        </nav>
    </div>
    <div class="mx-auto">
        @yield('content')
    </div>
   



    <footer>
        <div class="w-3/4 mx-auto">
            <div class="bg-gray-700 text-gray-400  ">
                <p class="text-center pt-10 pb-5 font-semibold">BCompare Copyright &copy;2021. All rights reserved.</p>

            </div>

        </div>
    </footer>
    <script>
      

            const menuBtn = document.querySelector('#news-dropdown-button')
            const dropdown = document.querySelector('#news-dropdown')

            menuBtn.addEventListener('click', () => {
                dropdown.classList.toggle('hidden')
                dropdown.classList.toggle('flex')
            })
        
    </script>


</body>

</html>