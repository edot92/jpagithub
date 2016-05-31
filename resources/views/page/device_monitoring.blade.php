@extends('test.template')

@section('conten-body')
	<script type="text/javascript">

			$(document).ready(function () {
					var animasiJarumDelay=500;
				function nilaiGauge(nilai_a,nilai_b,nilai_c){
					$('#gaugeContainer').jqxGauge({ caption: { value: nilai_a+ 'kWh', position: 'bottom', offset: [0, 10], visible: true }});
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
					ticksMinor: { interval: 5, size: '5%' },
					ticksMajor: { interval: 10, size: '9%' },
					value: 0,
					colorScheme: 'scheme01',
					animationDuration: animasiJarumDelay
				});
				$('#gaugeContainer').jqxGauge({ caption: { value: nilai, position: 'bottom', offset: [0, 10], visible: true }})
				$('#gaugeContainer').jqxGauge('value', nilai);
			  //
				$('#gaugeContainer2').jqxGauge({
					width: 250,
					height: 250,
					/*ranges: [{ startValue: 0, endValue: 55, style: { fill: '#C9C9C9', stroke: '#C9C9C9' }, endWidth: 5, startWidth: 1 },
					{ startValue: 55, endValue: 110, style: { fill: '#FCF06A', stroke: '#FCF06A' }, endWidth: 10, startWidth: 5 },
					{ startValue: 110, endValue: 165, style: { fill: '#FCA76A', stroke: '#FCA76A' }, endWidth: 15, startWidth: 10 },
					{ startValue: 165, endValue: 220, style: { fill: '#FC6A6A', stroke: '#FC6A6A' }, endWidth: 20, startWidth: 15}],
					*/
					ticksMinor: { interval: 5, size: '5%' },
					ticksMajor: { interval: 10, size: '9%' },
					value: 0,
					colorScheme: 'scheme02',
					animationDuration: animasiJarumDelay
				});
				$('#gaugeContainer2').jqxGauge({ caption: { value: nilai, position: 'bottom', offset: [0, 10], visible: true }})
				$('#gaugeContainer2').jqxGauge('value', nilai);
				//
				$('#gaugeContainer3').jqxGauge({
					width: 250,
					height: 250,
					/*ranges: [{ startValue: 0, endValue: 55, style: { fill: '#C9C9C9', stroke: '#C9C9C9' }, endWidth: 5, startWidth: 1 },
					{ startValue: 55, endValue: 110, style: { fill: '#FCF06A', stroke: '#FCF06A' }, endWidth: 10, startWidth: 5 },
					{ startValue: 110, endValue: 165, style: { fill: '#FCA76A', stroke: '#FCA76A' }, endWidth: 15, startWidth: 10 },
					{ startValue: 165, endValue: 220, style: { fill: '#FC6A6A', stroke: '#FC6A6A' }, endWidth: 20, startWidth: 15}],
					*/
					ticksMinor: { interval: 5, size: '5%' },
					ticksMajor: { interval: 10, size: '9%' },
					value: 0,
					colorScheme: 'scheme04',
					animationDuration: animasiJarumDelay
				});
				$('#gaugeContainer3').jqxGauge({ caption: { value: nilai, position: 'bottom', offset: [0, 10], visible: true }})
				$('#gaugeContainer3').jqxGauge('value', nilai);

				 //binding table
				var url = "../storage/app/realvalue.csv";;
			
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
				
				$("#dataTable").jqxDataTable(
				{
					width: 320+200+50,
					pageable: false,
					pagerButtonsCount: 10,
					source: dataAdapter,
					columnsResize: true,
					columns: [
					{ text: 'No.', dataField: 'ID', width: 50 },
					{ text: 'LABEL REGISTER', dataField: 'LABEL REGISTER', width: 200 },
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
					a=Math.floor((Math.random() * 219) + 1);
					b=Math.floor((Math.random() * 219) + 1);
					c=Math.floor((Math.random() * 219) + 1);
					
					setTimeout(nilaiGauge(a,b,c),1000);

				}  
					setTimeout(update,5000);
			});

		</script>
<div class="grid">
	<div class="row">	
		
		<div class="row">
			<div class="col-sm-4"><div id="gaugeContainer" ></div></div>
			<div class="col-sm-4"><div id="gaugeContainer2"></div></div>
			<div class="col-sm-4"><div id="gaugeContainer3"></div></div>
		</div>
		<h1></h1>
		
	</div> <!-- end row <button id="btnSave">Save Click</button>-->
	
	<div class="row">
	
		<div id="dataTable" border = "1" ></div>
	</div>

	<div data-role="dialog" id="dialog-ajax" class="padding20"
    data-close-button="true"
    data-href="dialog-ajax-demo-data.html"
    data-width="600"></div>
</div>		    
	<style>
@stop