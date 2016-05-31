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
			<div id="container_voltage" style="min-width: 3temppx; min-height: 400px; margin: 0 auto"></div>
		 </div>
	</div>
	
	<div class="row">
		<div class = "col-md-12">
			<div id="container_current" style="min-width: 3temppx; min-height: 400px; margin: 0 auto"></div>
		</div>
	</div>
	
	<div class="row">
		<div class = "col-md-12">
			<div id="container_power" style="min-width: 3temppx; min-height: 400px; margin: 0 auto"></div>
		</div>
	</div>
	
</div>
@stop
	@section('scripts') 

<!-- Include Bootstrap Datepicker -->
<script type="text/javascript" src="{{ asset('lib/highchart/js/highcharts.js') }}"></script>	
<script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>	
<script type="text/javascript" src="{{ asset('js/daterangepicker.js') }}"></script>	

<!-- Include Date Range Picker -->
<script type="text/javascript">

  
    /*$(function () {
        $('#container').highcharts(
            {!! json_encode($yourFirstChart) !!}
        );
    })*/
	var valueJamList=[];
	var valueVr=[];
	var valueIr=[];
	var valuePr=[];
	var valueTotr=[];
		
	var valueVs=[];
	var valueIs=[];
	var valuePs=[];
	var valueTots=[];
	
	var valueVt=[];
	var valueIt=[];
	var valuePt=[];
	var valueTott=[];
	
	var valueVtot=[];
	var valueItot=[];
	var valuePtot=[];
	
	
	for(i=0;i<32;i++){
		valueJamList[i]="DATE : " + i.toString();
	}
	var temp=32;
		for(i=0;i<32;i++){
				temp=temp+1;
		 valueTotr[i]=Math.floor((Math.random() * 10) + temp);
		 valueVr[i]=Math.floor((Math.random() * 10) + temp);
		 valueIr[i]=Math.floor((Math.random() * 10) + temp);
		 valuePr[i]=Math.floor((Math.random() * 10) + temp);
		 
			valueTots[i]=Math.floor((Math.random() * 10) + temp);
			valueVs[i]=Math.floor((Math.random() * 10) + temp);
			valueIs[i]=Math.floor((Math.random() * 10) + temp);
			valuePs[i]=Math.floor((Math.random() * 10) + temp);
			
			valueTotr[i]=Math.floor((Math.random() * 10) + temp);
			valueVt[i]=Math.floor((Math.random() * 10) + temp);
			valueIt[i]=Math.floor((Math.random() * 10) + temp);
			valuePt[i]=Math.floor((Math.random() * 10) + temp);
		
			valueVtot[i]=Math.floor((Math.random() * 10) + temp);
			valueItot[i]=Math.floor((Math.random() * 10) + temp);
			valuePtot[i]=Math.floor((Math.random() * 10) + temp);
	}
	
	
	
	
	$(function () {
		$('#container_voltage').highcharts({
			chart: {
				type: 'line'
			},
			title: {
				text: 'POWER METER'
			},
			subtitle: {
				text: 'Daily Average Voltage R,S,T'
			},
			xAxis: {
				categories: valueJamList
			},
			yAxis: {
				title: {
					text: 'VOLTS'
				}
			},
			plotOptions: {
				line: {
					dataLabels: {
						enabled: true
					},
					enableMouseTracking: false
				}
			},
			series: [{
				name: 'PHASE R',
				data:	valueVr	
				}, {
				name: 'PHASE S',
				data: valueVs
				}, {
				name: 'PHASE T',
				data: valueVt
				}, {
				name: 'PHASE TOTAL',
				data: valueVtot
			}]
		});
	
		$('#container_current').highcharts({
			chart: {
				type: 'line'
			},
			title: {
				text: 'POWER METER'
			},
			subtitle: {
				text: 'Daily Average CURRENT R,S,T'
			},
			xAxis: {
				categories: valueJamList
			},
			yAxis: {
				title: {
					text: 'Ampere'
				}
			},
			plotOptions: {
				line: {
					dataLabels: {
						enabled: true
					},
					enableMouseTracking: false
				}
			},
			series: [{
				name: 'PHASE R',
				data: valueIr
				}, {
				name: 'PHASE S',
				data: valueIs
				}, {
				name: 'PHASE T',
				data: valueIt
				}, {
				name: 'PHASE TOTAL',
				data: valueItot
				}]
		});
	
		$('#container_power').highcharts({
			chart: {
				type: 'line'
			},
			title: {
				text: 'POWER METER'
			},
			subtitle: {
				text: 'Daily Average POWER R,S,T'
			},
			xAxis: {
				categories: valueJamList
			},
			yAxis: {
				title: {
					text: 'kW'
				}
			},
			plotOptions: {
				line: {
					dataLabels: {
						enabled: true
					},
					enableMouseTracking: false
				}
			},
			series: [{
				name: 'PHASE R',
				data: valuePr
				}, {
				name: 'PHASE S',
				data: valuePs
				}, {
				name: 'PHASE T',
				data: valuePt
				}]
		});
		
	});
</script>
@stop