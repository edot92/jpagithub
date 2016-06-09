@extends('test.template')
@section('conten-body')
<div class = "row">

 <div class='col-md-3'>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker6'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class='col-md-3'>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker7'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            </div>
        </div>

          <div class='col-md-3'>
        		<div class="form-group">
           			 <div class='input-group date' id='submitDate'>
              			<button type="button" id="submitDate" class="btn btn-primary">APPLY DATE TIME</button>
           			 </div>
            	</div>
       	 </div>
       	    <div class='col-md-3'>
       	  <div class="form-group">
    <label for="textValueMaxGrafikCount" class="col-md-1"></label>
    <div class="col-sm-8">
     MAX COUNT<!-- <input class="form-control"  id="textValueMaxGrafikCount" type="text" placeholder="count" value="30">-->
     <select class="form-control" id="textValueMaxGrafikCount">
     @for($i=2;$i<=1000;$i++)
     @if($i==1000)
         <option selected> {{ $i }}</option>
     @else
         <option> {{ $i }}</option>
     @endif

	@endfor
  	</select
    </div>
  </div>
     </div>

  
    </div>
<!--
	<div class="row">	
        <div class='col-sm-4'>
			<input type="text" name="daterangeDeviceTrending"  id ="daterangeDeviceTrending" value="01/01/2016 - 01/31/2016" />
        </div>	
        <br></br>	
    </div>
-->
	<div class="row">
		<div class = "col-md-12">
			<div id="container_voltage" style="min-width: 500px; min-height: 800px; margin: 0 auto"></div>
		 </div>
	</div>
	
	<div class="row">
		<div class = "col-md-12">
			<div id="container_current" style="min-width: 500px; min-height: 800px; margin: 0 auto"></div>
		</div>
	</div>
	
	    <div class="row">
		<div class = "col-md-12">
			<div id="container_power" style="min-width: 500px; min-height: 800px; margin: 0 auto"></div>
		</div>
	</div>
	
</div>
<div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='demo_wait.gif' width="64" height="64" /><br>Loading..</div>
@stop
	@section('scripts') 

<!-- Include Bootstrap Datepicker -->

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
<!-- Include Date Range Picker -->
<script type="text/javascript">
 

$(document).ready(function(){

        $('#datetimepicker6').datetimepicker({
        	locale: 'id',
        	format: 'DD-MM-YYYY HH:mm',
        	sideBySide: true,
	        minDate: new Date(2016, 0, 1),
	       // showTodayButton: true,
	       // toolbarPlacement: 'bottom',
	        widgetPositioning: {
	            horizontal: 'left',
            vertical: 'auto'
	        }
	     	// Accepts: object with the all or one of the parameters above
	        //  horizontal: 'auto', 'left', 'right'
	        //  vertical: 'auto', 'top', 'bottom'
        	
        });
        $('#datetimepicker7').datetimepicker({
            useCurrent: false, //Important! See issue #1075
            locale: 'id',
        	format: 'DD-MM-YYYY HH:mm',
        	sideBySide: true,
	        minDate: new Date(2016, 0, 1),
	       // showTodayButton: true,
	        //toolbarPlacement: 'bottom',
	        widgetPositioning: {
	             horizontal: 'left',
            vertical: 'auto'
	        }
        });
      
    // $(document).ajaxStart(function(){
    //     $("#wait").css("display", "block");
    // });
    // $(document).ajaxComplete(function(){
    //     $("#wait").css("display", "none");
    // });// end   $(function () {
   

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

	
	$(function () {
   
  	Highcharts.setOptions({global: { useUTC: false}});		
	// export 
	$('#export').click(function() {
    	Highcharts.exportCharts([chartVoltage]);
	});});
	// button klik
	$('#submitDate').on('click', function (e) {
	var lanjut=false;
	var timeAfter;
	var timeBefore;
	var jamAfter;
	var jamBefore;
	var a= $('#datetimepicker6').data('DateTimePicker').date();	
	var b= $('#datetimepicker7').data('DateTimePicker').date();

		if(moment(a, 'YYYY-MM-DD HH:mm', true).isValid() ){
		 timeBefore=moment(a).format("YYYY-MM-DD");
		 jamBefore=moment(a).format("HH:mm");
		 lanjut=true;
		}
		else
		{
		 timeBefore="waktu yang dimassukan salah";
		 lanjut=false;
		}
		if(moment(b, 'YYYY-MM-DD HH:mm', true).isValid() && lanjut==true){
		 timeAfter=moment(b).format("YYYY-MM-DD");
		 jamAfter=moment(b).format("HH:mm");
		 lanjut=true;
		}
		else
		{
		 timeAfter="waktu yang dimassukan salah";
		 lanjut=false;
		}
		if(lanjut==false){alert("error :input date failed");return;};
		  var startDateTrending=timeBefore;
		  var endDateTrending=timeAfter;
		//  alert(startDateTrending+' to '+ endDateTrending);
		 var urlChartTrend='{{url('/device_trendingdate')}}'+'/'+startDateTrending+'/'+endDateTrending+'/'+jamBefore+'/'+jamAfter;
		$.ajax({
		    type: "GET",
		    url: urlChartTrend,
		    data: ''
		}).done(function( msg ) {
			panjangJson=msg.length;
			console.log(msg);

			var maxCountGrapik=document.getElementById("textValueMaxGrafikCount").value;
			alert("panjang json="+panjangJson);
		if(panjangJson<=maxCountGrapik){
		//voltage
		alert("sukes");
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
			valueWaktu[x]=moment(msg[x].waktu,"YYYY-MM-DD hh:mm:ss").format("DD-MM-YYYY HH:mm");//konvert ke data(lib momen.js)
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
            reloadChart();
      		shift=true;
  			var  chartVoltage=new  $('#container_voltage').highcharts();
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
			}//end if(panjangJson<=maxCountGrapik){
			else{
				alert("Error : failed to load chart trend, max count ="+maxCountGrapik);
			}
		}); // end klik submit


		
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
             pointFormat: ' {point.x:dd-mm-yy HH:ss} <br>{point.y:.2f} Volts'
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
				type: 'spline',
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
					type: 'spline',
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
	} // end reloadChart
});// end ready function
</script>
<style type="text/css">

</style>
@stop