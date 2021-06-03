@extends('layouts.app')


@section('content')

@if (session()->has('error')))
    <div class="bg-red-500 text-center w-1/3 mx-auto font-semibold  text-white py-4 mt-6 rounded-sm">
        {{ session('error') }}
    </div><br />
    @endif


<div class="flex justify-between  w-3/5 mx-auto my-10 ">
    
   
        <div class="container ">
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

                <div class="selected">
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
        <div class="container ml-5">
            <p class="font-bold text-2xl text-gray-200  mb-3 text-center">CPU 2</p>

            <div class="select-box mx-auto">
                <div class="options-container2 bg-gray-900 opacity-90 font-medium">
                    @foreach ($cpus as $cpu)
                        <div class="option2">
                            <input type="radio" class="cpu2_id radio" id="automobiles" name="category" value="{{ $cpu->id }}"/>
                            <label for="cpus">{{ $cpu->name }}</label>
                            <input type="hidden" name="" class="gpuId" >
                        </div>   
                    @endforeach
                </div>
                <div class="selected2 bg-gray-900 bg-opacity-90">
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
        <div class="mt-7 ml-12">
            <form action="{{ route('compare', []) }}" method="GET">
                <input type="hidden" name="cpu1" id="cpu1_id">
                <input type="hidden" name="cpu2" id="cpu2_id">
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


<div class="flex justify-center">
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
        </div>

      
       

     
        
    </div>
    <div class="w-2/5">

        @php
            $count = 0;
        @endphp
            @foreach ($apps as $app)
            @php
                $cpu1_res = $results[$count][0]['score'];
                $cpu2_res = $results[$count][1]['score'];
                $count++;
            @endphp
            <div class=" mx-auto bg-gray-900 bg-opacity-90  {{ $app->tag }} {{ $app->resolution  }} px-24 py-4 border-t-2 border-green-400 @if ($cpu1_res < $cpu2_res)
               {{ "cpu2_win" }} 
            @else
            {{ "cpu1_win" }} 
            @endif">
                <canvas id="myChart{{ $app->id }}" ></canvas>
            </div>
            @endforeach

            @php
            $count = 0;
        @endphp
        
        
    </div>
    <div class="w-1/5 bg-gray-900 bg-opacity-90 ml-4 text-green-400 border-l-2 border-green-400">
        <div class="p-4">
            <p class="font-semibold text-lg text-gray-200">Config 1</p>
            <p>CPU: {{ $names[0] }}</p>
            <p>GPU: </p>
            <p>RAM: </p>
            <p>MOBO:</p>
        </div>
        <div class="p-4">
            <p class="font-semibold text-lg text-gray-200">Config 2</p>
            <p>CPU: {{ $names[1] }}</p>
            <p>GPU: </p>
            <p>RAM: </p>
            <p>MOBO:</p>
        </div>
    </div>
    @endif

</div>





<script>
    <?php  if(isset($names)){ ?>
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

  results.forEach(result => {
  var ctx = document.getElementById('myChart'+result[0]['app_id']).getContext('2d');
  Chart.defaults.font.size = 14;
  Chart.defaults.color = '#e6e6e6';
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
  });
  <?php } ?>

</script>

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