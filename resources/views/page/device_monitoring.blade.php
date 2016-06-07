@extends('test.template')

@section('scriptshead')
  <link rel="stylesheet" href="lib/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="lib/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="lib/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="lib/jqwidgets/jqxbuttons.js"></script>
   <script type="text/javascript" src="lib/jqwidgets/jqxgrid.columnsresize.js"></script>
   <script type="text/javascript" src="lib/jqwidgets/jqxgrid.selection.js"></script> 
   <script type="text/javascript" src="lib/jqwidgets/jqxmenu.js"></script> 
   <script type="text/javascript" src="lib/jqwidgets/jqxgrid.sort.js"></script> 


	<script type="text/javascript">

			$(document).ready(function () {
					var animasiJarumDelay=500;
					var nilaiGaugeMax=500;
					var nilaiGaugeIntervalLabel=50;
				function nilaiGauge(nilai_a,nilai_b,nilai_c){
					$('#gaugeContainer').jqxGauge({

						caption: { value: nilai_a+ 'kWh ', position: 'bottom', offset: [0, 10], visible: true }});
					$('#gaugeContainer2').jqxGauge({ caption: { value: nilai_b+ 'kWh', position: 'bottom', offset: [0, 10], visible: true }});
					$('#gaugeContainer3').jqxGauge({ caption: { value: nilai_c+ 'kWh', position: 'bottom', offset: [0, 10], visible: true }});
				
					$('#gaugeContainer').jqxGauge({
						value: parseInt(nilai_a)	
					});
					$('#gaugeContainer2').jqxGauge({
						value: parseInt(nilai_b)	
					});
					$('#gaugeContainer3').jqxGauge({
						value: parseInt(nilai_c)	
					});
					setTimeout(update,1000);
				
				}
				var nilai=0;
				//
				$('#gaugeContainer').jqxGauge({
					
					width: 250,
					height: 250,
					/*ranges: [{ startValue: 0, endValue: 55, style: { fill: '#C9C9C9', stroke: '#C9C9C9' }, endWidth: 5, startWidth: 1 },
								{ startValue: 55, endValue: 110, style: { fill: '#FCF06A', stroke: '#FCF06A' }, endWidth: 10, startWidth: 5 },
								{ startValue: 110, endValue: 165, style: { fill: '#FCA76A', stroke: '#FCA76A' }, endWidth: 15, startWidth: 10 },
								{ startValue: 165, endValue: 220, style: { fill: '#FC6A6A', stroke: '#FC6A6A' }, endWidth: 20, startWidth: 15}],
					*/
					 max: nilaiGaugeMax,
					ticksMinor: { interval: 5, size: '2%' },
					ticksMajor: { interval: 10, size: '5%' },
					labels: { interval: 50 },
					caption: { value: nilai, position: 'bottom', offset: [0, 10], visible: true },
					value: 0,
					colorScheme: 'scheme01',
					animationDuration: animasiJarumDelay,
					
				});
				$('#gaugeContainer2').jqxGauge({
					width: 250,
					height: 250,
					/*ranges: [{ startValue: 0, endValue: 55, style: { fill: '#C9C9C9', stroke: '#C9C9C9' }, endWidth: 5, startWidth: 1 },
					{ startValue: 55, endValue: 110, style: { fill: '#FCF06A', stroke: '#FCF06A' }, endWidth: 10, startWidth: 5 },
					{ startValue: 110, endValue: 165, style: { fill: '#FCA76A', stroke: '#FCA76A' }, endWidth: 15, startWidth: 10 },
					{ startValue: 165, endValue: 220, style: { fill: '#FC6A6A', stroke: '#FC6A6A' }, endWidth: 20, startWidth: 15}],
					*/
					 max: nilaiGaugeMax,
					ticksMinor: { interval: 5, size: '2%' },
					ticksMajor: { interval: 10, size: '5%' },
					labels: { interval: 50 },
					caption: { value: nilai, position: 'bottom', offset: [0, 10], visible: true },
					value: 0,
					colorScheme: 'scheme02',
					animationDuration: animasiJarumDelay
				});

				$('#gaugeContainer3').jqxGauge({
					width: 250,
					height: 250,
					/*ranges: [{ startValue: 0, endValue: 55, style: { fill: '#C9C9C9', stroke: '#C9C9C9' }, endWidth: 5, startWidth: 1 },
					{ startValue: 55, endValue: 110, style: { fill: '#FCF06A', stroke: '#FCF06A' }, endWidth: 10, startWidth: 5 },
					{ startValue: 110, endValue: 165, style: { fill: '#FCA76A', stroke: '#FCA76A' }, endWidth: 15, startWidth: 10 },
					{ startValue: 165, endValue: 220, style: { fill: '#FC6A6A', stroke: '#FC6A6A' }, endWidth: 20, startWidth: 15}],
					*/
					 max: nilaiGaugeMax,
					ticksMinor: { interval: 5, size: '2%' },
					ticksMajor: { interval: 10, size: '5%' },
					labels: { interval: 50 },
					caption: { value: nilai, position: 'bottom', offset: [0, 10], visible: true },
					value: 0,
					colorScheme: 'scheme04',
					animationDuration: animasiJarumDelay
				});

				 //binding table
				//var url = "../storage/app/realvalue.csv";;
			var url = "realvalue.csv";;
				// prepare the data
				var source =
				{
					dataType: "csv",
					dataFields: [
					{ name: 'ID', type: 'int' },
					{ name: 'LABEL REGISTER', type: 'string' },
					{ name: 'PHASE1', type: 'string' },
					{ name: 'PHASE2', type: 'string' },
					{ name: 'PHASE3', type: 'string' },
					{ name: 'TOTAL', type: 'string' },
					],
					id: 'id',
					url: url
				};
				
				var dataAdapter = new $.jqx.dataAdapter(source);
				
				$("#dataTable").jqxGrid(
				{
					source: dataAdapter,
				width: 320+200+50,
				//	height: '100%',
					pageable: false,
					pagerButtonsCount: 50,
					
					 //altRows: true,
             		  sortable: false,
					columnsResize: true,
					columns: [
					{ text: 'No.', dataField: 'ID', width: 50 },
					{ text: 'LABEL REGISTER', dataField: 'LABEL REGISTER', width: 150 },
					{ text: 'PHASE 1', dataField: 'PHASE1', width: 80 },
					{ text: 'PHASE 2', dataField: 'PHASE2', width: 80 },
					{ text: 'PHASE 3', dataField: 'PHASE3', width: 80 },
					{ text: 'TOTAL', dataField: 'TOTAL', width: 80  }
					]
				});
			/*	$("#btnSave").click(
				function () {
					a=Math.floor((Math.random() * 100) + 1);
					b=Math.floor((Math.random() * 100) + 1);
					c=Math.floor((Math.random() * 100) + 1);
					
				   window.setTimeout(nilaiGauge(a,b,c),1000);
				}            
				);*/
				function update () {
					a=Math.floor((Math.random() * 400) + 1);
					b=Math.floor((Math.random() * 400) + 1);
					c=Math.floor((Math.random() * 400) + 1);
					
					setTimeout(nilaiGauge(a,b,c),1000);

				}  
					setTimeout(update,5000);
			});

	

		</script>

@stop

@section('conten-body')
  



<div class="row">	
		
		<div class="row text-center">

			<div class="col-sm-4 text-center">aa<div id="gaugeContainer" ></div></div>
			<div class="col-sm-4 text-center">aa<div id="gaugeContainer2"></div></div>
			<div class="col-sm-4 text-center">aa<div id="gaugeContainer3"></div></div>
		</div>

		<h1></h1>
		
</div> <!-- end row <button id="btnSave">Save Click</button>-->
	
<div class="row">

	<div class="col-md-8 center-block" style="float:none">		
		<div class="table-responsive">
                   <table class="table table-hover" data-role="datatable" data-auto-width="true"  id="dataTable" border = "1" > </table>
        </div>				
	</div>
	<h1></h1>

</div>		    
	<style>
@stop
