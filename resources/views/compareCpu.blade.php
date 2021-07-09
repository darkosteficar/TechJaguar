@extends('layouts.app')


@section('content')

@if (session()->has('error')))
    <div class="bg-red-500 text-center w-1/3 mx-auto font-semibold  text-white py-4 mt-6 rounded-sm">
        {{ session('error') }}
    </div><br />
    @endif


<div class="xl:flex justify-between  lg:w-4/5 mx-auto my-10 bg-gray-900 bg-opacity-50 py-2 px-6 ">
    
   
        <div class="container mx-auto">
            <p class="font-bold text-2xl text-gray-200 mb-3 text-center">CPU 1</p>

            <div class="select-box mx-auto">
                <div class="options-container bg-gray-900 bg-opacity-90 font-medium">
                    @foreach ($cpus as $cpu)
                        <div class="option">
                            <input type="radio" class="radio" id="automobiles" name="category" value="{{ $cpu->id }}"/>
                            <label for="cpus">{{ $cpu->name }}</label>
                            <input type="hidden" name="" class="gpuId" >
                        </div>
                    @endforeach
                </div>

                <div class="selected border border-green-400">
                    @if (isset($names))
                        {{ $names[0] }}
                    @else
                        Select a CPU
                    @endif
                    
                </div>

                <div class="search-box">
                    <input type="text" class="bg-gray-900 bg-opacity-90 text-green-400  focus:ring-3 focus:border-green-400 focus:border-2 disable-outline" placeholder="RX 5700 XT,RTX 3060 Ti..." />
                </div>
            </div>
        </div>
        <div class="container xl:ml-5 mx-auto">
            <p class="font-bold text-2xl text-gray-200  mb-3 text-center">CPU 2</p>

            <div class="select-box mx-auto  ">
                <div class="options-container2 bg-gray-900 opacity-90 font-medium ">
                    @foreach ($cpus as $cpu)
                        <div class="option2">
                            <input type="radio" class="cpu2_id radio" id="automobiles" name="category" value="{{ $cpu->id }}"/>
                            <label for="cpus">{{ $cpu->name }}</label>
                            <input type="hidden" name="" class="gpuId" >
                        </div>   
                    @endforeach
                </div>
                <div class="selected2 bg-gray-900 bg-opacity-90 border border-green-400 ">
                    @if (isset($names))
                        {{ $names[1] }}
                    @else
                        Select a CPU
                    @endif
                    
                </div>

                <div class="search-box2">
                    <input type="text" class="cpu2_input bg-gray-900 text-green-400  focus:ring-3 focus:border-green-300 focus:border-2 disable-outline" placeholder="Ryzen 7 5800X,Ryzen 5 2600X..." />
                </div>
            </div>
        </div>
        <div class="lg:mt-7 ml-12">
            <form action="{{ route('compareCpu', []) }}" method="GET">
                <input type="hidden" name="cpu1" id="cpu1_id">
                <input type="hidden" name="cpu2" id="cpu2_id">
                <button class="hover:bg-green-400 py-2 px-4 my-4 font-medium hover:text-gray-800  text-lg shadow-2xl rounded-md bg-gray-900 bg-opacity-90 border border-green-400 text-green-400 transition ease-in duration-300" type="submit">
                    COMPARE
                </button>
            </form>
            @if (isset($names))
                <div x-data="{show: false}">
                    <button @click="show = true" class="hover:bg-green-400 py-2 px-4 my-4 font-medium hover:text-gray-800  text-lg shadow-2xl rounded-md bg-gray-900 bg-opacity-90 border border-green-400 text-green-400 transition ease-in duration-300 lg:hidden block" >
                        FILTERS
                    </button>
                
                    <div  x-show.transition.origin.top.left="show" @click.away="show = false" class="  top-10 z-20 bg-gray-900  justify-between  pl-5 pb-4 pt-2 text-green-400 font-semibold text-xl rounded-sm border border-green-100 flex w-80" id="news-dropdown">
                        <div class=" bg-gray-900 bg-opacity-90 mr-4 text-green-400  ">
                            <p class="text-xl font-semibold text-gray-200 ml-3 mt-1 mb-2">Filters</p>
                            <div class="ml-4 flex flex-col">
                                <p class="text-lg font-bold">Resolutions</p>
                                <label class="inline-flex items-center">
                                <span class="ml-2 text-lg mr-2">1080p</span>
                                <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="1080p" checked onchange="filter(this)">
                                </label>
                                <label class="inline-flex items-center">
                                <span class="ml-2 text-lg mr-2">1440p</span>
                                <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="1440p" checked onchange="filter(this)">
                                </label>
                                <label class="inline-flex items-center">
                                <span class="ml-2 text-lg mr-2">4K</span>
                                <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="4K" checked>
                                </label>
                                <p class="text-lg mt-4 font-bold">Apps</p>
                                @foreach ($apps as $app)
                                    <label class="inline-flex items-center">
                                        <span class="ml-2 text-lg mr-2">{{ $app->name }}</span>
                                        <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm " id="{{ $app->tag }}" checked onchange="filter(this)">
                                    </label>
                                @endforeach
                                <p class="text-lg mt-4 font-bold">CPU Wins</p>
                                <label class="inline-flex items-center">
                                    <span class="ml-2 text-lg mr-2">CPU 1 Wins</span>
                                    <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="cpu1_win" checked onchange="filter(this)">
                                </label>
                                <label class="inline-flex items-center">
                                    <span class="ml-2 text-lg mr-2">CPU 2 Wins</span>
                                    <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="cpu2_win" checked onchange="filter(this)" >
                                </label>
                                <label class="inline-flex items-center">
                                    <span class="ml-2 text-lg mr-2"> {{ '<15% Win' }} </span>
                                    <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="smallDiff" checked onchange="filter(this)" >
                                  </label>
                                  <label class="inline-flex items-center">
                                    <span class="ml-2 text-lg mr-2"> {{ '>15% Win' }} </span>
                                    <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="bigDiff" checked onchange="filter(this)" >
                                  </label>
                    
                                <p class="text-lg mt-4 font-bold">Type</p>
                                <label class="inline-flex items-center">
                                <span class="ml-2 text-lg mr-2">Benchmark</span>
                                <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="benchmark" checked onchange="filter(this)">
                                </label>
                                <label class="inline-flex items-center">
                                <span class="ml-2 text-lg mr-2">Game</span>
                                <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="game" checked onchange="filter(this)" >
                                </label>
                                <label class="inline-flex items-center">
                                <span class="ml-2 text-lg mr-2">Productivity</span>
                                <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="productivity" checked onchange="filter(this)" >
                                </label>
                                
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
        
            </div>

</div>

@if (session()->has('status')))
    <div class="bg-green-600 text-white font-semibold w-1/2 mx-auto text-center py-3 mb-12 rounded-sm ">
        {{ session('status') }}
    </div>
@endif


<div class=" ">
    @if (isset($names))
    <div class="flex justify-center w-10/12 lg:w-2/3 mx-auto">
        <div class="lg:w-1/3">

        </div>
        <div class=" xl:w-1/3 w-1/2 justify-center">
            <img src="images/{{ $picked[0]->images()->first()->path }}" alt="" class="h-32 mx-auto">
            <p class="text-green-400 2xl:text-xl my-2 bg-gray-900 bg-opacity-70 text-center ml-2 p-2 border border-green-400">{{ $picked[0]->name }}</p>
        </div>
        <div class=" lg:w-1/3 w-1/2 justify-center">
            <img src="images/{{ $picked[1]->images()->first()->path }}" alt="" class="h-32 mx-auto">
            <p class="text-green-400 2xl:text-xl my-2 bg-gray-900 bg-opacity-70 text-center ml-2 p-2 border border-green-400">{{ $picked[1]->name }}</p>
        </div>
    </div>
    <div class=" text-green-400 flex justify-center lg:w-2/3 mx-auto border-b-4 border-green-400 bg-gray-900 bg-opacity-80 mb-4">
        <div class=" w-1/3 bg-gray-900 bg-opacity-70 2xl:text-lg text-center text-green-400">
            
            <p class="my-2 ">Socket:</p>
            <p class="mb-2 ">Manufacturer:</p>
            <p class="mb-2 ">Base Clock:</p>
            <p class="mb-2 ">Boost Clock:</p>
            <p class="mb-2 ">Core Count:</p>
            <p class="mb-2 ">TDP:</p>
            <p class="mb-2 ">Integrated Graphics:</p>
            <p class="mb-2 ">SMT:</p>
            
        </div>
        <div class="text-center w-1/3 justify-center 2xl:text-lg">
           
            <p class=" my-2 hover:bg-gray-800">{{ $picked[0]->socket }}</p>
            <p class=" my-2 hover:bg-gray-800">{{ $picked[0]->manufacturer->name }}</p>
            <p class=" my-2 hover:bg-gray-800">{{ $picked[0]->base_clock }} Ghz</p>
            <p class=" my-2 hover:bg-gray-800">{{ $picked[0]->boost_clock }} Ghz</p>
            <p class=" my-2 hover:bg-gray-800">{{ $picked[0]->core_count }}</p>
            <p class=" my-2 hover:bg-gray-800">{{ $picked[0]->tdp }} W</p>
            <p class=" my-2 hover:bg-gray-800">@if ($picked[0]->integrated_graphics)
                Da
            @else
                Ne
            @endif</p>
            <p class="text-lg my-2 hover:bg-gray-800">@if ($picked[0]->smt)
                Da
            @else
                Ne
            @endif</p>
        </div>
        <div class=" w-1/3 justify-center text-center 2xl:text-lg">
            
            <p class=" my-2 hover:bg-gray-800">{{ $picked[1]->socket }}</p>
            <p class=" my-2 hover:bg-gray-800">{{ $picked[1]->manufacturer->name }}</p>
            <p class=" my-2 hover:bg-gray-800">{{ $picked[1]->base_clock }} Ghz</p>
            <p class=" my-2 hover:bg-gray-800">{{ $picked[1]->boost_clock }} Ghz</p>
            <p class=" my-2 hover:bg-gray-800">{{ $picked[1]->core_count }}</p>
            <p class=" my-2 hover:bg-gray-800">{{ $picked[1]->tdp }} W</p>
            <p class=" my-2 hover:bg-gray-800">@if ($picked[1]->integrated_graphics)
                Da
            @else
                Ne
            @endif</p>
            <p class="text-lg my-2 hover:bg-gray-800">@if ($picked[1]->smt)
                Da
            @else
                Ne
            @endif</p>
        </div>
       
    </div>
    <div class="lg:flex justify-center">
        <div class=" 2xl:w-2/12 w-3/12 bg-gray-900 bg-opacity-90 mr-4 text-green-400 border-r-2 border-green-400 lg:block hidden">
            <p class="text-xl font-semibold text-gray-200 ml-3 mt-1 mb-2">Filters</p>
            <div class="ml-4 flex flex-col">
                <p class="text-lg font-semibold mb-2">Resolutions</p>
                <label class="flex justify-between items-center bg-transparent hover:bg-gray-800 mr-10">
                <span class="ml-2 mr-2">1080p</span>
                <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm mb-1" id="1080p" checked onchange="filter(this)">
                </label>
                <label class="flex justify-between items-center bg-transparent hover:bg-gray-800 mr-10">
                    <span class="ml-2 mr-2">1440p</span>
                    <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm mb-1" id="1440p" checked onchange="filter(this)">
                </label>
                <label class="flex justify-between items-center bg-transparent hover:bg-gray-800 mr-10">
                    <span class="ml-2 mr-2">4K</span>
                    <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="4K" checked>
                </label>
                <p class="text-lg mt-4 font-semibold">Apps</p>
                @foreach ($apps as $app)
                <label class="flex justify-between items-center bg-transparent hover:bg-gray-800 mr-10">
                        <span class="ml-2 mr-2">{{ $app->name }}</span>
                        <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm " id="{{ $app->tag }}" checked onchange="filter(this)">
                    </label>
                @endforeach
                <p class="text-lg mt-4 font-semibold">CPU Wins</p>
                <label class="flex justify-between items-center bg-transparent hover:bg-gray-800 mr-10">
                    <span class="ml-2 mr-2">CPU 1 Wins</span>
                    <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm " id="cpu1_win" checked onchange="filter(this)">
                </label>
                <label class="flex justify-between items-center bg-transparent hover:bg-gray-800 mr-10">
                    <span class="ml-2 mr-2">CPU 2 Wins</span>
                    <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="cpu2_win" checked onchange="filter(this)" >
                </label>
                <label class="flex justify-between items-center bg-transparent hover:bg-gray-800 mr-10">
                    <span class="ml-2 mr-2"> {{ '<15% Win' }} </span>
                    <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="smallDiff" checked onchange="filter(this)" >
                </label>
                <label class="flex justify-between items-center bg-transparent hover:bg-gray-800 mr-10">
                    <span class="ml-2 mr-2"> {{ '>15% Win' }} </span>
                    <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="bigDiff" checked onchange="filter(this)" >
                </label>
                
                <p class="text-lg mt-4 font-semibold">Type</p>
                <label class="flex justify-between items-center bg-transparent hover:bg-gray-800 mr-10">
                    <span class="ml-2 mr-2">Benchmark</span>
                    <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="benchmark" checked onchange="filter(this)">
                </label>
                <label class="flex justify-between items-center bg-transparent hover:bg-gray-800 mr-10">
                    <span class="ml-2 mr-2">Game</span>
                    <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="game" checked onchange="filter(this)" >
                </label>
                <label class="flex justify-between items-center bg-transparent hover:bg-gray-800 mr-10">
                    <span class="ml-2 mr-2">Productivity</span>
                    <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="productivity" checked onchange="filter(this)" >
                </label>
                
            </div>

        
        

        
            
        </div>
        <div class="2xl:w-5/12 lg:w-6/12 w-full mb-2">
            @php
                $count = 0;
            @endphp
            @foreach ($apps as $app)
                @php
                    $cpu1_res = $results[$count][0]['score'];
                    $cpu2_res = $results[$count][1]['score'];
                @endphp
                <div class=" mx-auto  bg-gray-900 bg-opacity-90  {{ $app->tag }} {{ $app->resolution  }} lg:px-24 px-10 py-4 border-t-2 border-green-400 {{ $results[$count][5] }} {{ $results[$count][3] }} {{ $results[$count]['perDiff'] }}" >
                    <canvas id="myChart{{ $app->id }}" ></canvas>
                </div>
                @php
                    $count++;
                @endphp
            @endforeach

            @php
                $count = 0;
            @endphp
            
        </div>
        <div class="lg:w-2/12 w-full bg-gray-900 bg-opacity-90 ml-4 text-green-400 border-l-2 border-green-400 mb-4">
            <div class="p-4">
                <p class="font-semibold 2xl:text-lg text-gray-200">Config 1</p>
                <p>CPU: {{ $names[0] }}</p>
                <p>RAM: {{ $names[2] }}</p>
                <p>MOBO: {{ $names[3] }}</p>
            </div>
            <div class="p-4 2xl:text-lg " >
                <p class="font-semibold  text-gray-200">Config 2</p>
                <p>CPU: {{ $names[1] }}</p>
                <p>RAM: {{ $names[2] }}</p>
                <p>MOBO: {{ $names[3] }}</p>
            </div>
        </div>
    </div>
    @endif
</div>
 


<?php  if(isset($names)){ ?>
<script>
  
  var names = {!! json_encode($names) !!}; 
  var results = {!! json_encode($results) !!};
  var apps = {!! json_encode($apps) !!};
  var cpu_ids = {!! json_encode($cpu_ids) !!};
  const gpu1_setId = document.getElementById("cpu1_id");
  const gpu2_setId = document.getElementById("cpu2_id");
  var cpu1_set_id = cpu_ids[0];
  var cpu2_set_id = cpu_ids[1];
  gpu1_setId.setAttribute("value", cpu1_set_id);
  gpu2_setId.setAttribute("value", cpu2_set_id);
  const dataset = 
  results.forEach(result => {
    var ctx = document.getElementById('myChart'+result[0]['app_id']).getContext('2d');
    Chart.defaults.font.size = 14;
    Chart.defaults.color = '#e6e6e6';
    if(result[3] == 'game'){
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
                labels: [names[0], names[1]],
                datasets: [{
                    label: 'Avg',
                    data: [result[0]['score'], result[1]['score']],
                    color:[
                        '#ffff'
                    ],
                    backgroundColor: [
                        'rgb(52, 211, 153,0.6)',
                        'rgb(52, 211, 153,0.6)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    hoverBackgroundColor: "rgb(17, 24, 39,0.7)",
                    hoverBorderColor: "rgb(52, 211, 153,1)",
                    borderColor: [
                        'rgb(17, 24, 39,0.7)',
                        'rgb(17, 24, 39,0.7)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 3
                },{
                    label: 'Min',
                    data: [result[0]['min_score'], result[1]['min_score']],
                    color:[
                        '#ffff'
                    ],
                    backgroundColor: [
                        'rgb(222, 222, 222,0.7)',
                        'rgb(222, 222, 222,0.7)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    hoverBackgroundColor: "rgb(17, 24, 39,0.7)",
                    hoverBorderColor: "rgb(52, 211, 153,1)",
                    borderColor: [
                        'rgb(17, 24, 39,0.7)',
                        'rgb(17, 24, 39,0.7)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 3
                },
            
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    grid:{
                        color: "rgb(181, 181, 181,0.7)"
                    }
                },
                x:{
                    grid: {
                        color:  "rgb(181, 181, 181,0.7)"
                    },
                    
                },
            
            
            
        },
        indexAxis: 'y',
            plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: '#34D399',
                        }
                    },
                title: {
                    display: true,
                    color: '#34D399',
                    text: result[2] + ' - ' + result[4] ,
                    font:{
                        size: 17,
                    }
                },
                
            },
        }
    });
    }
    else{
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
                labels: [names[0], names[1]],
                datasets: [{
                    label: 'Score',
                    data: [result[0]['score'], result[1]['score']],
                    color:[
                        '#ffff'
                    ],
                    backgroundColor: [
                        'rgb(52, 211, 153,0.6)',
                        'rgb(52, 211, 153,0.6)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    hoverBackgroundColor: "rgb(17, 24, 39,0.7)",
                    hoverBorderColor: "rgb(52, 211, 153,1)",
                    borderColor: [
                        'rgb(17, 24, 39,0.7)',
                        'rgb(17, 24, 39,0.7)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 3
                },
            
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    grid:{
                        color: "rgb(181, 181, 181,0.7)"
                    }
                },
                x:{
                    grid: {
                        color:  "rgb(181, 181, 181,0.7)"
                    },
                    
                },
            
            
            
        },
        indexAxis: 'y',
            plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: '#34D399',
                        }
                    },
                title: {
                    display: true,
                    color: '#34D399',
                    text: result[2] ,
                    font:{
                        size: 17,
                    }
                },
                
            },
        }
    });
    }
   
});
 

</script>
<?php } ?>

<script>
    const selected = document.querySelector(".selected");
    const optionsContainer = document.querySelector(".options-container");
    const searchBox = document.querySelector(".search-box input");

    const gpu1Id = document.getElementById("cpu1_id");

    const optionsList = document.querySelectorAll(".option");

    selected.addEventListener("click", () => {
        optionsContainer.classList.toggle("active");

        searchBox.value = "";
        filterList("");

        if (optionsContainer.classList.contains("active")) {
            searchBox.focus();
        }
    });

    optionsList.forEach(o => {
        o.addEventListener("click", () => {
            selected.innerHTML = o.querySelector("label").innerHTML;
            var id = o.querySelector("input").value;
            optionsContainer.classList.remove("active");
            gpu1Id.setAttribute("value", id);
        });
    });

    searchBox.addEventListener("keyup", function (e) {
        filterList(e.target.value);
    });

    const filterList = searchTerm => {
        searchTerm = searchTerm.toLowerCase();
        optionsList.forEach(option => {
            let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
            if (label.indexOf(searchTerm) != -1) {
                option.style.display = "block";
            } else {
                option.style.display = "none";
            }
        });
    };

</script>


<script>
    const selected2 = document.querySelector(".selected2");
    const optionsContainer2 = document.querySelector(".options-container2");
    const searchBox2 = document.querySelector(".search-box2 input");

    const gpu2Id = document.getElementById("cpu2_id");

    const optionsList2 = document.querySelectorAll(".option2");

    selected2.addEventListener("click", () => {
        optionsContainer2.classList.toggle("active");
        searchBox2.value = "";
        filterList("");
        if (optionsContainer2.classList.contains("active")) {
            searchBox2.focus();
        }
    });

    optionsList2.forEach(o1 => {
        o1.addEventListener("click", () => {
            selected2.innerHTML = o1.querySelector("label").innerHTML;
            var id = o1.querySelector("input").value;
            optionsContainer2.classList.remove("active");
            gpu2Id.setAttribute("value", id);
        });
    });

    searchBox2.addEventListener("keyup", function (e) {
        filterList2(e.target.value);
    });

    const filterList2 = searchTerm2 => {
        searchTerm2 = searchTerm2.toLowerCase();
        optionsList2.forEach(option => {
            let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
            if (label.indexOf(searchTerm2) != -1) {
                option.style.display = "block";
            } else {
                option.style.display = "none";
            }
        });
    };

</script>

<script>

function filter(el){
    console.log(el.id);
    const fullHDChars = document.getElementsByClassName(el.id);
    console.log(fullHDChars);
    for (let index = 0; index < fullHDChars.length; index++) {
        if(fullHDChars[index].classList.contains('hidden')){
            fullHDChars[index].classList.remove('hidden');
        }
        else{
            fullHDChars[index].classList.add('hidden');
        }
      
        
    }
}

</script>
@endsection