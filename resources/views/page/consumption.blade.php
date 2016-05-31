@extends('test.template')
@section('conten-body')

<div class = "row">
	<div class="row">
	 <div class='col-sm-8'>    </div>	
        <div class='col-sm-4'>
			<input type="text" name="daterange" value="01/01/2016 - 01/31/2016" />
        </div>		
    </div>
	
	<div class="row">
		<div class = "col-md-12">
			<div id="containerDay" style="min-width: 300px; min-height: 400px; margin: 0 auto"></div>
		 </div>
	</div>
</div>
	
</div>
@stop

@section('scripts') 
<script type="text/javascript" src="{{ asset('lib/highchart/js/highcharts.js') }}"></script>	
<script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>	
<script type="text/javascript" src="{{ asset('js/daterangepicker.js') }}"></script>	

<script>
	$(function () {
		$('#containerDay').highcharts({
			chart: {
				type: 'column'
			},
			title: {
				text: 'World\'s largest cities per 2014'
			},
			subtitle: {
				text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
			},
			xAxis: {
				type: 'category',
				labels: {
					rotation: -45,
					style: {
						fontSize: '13px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Population (millions)'
				}
			},
			legend: {
				enabled: false
			},
			tooltip: {
				pointFormat: 'Population in 2008: <b>{point.y:.1f} millions</b>'
			},
			series: [{
				name: 'Population',
				data: [
                ['Shanghai', 23.7],
                ['Lagos', 16.1],
                ['Istanbul', 14.2],
                ['Karachi', 14.0],
                ['Mumbai', 12.5],
                ['Moscow', 12.1],
                ['São Paulo', 11.8],
                ['Beijing', 11.7],
                ['Guangzhou', 11.1],
                ['Delhi', 11.1],
                ['Shenzhen', 10.5],
                ['Seoul', 10.4],
                ['Jakarta', 10.0],
                ['Kinshasa', 9.3],
                ['Tianjin', 9.3],
                ['Tokyo', 9.0],
                ['Cairo', 8.9],
                ['Dhaka', 8.9],
                ['Mexico City', 8.9],
                ['Lima', 8.9]
				],
				dataLabels: {
					enabled: true,
					rotation: -90,
					color: '#FFFFFF',
					align: 'right',
					format: '{point.y:.1f}', // one decimal
					y: 10, // 10 pixels down from the top
					style: {
						fontSize: '13px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
	});
</script>
@stop