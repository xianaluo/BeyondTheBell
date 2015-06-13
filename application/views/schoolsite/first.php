<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Users</title>   
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="description" content="">
        <meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
        <meta name="author" content="Huban Creative">

        <!-- Base Css Files -->
        <link href="<?= asset_base_url()?>/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
        <link href="<?= asset_base_url()?>/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?= asset_base_url()?>/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?= asset_base_url()?>/libs/fontello/css/fontello.css" rel="stylesheet" />
        <link href="<?= asset_base_url()?>/libs/animate-css/animate.min.css" rel="stylesheet" />
        <link href="<?= asset_base_url()?>/libs/nifty-modal/css/component.css" rel="stylesheet" />
        <link href="<?= asset_base_url()?>/libs/magnific-popup/magnific-popup.css" rel="stylesheet" />
        <link href="<?= asset_base_url()?>/libs/ios7-switch/ios7-switch.css" rel="stylesheet" />
        <link href="<?= asset_base_url()?>/libs/pace/pace.css" rel="stylesheet" />
        <link href="<?= asset_base_url()?>/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet" />
        <link href="<?= asset_base_url()?>/libs/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
        <link href="<?= asset_base_url()?>/libs/jquery-icheck/skins/all.css" rel="stylesheet" />
        <!-- Code Highlighter for Demo -->
        <link href="<?= asset_base_url()?>/libs/prettify/github.css" rel="stylesheet" />
        
                <!-- Extra CSS Libraries Start -->
                <link href="<?= asset_base_url()?>/css/style.css" rel="stylesheet" type="text/css" />
                <!-- Extra CSS Libraries End -->
        <link href="<?= asset_base_url()?>/css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="<?= asset_base_url()?>/img/favicon.ico">
        <link rel="apple-touch-icon" href="<?= asset_base_url()?>/img/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="<?= asset_base_url()?>/img/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="<?= asset_base_url()?>/img/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?= asset_base_url()?>/img/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="<?= asset_base_url()?>/img/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="<?= asset_base_url()?>/img/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="<?= asset_base_url()?>/img/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="<?= asset_base_url()?>/img/apple-touch-icon-152x152.png" />
    </head>
    <body class="fixed-left">
        <!-- Modal Start -->
        	<!-- Modal Task Progress -->	
	<div class="md-modal md-3d-flip-vertical" id="task-progress">
		<div class="md-content">
			<h3><strong>Task Progress</strong> Information</h3>
			<div>
				<p>CLEANING BUGS</p>
				<div class="progress progress-xs for-modal">
				  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
					<span class="sr-only">80&#37; Complete</span>
				  </div>
				</div>
				<p>POSTING SOME STUFF</p>
				<div class="progress progress-xs for-modal">
				  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
					<span class="sr-only">65&#37; Complete</span>
				  </div>
				</div>
				<p>BACKUP DATA FROM SERVER</p>
				<div class="progress progress-xs for-modal">
				  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
					<span class="sr-only">95&#37; Complete</span>
				  </div>
				</div>
				<p>RE-DESIGNING WEB APPLICATION</p>
				<div class="progress progress-xs for-modal">
				  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
					<span class="sr-only">100&#37; Complete</span>
				  </div>
				</div>
				<p class="text-center">
				<button class="btn btn-danger btn-sm md-close">Close</button>
				</p>
			</div>
		</div>
	</div>
		
	<!-- Modal Logout -->
	<div class="md-modal md-just-me" id="logout-modal">
		<div class="md-content">
			<h3><strong>Logout</strong> Confirmation</h3>
			<div>
				<p class="text-center">Are you sure want to logout from this awesome system?</p>
				<p class="text-center">
				<button class="btn btn-danger md-close">Nope!</button>
				<a href="/auth/logout" class="btn btn-success md-close">Yeah, I'm sure</a>
				</p>
			</div>
		</div>
	</div>        <!-- Modal End -->	
	<!-- Begin page -->
	<div id="wrapper">
		
<!-- Top Bar Start -->
<div class="topbar">
    <div class="topbar-left">
        <div class="logo">
            <h1><a href="#"><img src="/images/logo.png" alt="Logo"></a></h1>
        </div>
        <button class="button-menu-mobile open-left">
        <i class="fa fa-bars"></i>
        </button>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-collapse2">
                <ul class="nav navbar-nav hidden-xs">
                   
                </ul>
                <ul class="nav navbar-nav navbar-right top-navbar">
                    
                    <li class="dropdown iconify hide-phone"><a href="#" onclick="javascript:toggle_fullscreen()"><i class="icon-resize-full-2"></i></a></li>
                    <li class="dropdown topbar-profile">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="rounded-image topbar-profile-image"><img src="<?php echo gf_profile_picture();?>"></span> <?php echo gf_cu_fullName();?> <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">My Profile</a></li>
                            <li><a href="#">Change Password</a></li>
                            <li><a href="#">Account Setting</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="icon-help-2"></i> Help</a></li>
                            <li><a class="md-trigger" data-modal="logout-modal"><i class="icon-logout-1"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li class="right-opener">
                        <a href="javascript:;" class="open-right"><i class="fa fa-angle-double-left"></i><i class="fa fa-angle-double-right"></i></a>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- Top Bar End -->
		<!-- Left Sidebar Start -->
		<div class="left side-menu">
			<div class="sidebar-inner slimscrollleft">
				<!-- Search form -->
				<form role="search" class="navbar-form">
					<div class="form-group">
						<input type="text" placeholder="Search" class="form-control">
						<button type="submit" class="btn search-button"><i class="fa fa-search"></i></button>
					</div>
				</form>
				<div class="clearfix"></div>
				<!--- Profile -->
				<div class="profile-info">
					<div class="col-xs-4">
						<a href="/profile" class="rounded-image profile-image"><img src="<?php echo gf_profile_picture();?>"></a>
					</div>
					<div class="col-xs-8">
						<div class="profile-text">Welcome <b><?php echo gf_cu_firstName();?></b></div>
						<div class="profile-buttons">

							<a href="/auth/logout" title="Sign Out"><i class="fa fa-power-off text-red-1"></i></a>
						</div>
					</div>
				</div>
				<!--- Divider -->
				<div class="clearfix"></div>
				<hr class="divider" />
				<div class="clearfix"></div>
				<!--- Divider -->
				<div id="sidebar-menu">
					<ul>
						<li>
							<a href='/dashboard'><i class='icon-home-3'></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li>
							<a href='/user'><i class='fa fa-user'></i>
								<span>User Management</span>
							</a>
						</li>
						<li>
							<a href='/schoolsite' class='active'><i class='fa fa-sitemap'></i>
								<span>School Site Management</span>
							</a>
						</li>
						<li>
							<a href='/student'><i class='fa fa-group'></i>
								<span>Student Management</span>
							</a>
						</li>
						<li>
							<a href='/attendance'><i class='fa fa-calendar'></i>
								<span>Attendance</span>
							</a>
						</li>
					</ul><div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
				<div class="portlets">


					<div id="recent_tickets" class="widget transparent nomargin">
						<div class="widget-content">
							<ul class="list-unstyled">
								<li>
									<a href="javascript:;">Let's have a great day!</span></a>
								</li>

							</ul>
						</div>
					</div>
				</div>
				<div class="clearfix"></div><br><br><br>
			</div>

		</div>
        <!-- Left Sidebar End -->		    <!-- Right Sidebar Start -->
    <div class="right side-menu">
    	<ul class="nav nav-tabs nav-justified" id="right-tabs">
		  <li class="active"><a href="#feed" data-toggle="tab" title="Live Feed"><i class="icon-rss-2"></i></a></li>
		  <li><a href="#connect" data-toggle="tab" title="Chat"><i class="icon-chat"></i></a></li>
		  <li><a href="#settings" data-toggle="tab" title="Preferences"><i class="icon-wrench"></i></a></li>
		</ul>
		<div class="clearfix"></div>
		<div class="tab-content">
			<div class="tab-pane active" id="feed">
				<div class="tab-inner slimscroller">
					<div class="search-right">
					    <input type="text" class="form-control" placeholder="Search">
					</div>
					<div class="right-toolbar">
						<a href="javascript:;" class="pull-right">Settings <i class="icon-cog"></i></a>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
					<div class="panel-group" id="collapse">
					  <div class="panel panel-default">
					    <div class="panel-heading bg-orange-1">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#rnotifications">
					          <i class="icon-bell-2"></i> Notifications
					          <span class="label bg-darkblue-1 pull-right">4</span>
					        </a>
					      </h4>
					    </div>
					    <div id="rnotifications" class="panel-collapse collapse in">
					      <div class="panel-body">
					      	<ul class="list-unstyled" id="notification-list">
					      		<li><a href="javascript:;"><span class="icon-wrapper"><i class="icon-video"></i></span> 1 Video Uploaded <span class="muted">12 minutes ago</span></a></li>
					      		<li><a href="javascript:;"><span class="icon-wrapper"><i class="icon-users-1"></i></span> 3 Users signed up <span class="muted">16 minutes ago</span></a></li>
					      		<li><a href="javascript:;"><span class="icon-wrapper"><i class="icon-picture-1"></i></span> 1 Video Uploaded <span class="muted">12 minutes ago</span></a></li>
					      		<li><a href="javascript:;"><span class="icon-wrapper"><i class="icon-hourglass-1"></i></span> Deadline for 1 project <span class="muted">12 minutes ago</span></a></li>
					      	</ul>
					      	<a class="btn btn-block btn-sm btn-warning">See all notifications</a>
					      </div>
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading bg-green-3">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#remails">
					          <i class="icon-mail"></i> E-mails
					          <span class="label bg-darkblue-1 pull-right">3</span>
					        </a>
					      </h4>
					    </div>
					    <div id="remails" class="panel-collapse collapse in">
					      <div class="panel-body">
					      	<ul class="list-unstyled" id="inbox-list">
					      		<li><a href="javascript:;"><span class="sender"><i class="icon-star text-yellow-2"></i> Kim Wilde</span> <span class="datetime">6 mins ago</span>
					      			<span class="title">You keep me hangin on</span>
					      			<span class="content">Where are you? I am waiting for 3 hours in the restaurant. I ate 3 hamburgers.</span>
					      		</a></li>
					      		<li><a href="javascript:;"><span class="sender">Tyler Durden</span> <span class="datetime">13 hours ago</span>
					      			<span class="title">Buy some soap from market before</span>
					      			<span class="content">We are crowded here. We need some more soap at home. Buy some before you come home.</span>
					      		</a></li>
					      		<li><a href="javascript:;"><span class="sender">John Bonomo</span> <span class="datetime">Yesterday</span>
					      			<span class="title">Late delivery</span>
					      			<span class="content">Hello, I ordered 15 box of viagra for a friend of mine but he still hasn't receive them.</span>
					      		</a></li>
					      	</ul>
					      	<a class="btn btn-block btn-sm btn-primary">Go to inbox</a>
					      </div>
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading bg-blue-1">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#rupdates">
					          <i class="icon-signal-2"></i> Updates
					          <span class="label bg-darkblue-1 pull-right">5</span>
					        </a>
					      </h4>
					    </div>
					    <div id="rupdates" class="panel-collapse collapse in">
					      <div class="panel-body">
					      	<ul class="list-unstyled" id="updates-list">
					      		<li><a href="javascript:;"><span class="icon-wrapper bg-green-1"><i class="icon-comment-1"></i></span> <b>David Guetta</b> came online <abbr title="15 seconds ago">just now</abbr>.</a></li>
					      		<li><a href="javascript:;"><span class="icon-wrapper bg-red-1"><i class="icon-user-3"></i></span> <b>Katy Perry</b> updated her profile <abbr title="4 mins ago">4 mins ago</abbr>.</a></li>
					      		<li><a href="javascript:;"><span class="icon-wrapper bg-blue-1"><i class="icon-twitter-2"></i></span> <b>4 tweets posted</b> with cronjob <abbr title="22 mins ago">22 mins ago</abbr>.</a></li>
					      		<li><a href="javascript:;"><span class="icon-wrapper bg-orange-3"><i class="icon-water"></i></span> <b>Adele</b> set fire to the rain <abbr title="43 mins ago">43 mins ago</abbr>.</a></li>
					      		<li><a href="javascript:;"><span class="icon-wrapper bg-pink-2"><i class="icon-heart-broken"></i></span> <b>Taylor Swift</b> learned that you are trouble <abbr title="3 hours ago">3 days ago</abbr>.</a></li>
					      	</ul>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="connect">
				<div class="tab-inner slimscroller">
					<div class="search-right">
					    <input type="text" class="form-control" placeholder="Search">
					</div>	
					<div class="panel-group" id="collapse">
					  <div class="panel panel-default" id="chat-panel">
					    <div class="panel-heading bg-darkblue-2">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" href="#chat-coll">
					          <i class="icon-briefcase-1"></i> Colleagues
					          <span class="label bg-darkblue-1 pull-right">14</span>
					        </a>
					      </h4>
					    </div>
					    <div id="chat-coll" class="panel-collapse collapse in">
					      <div class="panel-body">
					      	<ul class="list-unstyled" id="chat-list">
					      		<li><a href="javascript:;" class="online"><span class="chat-user-avatar"><img src="images/users/chat/1.jpg"></span> <span class="chat-user-name">Dorothy Simons</span><span class="chat-user-msg">I wish I was a bird in the sky</span></a></li>
					      		<li><a href="javascript:;" class="online"><span class="chat-user-avatar"><img src="images/users/chat/2.jpg"></span> <span class="chat-user-name">John Malkovich</span><span class="chat-user-msg">You were the traitor</span></a></li>
					      		<li><a href="javascript:;" class="online"><span class="chat-user-avatar"><img src="images/users/chat/3.jpg"></span> <span class="chat-user-name">Jessica Simons</span><span class="chat-user-msg">Where is my mind</span></a></li>
					      		<li><a href="javascript:;" class="away"><span class="chat-user-avatar"><img src="images/users/chat/4.jpg"></span> <span class="chat-user-name">Jack Stallman</span><span class="chat-user-msg">Away since 13:32</span></a></li>
					      		<li><a href="javascript:;" class="offline"><span class="chat-user-avatar"><img src="images/users/chat/5.jpg"></span> <span class="chat-user-name">Neil Armstrong</span><span class="chat-user-msg" title="I am flying to the moon and back">I am flying to the moon and back</span></a></li>
					      		<li><a href="javascript:;" class="offline"><span class="chat-user-avatar"><img src="images/users/chat/6.jpg"></span> <span class="chat-user-name">Hollywood Studios</span><span class="chat-user-msg">Yes he definitely is!</span></a></li>
					      	</ul>
					      </div>
					    </div>
					  </div>
					  <div class="panel panel-default" id="chat-panel">
					    <div class="panel-heading bg-darkblue-2">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
					          <i class="icon-heart-3"></i> Friends
					          <span class="label bg-darkblue-1 pull-right">3</span>
					        </a>
					      </h4>
					    </div>
					    <div id="collapseTwo" class="panel-collapse collapse in">
					      <div class="panel-body">
					      	<ul class="list-unstyled" id="chat-list">
					      		<li><a href="javascript:;" class="online"><span class="chat-user-avatar"><img src="images/users/chat/1.jpg"></span> <span class="chat-user-name">Dorothy Simons</span><span class="chat-user-msg">I wish I was a bird in the sky</span></a></li>
					      		<li><a href="javascript:;" class="online"><span class="chat-user-avatar"><img src="images/users/chat/2.jpg"></span> <span class="chat-user-name">John Malkovich</span><span class="chat-user-msg">You were the traitor</span></a></li>
					      		<li><a href="javascript:;" class="online"><span class="chat-user-avatar"><img src="images/users/chat/3.jpg"></span> <span class="chat-user-name">Jessica Simons</span><span class="chat-user-msg" title="Eminem - The Monster ft. Rihanna"><i class="icon-play"></i> Eminem - The Monster ft. Rihanna</span></a></li>
					      		<li><a href="javascript:;" class="away"><span class="chat-user-avatar"><img src="images/users/chat/4.jpg"></span> <span class="chat-user-name">Jack Stallman</span><span class="chat-user-msg">Away since 13:32</span></a></li>
					      		<li><a href="javascript:;" class="offline"><span class="chat-user-avatar"><img src="images/users/chat/5.jpg"></span> <span class="chat-user-name">Neil Armstrong</span><span class="chat-user-msg" title="I am flying to the moon and back">I am flying to the moon and back</span></a></li>
					      		<li><a href="javascript:;" class="offline"><span class="chat-user-avatar"><img src="images/users/chat/6.jpg"></span> <span class="chat-user-name">Hollywood Studios</span><span class="chat-user-msg">Yes he definitely is!</span></a></li>
					      	</ul>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="settings">
				<div class="tab-inner slimscroller">
					<div class="col-sm-12">
						<h3>Preferences</h3>
						<div class="row">
							<div class="col-xs-8">
								Live data updates
							</div>
							<div class="col-xs-4">
								<input type="checkbox" class="ios-switch ios-switch-success ios-switch-sm" checked />
							</div>
						</div>
						<div class="row">
							<div class="col-xs-8">
								Live feeds
							</div>
							<div class="col-xs-4">
								<input type="checkbox" class="ios-switch ios-switch-success ios-switch-sm" checked />
							</div>
						</div>
						<div class="row">
							<div class="col-xs-8">
								Sync data to cloud
							</div>
							<div class="col-xs-4">
								<input type="checkbox" class="ios-switch ios-switch-success ios-switch-sm" checked />
							</div>
						</div>
						<div class="row">
							<div class="col-xs-8">
								Keep activity record
							</div>
							<div class="col-xs-4">
								<input type="checkbox" class="ios-switch ios-switch-danger ios-switch-sm" checked />
							</div>
						</div>
						<h4>Other Settings</h4>
						<div class="row">
							<div class="col-xs-12">
								<label class="checkboxw"><input type="checkbox" checked> Autosave settings</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<label class="checkboxw"><input type="checkbox"> Always online</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <!-- Right Sidebar End -->		
		<!-- Start right content -->
        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">
								<!-- Page Heading Start -->
				<div class="page-heading">
            		<h1><i class='fa fa-user'></i> School Site Management</h1>
            		<h3></h3>            	</div>
            	<!-- Page Heading End-->				<!-- Your awesome content goes here -->
				
				
				
				<div class="row">
					<div class="col-md-12">
						<div class="widget">
							<div class="widget-header transparent">
								<h2>Beyond the Bell Users</h2>
								<div class="additional-btn">
									<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
									<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
								</div>
							</div>
							<div class="widget-content">
								<div class="data-table-toolbar">
									<div class="row">
										<div class="col-md-4">
											<form role="form">
											<input type="text" class="form-control" placeholder="Search...">
											</form>
										</div>
										<div class="col-md-8">
											<div class="toolbar-btn-action">
												<a class="btn btn-success" href="/user/gotoAddUser"><i class="fa fa-plus-circle"></i> Add new</a>
											</div>
										</div>
									</div>
								</div>


								<div class="table-responsive">
									<table data-sortable class="table table-hover table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Full Name</th>
												<th>Location</th>
												<th>Email</th>
                                                <th>Status</th>
												<th>Type</th>
											
												<th data-sortable="false">Option</th>
											</tr>
										</thead>

										<tbody>


										<?php

											$num = 0;

											foreach($userlist as $user) {

												$num++;

												echo '
												<tr>
													<td>'.$num.'</td>
													<td><strong>'.$user->firstName.($user->lastName == '' ? ' ' : ' '.$user->middleInitial).' '.$user->lastName.'</strong></td>
													<td>'.$user->city.', '.$user->state.'</td>
													<td><a href="mailto:#">'.$user->emailAddress.'</a></td>
													<td><span class="label label-success">'.$user->userStatus.'</span></td>
													<td><span class="label label-success">'.$user->userType.'</span></td>
													<td>
														<div class="btn-group btn-group-xs">

															<a data-toggle="tooltip" title="Edit" class="btn btn-default" href="/user/gotoEditUser?user_id='.$user->user_id.'"><i class="fa fa-edit"></i></a>
														</div>
													</td>
												</tr>
												';
											}

										?>
											
											
										</tbody>
									</table>
								</div>
									
								<div class="data-table-toolbar">
									<ul class="pagination">
									  <li class="disabled"><a href="#">&laquo;</a></li>
									  <li class="active"><a href="#">1</a></li>
									  
									  <li><a href="#">&raquo;</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
						
				</div>

				            <!-- Footer Start -->
            <footer>
                Huban Creative &copy; 2014
                <div class="footer-links pull-right">
                	<a href="#">About</a><a href="#">Support</a><a href="#">Terms of Service</a><a href="#">Legal</a><a href="#">Help</a><a href="#">Contact Us</a>
                </div>
            </footer>
            <!-- Footer End -->			
            </div>
			<!-- ============================================================== -->
			<!-- End content here -->
			<!-- ============================================================== -->

        </div>
		<!-- End right content -->

	</div>
	<!-- End of page -->
		<!-- the overlay modal element -->
	<div class="md-overlay"></div>
	<!-- End of eoverlay modal -->
	<script>
		var resizefunc = [];
	</script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?= asset_base_url()?>/libs/jquery/jquery-1.11.1.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-detectmobile/detect.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-animate-numbers/jquery.animateNumbers.js"></script>
	<script src="<?= asset_base_url()?>/libs/ios7-switch/ios7.switch.js"></script>
	<script src="<?= asset_base_url()?>/libs/fastclick/fastclick.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-blockui/jquery.blockUI.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-bootbox/bootbox.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-sparkline/jquery-sparkline.js"></script>
	<script src="<?= asset_base_url()?>/libs/nifty-modal/js/classie.js"></script>
	<script src="<?= asset_base_url()?>/libs/nifty-modal/js/modalEffects.js"></script>
	<script src="<?= asset_base_url()?>/libs/sortable/sortable.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-fileinput/bootstrap.file-input.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-select2/select2.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/pace/pace.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-icheck/icheck.min.js"></script>

	<!-- Demo Specific JS Libraries -->
	<script src="<?= asset_base_url()?>/libs/prettify/prettify.js"></script>

	<script src="<?= asset_base_url()?>/js/init.js"></script>
	</body>
</html>