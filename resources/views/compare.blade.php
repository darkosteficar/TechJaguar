@extends('layouts.app')


@section('content')

<div class="flex justify-between  w-3/5 mx-auto my-10 ">
    <div class="container ">
        <p class="font-bold text-2xl text-gray-300 mb-3 text-center">GPU 1</p>

        <div class="select-box mx-auto">
            <div class="options-container bg-gray-700 font-medium">
                <div class="option">
                    <input type="hidden" name="" class="gpuId" value="2">
                    <input type="radio" class="radio" id="automobiles" name="category" />
                    <label for="automobiles">AMD Radeon RX 5700 XT</label>

                </div>

                <div class="option">
                    <input type="hidden" name="" class="gpuId" value="3">
                    <input type="radio " class="radio " id="film" name="category" />
                    <label for="film">Nvidia GeForce RTX 2080 Ti</label>

                </div>

                <div class="option  ">
                    <input type="radio" class="radio " id="science" name="category" />
                    <label for="science">Nvidia GeForce RTX 3070</label>
                    <input type="hidden" name="" class="gpuId" value="4">
                </div>


            </div>

            <div class="selected">
                Select a Graphics Card
            </div>

            <div class="search-box">
                <input type="text" class="bg-gray-600 text-green-400" placeholder="RX 5700 XT,RTX 3060 Ti..." />
            </div>
        </div>
    </div>
    <div class="container ml-5">
        <p class="font-bold text-2xl text-gray-300 mb-3 text-center">GPU 2</p>

        <div class="select-box mx-auto">
            <div class="options-container bg-gray-700 font-medium">
                <div class="option">
                    <input type="radio" class="radio" id="automobiles" name="category" />
                    <label for="automobiles">AMD Radeon RX 5700 XT</label>
                </div>

                <div class="option">
                    <input type="radio " class="radio " id="film" name="category" />
                    <label for="film">Nvidia GeForce RTX 2080 Ti</label>
                </div>

                <div class="option  ">
                    <input type="radio" class="radio " id="science" name="category" />
                    <label for="science">Nvidia GeForce RTX 3070</label>
                </div>


            </div>

            <div class="selected">
                Select a Graphics Card
            </div>

            <div class="search-box">
                <input type="text" class="bg-gray-600 text-green-400" placeholder="RX 5700 XT,RTX 3060 Ti..." />
            </div>
        </div>
    </div>
    <div class="mt-7 ml-12">
        <button
            class=" hover:bg-green-400 py-2 px-4 my-4 font-medium hover:text-gray-800  text-lg shadow-2xl rounded-md bg-gray-600 text-green-400 transition ease-in duration-300">
            COMPARE
        </button>
    </div>
</div>



@foreach ($apps as $app)
<div class="w-1/3 mx-auto">
    <canvas id="myChart{{ $app}}" ></canvas>
</div>
@endforeach




<script>

    var results = {!! json_encode($results) !!};
    var apps = {!! json_encode($apps) !!};
    results.forEach(result => {
    var ctx = document.getElementById('myChart'+result[0]['app']).getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
    labels: [result[0]['cpu'], result[1]['cpu']],
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
            text: 'Cinebench'
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

    const gpu1Id = document.getElementById("idOfGpu");

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
            gpu1Id.setAttribute("placeholder", id);
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
@endsection