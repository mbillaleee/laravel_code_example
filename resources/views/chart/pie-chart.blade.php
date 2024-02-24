@extends('layouts.app')

@section('content')

	<center>PI CHART IN LARAVEL</center>
 <div class="container">
        <h3 style="text-align: center;">
            Laravel 10 and Google Pie Chart Integration Tutorial
        </h3>
        <div id="pie-chart" style="width: 900px; height: 500px"></div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Month Name', 'Registered User Count'],

                @php
                    foreach ($pieChart as $d) {
                        echo "['" . $d->month_name . "', " . $d->count . '],';
                    }
                @endphp
            ]);

            var options = {
                title: 'Users Detail',
                is3D: false,
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie-chart'));

            chart.draw(data, options);
        }
    </script>
	
@endsection