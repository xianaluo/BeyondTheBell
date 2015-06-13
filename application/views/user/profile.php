<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>   
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
		<link href="<?= asset_base_url()?>/libs/bootstrap-validator/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css">
		<link href="<?= asset_base_url()?>/libs/jquery-notifyjs/styles/metro/notify-metro.css" rel="stylesheet" type="text/css" />
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
	<?php

		$this->load->view("common/modal");
	?>
	<!-- Begin page -->
	<div id="wrapper">

		<?php
			$this->load->view("common/topbar.php");
			$this->load->view("common/leftsidebar.php");
			$this->load->view("common/rightsidebar.php");
		?>

		<!-- Start right content -->
        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
			<div class="profile-banner" style="background-image: url(/images/stock/1epgUO0.jpg);">
				<div class="col-sm-3 avatar-container">
					<img src="<?php echo gf_profile_picture(); ?>" class="img-circle profile-avatar" alt="User avatar">
				</div>
			</div>
            <div class="content">

				<div class="row">
					<div class="col-sm-3">
						<!-- Begin user profile -->
						<div class="text-center user-profile-2">
							<?php
								$fullName = $userinfo->firstName.' '.$userinfo->middleInitial.' '.$userinfo->lastName;
							?>
							<h4><b><?php echo $fullName;?></b>'s Profile</h4>
							
							<h5><?php echo $userinfo->userType; ?></h5>
							
								
								<!-- User button -->
							
						</div><!-- End div .box-info -->
						<!-- Begin user profile -->
					</div><!-- End div .col-sm-4 -->
					
					<div class="col-sm-9">
						<div class="widget widget-tabbed">
							<!-- Nav tab -->
							<ul class="nav nav-tabs nav-justified">
								<li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-user"></i> Your Profile</a></li>
							</ul>
							<!-- End nav tab -->


							<!-- Tab panes -->
							<div class="tab-content">


								<!-- Tab about -->
								<div class="tab-pane animated active fadeInRight" id="about">

									<form role="form" action="/user/editProfile" method="post" enctype="multipart/form-data" id="registerForm" name="registerForm">

									<div class="user-profile-content">
										<h5><b><?php echo $fullName; ?></b>'s ACCOUNT</h5>
										<?php
											if($error) {
												echo '<div class="alert alert-danger nomargin">'.$error.'</div>';
											}

											if(validation_errors()) {
												echo '<div class="alert alert-danger nomargin">'.validation_errors().'</div>';
											}

											if($error || validation_errors()) {

												$firstName = set_value("FirstName");
												$middleInitial = set_value("MiddleInitial");
												$lastName = set_value("LastName");
												$emailAddress = $userinfo->emailAddress;
												$phoneNumber = set_value("PhoneNumber");
												$address1 = set_value("Address1");
												$address2 = set_value("Address2");
												$city = set_value("City");
												$state = set_value("State");
												$zipCode = set_value("ZipCode");

											} else {
												$firstName = $userinfo->firstName;
												$middleInitial = $userinfo->middleInitial;
												$lastName = $userinfo->lastName;
												$emailAddress = $userinfo->emailAddress;
												$phoneNumber = $userinfo->phoneNumber;
												$address1 = $userinfo->address1;
												$address2 = $userinfo->address2;
												$city = $userinfo->city;
												$state = $userinfo->state;
												$zipCode = $userinfo->zipCode;
											}

										?>
										<hr />
										<div class="row">
											<div class="col-sm-6">
												  <div class="form-group">
                                                    <label for="exampleInputEmail1">First Name</label>
                                                    <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="" value="<?php echo $firstName; ?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="exampleInputEmail1">Middle Initial</label>
                                                    <input type="text" class="form-control" id="MiddleInitial" name="MiddleInitial" placeholder="" value="<?php echo $middleInitial; ?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="exampleInputEmail1">Last Name</label>
                                                    <input type="text" class="form-control" id="LastName" name="LastName" placeholder="" value="<?php echo $lastName; ?>">
                                                  </div>
												  <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" id="EmailAddress" name="EmailAddress" placeholder="Enter email" value="<?php echo $emailAddress; ?>" disabled>
                                                  </div>

												  <div class="form-group">
													<label for="exampleInputEmail1">Profile picture</label>
													<br>
													<input type="file" class="btn btn-default" title="Select profile picture" id="ProfilePicture" name="ProfilePicture">
												  </div>
											</div>
											<div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Phone Number</label>
                                                    <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="" value="<?php echo $phoneNumber; ?>">
                                                  </div>
                                                 <div class="form-group">
                                                    <label for="exampleInputEmail1">Address 1</label>
                                                    <input type="text" class="form-control" id="Address1" name="Address1" placeholder="" value="<?php echo $address1; ?>">
                                                  </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Address 2</label>
                                                    <input type="text" class="form-control" id="Address2" name="Address2" placeholder="" value="<?php echo $address2; ?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="exampleInputEmail1">City</label>
                                                    <input type="text" class="form-control" id="City" name="City" placeholder="" value="<?php echo $city; ?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="exampleInputEmail1">State</label>

													<select class="form-control" id="State" name="State">
														<?php
															foreach($arr_state as $state_one) {
																if($state == $state_one->cate_id)
																	echo '<option value="'.$state_one->cate_id.'" selected>'.$state_one->cate_name.'</option>';
																else
																	echo '<option value="'.$state_one->cate_id.'">'.$state_one->cate_name.'</option>';
															}
														?>
													</select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="exampleInputEmail1">Zip Code</label>
                                                    <input type="text" class="form-control" id="ZipCode" name="ZipCode" placeholder="" value="<?php echo $zipCode?>">
                                                  </div>
									
											</div>
										</div><!-- End div .row -->


                                        <div class="row">
                                            <div class="col-sm-6">

                                    			<button type="submit" class="btn btn-default">Save</button>
   
                                            </div>
                                            <div class="col-sm-6">
                                                
                                    
                                            </div>
                                        </div><!-- End div .row -->
									</div><!-- End div .user-profile-content -->

									</form>
									<!-- End Tab about -->
								</div><!-- End div .tab-pane -->

								<!-- End Tab user messages -->
							</div><!-- End div .tab-content -->
						</div><!-- End div .box-info -->
					</div>
				</div>


				<?php
					$this->load->view("common/footer.php");
				?>
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
	<!-- Page Specific JS Libraries -->
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-gmap3/gmap3.min.js"></script>
	<script src="<?= asset_base_url()?>/js/pages/google-maps.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-validator/js/bootstrapValidator.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-notifyjs/notify.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-notifyjs/styles/metro/notify-metro.js"></script>
	<script>

		function notify(style,position, title, msg) {

			if(style == "error"){
				icon = "fa fa-exclamation";
			}else if(style == "warning"){
				icon = "fa fa-warning";
			}else if(style == "success"){
				icon = "fa fa-check";
			}else if(style == "info"){
				icon = "fa fa-question";
			}else{
				icon = "fa fa-circle-o";
			}


			$.notify(
				{
					title: title,
					text: msg,
					image: "<i class='"+icon+"'></i>"
				},
				{
					style: 'metro',
					className: style,
					globalPosition:position,
					showAnimation: "show",
					showDuration: 0,
					hideDuration: 0,
					autoHide: false,
					clickToHide: true
				}
			);

		}


		$(document).ready(function() {

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
								regexp: /^[a-zA-Z0-9_\. ]+$/,
								message: 'First Name can only consist of alphabetical, number, space, dot and underscore'
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
								regexp: /^[a-zA-Z0-9_\. ]+$/,
								message: 'First Name can only consist of alphabetical, number, space, dot and underscore'
							}
						}
					},
					EmailAddress: {
						validators: {
							notEmpty: {
								message: 'The email address is required and can\'t be empty'
							},
							emailAddress: {
								message: 'The input is not a valid email address'
							}
						}
					},
					PhoneNumber: {
						message: 'Phone Number is not valid',
						validators: {
							notEmpty: {
								message: 'Phone Number is required and can\'t be empty'
							},
							digits: {
								message: 'The value can contain only digits'
							}
						}
					},
					Address1: {
						message: 'Address1 is not valid',
						validators: {
							notEmpty: {
								message: 'Address1 is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[a-zA-Z0-9_\. ]+$/,
								message: 'Address1 can only consist of alphabetical, number, space, dot and underscore'
							}
						}
					},
					City: {
						message: 'City is not valid',
						validators: {
							notEmpty: {
								message: 'City is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[a-zA-Z0-9_\. ]+$/,
								message: 'City can only consist of alphabetical, number, space, dot and underscore'
							}
						}
					},
					ZipCode: {
						message: 'Zip Code is not valid',
						validators: {
							notEmpty: {
								message: 'Zip Code is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[a-zA-Z0-9_\. ]+$/,
								message: 'Zip Code can only consist of alphabetical, number, space, dot and underscore'
							}
						}
					}
				}
			});

		});

	</script>
	</body>
</html>