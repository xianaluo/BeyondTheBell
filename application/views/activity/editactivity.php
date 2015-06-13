<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Activity Management</title>
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
		<link href="<?= asset_base_url()?>/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
		<link href="<?= asset_base_url()?>/libs/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
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

				</div>
				<div class="content">

					<div class="row">

						<div class="col-sm-12">

							<form role="form" action="/activity/editActivity" method="post" id="registerForm" enctype="multipart/form-data">

								<!-- Repeats modal -->
								<div id="RepeatsModal" name="RepeatsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">

											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="myModalLabel">Repeats</h4>
											</div>
											<div class="modal-body ">
												<div class="widget-content padding form-horizontal">
													<div class="form-group">
														<label class="col-sm-3 control-label">Repeats: </label>
														<div class="col-sm-6">
															<select class="form-control" id="RepeatsModal_Repeats" name="RepeatsModal_Repeats">
																<option value="Weekly" selected>Weekly</option>
																<?php
																/*
																	$by = array('Daily'=>'days','Weekly'=>'weeks','Monthly'=>'months','Yearly'=>'years');
																	foreach($by as $key => $val) {
																		if($key == $selected->repeats_by)
																			echo '<option value="'.$key.'" selected>'.$key.'</option>';
																		else
																			echo '<option value="'.$key.'">'.$key.'</option>';
																	}
																*/
																?>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">Repeat every: </label>
														<div class="col-sm-6">
															<select class="form-control" id="RepeatsModal_RepeatEvery" name="RepeatsModal_RepeatEvery">
																<option value="1">1</option>
																<?php
																	/*
																	for($i = 1;$i <= 30; $i++) {
																		if($i == $selected->repeats_every)
																			echo '<option value="'.$i.'" selected>'.$i.'</option>';
																		else
																			echo '<option value="'.$i.'">'.$i.'</option>';
																	}
																	*/
																?>
															</select>
														</div>
														<label class="col-sm-3 control-label" style="text-align: left" id="RepeatsModal_RepeatEvery_Label" name="RepeatsModal_RepeatEvery_Label">weeks
															<?php
																/*
																$by = array('Daily'=>'days','Weekly'=>'weeks','Monthly'=>'months','Yearly'=>'years');
																foreach($by as $key => $val) {
																	if($key == $selected->repeats_by)
																		echo $val;
																}
																*/
															?>
														</label>
													</div>
													<!--<div class="form-group" id="RepeatsModal_RepeatsOnDiv" name="RepeatsModal_RepeatsOnDiv" style="display: <?php echo ($selected->repeats_by == 'Weekly')?'block':'none'; ?>">-->
													<div class="form-group" id="RepeatsModal_RepeatsOnDiv" name="RepeatsModal_RepeatsOnDiv" >
														<?php
															$weekOn = explode('|', $selected->repeats_weekOn);
														?>
														<label class="col-sm-3 control-label">Repeat on: </label>
														<div class="col-sm-9">
															<label class="checkbox-inline icheckbox">
																<input type="checkbox" id="RepeatsModal_WeekOn1" name="RepeatsModal_WeekOn1" value="1" <?php if($weekOn[0]) echo 'checked';?>>S
															</label>
															<label class="checkbox-inline icheckbox">
																<input type="checkbox" id="RepeatsModal_WeekOn2" name="RepeatsModal_WeekOn2" value="2" <?php if($weekOn[1]) echo 'checked';?>>M
															</label>
															<label class="checkbox-inline icheckbox">
																<input type="checkbox" id="RepeatsModal_WeekOn3" name="RepeatsModal_WeekOn3" value="3" <?php if($weekOn[2]) echo 'checked';?>>T
															</label>
															<label class="checkbox-inline icheckbox">
																<input type="checkbox" id="RepeatsModal_WeekOn4" name="RepeatsModal_WeekOn4" value="4" <?php if($weekOn[3]) echo 'checked';?>>W
															</label>
															<label class="checkbox-inline icheckbox">
																<input type="checkbox" id="RepeatsModal_WeekOn5" name="RepeatsModal_WeekOn5" value="5" <?php if($weekOn[4]) echo 'checked';?>>T
															</label>
															<label class="checkbox-inline icheckbox">
																<input type="checkbox" id="RepeatsModal_WeekOn6" name="RepeatsModal_WeekOn6" value="6" <?php if($weekOn[5]) echo 'checked';?>>F
															</label>
															<label class="checkbox-inline icheckbox">
																<input type="checkbox" id="RepeatsModal_WeekOn7" name="RepeatsModal_WeekOn7" value="7" <?php if($weekOn[6]) echo 'checked';?>>S
															</label>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">Starts on: </label>
														<div class="col-sm-6">
															<input type="text" class="form-control datepicker-input" id="RepeatsModal_StartsOn" name="RepeatsModal_StartsOn" value="<?php echo date_format($selected->repeats_startsOn, 'm/d/Y'); ?>">
															<style>.datepicker { z-index: 1151 !important;  }</style>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">End: </label>
														<div class="col-sm-9">
															<!--
															<div class="form-group">
																<div class="radio iradio col-sm-3">
																	<label>
																		<input type="radio" name="RepeatsModal_Ends" id="RepeatsModal_EndsNever" value="1" <?php if($selected->repeats_ends == "1") echo 'checked'; ?>>
																		Never
																	</label>
																</div>
															</div>
															-->
															<div class="form-group">
																<div class="radio iradio col-sm-3">
																	<label>
																		<input type="radio" name="RepeatsModal_Ends" id="RepeatsModal_EndsAfter" value="2" <?php if($selected->repeats_ends == "2") echo 'checked'; ?>>
																		After
																	</label>
																</div>
																<div class="col-sm-6">
																	<input type="text" class="form-control" name="RepeatsModal_EndsAfter_Occ" id="RepeatsModal_EndsAfter_Occ" value="<?php echo $selected->repeats_endsAfter; ?>">
																</div>
																occurrences
															</div>
															<div class="form-group">
																<div class="radio iradio col-sm-3">
																	<label>
																		<input type="radio" name="RepeatsModal_Ends" id="RepeatsModal_EndsOn" value="3" <?php if($selected->repeats_ends == "3" || !$selected->repeats_ends) echo 'checked'; ?>>
																		On
																	</label>
																</div>
																<div class="col-sm-6">
																	<input type="text" class="form-control datepicker-input" id="RepeatsModal_EndsOn_Date" name="RepeatsModal_EndsOn_Date" value="<?php echo date_format($selected->repeats_endsOn, 'm/d/Y'); ?>">
																</div>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">Summary: </label>
														<label class="col-sm-9 control-label" style="text-align: left" id="RepeatsModal_Summary" name="RepeatsModal_Summary">Weekly
															<?php
															/*
																$by = array('Daily'=>'days','Weekly'=>'weeks','Monthly'=>'months','Yearly'=>'years');
																foreach($by as $key => $val) {
																	if($key == $selected->repeats_by)
																		echo $key;
																}
															*/
															?>
														</label>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-success" id="RepeatsModal_ApplyBtn" name="RepeatsModal_ApplyBtn">Apply</button>
												<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
											</div>

										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- /.modal -->

							<div class="widget widget-tabbed">
								<!-- Nav tab -->
								<ul class="nav nav-tabs nav-justified">
									<li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-flag-o"></i> Edit an activity</a></li>
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
													<div class="form-group">
														<label for="exampleInputEmail1">Session Name</label>
														<input type="text" class="form-control" id="SchoolName" name="SessionName" placeholder="" value="<?php echo $selected->sessionName; ?>">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Days Offered Descriptions</label>
														<input type="text" class="form-control" id="DaysOfferedDesc" name="DaysOfferedDesc" placeholder="" value="<?php echo $selected->daysOfferedDesc; ?>">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Time-based</label>
														<select class="form-control" id="TimeBased" name="TimeBased">
															<?php
																if($selected->timeBased == false) {
																	echo '	<option value="true">Yes</option>
																			<option value="false" selected>No</option>';
																} else {
																	echo '	<option value="true" selected>Yes</option>
																			<option value="false">No</option>';
																}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Aligned With Day School Curriculum</label>
														<select class="form-control" id="AlignedWithDay" name="AlignedWithDay">
															<?php
															if($selected->alignedWithDay == false) {
																echo '		<option value="true">Yes</option>
																			<option value="false" selected>No</option>';
															} else {
																echo '		<option value="true" selected>Yes</option>
																			<option value="false">No</option>';
															}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Maximum Enrollment</label>
														<input type="text" class="form-control" id="MaxEnrollment" name="MaxEnrollment" placeholder="" value="<?php echo $selected->maxEnrollment; ?>">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Room</label>
														<select class="form-control" id="RoomID" name="RoomID">
															<?php
															foreach($act_room_list as $room) {
																if($selected->roomID == $room->cate_name) {
																	echo '<option value="' . $room->cate_name . '" selected>' . $room->cate_name . '</option>';
																} else {
																	echo '<option value="' . $room->cate_name . '">' . $room->cate_name . '</option>';
																}
															}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Start Date/Time</label>
														<?php
															echo '<input type="text" class="form-control datepicker-input" id="StartDate" name="StartDate" value="'.date_format($selected->startDate, 'm/d/Y').'">';
														?>
														<div class="input-group bootstrap-timepicker">
															<input type="text" class="form-control" id="StartTime" name="StartTime" value="<?php echo date_format($selected->startDate, 'H:i A'); ?>">
															<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
														</div>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">End Date/Time</label>
														<?php
															echo '<input type="text" class="form-control datepicker-input" id="EndDate" name="EndDate" value="'.date_format($selected->endDate, 'm/d/Y').'">';
														?>
														<div class="input-group bootstrap-timepicker">
															<input type="text" class="form-control" id="EndTime" name="EndTime" value="<?php echo date_format($selected->endDate, 'H:i A'); ?>">
															<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
														</div>
													</div>

													<div class="form-group">
														<input type="checkbox"  id="Repeats" name="Repeats" <?php if($selected->repeats) echo 'checked'; ?>>
														<label id="RepeatsBtn" name="RepeatsBtn" style="cursor: pointer;">Repeats</label>
													</div>

													<?php
														if(gf_cu_rightsActivityEdit()) {
															echo '<button type="submit" class="btn btn-primary">Save</button>';
														}
													?>


												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="exampleInputEmail1">Goal</label>
														<select class="form-control" id="GoalID" name="GoalID">
															<?php
															foreach($act_goal_list as $goal) {
																if($selected->goalID == $goal->cate_name) {
																	echo '<option value="' . $goal->cate_name . '" selected>' . $goal->cate_name . '</option>';
																} else {
																	echo '<option value="' . $goal->cate_name . '">' . $goal->cate_name . '</option>';
																}
															}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Core Service Area</label>
														<select class="form-control" id="CoreServiceAreaID" name="CoreServiceAreaID">
															<?php
															foreach($act_coreServiceArea_list as $item) {
																if($selected->coreServiceAreaID == $item->cate_name) {
																	echo '<option value="' . $item->cate_name . '" selected>' . $item->cate_name . '</option>';
																} else {
																	echo '<option value="' . $item->cate_name . '">' . $item->cate_name . '</option>';
																}
															}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Academic Subject</label>
														<select class="form-control" id="AcademicSubjectID" name="AcademicSubjectID">
															<?php
															foreach($act_academicSubject_list as $item) {
																if($selected->academicSubjectID == $item->cate_name) {
																	echo '<option value="' . $item->cate_name . '" selected>' . $item->cate_name . '</option>';
																} else {
																	echo '<option value="' . $item->cate_name . '">' . $item->cate_name . '</option>';
																}
															}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">APR Category Type</label>
														<select class="form-control" id="AprCategoryTypeID" name="AprCategoryTypeID">
															<?php
															foreach($act_aprCategoryType_list as $item) {
																if($selected->aprCategoryTypeID == $item->cate_name) {
																	echo '<option value="' . $item->cate_name . '" selected>' . $item->cate_name . '</option>';
																} else {
																	echo '<option value="' . $item->cate_name . '">' . $item->cate_name . '</option>';
																}
															}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Focus</label>
														<select class="form-control" id="FocusID" name="FocusID">
															<?php
															foreach($act_focus_list as $item) {
																if($selected->focusID == $item->cate_name) {
																	echo '<option value="' . $item->cate_name . '" selected>' . $item->cate_name . '</option>';
																} else {
																	echo '<option value="' . $item->cate_name . '">' . $item->cate_name . '</option>';
																}
															}
															?>
														</select>
													</div>


													<div class="form-group">
														<label for="exampleInputEmail1">Average hours/session/day</label>
														<input type="text" class="form-control" id="AverageHoursSessionDay" name="AverageHoursSessionDay" placeholder="" value="<?php echo $selected->averageHoursSessionDay; ?>">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Shareable</label>
														<select class="form-control" id="Shareable" name="Shareable">
															<?php
															if($selected->shareable == false) {
																echo '		<option value="true">Yes</option>
																			<option value="false" selected>No</option>';
															} else {
																echo '		<option value="true" selected>Yes</option>
																			<option value="false">No</option>';
															}
															?>
														</select>
													</div>

													<div class="form-group">
														<label for="exampleInputEmail1">Funding Sources</label>
														<select class="selectpicker" multiple data-selected-text-format="count>3" id="FundingSourcesIDs[]" name="FundingSourcesIDs[]" >
															<?php
															foreach($act_fundingSources_list as $item) {

																if( in_array($item->cate_name, $selected->fundingSourcesIDs) ) {
																	echo '<option value="' . $item->cate_name . '" selected>' . $item->cate_name . '</option>';
																} else {
																	echo '<option value="' . $item->cate_name . '">' . $item->cate_name . '</option>';
																}
															}
															?>
														</select>
													</div>

													<div class="form-group">
														<label for="exampleInputEmail1">School</label>
														<select class="form-control" id="SchoolID" name="SchoolID">
															<?php
															foreach($school_list as $school) {

																if($selected->school_id == $school->school_id) {
																	echo '<option value="' . $school->school_id . '" selected>' . $school->schoolName . '</option>';
																} else {
																	echo '<option value="' . $school->school_id . '">' . $school->schoolName . '</option>';
																}
															}
															?>
														</select>
													</div>

													<div class="form-group">
														<label for="exampleInputEmail1">Fee</label>
														<div class="row">
															<div class="form-group col-sm-9">
																<select class="form-control" id="FeeID" name="FeeID">
																	<?php
																	foreach($act_fee_list as $item) {
																		echo '<option id="FeeID_'.$item['id'].'" name="FeeID_'.$item['id'].'" value="' . $item['id'] . '" data-name="'.$item['name'].'" data-price="'.$item['price'].'" data-kind="'.$item['kind'].'">' . $item['name'] . '</option>';
																	}
																	?>
																</select>
															</div>
															<div class="form-group col-sm-3">
																<?php
																if(gf_cu_rightsActivityEdit()) {
																	echo '<a class="btn btn-success" id="AddFeeBtn" name="AddFeeBtn"><i class="fa fa-plus-circle"></i> Add</a>';
																}
																?>
															</div>
														</div>
														<div id="AttachedFeeListDiv" name="AttachedFeeListDiv">
															<table bgcolor="#deb887"  id="AttachedFeeListTbl" name="AttachedFeeListTbl">
																<thead>
																<tr>
																	<th class="col-sm-4" >Name</th>
																	<th class="col-sm-2" >Price($)</th>
																	<th class="col-sm-1" >Weekly</th>
																	<th class="col-sm-2" >Weeks</th>
																	<th class="col-sm-2" >Amount($)</th>
																	<th class="col-sm-1" >Option</th>
																</tr>
																</thead>
																<tbody id="AttachedFeeList" name="AttachedFeeList">
																</tbody>
															</table>
														</div>
													</div>

												</div>
											</div><!-- End div .row -->


										</div><!-- End div .user-profile-content -->
									</div><!-- End div .tab-pane -->
									<!-- End Tab about -->

										<input type="hidden" id="activity_id" name="activity_id" value="<?php echo $selected->activity_id?>">



								</div><!-- End div .tab-content -->
							</div><!-- End div .box-info -->

							</form>

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
	<script src="<?= asset_base_url()?>/libs/jquery-notifyjs/styles/metro/notify-metro.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-multiselect/js/bootstrap-select.js"></script>

	<script>

		var attached_fees = 0;
		var remove_btn_disabled = '';
<?
	if(!gf_cu_rightsActivityEdit()) {
		echo 'remove_btn_disabled = " disabled"';
	}
?>

		function getWeeksDuration() {

			var weeks_num;

			if(document.getElementById("Repeats").checked) {

				if(document.getElementById("RepeatsModal_EndsAfter").checked) {
					weeks_num = $("#RepeatsModal_EndsAfter_Occ").val();
					return weeks_num;
				}
			}

			var startDate = new Date($('#StartDate').val() + " " + $('#StartTime').val());
			var endDate = new Date($('#EndDate').val() + " " + $('#EndTime').val());

			weeks_num = Math.round((endDate - startDate) / (7 * 24 * 60 * 60 * 1000));
			if((endDate - startDate) % (7 * 24 * 60 * 60 * 1000) != 0) weeks_num++;

			return weeks_num;
		}

		function refreshPrice(tr_num) {

			if(tr_num < 0 || tr_num > attached_fees) return;

			if(document.getElementById("FeeKind"+tr_num).checked) {
				var price = $("#FeePrice"+tr_num).val();
				var weeks = $("#FeeWeeks"+tr_num).val();
				$("#FeeAmount"+tr_num).text(price*weeks);
			} else {
				$("#FeeWeeks"+tr_num).val("");
				$("#FeeAmount"+tr_num).text($("#FeePrice"+tr_num).val());
			}
		}
		function refreshKind(tr_num) {

			if(tr_num < 0 || tr_num > attached_fees) return;

			if(document.getElementById("FeeKind"+tr_num).checked) {

				var price = $("#FeePrice"+tr_num).val();
				var weeks = getWeeksDuration();
				$("#FeeWeeks"+tr_num).val(weeks);
				$("#FeeAmount"+tr_num).text(price*weeks);

			} else {
				$("#FeeWeeks"+tr_num).val("");
				$("#FeeAmount"+tr_num).text($("#FeePrice"+tr_num).val());
			}
		}

		function removeFeeTr(tr_num) {

			$('#AttachedFeeTr'+tr_num).remove();

			for(var i=tr_num+1;i<=attached_fees;i++) {

				var node = $('#AttachedFeeTr'+i);
				node.attr('id', 'AttachedFeeTr'+(i-1));
				node.attr('name', 'AttachedFeeTr'+(i-1));

				var node2 = $('#FeeKind'+i);
				node2.attr('id', 'FeeKind'+(i-1));
				node2.attr('value', (i-1));
				node2.attr('onclick', 'refreshKind('+(i-1)+');');

				var node3 = $('#FeeRemoveBtn'+i);
				node3.attr('id', 'FeeRemoveBtn'+(i-1));
				node3.attr('onclick', 'removeFeeTr('+(i-1)+');');

				var node4 = $('#FeePrice'+i);
				node4.attr('id', 'FeePrice'+(i-1));
				node4.attr('onchange', 'refreshPrice('+(i-1)+');');

				var node5 = $('#FeeWeeks'+i);
				node5.attr('id', 'FeeWeeks'+(i-1));
				node5.attr('onchange', 'refreshPrice('+(i-1)+');');

				$('#FeeName'+i).attr('id', 'FeeName'+(i-1));
				$('#FeeAmount'+i).attr('id', 'FeeAmount'+(i-1));

			}
			attached_fees--;
		}

		function appendFeeTr() {

			var fee_id = '#FeeID_' + $('#FeeID').val();

			var fee_name = $(fee_id).data("name");
			var fee_price = $(fee_id).data("price");
			var fee_kind = $(fee_id).data("kind");
			var fee_weeks;
			var fee_amount;
			if(fee_kind == "Weekly") {
				fee_kind = " checked";
				fee_weeks = getWeeksDuration();
				fee_amount = fee_price*fee_weeks;
			} else {
				fee_kind = "";
				fee_weeks = "";
				fee_amount = fee_price;
			}


			var str_tr = "";
			str_tr += '<tr id="AttachedFeeTr'+attached_fees+'" name="AttachedFeeTr'+attached_fees+'">';
			str_tr += '	<td class="col-sm-4"><input type="text" id="FeeName'+attached_fees+'" name="FeeName[]" style="border: 0;width:100%" value="'+fee_name+'" ></td>';
			str_tr += '	<td class="col-sm-2"><input type="text" id="FeePrice'+attached_fees+'" name="FeePrice[]" style="border: 0;width:100%" value="'+fee_price+'" onchange="refreshPrice('+attached_fees+')"></td>';
			str_tr += '	<td class="col-sm-1"><input type="checkbox" id="FeeKind'+attached_fees+'" name="FeeKind[]" value="'+attached_fees+'" class="form-control"'+fee_kind+' onclick="refreshKind('+attached_fees+')"></td>';
			str_tr += '	<td class="col-sm-2"><input type="text" id="FeeWeeks'+attached_fees+'" name="FeeWeeks[]" style="border: 0;width:100%" value="'+fee_weeks+'" onchange="refreshPrice('+attached_fees+')"></td>';
			str_tr += '	<td class="col-sm-2" id="FeeAmount'+attached_fees+'" name="FeeAmount'+attached_fees+'">'+fee_amount+'</td>';
			str_tr += '	<td class="col-sm-1"><div class="btn-group btn-group-xs">';
			str_tr += '			<button class="btn btn-danger" id="FeeRemoveBtn'+attached_fees+'" name="FeeRemoveBtn'+attached_fees+'" onclick="removeFeeTr('+attached_fees+');" '+remove_btn_disabled+'><i class="fa fa-trash-o"></i></button>';
			str_tr += '		</div>';
			str_tr += '	</td>';
			str_tr += '</tr>';

			$("#AttachedFeeList").append(str_tr);

			attached_fees++;
		}

		function appendFeeTr2(name, price, kind, weeks) {

			var fee_name = name;
			var fee_price = price;
			var fee_kind;
			var fee_weeks;
			var fee_amount;

			if(kind) {
				fee_kind = " checked";
				fee_weeks = weeks;
				fee_amount = price * weeks;
			} else {
				fee_kind = "";
				fee_weeks = "";
				fee_amount = price;
			}

			var str_tr = "";
			str_tr += '<tr id="AttachedFeeTr'+attached_fees+'" name="AttachedFeeTr'+attached_fees+'">';
			str_tr += '	<td class="col-sm-4"><input type="text" id="FeeName'+attached_fees+'" name="FeeName[]" style="border: 0;width:100%" value="'+fee_name+'" ></td>';
			str_tr += '	<td class="col-sm-2"><input type="text" id="FeePrice'+attached_fees+'" name="FeePrice[]" style="border: 0;width:100%" value="'+fee_price+'" onchange="refreshPrice('+attached_fees+')"></td>';
			str_tr += '	<td class="col-sm-1"><input type="checkbox" id="FeeKind'+attached_fees+'" name="FeeKind[]" value="'+attached_fees+'" class="form-control"'+fee_kind+' onclick="refreshKind('+attached_fees+')"></td>';
			str_tr += '	<td class="col-sm-2"><input type="text" id="FeeWeeks'+attached_fees+'" name="FeeWeeks[]" style="border: 0;width:100%" value="'+fee_weeks+'" onchange="refreshPrice('+attached_fees+')"></td>';
			str_tr += '	<td class="col-sm-2" id="FeeAmount'+attached_fees+'" name="FeeAmount'+attached_fees+'">'+fee_amount+'</td>';
			str_tr += '	<td class="col-sm-1"><div class="btn-group btn-group-xs">';
			str_tr += '			<button class="btn btn-danger" id="FeeRemoveBtn'+attached_fees+'" name="FeeRemoveBtn'+attached_fees+'" onclick="removeFeeTr('+attached_fees+');" '+remove_btn_disabled+'><i class="fa fa-trash-o"></i></button>';
			str_tr += '		</div>';
			str_tr += '	</td>';
			str_tr += '</tr>';

			$("#AttachedFeeList").append(str_tr);

			attached_fees++;
		}

		$(document).ready(function() {


//If failed to serverside validation
<?php


	for($i=0;$i<count($selected->fee);$i++) {

		$fee = $selected->fee[$i];
		if($fee['kind'] == "Weekly")
			$check = ' checked';
		else
			$check = '';

		echo 'appendFeeTr2("'.$fee['name'].'","'.$fee['price'].'","'.$check.'","'.$fee['weeks'].'");';
	}

?>

			$('#AddFeeBtn').click(function () {

				appendFeeTr();
			});

			$('#StartTime').timepicker();

			$('#EndTime').timepicker();


			$('.iCheck-helper').click(function () {

				var parent = $(this).parent().get(0);
				var checkboxId = parent.getElementsByTagName('input')[0].id;

				if(checkboxId == "Repeats") {

					if(document.getElementById("Repeats").checked) {

						document.getElementById("Repeats").checked = false;

						$(this).parent().attr('aria-checked', false);
						$(this).parent().attr('class', 'icheckbox_square-aero');

						$('#RepeatsModal_StartsOn').val($('#StartDate').val());
						$('#RepeatsModal_EndsOn_Date').val($('#EndDate').val());

						$('#RepeatsModal').modal('show');
					}

				}

			});


			$('#RepeatsBtn').click(function() {

				$('#RepeatsModal_StartsOn').val($('#StartDate').val());
				$('#RepeatsModal_EndsOn_Date').val($('#EndDate').val());

				$('#RepeatsModal').modal('show');
			});

			$('#RepeatsModal_ApplyBtn').click(function () {

				$('#RepeatsModal').modal('hide');

				var div_parent = $('#Repeats').parent();
				div_parent.attr('aria-checked', true);
				div_parent.attr('class', 'icheckbox_square-aero checked');

				$('#StartDate').val($('#RepeatsModal_StartsOn').val());
				$('#EndDate').val($('#RepeatsModal_EndsOn_Date').val());

				document.getElementById("Repeats").checked = true;

			});
			/*
			$('#RepeatsModal_Repeats').change(function() {

				var repeats = $('#RepeatsModal_Repeats').val();
				if(repeats == "Daily") { //daily

					$('#RepeatsModal_RepeatEvery_Label').text('days');
					$('#RepeatsModal_Summary').text('Daily');

					$('#RepeatsModal_RepeatsOnDiv').hide();
				} else if(repeats == "Weekly") { //weekly
					$('#RepeatsModal_RepeatEvery_Label').text('weeks');
					$('#RepeatsModal_Summary').text('Weekly');

					$('#RepeatsModal_RepeatsOnDiv').show();
				} else if(repeats == "Monthly") { //monthly
					$('#RepeatsModal_RepeatEvery_Label').text('months');
					$('#RepeatsModal_Summary').text('Monthly');

					$('#RepeatsModal_RepeatsOnDiv').hide();
				} else if(repeats == "Yearly") { //yearly
					$('#RepeatsModal_RepeatEvery_Label').text('years');
					$('#RepeatsModal_Summary').text('Yearly');

					$('#RepeatsModal_RepeatsOnDiv').hide();
				}

			});
			*/

			$('#registerForm').bootstrapValidator({
				message: 'This value is not valid',
				fields: {
					SessionName: {
						message: 'Session Name is not valid',
						validators: {
							notEmpty: {
								message: 'Session Name is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[a-zA-Z0-9_\. ]+$/,
								message: 'Session Name can only consist of alphabetical, number, space, dot and underscore'
							}
						}
					},
					DaysOfferedDesc: {
						message: 'Days Offered Descriptions is not valid',
						validators: {
							notEmpty: {
								message: 'Days Offered Descriptions is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[a-zA-Z0-9_\. ]+$/,
								message: 'Days Offered Descriptions can only consist of alphabetical, number, space, dot and underscore'
							}
						}
					},
					MaxEnrollment: {
						message: 'Maximum Enrollment is not valid',
						validators: {
							notEmpty: {
								message: 'Maximum Enrollment is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[a-zA-Z0-9_\. ]+$/,
								message: 'Maximum Enrollment can only consist of alphabetical, number, space, dot and underscore'
							}
						}
					},
					StartDate: {
						message: 'Start Date is not valid',
						validators: {
							notEmpty: {
								message: 'Start Date is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[0-9\-/ ]+$/,
								message: 'Start Date can only consist of alphabetical, number, space, dot and underscore'
							}
						}
					},
					StartTime: {
						message: 'Start Time is not valid',
						validators: {
							notEmpty: {
								message: 'Start Time is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[aAmMpP0-9: ]+$/,
								message: 'Start Time can only consist of alphabetical, number, space, dot and underscore'
							}
						}
					},
					EndDate: {
						message: 'End Date/Time is not valid',
						validators: {
							notEmpty: {
								message: 'End Date/Time is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[0-9\-/ ]+$/,
								message: 'End Date/Time can only consist of alphabetical, number, space, dot and underscore'
							}
						}
					},
					EndTime: {
						message: 'End Time is not valid',
						validators: {
							notEmpty: {
								message: 'End Time is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[aAmMpP0-9: ]+$/,
								message: 'End Time can only consist of alphabetical, number, space, dot and underscore'
							}
						}
					},

					AverageHoursSessionDay: {
						message: 'Average hours/session/day is not valid',
						validators: {
							notEmpty: {
								message: 'Average hours/session/day is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[a-zA-Z0-9_\. ]+$/,
								message: 'Average hours/session/day can only consist of alphabetical, number, space, dot and underscore'
							}
						}
					},

					FundingSourcesIDs: {
						message: 'FundingSources is not valid',
						validators: {
							notEmpty: {
								message: 'FundingSources is required and can\'t be empty'
							}
						}
					}

				}
			});

		});

	</script>

	</body>
</html>