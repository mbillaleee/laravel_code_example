@extends('layouts.app')

@section('content')

	<h1>BAR CHART IN LARAVEL</h1>

	<div class="width:800px; margin:auto;">
		<canvas id="chart"></canvas>
	</div>

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