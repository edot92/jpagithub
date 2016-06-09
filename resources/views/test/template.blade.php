<!--
revisi 29/5/16
edot
alba admin template
https://genesisui.com/theme.html?id=alba#download
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <meta name="_token" content="{!! csrf_token() !!}" />
        <meta name="description" content="JPA REV 1">
        <meta name="author" content="JPA.COM">
        <meta name="keyword" content="JPA">
        <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
        <title>JPA</title>
        <!-- Main styles for this application -->

        <link href="lib/alba/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
		<!-- lib js -->
		<!-- add the jQuery script -->
		<script type="text/javascript" src="{{asset('js/jquery-2.2.4.js')}}"></script>
      
		<!-- add the jQWidgets framework -->
		<script type="text/javascript" src="lib/jqwidgets/jqxcore.js"></script>
		<!-- add one or more widgets -->
        
		<script type="text/javascript" src="lib/jqwidgets/jqxbuttons.js"></script>			
		<script type="text/javascript" src="lib/jqwidgets/jqxchart.js"></script>
		<script type="text/javascript" src="lib/jqwidgets/jqxgrid.js"></script>
		<script type="text/javascript" src="lib/jqwidgets/jqxdata.js"></script>
		<script type="text/javascript" src="lib/jqwidgets/jqxdatatable.js"></script>
		<script type="text/javascript" src="lib/jqwidgets/jqxgauge.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxscrollbar.js"></script>
    
		<!-- add the jQWidgets base styles and one of the theme stylesheets-->
		<link rel="stylesheet" href="lib/jqwidgets/styles/jqx.base.css" type="text/css" />
		<link rel="stylesheet" href="lib/jqwidgets/styles/jqx.darkblue.css" type="text/css"/> 

		  @yield('scriptshead')
    </head>
    <!-- BODY options, add following classes to body to change options
		1. 'compact-nav'     	  - Switch sidebar to minified version (width 50px)
		2. 'sidebar-nav'		  - Navigation on the left
			2.1. 'sidebar-off-canvas'	- Off-Canvas
				2.1.1 'sidebar-off-canvas-push'	- Off-Canvas which move content
				2.1.2 'sidebar-off-canvas-with-shadow'	- Add shadow to body elements
		3. 'fixed-nav'			  - Fixed navigation
		4. 'navbar-fixed'		  - Fixed navbar
	-->
    <body class="navbar-fixed sidebar-nav fixed-nav">
        <header class="navbar navbar-light brand-dark">
		
            <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler layout-toggler hidden-md-down" type="button" data-before="sidebar-nav" data-after="sidebar-nav compact-nav">&#9776;</button>
            <ul class="nav navbar-nav pull-right hidden-md-down">  
				<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        
                    </a>
  
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                       
                </li>
            </ul>
			
        </header>
        <nav id="navigation" class="collapse navbar-toggleable-sm nav-dark">
            <div id="navigation-items">
                <ul class="nav">
                    <li class="nav-title"></li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/user') }}"><i class="icon-speedometer">
						</i>USER <span class="label label-info"></span></a>
						</li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/device_setting') }}"><i class="icon-speedometer">
							</i>SETTING <span class="label label-info"></span></a>
						</li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/device_register') }}"><i class="icon-speedometer">
							</i>REGISTER<span class="label label-info"></span></a>
						</li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/device_trending') }}"><i class="icon-speedometer">
							</i>TRENDING <span class="label label-info"></span></a>
						</li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/device_monitoring') }}"><i class="icon-speedometer">
							</i>POWER MONITORING <span class="label label-info"></span></a>
						</li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/consumption') }}"><i class="icon-speedometer">
							</i>POWER CONSUMTION <span class="label label-info"></span></a>
						</li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/billing') }}"><i class="icon-speedometer">
							</i>BILLING <span class="label label-info"></span></a>
						</li>				 	
                </ul>
            </div>
        </nav>
        <!-- Main content -->
        <main id="content">
            <!-- Breadcrumb -->
            <ol class="breadcrumb r-0">
			
			<!--
                <li><a href="#">Home</a></li>
                <li><a href="#">Library</a></li>
                <li class="active">Data</li>
                <!-- Breadcrumb Menu-->
             	<!--   <div class="breadcrumb-menu">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <a class="btn btn-secondary" href="#"><i class="icon-speech"></i></a>
                        <a class="btn btn-secondary" href="./"><i class="icon-graph"></i> &nbsp;Dashboard</a>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-settings"></i> &nbsp;Settings
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                                <div class="dropdown-header text-xs-center">
                                    <strong>Account</strong>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fa fa-tasks"></i> Tasks<span class="label label-danger">13</span></a>
                                <a class="dropdown-item" href="#"><i class="fa fa-comments"></i> Comments<span class="label label-warning">234</span></a>
                                <div class="dropdown-header text-xs-center">
                                    <strong>Settings</strong>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span class="label label-default">75</span></a>
                                <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Projects<span class="label label-primary">2</span></a>
                            </div>
                        </div>
                    </div>
                </div>
				-->
            </ol>
           <!-- ISI KONTEN-->
		   <div class="container-fluid" id="container_fluid_id">
                <div class="animated fadeIn">
                  
                    <!--/.row-->
                    <div class="row">
                        <div class="col-md-12">
                    <div class="card">
                                <div class="card-header">
                                 	@yield('conten-body')
                                   </div>
                       </div>
                        </div>
                        <!--/.col-->
                    </div>
                    <!--/.row-->
                </div>
            </div>
            <!-- /.conainer-fluid -->
        </main>
        <footer id="footer">
          <!--  <span class="text-left">
                <a href="http://bootstrapmaster.com">Alba</a> &copy; 2016 creativeLabs.
            </span>
            <span class="pull-right">
                Powered by <a href="http://genesisui.com">GenesisUI</a>
            </span>
			-->
        </footer>
		<!-- Bootstrap and necessary plugins -->
        <script src="lib/alba/js/libs/jquery.min.js"></script>
        <script src="lib/alba/js/libs/tether.min.js"></script>
        <script src="lib/alba/js/libs/bootstrap.min.js"></script>
        <script src="lib/alba/js/libs/pace.min.js"></script>
        <!-- Plugins and scripts required by all views -->
        <script src="lib/alba/js/libs/Chart.min.js"></script>
        <script src="lib/alba/js/views/shared.js"></script>
        <!-- GenesisUI main scripts -->
        <script src="lib/alba/js/app.js"></script>
        <!-- Plugins and scripts required by this views -->
        <script src="lib/alba/js/libs/jquery.maskedinput.min.js"></script>
        <script src="lib/alba/js/libs/moment.min.js"></script>
        <script src="lib/alba/js/libs/select2.min.js"></script>
        <!-- <script src="lib/alba/js/libs/daterangepicker.min.js"></script>  -->
        <!-- Custom scripts required by this view -->
        <!-- <script src="lib/alba/js/views/forms.js"></script>  -->
		@yield('scripts')
    </body>
</html>
