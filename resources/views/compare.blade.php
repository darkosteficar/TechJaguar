@extends('layouts.app')


@section('content')




<div class="flex justify-between  w-3/5 mx-auto my-10 ">
        <div class="container ">
            <p class="font-bold text-2xl text-gray-300 mb-3 text-center">CPU 1</p>

            <div class="select-box mx-auto">
                <div class="options-container bg-gray-700 font-medium">
                    @foreach ($cpus as $cpu)
                        <div class="option">
                            <input type="hidden" name="" class="gpuId" value="{{ $cpu->id }}">
                            <input type="radio" class="radio" id="automobiles" name="category" />
                            <label for="cpus">{{ $cpu->name }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="selected">
                    Select a CPU
                </div>

                <div class="search-box">
                    <input type="text" class="bg-gray-600 text-green-400" placeholder="RX 5700 XT,RTX 3060 Ti..." />
                </div>
            </div>
        </div>
        <div class="container ml-5">
            <p class="font-bold text-2xl text-gray-300 mb-3 text-center">CPU 2</p>

            <div class="select-box mx-auto">
                <div class="options-container2 bg-gray-700 font-medium">
                    @foreach ($cpus as $cpu)
                        <div class="option2">
                            <input type="radio" class="cpu2_id radio " id="automobiles" name="category" />
                            <label class="cpu2_label" for="automobiles">{{ $cpu->name }}</label>
                        </div>   
                    @endforeach
                </div>
                <div class="selected2">
                    Select a CPU
                </div>

                <div class="search-box2">
                    <input type="text" class="cpu2_input text-green-400 bg-gray-600" class="bg-gray-600 text-green-400" placeholder="RX 5700 XT,RTX 3060 Ti..." />
                </div>
            </div>
        </div>
        <div class="mt-7 ml-12">
            <form action="{{ route('compare', []) }}" method="GET">
                <input type="hidden" name="cpu1" id="cpu1_id">
                <input type="hidden" name="cpu2" id="cpu2_id">
                <button class="hover:bg-green-400 py-2 px-4 my-4 font-medium hover:text-gray-800  text-lg shadow-2xl rounded-md bg-gray-600 text-green-400 transition ease-in duration-300" type="submit">
                    COMPARE
                </button>
        </form>
        </div>

</div>



@foreach ($apps as $app)
<div class="w-1/3 mx-auto">
    <canvas id="myChart{{ $app->id }}" ></canvas>
</div>
@endforeach




<script>
    var names = {!! json_encode($names) !!}; 
    var results = {!! json_encode($results) !!};
    var apps = {!! json_encode($apps) !!};
    results.forEach(result => {
    var ctx = document.getElementById('myChart'+result[0]['app_id']).getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
    labels: [names[0], names[1]],
    datasets: [{
        label: 'Score',
        data: [result[0]['score'], result[1]['score']],
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
    }]
    },
    options: {
    scales: {
        y: {
            beginAtZero: true
        }
    },
    indexAxis: 'y',
    plugins: {
        title: {
            display: true,
            text: result[2],
        }
    },
    }
    });
    });

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

    optionsList2.forEach(o => {
        o.addEventListener("click", () => {
            selected2.innerHTML = o.querySelector("label").innerHTML;
            var id = o.querySelector("cpu2_id").value;
            optionsContainer2.classList.remove("active");
            gpu2Id.setAttribute("value", id);
        });
    });

    searchBox2.addEventListener("keyup", function (e) {
        filterList(e.target.value);
    });

    const filterList2 = searchTerm => {
        searchTerm = searchTerm.toLowerCase();
        optionsList2.forEach(option => {
            let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
            if (label.indexOf(searchTerm) != -1) {
                option.style.display = "block";
            } else {
                option.style.display = "none";
            }
        });
    };

</script>
@endsection