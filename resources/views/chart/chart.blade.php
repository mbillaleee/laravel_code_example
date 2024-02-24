@extends('layouts.app')

@section('content')

	

	<div class="container">
		<h1 class="text-center">BAR CHART IN LARAVEL</h1>
		<div class="width:800px; margin:auto;">
		<canvas id="chart"></canvas>
	</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
	<script>
		var ctx = document.getElementById('chart').getContext('2d');
		// alert(ctx);
		var useChart = new Chart(ctx, {
			type: 'bar',
			data:{
				labels: {!! json_encode($labels) !!},
				datasets: {!! json_encode($datasets) !!}
			}
		});
	</script>

	
@endsection