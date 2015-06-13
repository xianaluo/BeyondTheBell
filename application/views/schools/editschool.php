<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>School Management</title>
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
		<link href="<?= asset_base_url()?>/libs/bootstrap-multiselect/css/bootstrap-select.css" rel="stylesheet" type="text/css">
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

				</div>
				<div class="content">

					<div class="row">

						<div class="col-sm-12">
							<div class="widget widget-tabbed">
								<!-- Nav tab -->
								<ul class="nav nav-tabs nav-justified">
									<li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-sitemap"></i> EDIT SCHOOL</a></li>
								</ul>
								<!-- End nav tab -->

								<!-- Tab panes -->
								<div class="tab-content">
									<form role="form" action="/schools/editSchool" method="post" id="registerForm" enctype="multipart/form-data">

									<!-- Tab about -->

									<div class="tab-pane animated active fadeInRight" id="about">
										<div class="user-profile-content">
											<?php
											if($error) {
												echo '<div class="alert alert-danger nomargin">'.$error.'</div>';
											}

											if(validation_errors()) {
												echo '<div class="alert alert-danger nomargin">'.validation_errors().'</div>';
											}
											?>

											<hr />
											<div class="row">
												<div class="col-sm-6">
													<h5><strong>Details </strong></h5>
													<div class="form-group">
														<label for="exampleInputEmail1">School Name</label>
														<input type="text" class="form-control" id="SchoolName" name="SchoolName" placeholder="" value="<?php echo $selected->schoolName; ?>">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">School Type</label>
														<select class="form-control" id="SchoolType" name="SchoolType">
															<?php
															foreach($schooltype_list as $schooltype) {
																if($selected->schoolType == $schooltype->cate_name) {
																	echo '<option value="' . $schooltype->cate_name . '" selected>' . $schooltype->cate_name . '</option>';
																} else {
																	echo '<option value="' . $schooltype->cate_name . '">' . $schooltype->cate_name . '</option>';
																}
															}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Parent School</label>
														<select class="form-control" id="ParentSchool" name="ParentSchool">
															<option value="0"></option>
															<?php
															foreach($list as $school) {
																if($selected->parentSchool == $school->school_id) {
																	echo '<option value="' . $school->school_id . '" selected>' . $school->schoolName . '</option>';
																} else {
																	echo '<option value="' . $school->school_id . '">' . $school->schoolName . '</option>';
																}
															}
															?>
														</select>
													</div>

													<div class="form-group">
														<label for="exampleInputEmail1">Principal</label>
														<input type="text" class="form-control" id="Principal" name="Principal" placeholder="" value="<?php echo $selected->principal; ?>">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Building Coordinator</label>
														<input type="text" class="form-control" id="BuildingCoordinator" name="BuildingCoordinator" placeholder="" value="<?php echo $selected->buildingCoordinator; ?>">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">School Code</label>
														<input type="text" class="form-control" id="SchoolCode" name="SchoolCode" placeholder="" value="<?php echo $selected->schoolCode; ?>">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">School Enrollment</label>
														<input type="text" class="form-control" id="SchoolEnrollment" name="SchoolEnrollment" placeholder="" value="<?php echo $selected->schoolEnrollment; ?>">
													</div>
													<?php
														if(gf_cu_rightsSchoolDelete()) {
															echo '<button type="submit" class="btn btn-primary">Save</button>';
														}
													?>

												</div>
												<div class="col-sm-6">
													<h5><strong>Contact Information </strong></h5>
													<div class="form-group">
														<label for="exampleInputEmail1">Phone Number</label>
														<input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="" value="<?php echo $selected->phoneNumber; ?>">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Fax Number</label>
														<input type="text" class="form-control" id="FaxNumber" name="FaxNumber" placeholder="" value="<?php echo $selected->faxNumber; ?>">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Address 1</label>
														<input type="text" class="form-control" id="Address1" name="Address1" placeholder="" value="<?php echo $selected->address1; ?>">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Address 2</label>
														<input type="text" class="form-control" id="Address2" name="Address2" placeholder="" value="<?php echo $selected->address2; ?>">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">City</label>
														<input type="text" class="form-control" id="City" name="City" placeholder="" value="<?php echo $selected->city; ?>">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">State</label>
														<select class="form-control" id="State" name="State">
															<?php
															foreach($state_list as $state) {

																if($selected->state == $state->cate_id) {

																	echo '<option value="' . $state->cate_id . '" selected>' . $state->cate_name . '</option>';
																} else {
																	echo '<option value="' . $state->cate_id . '">' . $state->cate_name . '</option>';
																}
															}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Zip Code</label>
														<input type="text" class="form-control" id="ZipCode" name="ZipCode" placeholder="" value="<?php echo $selected->zipCode; ?>">
													</div>

													<div class="form-group">
														<label for="exampleInputEmail1">Attaching Activities</label>
														<select class="selectpicker" multiple data-selected-text-format="count>3" id="AttachingActivities[]" name="AttachingActivities[]" >
															<?php
															foreach($activity_list as $activity) {

																if( $selected->attachingActivities[$activity->activity_id] ) {
																	echo '<option value="' . $activity->activity_id . '" selected>' . $activity->sessionName . '</option>';
																} else {
																	echo '<option value="' . $activity->activity_id . '">' . $activity->sessionName . '</option>';
																}
															}
															?>
														</select>
													</div>

												</div>
											</div><!-- End div .row -->


										</div><!-- End div .user-profile-content -->
									</div><!-- End div .tab-pane -->
									<!-- End Tab about -->

										<input type="hidden" id="school_id" name="school_id" value="<?php echo $selected->school_id?>">
									</form>


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
	<script src="<?= asset_base_url()?>/libs/bootstrap-multiselect/js/bootstrap-select.js"></script>

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
					SchoolName: {
						message: 'School Name is not valid',
						validators: {
							notEmpty: {
								message: 'School Name is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[a-zA-Z0-9_\. ]+$/,
								message: 'School Name can only consist of alphabetical, number, space, dot and underscore'
							}
						}
					},
					Principal: {
						message: 'Principal is not valid',
						validators: {
							notEmpty: {
								message: 'Principal is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[a-zA-Z0-9_\. ]+$/,
								message: 'Principal can only consist of alphabetical, number, space, dot and underscore'
							}
						}
					},
					BuildingCoordinator: {
						message: 'BuildingCoordinator is not valid',
						validators: {
							notEmpty: {
								message: 'BuildingCoordinator is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[a-zA-Z0-9_\. ]+$/,
								message: 'Building Coordinator can only consist of alphabetical, number, space, dot and underscore'
							}
						}
					},
					SchoolCode: {
						message: 'School Code is not valid',
						validators: {
							notEmpty: {
								message: 'School Code is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[a-zA-Z0-9_\. ]+$/,
								message: 'School Code can only consist of alphabetical, number, space, dot and underscore'
							}
						}
					},

					SchoolEnrollment: {
						message: 'School Enrollment is not valid',
						validators: {
							notEmpty: {
								message: 'School Enrollment is required and can\'t be empty'
							},
							digits: {
								message: 'School Enrollment can contain only digits'
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
								message: 'Phone Number can contain only digits'
							}
						}
					},
					FaxNumber: {
						message: 'Fax Number is not valid',
						validators: {
							notEmpty: {
								message: 'Fax Number is required and can\'t be empty'
							},
							digits: {
								message: 'Fax Number can contain only digits'
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