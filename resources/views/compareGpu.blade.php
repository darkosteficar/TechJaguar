@extends('layouts.app')


@section('content')

@if (session()->has('error')))
    <div class="bg-red-500 text-center w-1/3 mx-auto font-semibold  text-white py-4 mt-6 rounded-sm">
        {{ session('error') }}
    </div><br />
    @endif


<div class="flex justify-between  w-3/5 mx-auto my-10 ">
    
   
        <div class="container ">
            <p class="font-bold text-2xl text-gray-200 mb-3 text-center">GPU 1</p>

            <div class="select-box mx-auto">
                <div class="options-container bg-gray-900 bg-opacity-90 font-medium">
                    @foreach ($gpus as $gpu)
                        <div class="option">
                            <input type="radio" class="radio" id="automobiles" name="category" value="{{ $gpu->id }}"/>
                            <label for="gpus">{{ $gpu->name }}</label>
                            <input type="hidden" name="" class="gpuId" >
                        </div>
                    @endforeach
                </div>

                <div class="selected">
                    @if (isset($names))
                        {{ $names[0] }}
                    @else
                        Select a GPU
                    @endif
                    
                </div>

                <div class="search-box">
                    <input type="text" class="bg-gray-900 bg-opacity-90 text-green-400  focus:ring-3 focus:border-green-400 focus:border-2 disable-outline" placeholder="RX 5700 XT,RTX 3060 Ti..." />
                </div>
            </div>
        </div>
        <div class="container ml-5 ">
            <p class="font-bold text-2xl text-gray-200  mb-3 text-center">GPU 2</p>

            <div class="select-box mx-auto  ">
                <div class="options-container2 bg-gray-900 opacity-90 font-medium ">
                    @foreach ($gpus as $gpu)
                        <div class="option2">
                            <input type="radio" class="gpu2_id radio" id="automobiles" name="category" value="{{ $gpu->id }}"/>
                            <label for="gpus">{{ $gpu->name }}</label>
                            <input type="hidden" name="" class="gpuId" >
                        </div>   
                    @endforeach
                </div>
                <div class="selected2 bg-gray-900 bg-opacity-90 border border-green-400 ">
                    @if (isset($names))
                        {{ $names[1] }}
                    @else
                        Select a GPU
                    @endif
                    
                </div>

                <div class="search-box2">
                    <input type="text" class="cpu2_input bg-gray-900 text-green-400  focus:ring-3 focus:border-green-300 focus:border-2 disable-outline" placeholder="Radeon RX 570, GeForce RTX 2070..." />
                </div>
            </div>
        </div>
        <div class="mt-7 ml-12">
            <form action="{{ route('compareGpu', []) }}" method="GET">
                <input type="hidden" name="gpu1" id="gpu1_id">
                <input type="hidden" name="gpu2" id="gpu2_id">
                <button class="hover:bg-green-400 py-2 px-4 my-4 font-medium hover:text-gray-800  text-lg shadow-2xl rounded-md bg-gray-900 bg-opacity-90 border border-green-400 text-green-400 transition ease-in duration-300" type="submit">
                    COMPARE
                </button>
        </form>
        </div>

</div>

@if (session()->has('status')))
    <div class="bg-green-600 text-white font-semibold w-1/2 mx-auto text-center py-3 mb-12 rounded-sm ">
        {{ session('status') }}
    </div>
@endif


<div class="lg:flex justify-center">
    @if (isset($names))
    <div class="w-1/6 bg-gray-900 bg-opacity-90 mr-4 text-green-400 border-r-2 border-green-400">
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
              <p class="text-lg mt-4 font-bold">GPU Wins</p>
              <label class="inline-flex items-center">
                <span class="ml-2 text-lg mr-2">GPU 1 Wins</span>
                <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="gpu1_win" checked onchange="filter(this)">
              </label>
              <label class="inline-flex items-center">
                <span class="ml-2 text-lg mr-2">GPU 2 Wins</span>
                <input type="checkbox" class="form-checkbox text-green-500 h-5 w-5 rounded-sm" id="gpu2_win" checked onchange="filter(this)" >
              </label>
              <label class="inline-flex items-center">
                <span class="ml-2 text-lg mr-2"> {{ '<15% Win' }} </span>
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
    <div class="lg:w-3/6 w-full">
            @php
                $count = 0;
            @endphp
            @foreach ($apps as $app)
                <div class="lg:flex mx-auto bg-gray-900 bg-opacity-90  {{ $app->tag }} {{ $app->resolution  }} pl-20 pr-12 py-4 border-t-2 border-green-400 {{ $results[$count][5] }} {{ $results[$count][3] }} {{ $results[$count]['perDiff'] }}" >
                    <div class="lg:w-9/12 w-full">
                        <canvas id="myChart{{ $app->id }}" ></canvas>
                    </div>
                   
                    <div class="w-3/12 pl-4 ">
                        <p class= "text-gray-200 font-semibold mb-2">Other components</p>
                        <p class="text-green-400 ">CPU: <span class="text-white">{{ $results[$count][4] }}</span> </p>
                        <p class="text-green-400 ">MOBO: <span class="text-white"> {{ $results[$count][6] }} </span></p>
                        <p class="text-green-400 ">RAM: <span class="text-white"> {{ $results[$count][7] }} </span></p>

                        @if ($app->type == 'benchmark')
                            <p class= "text-green-400 font-semibold mb-2 mt-6">Performance numbers</p>
                            <p class="text-white text-lg">GPU 1 Score: <span class="text-green-400">  {{ $results[$count][0]['score'] }}</span> </p>
                            <p class="text-white text-lg">GPU 2 Score: <span class="text-green-400"> {{ $results[$count][1]['score'] }} </span></p>
                        @else
                        <p class= "text-green-400 font-semibold mb-2 mt-6">Performance numbers</p>
                        <p class="text-white text-lg">GPU 1 Avg Score: <span class="text-green-400">  {{ $results[$count][0]['score'] }}</span> </p>
                        <p class="text-white text-lg">GPU 2 Avg Score: <span class="text-green-400"> {{ $results[$count][1]['score'] }} </span></p>
                        <p class="text-white text-lg">GPU 1 Min Score: <span class="text-gray-200">  {{ $results[$count][0]['min_score'] }}</span> </p>
                        <p class="text-white text-lg">GPU 2 Min Score: <span class="text-gray-200"> {{ $results[$count][1]['min_score'] }} </span></p>
                        @endif
                        
                    </div>
                </div>
                @php
                    $count++;
                @endphp
            @endforeach

            @php
                $count = 0;
            @endphp
        
    </div>
    
    @endif

</div>



<?php  if(isset($names)){ ?>
<script>
  
  var names = {!! json_encode($names) !!}; 
  var results = {!! json_encode($results) !!};
  var apps = {!! json_encode($apps) !!};
  var gpu_ids = {!! json_encode($gpu_ids) !!};
  const gpu1_setId = document.getElementById("gpu1_id");
  const gpu2_setId = document.getElementById("gpu2_id");
  var gpu1_set_id = gpu_ids[0];
  var gpu2_set_id = gpu_ids[1];
  gpu1_setId.setAttribute("value", gpu1_set_id);
  gpu2_setId.setAttribute("value", gpu2_set_id);
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

    const gpu1Id = document.getElementById("gpu1_id");

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

    const gpu2Id = document.getElementById("gpu2_id");

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