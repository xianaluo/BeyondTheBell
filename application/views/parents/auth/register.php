<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BTB Register For Parents</title>
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
		<link href="<?= asset_base_url()?>/libs/bootstrap-validator/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css">
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
    <body class="fixed-left signup-page">
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
				<a href="login.html" class="btn btn-success md-close">Yeah, I'm sure</a>
				</p>
			</div>
		</div>
	</div>        <!-- Modal End -->		
	<!-- Begin page -->
	<div class="container">
		<div class="full-content-center animated fadeInDownBig">
			<p class="text-center"><a href="#"><img src="<?= asset_base_url()?>/img/login-logo.png" alt="Logo"></a></p>
			<div class="login-wrap">
				<div class="login-block">
					<form role="form form-horizontal" method="post" action="/parents/auth/register" id="registerForm" name="registerForm">
						<?php
						if($error) {
							echo '<div class="alert alert-danger">'.$error.'</div>';
						}

						if(validation_errors()) {
							echo '<div class="alert alert-danger">'.validation_errors().'</div>';
						}
						?>
						<div class="row">
							<label class="col-sm-4">First Name</label>
							<div class="form-group col-sm-8">
								<input type="text" class="form-control text-input" id="FirstName" name="FirstName" value="<?php echo set_value("FirstName"); ?>">
							</div>
						</div>
						<div class="row">
							<label class="col-sm-4">Middle Initial</label>
							<div class="form-group col-sm-8">
								<input type="text" class="form-control text-input" id="MiddleInitial" name="MiddleInitial" value="<?php echo set_value("MiddleInitial"); ?>">
							</div>
						</div>
						<div class="row">
							<label class="col-sm-4">Last Name</label>
							<div class="form-group col-sm-8">
								<input type="text" class="form-control text-input" id="LastName" name="LastName" value="<?php echo set_value("LastName"); ?>">
							</div>
						</div>
						<div class="row">
							<label class="col-sm-4">Email Address</label>
							<div class="form-group col-sm-8">
								<input type="text" class="form-control text-input" id="EmailAddress" name="EmailAddress" value="<?php echo set_value("EmailAddress"); ?>">
							</div>
						</div>
						<div class="row">
							<label class="col-sm-4">Password</label>
							<div class="form-group col-sm-8">
								<input type="password" class="form-control text-input" placeholder="********" id="Password" name="Password" value="<?php echo set_value("Password"); ?>">
							</div>
						</div>
						<div class="row">
							<label class="col-sm-4">Confirm Password</label>
							<div class="form-group col-sm-8">
								<input type="password" class="form-control text-input" placeholder="********" id="Confirm" name="Confirm" value="<?php echo set_value("Confirm"); ?>">
							</div>
						</div>
						<div class="row">
							<label class="col-sm-4">Captcha Image</label>
							<div class="form-group col-sm-6" id="CaptchaDiv" name="CaptchaDiv">
								<?php echo $cap['image'];?>
							</div>
							<div class="form-group col-sm-2">
								<a href="#" id="RefreshCapBtn" name="RefreshCapBtn"><i class='fa fa-refresh'></i>
									<span>refresh</span>
								</a>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-4">Confirm Captcha</label>
							<div class="form-group col-sm-8">
								<input type="text" class="form-control text-input" id="CaptchaWord" name="CaptchaWord" value="<?php echo set_value("CaptchaWord"); ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
							<button type="submit" class="btn btn-default btn-block">Register</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
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
	<script src="<?= asset_base_url()?>/libs/bootstrap-validator/js/bootstrapValidator.min.js"></script>
	<script src="<?= asset_base_url()?>/js/init.js"></script>

	<script>

		$(document).ready(function() {

			$('#RefreshCapBtn').click(function () {

				var send_url = "/parents/auth/refreshCaptcha";

				$.getJSON(send_url, function (data) {

					document.getElementById("CaptchaDiv").innerHTML = data['image'];

				});

			});

			$('#registerForm').bootstrapValidator({
				message: 'This value is not valid',
				fields: {
					FirstName: {
						message: 'First Name is not valid',
						validators: {
							notEmpty: {
								message: 'First Name is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[a-zA-Z]+$/,
								message: 'First Name can only consist of alphabetical'
							}
						}
					},
					LastName: {
						message: 'Last Name is not valid',
						validators: {
							notEmpty: {
								message: 'Last Name is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[a-zA-Z]+$/,
								message: 'First Name can only consist of alphabetical'
							}
						}
					},
					EmailAddress: {
						validators: {
							notEmpty: {
								message: 'Email Address is required and can\'t be empty'
							},
							emailAddress: {
								message: 'The input is not a valid email address'
							}
						}
					},
					Password: {
						message: 'Password is not valid',
						validators: {
							notEmpty: {
								message: 'Password is required and can\'t be empty'
							}
						}
					},
					Confirm: {
						message: 'Confirm Password is not valid',
						validators: {
							notEmpty: {
								message: 'Confirm Password is required and can\'t be empty'
							}
						}
					},
					CaptchaWord: {
						message: 'Captcha Word is not valid',
						validators: {
							notEmpty: {
								message: 'Captcha Word is required and can\'t be empty'
							}
						}
					}

				}
			});
		});

	</script>
	</body>
</html>