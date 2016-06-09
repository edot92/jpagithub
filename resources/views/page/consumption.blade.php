@extends('test.template')
@section('conten-body')

 <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                <br>
                <button type="button" id="submitDatee" class="btn btn-primary">APPLY VIEW</button>
            </div>
            </div>

          
</div>
<div class = "row">

	<div class="row">
		<div class = "col-md-12">
			<div id="containerPowerMonth" style="min-width: 300px; min-height: 400px; margin: 0 auto"></div>
		 </div>
		<div class = "col-md-12">
			<div id="containerPowerDay" style="min-width: 300px; min-height: 400px; margin: 0 auto"></div>
		 </div>
		 <div class = "col-md-12">
			<div id="containerPowerHour" style="min-width: 300px; min-height: 400px; margin: 0 auto"></div>
		 </div>
	</div>
</div>

@stop

@section('scripts') 
 <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
     <link rel="stylesheet" href="css/font-awesome.min.css">
<script type="text/javascript" src="{{ asset('js/moment.js') }}"></script>	
<script type="text/javascript" src="{{ asset('js/daterangepicker.js') }}"></script>	
<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>	
<script type="text/javascript" src="{{ asset('js/daterangepicker.js') }}"></script>	
<style type="text/css"  src="{{ asset('js/daterangepicker.css') }}"></style>	
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
>
 <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">

			<script src="js/moment.js"></script>
			<script src="js/bootstrap-datetimepicker.min.js"></script>
			<script src="js/locale/id.js"></script>

<script type="text/javascript">
 

$(document).ready(function(){
				var lanjut=false;
				var timeAfter;
				var timeBefore;
				var jamAfter;
				var jamBefore;
				var dateMonthSelect;
			var valueJamList=[];
	var valueVr=[];
	var valueIr=[];
	//var valuePr=[];
	var valueTotr=[];
		
	var valueVs=[];
	var valueIs=[];
	//var valuePs=[];
	var valueTots=[];
	
	var valueVt=[];
	var valueIt=[];
	//var valuePt=[];
	var valueTott=[];
	
	var valueVtot=[];
	var valueItot=[];
	//var valuePtot=[];

	var valueItot=[];
	var valueNeutral_Current=[];

	var valuePTotal_Active_Power=[];
	var valuePTotal_Apparent_Power=[];
	var valuePTotal_Reactive_Power=[];


           $(function () {
                $('#datetimepicker1').datetimepicker({
                viewMode: 'years',
                format: 'DD/MM/YYYY'
            });
            }); // END DATETIMEPICKER


           $('#submitDatee').on('click', function (e) {


			var valueWaktu=[];
			var dateMonthSelect2;
		var a=$('#datetimepicker1').data('DateTimePicker').date();	
		if(moment(a, 'DD/MM/YYYY', true).isValid() ){
		 dateMonthSelect=moment(a).format("YYYY-MM-DD");
		 dateMonthSelect2=moment(a).format("YYYY-MM-DD");
		
		 lanjut=true;
		}
		else
		{
		 dateMonthSelect="waktu yang dimassukan salah";
		 lanjut=false;
		}
		
		if(lanjut==false){alert("error :input date failed");return;};
		  var startDateTrending=timeBefore;
		  var endDateTrending=timeAfter;
		//  alert(startDateTrending+' to '+ endDateTrending);
		 var urlChartTrend='{{url('/device_consumptiondate')}}'+'/'+dateMonthSelect;
		$.ajax({
		    type: "GET",
		    url: urlChartTrend,
		    data: ''
		}).done(function( msg )
		{
		panjangJson=msg.length;
		if(panjangJson<=1000)
		{

		while(valueVs.length > 0) { valueVs.pop(); } 
		while(valueVt.length > 0) { valueVt.pop(); } 
		while(valueVr.length > 0) { valueVr.pop(); } 
		while(valueVtot.length > 0) { valueVtot.pop(); } 
		while(valueWaktu.length > 0) { valueWaktu.pop(); } 
		//current
		while(valueIr.length > 0) { valueIr.pop(); } 
		while(valueIs.length > 0) { valueIs.pop(); } 
		while(valueIt.length > 0) { valueIt.pop(); } 
		while(valueItot.length > 0) { valueItot.pop(); } 
		while(valueNeutral_Current.length > 0) { valueNeutral_Current.pop(); } 
		//daya
		while(valuePTotal_Active_Power.length > 0) { valuePTotal_Active_Power.pop(); } 
		while(valuePTotal_Reactive_Power.length > 0) { valuePTotal_Reactive_Power.pop(); } 
		while(valuePTotal_Apparent_Power.length > 0) { valuePTotal_Apparent_Power.pop(); } 


		for(x=0;x<panjangJson;x++){
		 valueWaktu[x]=moment(msg[x].waktu,"YYYY-MM-DD hh:mm:ss").format("MMMM");//konvert ke data(lib momen.js)

			//daya
			valuePTotal_Active_Power[x]=parseInt(msg[x].Total_Active_Power);//konvert ke int
			valuePTotal_Reactive_Power[x]=parseInt(msg[x].Total_Reactive_Power);//konvert ke int
			valuePTotal_Apparent_Power[x]=parseInt(msg[x].Total_Apparent_Power);//konvert ke int	
			//console.log(valueVr[x]);
		}
           // reloadChart();
     alert(valuePTotal_Apparent_Power[0]);
     shift=false;
      		//VOLTAGE REDRAW
			var delayChart=1000;

			//daya
			var  chartPower=new  $('#containerPowerMonth').highcharts();
			chartPower.series[0].setData(valuePTotal_Active_Power, false);
			chartPower.series[1].setData(valuePTotal_Reactive_Power, false);
			chartPower.series[2].setData(valuePTotal_Apparent_Power, false);
    	chartPower.xAxis[0].setCategories(valueWaktu);
		 	chartPower.redraw();
			}//end if(panjangJson<=maxCountGrapik){
			else{
				alert("Error : failed to load chart trend, max count ");
			}
		}); // end jax
		urlChartTrend=0;
		urlChartTrend='{{url('/device_consumptiondate2')}}'+'/'+dateMonthSelect;
		$.ajax({
		    type: "GET",
		    url: urlChartTrend,
		    data: ''
		}).done(function( msg )
		{
				panjangJson=msg.length;
				 alert('msg 2');
		if(panjangJson<=1000)
		{

		while(valueVs.length > 0) { valueVs.pop(); } 
		while(valueVt.length > 0) { valueVt.pop(); } 
		while(valueVr.length > 0) { valueVr.pop(); } 
		while(valueVtot.length > 0) { valueVtot.pop(); } 
		while(valueWaktu.length > 0) { valueWaktu.pop(); } 
		//current
		while(valueIr.length > 0) { valueIr.pop(); } 
		while(valueIs.length > 0) { valueIs.pop(); } 
		while(valueIt.length > 0) { valueIt.pop(); } 
		while(valueItot.length > 0) { valueItot.pop(); } 
		while(valueNeutral_Current.length > 0) { valueNeutral_Current.pop(); } 
		//daya
		while(valuePTotal_Active_Power.length > 0) { valuePTotal_Active_Power.pop(); } 
		while(valuePTotal_Reactive_Power.length > 0) { valuePTotal_Reactive_Power.pop(); } 
		while(valuePTotal_Apparent_Power.length > 0) { valuePTotal_Apparent_Power.pop(); } 


		for(x=0;x<panjangJson;x++){
		 valueWaktu[x]=moment(msg[x].waktu,"YYYY-MM-DD hh:mm:ss").format("DD");//konvert ke data(lib momen.js)

			//daya
			valuePTotal_Active_Power[x]=parseInt(msg[x].Total_Active_Power);//konvert ke int
			valuePTotal_Reactive_Power[x]=parseInt(msg[x].Total_Reactive_Power);//konvert ke int
			valuePTotal_Apparent_Power[x]=parseInt(msg[x].Total_Apparent_Power);//konvert ke int	
			//console.log(valueVr[x]);
		}
           // reloadChart();
    
     shift=false;
      		//VOLTAGE REDRAW
			var delayChart=1000;

			//daya
			var  chartPower=new  $('#containerPowerDay').highcharts();
			chartPower.series[0].setData(valuePTotal_Active_Power, false);
			chartPower.series[1].setData(valuePTotal_Reactive_Power, false);
			chartPower.series[2].setData(valuePTotal_Apparent_Power, false);
    	chartPower.xAxis[0].setCategories(valueWaktu);
		 	chartPower.redraw();
			}//end if(panjangJson<=maxCountGrapik){
			else{
				alert("Error : failed to load chart trend, max count ");
			}
			}); // end Ajax day

			urlChartTrend=0;
		urlChartTrend='{{url('/device_consumptiondate3')}}'+'/'+dateMonthSelect;
		$.ajax({
		    type: "GET",
		    url: urlChartTrend,
		    data: ''
		}).done(function( msg )
		{
				panjangJson=msg.length;
				 alert('msg 3');
		if(panjangJson<=1000)
		{

		while(valueVs.length > 0) { valueVs.pop(); } 
		while(valueVt.length > 0) { valueVt.pop(); } 
		while(valueVr.length > 0) { valueVr.pop(); } 
		while(valueVtot.length > 0) { valueVtot.pop(); } 
		while(valueWaktu.length > 0) { valueWaktu.pop(); } 
		//current
		while(valueIr.length > 0) { valueIr.pop(); } 
		while(valueIs.length > 0) { valueIs.pop(); } 
		while(valueIt.length > 0) { valueIt.pop(); } 
		while(valueItot.length > 0) { valueItot.pop(); } 
		while(valueNeutral_Current.length > 0) { valueNeutral_Current.pop(); } 
		//daya
		while(valuePTotal_Active_Power.length > 0) { valuePTotal_Active_Power.pop(); } 
		while(valuePTotal_Reactive_Power.length > 0) { valuePTotal_Reactive_Power.pop(); } 
		while(valuePTotal_Apparent_Power.length > 0) { valuePTotal_Apparent_Power.pop(); } 


		for(x=0;x<panjangJson;x++){
		 valueWaktu[x]=moment(msg[x].waktu,"YYYY-MM-DD hh:mm:ss").format("HH");//konvert ke data(lib momen.js)

			//daya
			valuePTotal_Active_Power[x]=parseInt(msg[x].Total_Active_Power);//konvert ke int
			valuePTotal_Reactive_Power[x]=parseInt(msg[x].Total_Reactive_Power);//konvert ke int
			valuePTotal_Apparent_Power[x]=parseInt(msg[x].Total_Apparent_Power);//konvert ke int	
			//console.log(valueVr[x]);
		}
           // reloadChart();
    
     shift=false;
      		//VOLTAGE REDRAW
			var delayChart=1000;

			//daya
			var  chartPower=new  $('#containerPowerHour').highcharts();
			chartPower.series[0].setData(valuePTotal_Active_Power, false);
			chartPower.series[1].setData(valuePTotal_Reactive_Power, false);
			chartPower.series[2].setData(valuePTotal_Apparent_Power, false);
    	chartPower.xAxis[0].setCategories(valueWaktu);
		 	chartPower.redraw();
			}//end if(panjangJson<=maxCountGrapik){
			else{
				alert("Error : failed to load chart trend, max count ");
			}
			}); // end Ajax hour

		}); // end klik submit




	var valuePTotal_Active_Power=[];
	var valuePTotal_Apparent_Power=[];
	var valuePTotal_Reactive_Power=[];
	var valueJamList=[];

		function reloadChart(){
		//	var chartVoltage =$('#container_voltage').highcharts('StockChart', {
		//var chartPower = 
	} // end reloadChart

$('#containerPowerMonth').highcharts({
		  chart: {
            type: 'column'
        },
        title: {
            text: 'POWER CONSUMTION MOTHLY'
        },
        subtitle: {
            text: ''
        },

          xAxis: {
            type: 'category'
        },
			series: [{
				name: 'Total Active Power',
			//	data: valuePTotal_Active_Power
				}
				, {
				name: 'Total Reactive Power',
			//	data: valuePTotal_Reactive_Power
				}, {
				name: 'Total Apparent Power',
			//	data: valuePTotal_Apparent_Power
				}
				]
		});

$('#containerPowerDay').highcharts({
		  chart: {
            type: 'column'
        },
        title: {
            text: 'POWER CONSUMTION DAILY'
        },
        subtitle: {
            text: ''
        },

          xAxis: {
            type: 'category'
        },
			series: [{
				name: 'Total Active Power',
				//data: valuePTotal_Active_Power
				}
				, {
				name: 'Total Reactive Power',
			//	data: valuePTotal_Reactive_Power
				}, {
				name: 'Total Apparent Power',
			//	data: valuePTotal_Apparent_Power
				}
				]
		});
$('#containerPowerHour').highcharts({
		  chart: {
            type: 'column'
        },
        title: {
            text: 'POWER CONSUMTION HOURLY'
        },
        subtitle: {
            text: ''
        },

          xAxis: {
            type: 'category'
        },
			series: [{
				name: 'Total Active Power',
				//data: valuePTotal_Active_Power
				}
				, {
				name: 'Total Reactive Power',
			//	data: valuePTotal_Reactive_Power
				}, {
				name: 'Total Apparent Power',
			//	data: valuePTotal_Apparent_Power
				}
				]
		});

}); // end document ready

	// $(function () {
	// 	$('#containerDay').highcharts({
	// 		chart: {
	// 			type: 'column'
	// 		},
	// 		title: {
	// 			text: 'World\'s largest cities per 2014'
	// 		},
	// 		subtitle: {
	// 			text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
	// 		},
	// 		xAxis: {
	// 			type: 'category',
	// 			labels: {
	// 				rotation: -45,
	// 				style: {
	// 					fontSize: '13px',
	// 					fontFamily: 'Verdana, sans-serif'
	// 				}
	// 			}
	// 		},
	// 		yAxis: {
	// 			min: 0,
	// 			title: {
	// 				text: 'Population (millions)'
	// 			}
	// 		},
	// 		legend: {
	// 			enabled: false
	// 		},
	// 		tooltip: {
	// 			pointFormat: 'Population in 2008: <b>{point.y:.1f} millions</b>'
	// 		},
	// 		series: [{
	// 			name: 'Population',
	// 			data: [
 //                ['Shanghai', 23.7],
 //                ['Lagos', 16.1],
 //                ['Istanbul', 14.2],
 //                ['Karachi', 14.0],
 //                ['Mumbai', 12.5],
 //                ['Moscow', 12.1],
 //                ['São Paulo', 11.8],
 //                ['Beijing', 11.7],
 //                ['Guangzhou', 11.1],
 //                ['Delhi', 11.1],
 //                ['Shenzhen', 10.5],
 //                ['Seoul', 10.4],
 //                ['Jakarta', 10.0],
 //                ['Kinshasa', 9.3],
 //                ['Tianjin', 9.3],
 //                ['Tokyo', 9.0],
 //                ['Cairo', 8.9],
 //                ['Dhaka', 8.9],
 //                ['Mexico City', 8.9],
 //                ['Lima', 8.9]
	// 			],
	// 			dataLabels: {
	// 				enabled: true,
	// 				rotation: -90,
	// 				color: '#FFFFFF',
	// 				align: 'right',
	// 				format: '{point.y:.1f}', // one decimal
	// 				y: 10, // 10 pixels down from the top
	// 				style: {
	// 					fontSize: '13px',
	// 					fontFamily: 'Verdana, sans-serif'
	// 				}
	// 			}
	// 		}]
	// 	});
	// });
</script>
@stop