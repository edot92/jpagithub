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
        <meta name="description" content="JPA REV 1">
        <meta name="author" content="JPA.COM">
        <meta name="keyword" content="JPA">
        <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
        <title>JPA</title>
        <!-- Main styles for this application -->
        <link href="lib/alba/css/style.css" rel="stylesheet">
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
    
		<!-- add the jQWidgets base styles and one of the theme stylesheets -->
		<link rel="stylesheet" href="lib/jqwidgets/styles/jqx.base.css" type="text/css" />
		<link rel="stylesheet" href="lib/jqwidgets/styles/jqx.darkblue.css" type="text/css"/>
		<script src="{{asset('lib/ajaxCRUD/ajax-crud.js')}}"></script>
		
		
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
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header text-xs-center">
                            <strong></strong>
                        </div>
                        <a class="dropdown-item" href="{{ url('/logout') }}">
						<class="img-flag" alt="LOGOUT ">LOGOUT </a>
                       
                    </div>
                </li>
            </ul>
			
        </header>
        <nav id="navigation" class="collapse navbar-toggleable-sm nav-dark">
            <div id="navigation-items">
                <ul class="nav">
                    <li class="nav-title"></li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/user') }}"><i class="icon-speedometer">
						</i> USER <span class="label label-info"></span></a>
						</li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/device_setting') }}"><i class="icon-speedometer">
							</i> device_setting <span class="label label-info"></span></a>
						</li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/device_register') }}"><i class="icon-speedometer">
							</i> device_register <span class="label label-info"></span></a>
						</li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/device_trending') }}"><i class="icon-speedometer">
							</i> device_trending <span class="label label-info"></span></a>
						</li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/device_monitoring') }}"><i class="icon-speedometer">
							</i> device_monitoring <span class="label label-info"></span></a>
						</li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/consumption') }}"><i class="icon-speedometer">
							</i> consumption <span class="label label-info"></span></a>
						</li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/billing') }}"><i class="icon-speedometer">
							</i> billing <span class="label label-info"></span></a>
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
		   <div class="container-fluid">
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
        <script src="lib/alba/js/libs/daterangepicker.min.js"></script>
        <!-- Custom scripts required by this view -->
        <script src="lib/alba/js/views/forms.js"></script>
		@yield('scripts')
    </body>
</html>
<!--
<body class="metro bg-steel  ">
		<div class="app-bar fixed-top darcula" data-role="appbar">
			<a class="app-bar-element branding">BrandName</a>
			<span class="app-bar-divider"></span>
			<ul class="app-bar-menu">
		<!--	
		<li><a href="">Dashboard</a></li>
				<li>
					<a href="" class="dropdown-toggle">Project</a>
					<ul class="d-menu" data-role="dropdown">
						<li><a href="">New project</a></li>
						<li class="divider"></li>
						<li>
							<a href="" class="dropdown-toggle">Reopen</a>
							<ul class="d-menu" data-role="dropdown">
								<li><a href="">Project 1</a></li>
								<li><a href="">Project 2</a></li>
								<li><a href="">Project 3</a></li>
								<li class="divider"></li>
								<li><a href="">Clear list</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li><a href="">Security</a></li>
				<li><a href="">System</a></li>
				<li>
					<a href="" class="dropdown-toggle">Help</a>
					<ul class="d-menu" data-role="dropdown">
						<li><a href="">ChatOn</a></li>
						<li><a href="">Community support</a></li>
						<li class="divider"></li>
						<li><a href="">About</a></li>
					</ul>
				</li>
			</ul>
			
			<div class="app-bar-element place-right">
				<span class="dropdown-toggle"><span class="mif-cog"></span> User Name</span>
				<div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow fg-dark" data-role="dropdown" data-no-close="true" style="width: 220px">
					<h2 class="text-light">Quick settings</h2>
					<ul class="unstyled-list fg-dark">
						<li><a href="" class="fg-white1 fg-hover-yellow">Profile</a></li>
						<li><a href="" class="fg-white2 fg-hover-yellow">Security</a></li>
						<li><a href="" class="fg-white3 fg-hover-yellow">Exit</a></li>
					</ul>
				</div>
			</div>
			
		</div>
		
		<div class="page-content ">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
                <div class="cell size-x200 " id="cell-sidebar" style="height: 100%">
                    <ul class="sidebar2 dark bg-grayDark fg-grayDark" style="height: 100%;">
                        <li @if((Request::is('user')))class="active" @endif><a href="{{ url('/user') }}">
                            <span class="mif-apps icon"></span>
                            <span class="title">USER</span>
							<span class=""></span>
                        </a></li>
                        <li @if((Request::is('device_setting')))class="active" @endif><a href="{{ url('/device_setting') }}">
                            <span class="mif-vpn-publ icon"></span>
                            <span class="title">DEVICE SETTING</span>
                            
                        </a></li>
                        <li @if((Request::is('device_register')))class="active" @endif><a href="{{ url('/device_register') }}">
                            <span class="mif-drive-eta icon"></span>
                            <span class="title">DEVICE REGISTER</span>
                      
                        </a></li>
                        <li @if((Request::is('device_trending')))class="active" @endif><a href="{{ url('/device_trending') }}">
                            <span class="mif-cloud icon"></span>
                            <span class="title">DEVICE TRENDING</span>
                  
                        </a></li>
                        <li @if((Request::is('device_monitoring')))class="active" @endif><a href="{{ url('/device_monitoring') }}">
                            <span class="mif-database icon"></span>
                            <span class="title">MONITORING</span>
                    
                        </a></li>
                        <li @if((Request::is('consumption')))class="active" @endif><a href="{{ url('/consumption') }}">
                                               <span class="mif-database icon"></span>
                            <span class="title">CONSUMPTION</span>
                         
                        </a></li>
                        <li @if((Request::is('billing')))class="active" @endif><a href="{{ url('/billing') }}">
                                             <span class="mif-database icon"></span>
                            <span class="title">BILLING</span>
                          
                        </a></li>
                    </ul>
                </div>
				
                <div class="cell auto-size padding20 bg-white" id="cell-content">
				
						@yield('conten-body')	
									
                </div>
            </div>
			
        </div>
    </div>
</body>
</html>
-->