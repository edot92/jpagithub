@extends('test.template')
@section('conten-body')
<div class = "row">
	<div class="row">	
        <div class='col-sm-4'>
			<input type="text" name="daterangeDeviceTrending"  id ="daterangeDeviceTrending" value="01/01/2016 - 01/31/2016" />
        </div>	
        <br></br>	
    </div>



	<div class="row">
		<div class = "col-md-12">
			<div id="container_voltage" style="min-width: 3temppx; min-height: 800px; margin: 0 auto"></div>
		 </div>
	</div>
	
	<div class="row">
		<div class = "col-md-12">
			<div id="container_current" style="min-width: 3temppx; min-height: 800px; margin: 0 auto"></div>
		</div>
	</div>
	
	    <div class="row">
		<div class = "col-md-12">
			<div id="container_power" style="min-width: 3temppx; min-height: 800px; margin: 0 auto"></div>
		</div>
	</div>
	
</div>
<div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='demo_wait.gif' width="64" height="64" /><br>Loading..</div>
@stop
	@section('scripts') 

<!-- Include Bootstrap Datepicker -->
	
<script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>	
<script type="text/javascript" src="{{ asset('js/daterangepicker.js') }}"></script>	
<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>	
<script type="text/javascript" src="{{ asset('js/daterangepicker.js') }}"></script>	
<<style type="text/css"  src="{{ asset('js/daterangepicker.css') }}">	

</style>	
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script type="text/javascript" src="https://www.highcharts.com/samples/data/three-series-1000-points.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript">
$(document).ready(function(){
    $(document).ajaxStart(function(){
        $("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
    });
   
});



    /*$(function () {
        $('#container').highcharts(
            {!! json_encode($yourFirstChart) !!}
        );
    })*/
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

	

	
	/*
	for(i=0;i<24;i++){
		valueJamList[i]="Hour : " + i.toString();
	}

	var temp=24;
		for(i=0;i<24;i++){
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
	
	*/
	
	
	$(function () {
   
  Highcharts.setOptions({
  global: {
    useUTC: false
  }
});

    // Create the chart
   // $('#container').highcharts('StockChart', {
		
		function reloadChart(){

		
	//	var chartVoltage =$('#container_voltage').highcharts('StockChart', {
		var chartVoltage=new Highcharts.Chart({
			chart: {
				renderTo: 'container_voltage',
				type: 'spline',
				 
			},
			title: {
				text: 'POWER METER'
			},
			subtitle: {
				text: 'Daily Trend Voltage R,S,T,Total (L-N)'
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
			 tooltip: {
            headerFormat: '<b>{series.name}</b><br>',
             pointFormat: ' {point.y:.2f} Volts'
        },
			 navigator: {
			        enabled: true  ,   
		xAxis: {
			  
          labels: {
          	  rotation: -90,
                align: 'center',
                reserveSpace: false,
                y: -5,
            style: {
              color: 'blue'
            },
             padding: 1,
            formatter: function() {
              return (this.value+1) + ' count';
            }
          }
        }
			    },
		 rangeSelector: {
            selected: 1
        },
        plotOptions: {
            spline: {
                marker: {
                    enabled: true
                }
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

		var chartCurrent =$('#container_current').highcharts({
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
				}, {
				name: 'NEUTRAL CURRRENT',
				data: valueNeutral_Current
				}
				]
		});
	
		var chartPower = $('#container_power').highcharts({
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
				name: 'Total Active Power',
				data: valuePTotal_Active_Power
				}, {
				name: 'Total Reactive Power',
				data: valuePTotal_Reactive_Power
				}, {
				name: 'Total Apparent Power',
				data: valuePTotal_Apparent_Power
				}]
		});
	}

	
		// export 
		$('#export').click(function() {
    Highcharts.exportCharts([chartVoltage]);
});
 


	$('input[name="daterangeDeviceTrending"]').daterangepicker();
  $('#daterangeDeviceTrending').on('apply.daterangepicker', function(ev, picker) {
  //console.log(picker.startDate.format('YYYY-MM-DD'));
  //console.log(picker.endDate.format('YYYY-MM-DD'));
  var startDateTrending=picker.startDate.format('YYYY_MM_DD');
  var endDateTrending=picker.endDate.format('YYYY_MM_DD');
  alert(startDateTrending+' to '+ endDateTrending);
 var url1='{{url('/device_trendingdate')}}';
$.ajax({
    type: "GET",
    url: '{{url('/device_trendingdate')}}'+'/'+startDateTrending+'/'+endDateTrending,
    data: ''
}).done(function( msg ) {
	panjangJson=msg.length;
	console.log(msg);
		//voltage
		var valueWaktu=[];
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
		//voltage
		valueVr[x]=parseInt(msg[x].Phase_1_Voltage_LN);//konvert ke int
		valueVs[x]=parseInt(msg[x].Phase_2_Voltage_LN);//konvert ke int
		valueVt[x]=parseInt(msg[x].Phase_3_Voltage_LN);//konvert ke int
		valueVtot[x]=parseInt(msg[x].Average_Voltage_LN);//konvert ke int
		valueWaktu[x]=moment(msg[x].waktu,"YYYY-MM-DD hh:mm:ss").format("DD-MM-YYYY");//konvert ke data(lib momen.js)
		//current
		valueIr[x]=parseInt(msg[x].Phase_1_Current);//konvert ke int
		valueIs[x]=parseInt(msg[x].Phase_2_Current);//konvert ke int
		valueIt[x]=parseInt(msg[x].Phase_3_Current);//konvert ke int
		valueItot[x]=parseInt(msg[x].Total_Current);//konvert ke int
		valueNeutral_Current[x]=parseInt(msg[x].Neutral_Current);//konvert ke int
		//daya
		valuePTotal_Active_Power[x]=parseInt(msg[x].Total_Active_Power);//konvert ke int
		valuePTotal_Reactive_Power[x]=parseInt(msg[x].Total_Reactive_Power);//konvert ke int
		valuePTotal_Apparent_Power[x]=parseInt(msg[x].Total_Apparent_Power);//konvert ke int	
		//console.log(valueVr[x]);
	}
	//alert(valueWaktu[0]);
            reloadChart();
      		shift=true;
  			var  chartVoltage=new  $('#container_voltage').highcharts();
      // chartVoltage.series[0].setData(valueVr,false);
      // chartVoltage.series[1].setData(valueVs,false);
      // chartVoltage.series[2].setData(valueVt,false);
      // chartVoltage.series[3].setData(valueVtot,false);
      		//VOLTAGE REDRAW
			var delayChart=1000;
          	chartVoltage.series[0].update(valueVr, true, shift,delayChart);
     		chartVoltage.series[1].update(valueVs, true, shift,delayChart);
     		chartVoltage.series[2].update(valueVt, true, shift,delayChart);
     		chartVoltage.series[3].update(valueVtot, true, shift,delayChart);
     		
     		chartVoltage.xAxis[0].setCategories();
     		chartVoltage.xAxis[0].setCategories(valueWaktu);
     		chartVoltage.isDirty = true;
			chartVoltage.redraw();
				//current REDRAW
			var  chartCurrent=new  $('#container_current').highcharts();
          	chartCurrent.series[0].update(valueIr, true, shift,delayChart);
     		chartCurrent.series[1].update(valueIs, true, shift,delayChart);
     		chartCurrent.series[2].update(valueIt, true, shift,delayChart);
     		chartCurrent.series[3].update(valueItot, true, shift,delayChart);
     		chartCurrent.series[4].update(valueNeutral_Current, true, shift,delayChart);
     		chartCurrent.xAxis[0].setCategories();
     		chartCurrent.xAxis[0].setCategories(valueWaktu);
     		chartCurrent.isDirty = true;
			chartCurrent.redraw();
			//daya
			var  chartPower=new  $('#container_power').highcharts();
          	chartPower.series[0].update(valuePTotal_Active_Power, true, shift,delayChart);
     		chartPower.series[1].update(valuePTotal_Reactive_Power, true, shift,delayChart);
     		chartPower.series[2].update(valuePTotal_Apparent_Power, true, shift,delayChart);
     		chartPower.xAxis[0].setCategories();
     		chartPower.xAxis[0].setCategories(valueWaktu);
     		chartPower.isDirty = true;
			chartPower.redraw();
     		// chartVoltage.xAxis[1].setCategories(valueWaktu);
     		// chartVoltage.xAxis[2].setCategories(valueWaktu);
     		// chartVoltage.xAxis[3].setCategories(valueWaktu);
     	//	        chartVoltage.yAxis[0].min= 0;
       // chartVoltage.yAxis[0].max= panjangJson;
      
   // Phase_1_Voltage_LN


});
   // window.jqxWindow('setContent', 'Loading...');
       /* $.ajax({
            dataType: 'json',
            url: url1+'/'+startDateTrending+'/'+endDateTrending,
            success: function (data) {
           //     window.jqxWindow('setContent', data[0].text);
           alert(data);
           alert(url);
            },
            error: function () {
             //   window.jqxWindow('setContent', 'Error');
             alert(Error);
              alert(url);

            }
        });*/
});


		
	});
</script>
@stop