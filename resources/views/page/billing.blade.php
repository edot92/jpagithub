@extends('test.template')
@section('conten-body')
<div class="row">
  <div class="col-md-12" ><!--style="height:100px;"-->
  <form class="form-inline" role="form">
    <div class="col-md-3" >
      <div class="form-group " >
        <label for="datetimepicker10">DATE BILLING</label>
        <div class='input-group date' id='datetimepicker10'>
          <input type='text' class="form-control" />
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar">
            </span>
          </span>
        </div>
      </div>
    </div>
    
    <div class="col-md-3" >
      <div class="form-group">
        <label for="idtxtUnitPrice">GENERATED ON</label>
        <input type="text" class="form-control" id="idtxtUnitPrice" readonly="true">
      </div>
    </div>

    <div class=" col-md-3" >
      <div class="form-group">
        <label for="txtidPricekw">PRICE / kWH</label>
        <input type="text" class="form-control" id="txtidPricekw">
      </div>
    </div>
    <div class=" col-md-3" >
      <button type="button" class="btn btn-default">Default</button>
    </div>
  </form>
</div>
</div>
<br>
<div class="row">
  <div class='col-sm-3'>
    <div id="container" style="min-width: 10px; height: 400px; margin: 0 auto"></div>
  </div>
  <div class='col-sm-9'>
    <div id="container2" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
  </div>
</div>
<br>
<br>
<div class="row">
  <div class='col-sm-5'>
    <div class="panel panel-default">
      <div class="panel-heading">LAST MONTH</div>
      <div class="panel-body">
        <H6>TOTAL ACTIVE POWER</H6>
        <H6>TOTAL REACTIVE POWER</H6>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
              </tr>
            </thead>
            <tr>
              <th>OFF PEAK ENERGY=</th>  <th>COST OF OFF PEAK=</th>
              <tr>
              </tr>
              <th>ON PEAK ENERGY=</th>    <th>COST OF ON PEAK=</th>
            </tr>
            <th></th>                    <th>TOTAL = </th>
          </table>
        </div>
      </div>
      </div><!-- END PANEL -->
    </div>
    <div class='col-sm-5'>
      <div class="panel panel-default">
        <div class="panel-heading">THIS MONTH</div>
        <div class="panel-body">
          <H6><b>TOTAL ACTIVE POWER</H6>
          <H6>TOTAL REACTIVE POWER</H6>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                </tr>
              </thead>
              <tr>
                <th>OFF PEAK ENERGY=</th>  <th>COST OF OFF PEAK=</th>
                <tr>
                </tr>
                <th>ON PEAK ENERGY=</th>    <th>COST OF ON PEAK=</th>
              </tr>
              <th></th>                    <th>TOTAL = </th>
            </table>
          </div>
        </div>
        </div><!-- END PANEL -->
      </div>
      @stop
      @section('scripts')
      <script src="js/angular.min.js"></script>
      <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <script type="text/javascript" src="{{ asset('js/moment.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/daterangepicker.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/daterangepicker.js') }}"></script>
      <style type="text/css"  src="{{ asset('js/daterangepicker.css') }}"></style>
      <script src="https://code.highcharts.com/stock/highstock.js"></script>
      <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
      <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
      <script src="js/moment.js"></script>
      <script src="js/bootstrap-datetimepicker.min.js"></script>
      <script src="js/locale/id.js"></script>
      <script type="text/javascript" src="{{ asset('js/html2canvas.js') }}"></script>
      <!-- Include Date Range Picker -->
      <script type="text/javascript">
      $(function () {
      $('#datetimepicker10').datetimepicker({
      viewMode: 'years',
      format: 'MM-YYYY'
      });
      //chart 1
      $('#container').highcharts({
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
      enabled: true
      },
      tooltip: {
      pointFormat: 'Population in 2008: <b>{point.y:.1f} millions</b>'
      },
      series: [{
      name: 'TOTAL ACTIVE POWER',
      data: [
      ['PREVIOUS', 23.7],
      ['NOW', 16.1],
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
      },
      {
      name: 'TOTAL REACTIVE POWER',
      data: [
      ['PREVIOUS', 23.7],
      ['NOW', 16.1],
      ],
      dataLabels: {
      enabled: true,
      rotation: -90,
      color: '#FFFFFF',
      align: 'right',
      format: '{point.y:.1f}kwh', // one decimal
      y: 10, // 10 pixels down from the top
      style: {
      fontSize: '13px',
      fontFamily: 'Verdana, sans-serif'
      }
      }
      }
      ]
      }); // end chart 1
      var valuePTotal_Active_PowerNow=[];
      var valuePTotal_Apparent_PowerNow=[];
      var valuePTotal_Reactive_PowerNow=[];
      var tanggal=[];
      var maxTanggal=new Date(2016, 1, 0).getDate();;
      for(x=0;x<maxTanggal;x++){
      tanggal[x]=x+1;
      valuePTotal_Active_PowerNow[x]=x+1;
      valuePTotal_Reactive_PowerNow[x]=x+1;
      }
      $('#container2').highcharts({
      title: {
      text: 'Combination chart'
      },
      xAxis: {
      categories: tanggal
      },
      labels: {
      items: [{
      html: 'Total fruit consumption',
      style: {
      left: '50px',
      top: '18px',
      color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
      }
      }]
      },
      series: [{
      type: 'column',
      name: 'TOTAL ACTIVE POWER',
      data: valuePTotal_Active_PowerNow
      }, {
      type: 'column',
      name: 'TOTAL REACTIVE POWER',
      data: valuePTotal_Reactive_PowerNow
      },
      {
      type: 'pie',
      name: 'average consumption',
      data: [{
      name: 'Jane',
      y: 20,
      color: Highcharts.getOptions().colors[0] // Jane's color
      }, {
      name: 'John',
      y: 80,
      color: Highcharts.getOptions().colors[1] // John's color
      }],
      center: [100, 80],
      size: 100,
      showInLegend: false,
      dataLabels: {
      enabled: false
      }
      }]
      });
      // end chart2
      });
      $(document).ready(function(){
      //alert("tes");
      });
      </script>
      <!--<style type="text/css">
      .rectangle-box {
      position: relative;
      width: 100%;
      height: 50px;
      overflow: hidden;
      background: #91E4FB;
      marg
      in-top: 30px;
      vertical-align: bottom;
      }
      .rectangle-box:before {
      content: "";
      display: block;
      padding-top: 50%;
      }
      .rectangle-content {
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      font-family: 'Raleway', sans-serif;
      font-weight: 400;
      }
      .rectangle-content div {
      display: table;
      width: 100%;
      height: 100%;
      }
      .rectangle-content h3 {
      display: table-cell;
      text-align: center;
      vertical-align: middle;
      color: #444444;
      }
      </style>-->
      @stop