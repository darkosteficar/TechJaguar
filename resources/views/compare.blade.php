@extends('layouts.app')


@section('content')
@foreach ($apps as $app)
<div style="width:700px">
    <canvas id="myChart{{ $app}}" width="400" height="400"></canvas>
</div>
@endforeach



<script>

    var results = {!! json_encode($results) !!};
    var apps = {!! json_encode($apps) !!};
    results.forEach(result => {
    var ctx = document.getElementById('myChart'+result[0][0]).getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
    labels: [result[0][1], result[1][1]],
    datasets: [{
        label: 'Score',
        data: [12, 19],
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
@endsection