<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>   
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="description" content="">
        <meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
        <meta name="author" content="Huban Creative">

        <!-- Base Css Files -->
        <link href="/assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
        <link href="/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="/assets/libs/fontello/css/fontello.css" rel="stylesheet" />
        <link href="/assets/libs/animate-css/animate.min.css" rel="stylesheet" />
        <link href="/assets/libs/nifty-modal/css/component.css" rel="stylesheet" />
        <link href="/assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" />
        <link href="/assets/libs/ios7-switch/ios7-switch.css" rel="stylesheet" />
        <link href="/assets/libs/pace/pace.css" rel="stylesheet" />
        <link href="/assets/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet" />
        <link href="/assets/libs/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
        <link href="/assets/libs/jquery-icheck/skins/all.css" rel="stylesheet" />
        <!-- Code Highlighter for Demo -->
        <link href="/assets/libs/prettify/github.css" rel="stylesheet" />
        
                <!-- Extra CSS Libraries Start -->
                <link href="/assets/libs/rickshaw/rickshaw.min.css" rel="stylesheet" type="text/css" />
                <link href="/assets/libs/morrischart/morris.css" rel="stylesheet" type="text/css" />
                <link href="/assets/libs/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
                <link href="/assets/libs/jquery-clock/clock.css" rel="stylesheet" type="text/css" />
                <link href="/assets/libs/bootstrap-calendar/css/bic_calendar.css" rel="stylesheet" type="text/css" />
                <link href="/assets/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet" type="text/css" />
                <link href="/assets/libs/jquery-weather/simpleweather.css" rel="stylesheet" type="text/css" />
                <link href="/assets/libs/bootstrap-xeditable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />
                <link href="/assets/css/style.css" rel="stylesheet" type="text/css" />
                <!-- Extra CSS Libraries End -->
        <link href="/assets/css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="/assets/img/favicon.ico">
        <link rel="apple-touch-icon" href="/assets/img/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="/assets/img/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="/assets/img/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="/assets/img/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="/assets/img/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="/assets/img/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="/assets/img/apple-touch-icon-152x152.png" />
    </head>
    <body class="fixed-left">
	<?php

		$this->load->view("parents/common/modal");
	?>
	<!-- Begin page -->
	<div id="wrapper">

		<?php
			$this->load->view("parents/common/topbar.php");
			$this->load->view("parents/common/leftsidebar.php");
			$this->load->view("parents/common/rightsidebar.php");
		?>
		<!-- Start right content -->
        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">
				<!-- Start info box -->
				<div class="row top-summary">
					<div class="col-lg-3 col-md-6">
						<div class="widget green-1 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="icon-globe-inv"></i>
								</div>
								<div class="text-box">
									<p class="maindata">TOTAL WEBSITE <b>VISITORS</b></p>
									<h2><span class="animate-number" data-value="25153" data-duration="3000">0</span></h2>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="widget-footer">
								<div class="row">
									<div class="col-sm-12">
										<i class="fa fa-caret-up rel-change"></i> <b>39%</b> increase in traffic
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="widget darkblue-2 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="icon-bag"></i>
								</div>
								<div class="text-box">
									<p class="maindata">TOTAL <b>SALES</b></p>
									<h2><span class="animate-number" data-value="6399" data-duration="3000">0</span></h2>

									<div class="clearfix"></div>
								</div>
							</div>
							<div class="widget-footer">
								<div class="row">
									<div class="col-sm-12">
										<i class="fa fa-caret-down rel-change"></i> <b>11%</b> decrease in sales
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="widget pink-1 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="fa fa-dollar"></i>
								</div>
								<div class="text-box">
									<p class="maindata">OVERALL <b>INCOME</b></p>
									<h2>$<span class="animate-number" data-value="70389" data-duration="3000">0</span></h2>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="widget-footer">
								<div class="row">
									<div class="col-sm-12">
										<i class="fa fa-caret-down rel-change"></i> <b>7%</b> decrease in income
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="widget lightblue-1 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="fa fa-users"></i>
								</div>
								<div class="text-box">
									<p class="maindata">TOTAL <b>USERS</b></p>
									<h2><span class="animate-number" data-value="120" data-duration="3000">0</span></h2>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="widget-footer">
								<div class="row">
									<div class="col-sm-12">
										<i class="fa fa-caret-up rel-change"></i>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

				</div>
				<!-- End of info box -->

				
				<div class="row">
					
					<div class="col-lg-8 portlets">
						<div class="row">
							<div class="col-sm-12">
								<div class="widget">
									<div class="widget-header centered">
										<div class="left-btn"><a class="btn btn-sm btn-default add-todo"><i class="fa fa-plus"></i></a></div>
										<h2>Notes</h2>
										<div class="additional-btn">
											<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
											<a href="#" class="widget-popout hidden tt" title="Pop Out/In"><i class="icon-publish"></i></a>
											<a href="#" class="widget-maximize hidden"><i class="icon-resize-full-1"></i></a>
											<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
											<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
										</div>
									</div>
									<div class="widget-content padding-sm">
										<ul class="todo-list">
											<li>
												<span class="check-icon"><input type="checkbox" /></span>
												<span class="todo-item">Generate monthly sales report for John</span>
												<span class="todo-options pull-right">
													<a href="javascript:;" class="todo-delete"><i class="icon-cancel-3"></i></a>
												</span>
												<span class="todo-tags pull-right">
													<div class="label label-success">New</div>
												</span>
											</li>
											<li class="high">
												<span class="check-icon"><input type="checkbox" /></span>
												<span class="todo-item">Mail those reports to John</span>
												<span class="todo-options pull-right">
													<a href="javascript:;" class="todo-delete"><i class="icon-cancel-3"></i></a>
												</span>
											</li>
											<li>
												<span class="check-icon"><input type="checkbox" /></span>
												<span class="todo-item">Don't forget to send those reports to John</span>
												<span class="todo-options pull-right">
													<a href="javascript:;" class="todo-delete"><i class="icon-cancel-3"></i></a>
												</span>
											</li>
											<li class="medium">
												<span class="check-icon"><input type="checkbox" /></span>
												<span class="todo-item">Lunch with Steve on Thursday</span>
												<span class="todo-options pull-right">
													<a href="javascript:;" class="todo-delete"><i class="icon-cancel-3"></i></a>
												</span>
												<span class="todo-tags pull-right">
													<div class="label label-info">Today</div>
												</span>
											</li>
											<li class="low">
												<span class="check-icon"><input type="checkbox" /></span>
												<span class="todo-item">Deliver reports by hand to John</span>
												<span class="todo-options pull-right">
													<a href="javascript:;" class="todo-delete"><i class="icon-cancel-3"></i></a>
												</span>
											</li>
											<li>
												<span class="check-icon"><input type="checkbox" /></span>
												<span class="todo-item">Start on marketing campaign</span>
												<span class="todo-options pull-right">
													<a href="javascript:;" class="todo-delete"><i class="icon-cancel-3"></i></a>
												</span>
											</li>
											
											
										</ul>
									</div>
								</div>
							</div>
						</div>
						
					</div>
                    <div class="col-lg-4 col-md-6 portlets">
                        <div id="calc" class="widget darkblue-2">
                            <div class="widget-header">
                            <div class="additional-btn left-toolbar">
                                <div class="btn-group">
                                  <a class="additional-icon" id="dropdownMenu2" data-toggle="dropdown">
                                    Calculator <i class="fa fa-angle-down"></i>
                                  </a>
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
                                    <li><a href="#">Save</a></li>
                                    <li><a href="#">Export</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Quit</a></li>
                                  </ul>
                                </div>
                            </div>
                            <div class="additional-btn">
                                <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                                  
                                    <a href="#" class="widget-popout hidden tt" title="Pop Out/In"><i class="icon-publish"></i></a>
                                    <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                            </div>
                            </div>
                            <div id="calculator" class="widget-content">
                                <div class="calc-top col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-3"><span class="calc-clean">C</span></div>
                                        <div class="col-xs-9"><div class="calc-screen"></div></div>
                                    </div>
                                </div>
                                
                                <div class="calc-keys col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-3"><span>7</span></div>
                                        <div class="col-xs-3"><span>8</span></div>
                                        <div class="col-xs-3"><span>9</span></div>
                                        <div class="col-xs-3"><span class="calc-operator">+</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3"><span>4</span></div>
                                        <div class="col-xs-3"><span>5</span></div>
                                        <div class="col-xs-3"><span>6</span></div>
                                        <div class="col-xs-3"><span class="calc-operator">-</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3"><span>1</span></div>
                                        <div class="col-xs-3"><span>2</span></div>
                                        <div class="col-xs-3"><span>3</span></div>
                                        <div class="col-xs-3"><span class="calc-operator">÷</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3"><span>0</span></div>
                                        <div class="col-xs-3"><span>.</span></div>
                                        <div class="col-xs-3"><span class="calc-eval">=</span></div>
                                        <div class="col-xs-3"><span class="calc-operator">x</span></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="row">
                    <div id="website-statistics1" class="widget">
                            <div class="widget-header transparent">
                                <h2><i class="icon-chart-line"></i> <strong>Website</strong> Statistics</h2>
                                <div class="additional-btn">
                                    <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                                      <a class="hidden" id="dropdownMenu1" data-toggle="dropdown">
                                        <i class="fa fa-cogs"></i>
                                      </a>
                                      <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                      </ul>
                                     <a href="#" class="widget-popout hidden tt" title="Pop Out/In"><i class="icon-publish"></i></a>
                                    <a href="#" class="widget-maximize hidden"><i class="icon-resize-full-1"></i></a>
                                    <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                                    <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                                </div>
                            </div>
                            <div class="widget-content">
                                <div id="website-statistic" class="statistic-chart">    
                                    <div class="row stacked">
                                        <div class="col-sm-12">
                                            <div class="toolbar">
                                                <div class="pull-left">
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-default btn-xs">Daily</a>
                                                        <a href="#" class="btn btn-default btn-xs active">Monthly</a>
                                                        <a href="#" class="btn btn-default btn-xs">Yearly</a>
                                                    </div>
                                                </div>
                                                <div class="pull-right">
                                                    <div class="btn-group">
                                                      <a class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                                        Export <i class="icon-down-open-2"></i>
                                                      </a>
                                                      <ul class="dropdown-menu pull-right" role="menu">
                                                        <li><a href="#">Export as PDF</a></li>
                                                        <li><a href="#">Export as CSV</a></li>
                                                        <li><a href="#">Export as PNG</a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="#">Separated link</a></li>
                                                      </ul>
                                                    </div>
                                                    <a href="#" class="btn btn-primary btn-xs"><i class="icon-cog-2"></i></a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div id="morris-home" class="morris-chart" style="height: 270px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<div class="col-lg-4 col-md-6 portlets">
						<div id="weather-widget" class="widget">
							<div class="widget-header transparent">
								<h2><strong>Weather</strong> Widget</h2>
								<div class="additional-btn">
									<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
									  <a class="hidden" id="dropdownMenu1" data-toggle="dropdown">
										<i class="fa fa-cogs"></i>
									  </a>
									  <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
										<li><a href="#">Action</a></li>
										<li><a href="#">Another action</a></li>
										<li><a href="#">Something else here</a></li>
										<li class="divider"></li>
										<li><a href="#">Separated link</a></li>
									  </ul>
									 <a href="#" class="widget-popout hidden tt" title="Pop Out/In"><i class="icon-publish"></i></a>
									<a href="#" class="widget-maximize hidden"><i class="icon-resize-full-1"></i></a>
									<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
									<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
								</div>
							</div>
							<div id="weather" class="widget-content">

							</div><i class="wi-day-rain-mix"></i>
							<button class="js-geolocation btn btn-sm btn-default" style="display: none;">Use Your Location</button>
						</div>
					</div>
<div class="col-lg-4 col-md-6 portlets">
                        <div id="calendar-widget2" class="widget blue-1">
                            <div class="widget-header transparent">
                                <h2><strong>Calendar</strong> </h2>
                                <div class="additional-btn">
                                    <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                                    <a href="#" class="widget-popout hidden tt" title="Pop Out/In"><i class="icon-publish"></i></a>
                                    <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                                    <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                                </div>
                            </div>
                            <div id="calendar-box2" class="widget-content col-sm-12">

                            </div>
                        </div>
                    </div>
					
					
				</div>

				            <!-- Footer Start -->
           
            <!-- Footer End -->			
            </div>
			<!-- ============================================================== -->
			<!-- End content here -->
			<!-- ============================================================== -->

        </div>
		<!-- End right content -->

	</div>
	<div id="contextMenu" class="dropdown clearfix">
		    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display:block;position:static;margin-bottom:5px;">
		        <li><a tabindex="-1" href="javascript:;" data-priority="high"><i class="fa fa-circle-o text-red-1"></i> High Priority</a></li>
		        <li><a tabindex="-1" href="javascript:;" data-priority="medium"><i class="fa fa-circle-o text-orange-3"></i> Medium Priority</a></li>
		        <li><a tabindex="-1" href="javascript:;" data-priority="low"><i class="fa fa-circle-o text-yellow-1"></i> Low Priority</a></li>
		        <li><a tabindex="-1" href="javascript:;" data-priority="none"><i class="fa fa-circle-o text-lightblue-1"></i> None</a></li>
		    </ul>
		</div>
	<!-- End of page -->
		<!-- the overlay modal element -->
	<div class="md-overlay"></div>
	<!-- End of eoverlay modal -->
	<script>
		var resizefunc = [];
	</script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="/assets/libs/jquery/jquery-1.11.1.min.js"></script>
	<script src="/assets/libs/bootstrap/js/bootstrap.min.js"></script>
	<script src="/assets/libs/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="/assets/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js"></script>
	<script src="/assets/libs/jquery-detectmobile/detect.js"></script>
	<script src="/assets/libs/jquery-animate-numbers/jquery.animateNumbers.js"></script>
	<script src="/assets/libs/ios7-switch/ios7.switch.js"></script>
	<script src="/assets/libs/fastclick/fastclick.js"></script>
	<script src="/assets/libs/jquery-blockui/jquery.blockUI.js"></script>
	<script src="/assets/libs/bootstrap-bootbox/bootbox.min.js"></script>
	<script src="/assets/libs/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="/assets/libs/jquery-sparkline/jquery-sparkline.js"></script>
	<script src="/assets/libs/nifty-modal/js/classie.js"></script>
	<script src="/assets/libs/nifty-modal/js/modalEffects.js"></script>
	<script src="/assets/libs/sortable/sortable.min.js"></script>
	<script src="/assets/libs/bootstrap-fileinput/bootstrap.file-input.js"></script>
	<script src="/assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="/assets/libs/bootstrap-select2/select2.min.js"></script>
	<script src="/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="/assets/libs/pace/pace.min.js"></script>
	<script src="/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="/assets/libs/jquery-icheck/icheck.min.js"></script>

	<!-- Demo Specific JS Libraries -->
	<script src="/assets/libs/prettify/prettify.js"></script>

	<script src="/assets/js/init.js"></script>
	<!-- Page Specific JS Libraries -->
	<script src="/assets/libs/d3/d3.v3.js"></script>
	<script src="/assets/libs/rickshaw/rickshaw.min.js"></script>
	<script src="/assets/libs/raphael/raphael-min.js"></script>
	 <script src="/assets/libs/morrischart/morris.min.js"></script>
	<script src="/assets/libs/jquery-knob/jquery.knob.js"></script>
	<script src="/assets/libs/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="/assets/libs/jquery-jvectormap/js/jquery-jvectormap-us-aea-en.js"></script>
	<script src="/assets/libs/jquery-clock/clock.js"></script>
	<script src="/assets/libs/jquery-easypiechart/jquery.easypiechart.min.js"></script>
	<script src="/assets/libs/jquery-weather/jquery.simpleWeather-2.6.min.js"></script>
	<script src="/assets/libs/bootstrap-xeditable/js/bootstrap-editable.min.js"></script>
	<script src="/assets/libs/bootstrap-calendar/js/bic_calendar.min.js"></script>
	<script src="/assets/js/apps/calculator.js"></script>
	<script src="/assets/js/apps/todo.js"></script>
	<script src="/assets/js/pages/index.js"></script>
	</body>
</html>