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
			<form role="form" action="/user/addUser" method="post" id="registerForm" enctype="multipart/form-data">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
			<div class="profile-banner" style="background-image: url(/images/stock/1epgUO0.jpg);">
				<div class="col-sm-3 avatar-container">
					<img src="/images/users/default" class="img-circle profile-avatar" alt="User avatar">
				</div>

			</div>
            <div class="content">

				<div class="row">
					<div class="col-sm-3">
						<!-- Begin user profile -->
						<div class="text-center user-profile-2">

						</div><!-- End div .box-info -->
						<!-- Begin user profile -->
					</div><!-- End div .col-sm-4 -->

					<div class="col-sm-9">
						<div class="widget widget-tabbed">
							<!-- Nav tab -->
							<ul class="nav nav-tabs nav-justified">
							 <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-user"></i> ADD USER</a></li>
							</ul>
							<!-- End nav tab -->

							<!-- Tab panes -->
							<div class="tab-content">
								
								
			
								
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
                                                    <label for="exampleInputEmail1">User Type</label>
													<select class="form-control" id="UserType" name="UserType">
														<?php
															foreach($arr_usertype as $usertype) {
																if(set_value('UserType') == $usertype->cate_name) {
																	echo '<option value="' . $usertype->cate_name . '" selected>' . $usertype->cate_name . '</option>';
																} else {
																	echo '<option value="' . $usertype->cate_name . '">' . $usertype->cate_name . '</option>';
																}
															}
														?>
													</select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="exampleInputEmail1">First Name</label>
                                                    <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="" value="<?php echo set_value('FirstName'); ?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="exampleInputEmail1">Middle Initial</label>
                                                    <input type="text" class="form-control" id="MiddleInitial" name="MiddleInitial" placeholder="" value="<?php echo set_value('MiddleInitial'); ?>">
                                                  </div>
                                                   <div class="form-group">
                                                    <label for="exampleInputEmail1">Last Name</label>
                                                    <input type="text" class="form-control" id="LastName" name="LastName" placeholder="" value="<?php echo set_value('LastName'); ?>">
                                                  </div>
												  <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" id="EmailAddress" name="EmailAddress" placeholder="Enter email" value="<?php echo set_value('EmailAddress'); ?>">
                                                  </div>
												<div class="form-group">
													<label for="exampleInputEmail1">Profile picture</label>
													<br>
												  <input type="file" class="btn btn-default" title="Select profile picture" id="ProfilePicture" name="ProfilePicture">
												</div>

											</div>
											<div class="col-sm-6">
                                                <h5><strong>Contact Information </strong></h5>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Phone Number</label>
                                                    <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="" value="<?php echo set_value('PhoneNumber'); ?>">
                                                  </div>
                                                 <div class="form-group">
                                                    <label for="exampleInputEmail1">Address 1</label>
                                                    <input type="text" class="form-control" id="Address1" name="Address1" placeholder="" value="<?php echo set_value('Address1'); ?>">
                                                  </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Address 2</label>
                                                    <input type="text" class="form-control" id="Address2" name="Address2" placeholder="" value="<?php echo set_value('Address2'); ?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="exampleInputEmail1">City</label>
                                                    <input type="text" class="form-control" id="City" name="City" placeholder="" value="<?php echo set_value('City'); ?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="exampleInputEmail1">State</label>
													<select class="form-control" id="State" name="State">
														<?php
															foreach($arr_state as $state) {

																if(set_value('State') == $state->cate_id) {

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
                                                    <input type="text" class="form-control" id="ZipCode" name="ZipCode" placeholder="" value="<?php echo set_value('ZipCode'); ?>">
                                                  </div>
									
											</div>
										</div><!-- End div .row -->
<?php if (gf_isAdmin()) {?>
                                        <div class="row">
                                            
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <h5><strong>User Management Rights</strong></h5>
                                                          <label>
                                                            <input class="viewCheck" type="checkbox" id="RightsView" name="RightsView"<?php if(set_value('RightsView')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            View Users
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsAdd" name="RightsAdd" <?php if(set_value('RightsAdd')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                           Add Users
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsDelete" name="RightsDelete" <?php if(set_value('RightsDelete')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            Delete Users
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsEdit" name="RightsEdit" <?php if(set_value('RightsEdit')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            Edit Users
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsChat" name="RightsChat" <?php if(set_value('RightsChat')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            Chat
                                                          </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <h5><strong>School Management Rights</strong></h5>
                                                          <label>
                                                            <input class="viewCheck" type="checkbox" id="RightsSchoolView" name="RightsSchoolView" <?php if(set_value('RightsSchoolView')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            View Schools
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsSchoolAdd" name="RightsSchoolAdd" <?php if(set_value('RightsSchoolAdd')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                           Add Schools
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsSchoolDelete" name="RightsSchoolDelete" <?php if(set_value('RightsSchoolDelete')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            Delete Schools
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsSchoolEdit" name="RightsSchoolEdit" <?php if(set_value('RightsSchoolEdit')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            Edit Schools
                                                          </label>
                                                        </div>
                                                    </div>
                                            
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <h5><strong>Activity Management Rights</strong></h5>
                                                          <label>
                                                            <input class="viewCheck" type="checkbox" id="RightsActivityView" name="RightsActivityView" <?php if(set_value('RightsActivityView')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            View Activity
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsActivityAdd" name="RightsActivityAdd" <?php if(set_value('RightsActivityAdd')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                           Add Activity
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsActivityEdit" name="RightsActivityEdit" <?php if(set_value('RightsActivityEdit')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            Edit Activity
                                                          </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <h5><strong>Discount Management Rights</strong></h5>
                                                          <label>
                                                            <input class="viewCheck" type="checkbox" id="RightsDiscountView" name="RightsDiscountView" <?php if(set_value('RightsDiscountView')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            View Discounts
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsDiscountAdd" name="RightsDiscountAdd" <?php if(set_value('RightsDiscountAdd')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                           Add Discounts
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsDiscountDelete" name="RightsDiscountDelete" <?php if(set_value('RightsDiscountDelete')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            Delete Discounts
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsDiscountEdit" name="RightsDiscountEdit" <?php if(set_value('RightsDiscountEdit')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            Edit Discounts
                                                          </label>
                                                        </div>
                                                    </div>
                                        </div>
                                        <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <h5><strong>Message Center Rights</strong></h5>
                                                          <label>
                                                            <input class="viewCheck" type="checkbox" id="RightsMsgView" name="RightsMsgView" <?php if(set_value('RightsMsgView')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            View Messages
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsMsgAdd" name="RightsMsgAdd" <?php if(set_value('RightsMsgAdd')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                           Add Messages
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsMsgDelete" name="RightsMsgDelete" <?php if(set_value('RightsMsgDelete')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            Delete Messages
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsMsgEdit" name="RightsMsgEdit" <?php if(set_value('RightsMsgEdit')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            Edit Messages
                                                          </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <h5><strong>Student Management Rights</strong></h5>
                                                          <label>
                                                            <input class="viewCheck" type="checkbox" id="RightsStudentView" name="RightsStudentView" <?php if(set_value('RightsStudentView')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            View Students
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsStudentAdd" name="RightsStudentAdd" <?php if(set_value('RightsStudentAdd')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                           Add Students
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsStudentDelete" name="RightsStudentDelete" <?php if(set_value('RightsStudentDelete')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            Delete Students
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsStudentEdit" name="RightsStudentEdit" <?php if(set_value('RightsStudentEdit')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            Edit Students
                                                          </label>
                                                        </div>
                                                    </div>                                                    
                                            
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <h5><strong>Attendance Rights</strong></h5>
                                                          <label>
                                                            <input class="viewCheck" type="checkbox" id="RightsAttendanceView" name="RightsAttendanceView" <?php if(set_value('RightsAttendanceView')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            View Attendances
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsAttendanceAdd" name="RightsAttendanceAdd" <?php if(set_value('RightsAttendanceAdd')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                           Add Attendances
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsAttendanceDelete" name="RightsAttendanceDelete" <?php if(set_value('RightsAttendanceDelete')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            Delete Attendances
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsAttendanceEdit" name="RightsAttendanceEdit" <?php if(set_value('RightsAttendanceEdit')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            Edit Attendances
                                                          </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <h5><strong>Report Center Rights</strong></h5>
                                                          <label>
                                                            <input class="viewCheck" type="checkbox" id="RightsReportsView" name="RightsReportsView" <?php if(set_value('RightsReportsView')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            View Reports
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsReportsAdd" name="RightsReportsAdd" <?php if(set_value('RightsReportsAdd')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                           Add Reports
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsReportsDelete" name="RightsReportsDelete" <?php if(set_value('RightsReportsDelete')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            Delete Reports
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsReportsEdit" name="RightsReportsEdit" <?php if(set_value('RightsReportsEdit')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            Edit Reports
                                                          </label>
                                                        </div>
                                                    </div>
                                        </div>
                                        <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <h5><strong>Daily Message Rights</strong></h5>
                                                          <label>
                                                            <input class="viewCheck" type="checkbox" id="RightsDaily" name="RightsDaily" <?php if(set_value('RightsDaily')) echo ""; if (gf_isAction()) echo 'checked'; ?>>
                                                            Edit Message
                                                          </label>
                                                        </div>
                                                    </div>                     
                                        </div><!-- End div .row -->
<?php } ?>                                        
        
                                        <button type="submit" class="btn btn-primary">Save</button>
									</div><!-- End div .user-profile-content -->
								</div><!-- End div .tab-pane -->
								<!-- End Tab about -->
								
								
						         
								
								
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
			</form>
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

    <script>
         $('.viewCheck').each(function(){
             
             if ($(this).prop('checked')) {
                 $(this).parent().parent().siblings('.checkbox').each(function(){
                    $(this).find('input').prop('disabled', false); 
                 });
                 $(this).parent().parent().parent().siblings('.checkbox').each(function(){
                     $(this).find('input').iCheck('enable');
                 });
             } else {
                 $(this).parent().parent().siblings('.checkbox').each(function(){
                    $(this).find('input').prop('disabled', true); 
                 });
                 $(this).parent().parent().parent().siblings('.checkbox').each(function(){
                     $(this).find('input').iCheck('enable');
                 });
             }   
         });    
     
         $('.viewCheck').change(function() {
             if ($(this).prop('checked')) {
                 $(this).parent().parent().siblings('.checkbox').each(function(){
                    $(this).find('input').prop('disabled', false); 
                 });
             } else {
                 $(this).parent().parent().siblings('.checkbox').each(function(){
                    $(this).find('input').prop('disabled', true); 
                 });
             }
         });
         
         $('input').on('ifChecked', function(event) {
             if ($(this).hasClass('viewCheck')) {
                 $(this).parent().parent().parent().siblings('.checkbox').each(function(){
                     $(this).find('input').iCheck('enable');
                 })
             }
         });
         $('input').on('ifUnchecked', function(event) {
             if ($(this).hasClass('viewCheck')) {
                 $(this).parent().parent().parent().siblings('.checkbox').each(function(){
                     $(this).find('input').iCheck('disable');
                 })
             }
         });
    </script>
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