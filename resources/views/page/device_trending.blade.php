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
<div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='demo_wait.gif' width="64" height="64" /><br>Loading..</div>
@stop
	@section('scripts') 

<!-- Include Bootstrap Datepicker -->
<script type="text/javascript" src="{{ asset('lib/highchart/js/highcharts.js') }}"></script>	
<script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>	
<script type="text/javascript" src="{{ asset('js/daterangepicker.js') }}"></script>	
<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>	
<script type="text/javascript" src="{{ asset('js/daterangepicker.js') }}"></script>	
<<style type="text/css"  src="{{ asset('js/daterangepicker.css') }}">	
</style>	
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
	
	
	
	
	$(function () {

		var chartVoltage=$('#container_voltage').highcharts({
			chart: {
				type: 'line'
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


    var chartVoltage = $('#container_voltage').highcharts(),
        name = false,
        enableDataLabels = true,
        enableMarkers = true,
        color = false;


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
    url: '{{url('/device_trendingdate')}}'+'/2015_06_5',
    data: ''
}).done(function( msg ) {
	panjangJson=msg.length;
	//console.log(msg);
	for(x=0;x<panjangJson;x++){
		valueVr[x]=parseInt(msg[x].Phase_1_Voltage_LN);//konvert ke int
		valueVs[x]=parseInt(msg[x].Phase_2_Voltage_LN);//konvert ke int
		valueVt[x]=parseInt(msg[x].Phase_3_Voltage_LN);//konvert ke int
		valueVtot[x]=parseInt(msg[x].Average_Voltage_LN);//konvert ke int
		//console.log(valueVr[x]);
	}

	//alert((msg.length)) ;
    //alert((msg[1].Phase_1_Voltage_LN)) ;
    
     //  var series = chartVoltage.series[0],
              //  shift = series.data.length > 20; // shift if the series is 
                                                 // longer than 20

            // add the point
            chartVoltage.redraw();
            chartVoltage.series[0].update(valueVr, true, false,500);
     		chartVoltage.series[1].update(valueVs, true, false,500);
     		chartVoltage.series[2].update(valueVt, true, false,500);
     		
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

        // change date
	$('#datepicker1').datepicker()
  .on('changeDate', function(ev){

  });
		
	});
</script>
@stop