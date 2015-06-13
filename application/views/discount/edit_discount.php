<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <title>Discount Management</title>
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
		<link href="<?= asset_base_url()?>/libs/bootstrap-multiselect2/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
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
			<div class="content">
				<!-- Page Heading Start -->
				<div class="page-heading">
					<h1><i class='fa fa-laptop'></i> Edit Discount</h1>
				</div>
				<?php

				if($error) {
					echo '<div class="alert alert-danger nomargin">'.$error.'</div>';
				}

				if(validation_errors()) {
					echo '<div class="alert alert-danger nomargin">'.validation_errors().'</div>';
				}


				if($error || validation_errors()) {

					$DiscountName = set_value("DiscountName");
					$DiscountCode = $selected->code;

					if(set_value("NoLimit")) {
						$DiscountLimit = "";
						$DiscountLimit_disabled = ' disabled="true"';
						$NoLimit_checked = ' checked="true"';

					} else {
						$DiscountLimit = set_value("DiscountLimit");
						$DiscountLimit_disabled = '';
						$NoLimit_checked = '';
					}

					$DiscountDesc = set_value("DiscountDesc");
					$AmountPercent = set_value("AmountPercent");
					$TakeOff = set_value("TakeOff");

					if($AmountPercent == "Amount")
						$TakeOffLabel = "$";
					else if($AmountPercent == "Percent")
						$TakeOffLabel = "%";

					$OffFor = set_value("OffFor");

					$ForSpecificUsers = set_value("ForSpecificUsers");
					$ForSpecificTiers = set_value("ForSpecificTiers");
					$ForMultipleChild = set_value("ForMultipleChild");
					$ForSpecificActivities = set_value("ForSpecificActivities");

					$StartDate = set_value("StartDate");

					if(set_value("NeverExpires")) {
						$ExpireDate = "";
						$ExpireDate_disabled = 'disabled="true"';
						$NeverExpires_checked = ' checked="true"';
					} else {
						$ExpireDate = set_value("ExpireDate");
						$ExpireDate_disabled = '';
						$NeverExpires_checked = '';
					}

					$Status = set_value("Status");


				} else {

					$DiscountName = $selected->name;
					$DiscountCode = $selected->code;

					if($selected->noLimit) {
						$DiscountLimit = "";
						$DiscountLimit_disabled = ' disabled="true"';
						$NoLimit_checked = ' checked="true"';

					} else {
						$DiscountLimit = $selected->limit;
						$DiscountLimit_disabled = '';
						$NoLimit_checked = '';
					}

					$DiscountDesc = $selected->desc;
					$AmountPercent = $selected->type;
					$TakeOff = $selected->amount;

					if($AmountPercent == "Amount")
						$TakeOffLabel = "$";
					else if($AmountPercent == "Percent")
						$TakeOffLabel = "%";

					$OffFor = $selected->offFor;

					$ForSpecificUsers = $selected->forSpecificUsers;
					$ForSpecificTiers = $selected->forSpecificTiers;
					$ForMultipleChild = $selected->forMultipleChild;
					$ForSpecificActivities = $selected->forSpecificActivities;

					$StartDate = date_format($selected->startDate, "m/d/Y");

					if($selected->neverExpires) {
						$ExpireDate = "";
						$ExpireDate_disabled = 'disabled="true"';
						$NeverExpires_checked = ' checked="true"';
					} else {
						$ExpireDate = date_format($selected->expireDate, "m/d/Y");
						$ExpireDate_disabled = '';
						$NeverExpires_checked = '';
					}

					$Status = $selected->status;
				}


				?>
				<!-- Page Heading End-->
				<div class="row">
					<div class="col-md-12 portlets">
						<!-- Your awesome content goes here -->
						<div class="widget animated fadeInDown">

							<form id="myWizard" name="myWizard" method="post" action="/discount/update">
								<section class="step" data-step-title="Discount details">
									<div class="row">
										<div class="col-sm-6">
											<div class="notes">
												<h3>Create your discount code, and specify the usage limit.</h3>

											</div>
										</div>
										<div class="col-sm-6">
											<div class="row">
												<div class="form-group col-sm-10">
													<label >Discount Name</label>
													<input type="text" id="DiscountName" name="DiscountName" class="form-control" value = "<?php echo $DiscountName; ?>">
												</div>
											</div>
											<div class="row">
												<div class="form-group col-sm-10">
													<label >Discount Code</label>
													<input type="text" id="DiscountCode" name="DiscountCode" class="form-control" value = "<?php echo $DiscountCode; ?>" disabled>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-sm-10">
													<label >How many times can this discount be used?</label>
													<input type="text" id="DiscountLimit" name="DiscountLimit" class="form-control"  <?php echo $DiscountLimit_disabled; ?> value = "<?php echo $DiscountLimit; ?>">
												</div>
											</div>
											<div class="row">
												<div class="form-group col-sm-10">
													<label >
														<input type="checkbox" id="NoLimit" name="NoLimit" class="form-control" <?php echo $NoLimit_checked; ?>>
														No Limit
													</label>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-sm-10">
													<label >Discount description</label>
													<input type="text" id="DiscountDesc" name="DiscountDesc" class="form-control"  value = "<?php echo $DiscountDesc; ?>">
												</div>
											</div>
										</div>

									</div>
								</section>
								<section class="step" data-step-title="Discount type">
									<div class="row">
										<div class="col-sm-6">
											<div class="notes">
												<h3>Select the type of discount, and set any extra conditions.</h3>

											</div>
										</div>
										<div class="col-sm-6">
											<div class="row">
												<div class="form-group col-sm-10">
													<label >Amount Off / Percent Off</label>
													<select class="form-control" name="AmountPercent" id="AmountPercent">
														<option value="Amount" <?php if($AmountPercent=="Amount") echo "selected"; ?>>$USD</option>
														<option value="Percent" <?php if($AmountPercent=="Percent") echo "selected"; ?>>%Discount</option>
													</select>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-sm-10">
													<label id="TakeOffLabel" name="TakeOffLabel">Take(<?php echo $TakeOffLabel; ?>)</label>
													<input type="text" id="TakeOff" name="TakeOff" class="form-control" value="<?php echo $TakeOff; ?>">
												</div>
											</div>
											<div class="row">
												<div class="form-group col-sm-10">
													<label >Off for</label>
													<select class="form-control" id="OffFor" name="OffFor">
														<option value="ForAllUsers" <?php if($OffFor=="ForAllUsers") echo "selected"; ?>>All users</option>
														<option value="ForSpecificUsers" <?php if($OffFor=="ForSpecificUsers") echo "selected"; ?>>For specific users</option>
														<option value="ForSpecificTiers" <?php if($OffFor=="ForSpecificTiers") echo "selected"; ?>>For specific tiers</option>
														<option value="ForMultipleChild" <?php if($OffFor=="ForMultipleChild") echo "selected"; ?>>For multiple children</option>
														<option value="ForSpecificActivities" <?php if($OffFor=="ForSpecificActivities") echo "selected"; ?>>For specific activities</option>
													</select>
												</div>
											</div>
											<div class="row" id="ForSpecificUsersDiv" name="ForSpecificUsersDiv" <?php if($OffFor!="ForSpecificUsers") echo 'style="display: none"'; ?>>
												<div class="form-group col-sm-10">
													<select class="form-control selectpicker" id="ForSpecificUsers[]" name="ForSpecificUsers[]" multiple data-selected-text-format="count>3" data-size="5" data-live-search = "true">
														<?php
														foreach($user_list as $user) {

															if( in_array($user->user_id, $ForSpecificUsers) ) {
																echo '<option value="' . $user->user_id . '" selected>' . $user->username . '</option>';
															} else {
																echo '<option value="' . $user->user_id . '">' . $user->username . '</option>';
															}
														}
														?>
													</select>

												</div>
											</div>
											<div class="row" id="ForSpecificTiersDiv" name="ForSpecificTiersDiv" <?php if($OffFor!="ForSpecificTiers") echo 'style="display: none"'; ?>>
												<div class="form-group col-sm-10">
													<select class="form-control selectpicker" id="ForSpecificTiers[]" name="ForSpecificTiers[]" multiple data-selected-text-format="count>3" data-size="auto">
														<?php
														foreach($tier_list as $item) {

															if( in_array($item->cate_id, $ForSpecificTiers) ) {
																echo '<option value="' . $item->cate_id . '" selected>' . $item->cate_name. '</option>';
															} else {
																echo '<option value="' . $item->cate_id . '">' . $item->cate_name . '</option>';
															}
														}
														?>
													</select>
												</div>
											</div>
											<div class="row" id="ForMultipleChildDiv" name="ForMultipleChildDiv" <?php if($OffFor!="ForMultipleChild") echo 'style="display: none"'; ?>>
												<div class="form-group col-sm-10">
													<input type="text" id="ForMultipleChild" name="ForMultipleChild" class="form-control" value="<?php echo $ForMultipleChild; ?>">
												</div>
											</div>
											<div class="row" id="ForSpecificActivitiesDiv" name="ForSpecificActivitiesDiv" <?php if($OffFor!="ForSpecificActivities") echo 'style="display: none"'; ?>>
												<div class="form-group col-sm-10">
													<select class="form-control selectpicker" id="ForSpecificActivities[]" name="ForSpecificActivities[]" multiple data-selected-text-format="count>3" data-size="5" data-live-search = "true">
														<?php
														foreach($activity_list as $activity) {

															if( in_array($activity->activity_id, $ForSpecificActivities) ) {
																echo '<option value="' . $activity->activity_id . '" selected>' . $activity->sessionName . '</option>';
															} else {
																echo '<option value="' . $activity->activity_id . '">' . $activity->sessionName . '</option>';
															}
														}
														?>
													</select>
												</div>
											</div>

										</div>

									</div>
								</section>
								<section class="step" data-step-title="Date range">
									<div class="row">
										<div class="col-sm-6">
											<div class="notes">
												<h3>Specify when this discount begins and ends</h3>

											</div>
										</div>
										<div class="col-sm-6">
											<div class="row">
												<div class="form-group col-sm-10">
													<label >Discount begins</label>
													<input type="text" id="StartDate" name="StartDate" class="form-control datepicker-input" value="<?php echo $StartDate; ?>">
												</div>
											</div>
											<div class="row">
												<div class="form-group col-sm-10">
													<label >Discount expires (end of day)</label>
													<input type="text" id="ExpireDate" name="ExpireDate" class="form-control datepicker-input" <?php echo $ExpireDate_disabled?> value="<?php echo $ExpireDate; ?>">
												</div>
											</div>
											<div class="row">
												<div class="form-group col-sm-10">
													<label >
														<input type="checkbox" id="NeverExpires" name="NeverExpires" class="form-control datepicker-input" <?php echo $NeverExpires_checked;?>>
														Never Expires
													</label>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-sm-10">
													<label >Status</label>
													<select class="form-control" id="Status" name="Status">
														<option value="Not Live" <?php if($Status=="Not Live") echo "selected"; ?>>Not Live</option>
														<option value="Live" <?php if($Status=="Live") echo "selected"; ?>>Live</option>
													</select>
												</div>
											</div>

										</div>

									</div>
								</section>
								<input type="hidden" id="sel_id" name="sel_id" value="<?php echo $selected->discount_id;?>">
							</form>
						</div>
					</div>
				</div>
				<!-- Footer Start -->
				<?php
					$this->load->view("common/footer.php");
				?>
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
	<!-- Page Specific JS Libraries -->
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-gmap3/gmap3.min.js"></script>
	<script src="<?= asset_base_url()?>/js/pages/google-maps.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-validator/js/bootstrapValidator.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-notifyjs/notify.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-notifyjs/styles/metro/notify-metro.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-multiselect/js/bootstrap-select.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-multiselect2/js/bootstrap-multiselect.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-wizard/jquery.easyWizard.js"></script>
	<script src="<?= asset_base_url()?>/js/pages/form-wizard.js"></script>

	<script>

		$(document).ready(function() {

			$('#myWizard').css("overflow", "visible");

			$('.selectpicker').selectpicker('refresh');

			$('.iCheck-helper').click(function () {

				var parent = $(this).parent().get(0);
				var checkboxId = parent.getElementsByTagName('input')[0].id;

				if(checkboxId == "NoLimit") {

					if(document.getElementById(checkboxId).checked) {

						$("#DiscountLimit").attr("disabled", true);
					} else {
						$("#DiscountLimit").attr("disabled", false);
					}

				} else if(checkboxId == "NeverExpires") {

					if(document.getElementById(checkboxId).checked) {

						$("#ExpireDate").attr("disabled", true);
					} else {
						$("#ExpireDate").attr("disabled", false);
					}
				}

			});


			$('#AmountPercent').change(function() {

				var type = $('#AmountPercent').val();

				if (type == "Amount") {
					$("#TakeOffLabel").text("Take( $ )");
				} else if(type == "Percent") {
					$("#TakeOffLabel").text("Take( % )");
				}
			});

			$('#OffFor').change(function() {

				var offFor = $('#OffFor').val();

				if (offFor == "ForAllUsers") {
					$('#ForAllUsersDiv').css("display", "block");
					$('#ForSpecificUsersDiv').css("display", "none");
					$('#ForSpecificTiersDiv').css("display", "none");
					$('#ForMultipleChildDiv').css("display", "none");
					$('#ForSpecificActivitiesDiv').css("display", "none");
				} else if (offFor == "ForSpecificUsers") {
					$('#ForAllUsersDiv').css("display", "none");
					$('#ForSpecificUsersDiv').css("display", "block");
					$('#ForSpecificTiersDiv').css("display", "none");
					$('#ForMultipleChildDiv').css("display", "none");
					$('#ForSpecificActivitiesDiv').css("display", "none");
				} else if (offFor == "ForSpecificTiers") {
					$('#ForAllUsersDiv').css("display", "none");
					$('#ForSpecificUsersDiv').css("display", "none");
					$('#ForSpecificTiersDiv').css("display", "block");
					$('#ForMultipleChildDiv').css("display", "none");
					$('#ForSpecificActivitiesDiv').css("display", "none");
				} else if (offFor == "ForMultipleChild") {
					$('#ForAllUsersDiv').css("display", "none");
					$('#ForSpecificUsersDiv').css("display", "none");
					$('#ForSpecificTiersDiv').css("display", "none");
					$('#ForMultipleChildDiv').css("display", "block");
					$('#ForSpecificActivitiesDiv').css("display", "none");
				} else if (offFor == "ForSpecificActivities") {
					$('#ForAllUsersDiv').css("display", "none");
					$('#ForSpecificUsersDiv').css("display", "none");
					$('#ForSpecificTiersDiv').css("display", "none");
					$('#ForMultipleChildDiv').css("display", "none");
					$('#ForSpecificActivitiesDiv').css("display", "block");
				} else {
					$('#ForAllUsersDiv').css("display", "none");
					$('#ForSpecificUsersDiv').css("display", "none");
					$('#ForSpecificTiersDiv').css("display", "none");
					$('#ForMultipleChildDiv').css("display", "none");
					$('#ForSpecificActivitiesDiv').css("display", "none");
				}
			});

			$('#myWizard')
				.bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						DiscountName: {
							message: 'Discount Name is not valid',
							validators: {
								notEmpty: {
									message: 'Discount Name is required and can\'t be empty'
								},
								regexp: {
									regexp: /^[a-zA-Z0-9_\. ]+$/,
									message: 'Discount Name can only consist of alphabetical, number, space, dot and underscore'
								}
							}
						},
						DiscountCode: {
							message: 'Discount Code is not valid',
							validators: {
								notEmpty: {
									message: 'Discount Code is required and can\'t be empty'
								},
								regexp: {
									regexp: /^[a-zA-Z0-9]+$/,
									message: 'Discount Code can only consist of alphabetical, number'
								}
							}
						},

						TakeOff: {
							message: 'Take is not valid',
							validators: {
								notEmpty: {
									message: 'Take is required and can\'t be empty'
								},
								regexp: {
									regexp: /^[0-9\.]+$/,
									message: 'Discount code can only consist of number'
								}
							}
						},
						StartDate: {
							message: 'Discount begins is not valid',
							validators: {
								notEmpty: {
									message: 'Discount begins is required and can\'t be empty'
								},
								regexp: {
									regexp: /^[0-9\-/ ]+$/,
									message: 'Discount begins can be only date'
								}
							}
						}
					}
				});

		});

	</script>

	</body>
</html>