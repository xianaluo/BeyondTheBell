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
		<link href="<?= asset_base_url()?>/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet"/>
        <link href="<?= asset_base_url()?>/libs/jquery-icheck/skins/all.css" rel="stylesheet" />
        <!-- Code Highlighter for Demo -->
        <link href="<?= asset_base_url()?>/libs/prettify/github.css" rel="stylesheet" />
        
        <!-- Extra CSS Libraries Start -->
        <link href="<?= asset_base_url()?>/css/style.css" rel="stylesheet" type="text/css" />
		<link href="<?= asset_base_url()?>/libs/jquery-datatables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="<?= asset_base_url()?>/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css" rel="stylesheet" type="text/css" />

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
            		<h1><i class='fa fa-flag-o'></i> Activity Management</h1>
            		<h3></h3>            	</div>
            	<!-- Page Heading End-->				<!-- Your awesome content goes here -->



				<div class="row">
					<div class="col-md-12">


						<!-- Filter modal -->
						<div id="FilterModal" name="FilterModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<form role="form" action="/activity/filter" method="post" id="registerForm" enctype="multipart/form-data">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title" id="myModalLabel">Filter Calendar</h4>
									</div>
									<div class="modal-body ">
										<div class="widget-content padding form-horizontal">

											<div class="form-group">
												<label class="col-sm-3 control-label">Start Date: </label>
												<div class="col-sm-4">
													<input type="text" class="form-control datepicker-input" id="StartDate" name="StartDate" value="<?php echo date('m/d/Y');?>">
												</div>
												<div class="col-sm-5">
													<div class="form-group input-group bootstrap-timepicker">
														<input type="text" class="form-control" id="StartTime" name="StartTime" value="">
														<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
													</div>
												</div>
												<style>.datepicker { z-index: 1151 !important;  }</style>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">End Date: </label>
												<div class="col-sm-4">
													<input type="text" class="form-control datepicker-input" id="EndDate" name="EndDate" value="<?php echo date('m/d/').(date('Y')+1);?>">
												</div>
												<div class="col-sm-5">
													<div class="form-group input-group bootstrap-timepicker">
														<input type="text" class="form-control" id="EndTime" name="EndTime" value="">
														<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Goal: </label>
												<div class="col-sm-9">
													<select class="form-control" id="GoalID" name="GoalID">
														<option value=""></option>
														<?php
														foreach($act_goal_list as $goal) {
															echo '<option value="' . $goal->cate_name . '">' . $goal->cate_name . '</option>';
														}
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Funding Sources: </label>
												<div class="col-sm-9">
													<select class="form-control" id="FundingSourcesID" name="FundingSourcesID">
														<option value=""></option>
														<?php
														foreach($act_fundingSources_list as $item) {
															echo '<option value="' . $item->cate_name . '">' . $item->cate_name . '</option>';
														}
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Academic Subject: </label>
												<div class="col-sm-9">
													<select class="form-control" id="AcademicSubjectID" name="AcademicSubjectID">
														<option value=""></option>
														<?php
														foreach($act_academicSubject_list as $item) {
															echo '<option value="' . $item->cate_name . '">' . $item->cate_name . '</option>';
														}
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">APR Category Type: </label>
												<div class="col-sm-9">
													<select class="form-control" id="AprCategoryTypeID" name="AprCategoryTypeID">
														<option value=""></option>
														<?php
														foreach($act_aprCategoryType_list as $item) {
															echo '<option value="' . $item->cate_name . '">' . $item->cate_name . '</option>';
														}
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Focus: </label>
												<div class="col-sm-9">
													<select class="form-control" id="FocusID" name="FocusID">
														<option value=""></option>
														<?php
														foreach($act_focus_list as $item) {
															echo '<option value="' . $item->cate_name . '">' . $item->cate_name . '</option>';
														}
														?>
													</select>
												</div>
											</div>

										</div>
									</div>
									<div class="modal-footer">
										<a class="btn btn-success" href="/activity">No Filter</a>
										<button type="submit" class="btn btn-danger">Filter</button>
										<a class="btn btn-primary" data-dismiss="modal">Cancel</a>
									</div>
									</form>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->

						<div class="widget">
							<div class="widget-header transparent">
								<h2>Beyond the Bell Activities</h2>
								<!--
								<div class="additional-btn">
									<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
									<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
									<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
								</div>
								-->
							</div>
							<div class="widget-content">

								<div class="data-table-toolbar">
									<div class="row">
										<!--
										<div class="col-md-4">
											<form role="form">
											<input type="text" class="form-control" placeholder="Search...">
											</form>
										</div>
										-->
										<div class="col-md-12">
											<div class="toolbar-btn-action">
												<?php

												if(gf_cu_rightsActivityAdd()) {
													echo '<a class="btn btn-success" href="/activity/gotoAddActivity"><i class="fa fa-plus-circle"></i> Add an activity</a>';
												}

												?>

												<a class="btn btn-danger md-trigger" data-toggle="modal" data-target="#FilterModal"><i class="fa fa-filter"></i> Filter Calendar</a>
												<a class="btn btn-primary" href="/schools/gotoReports"><i class="fa fa-book"></i> Activity Reports</a>
											</div>
										</div>
									</div>
								</div>


								<div class="table-responsive">

									<table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Activity Name</th>
												<th>School</th>
												<th>Start Date</th>
												<th>End Date</th>
												<th data-sortable="false">Option</th>
											</tr>
										</thead>

										<tbody>


										<?php
                                            if(gf_cu_rightsActivityEdit()) {
                                                $edit_btn_disabled = " ";
                                            } else {
                                                $edit_btn_disabled = " disabled";
                                            }
                                            
											$num = 0;

											foreach($list as $activity) {

												$num++;

												echo '
												<tr>
													<td>'.$num.'</td>
													<td><strong>'.$activity->sessionName.'</strong></td>
													<td>'.$activity->schoolName.'</td>
													<td>'.date_format($activity->startDate, 'm/d/Y H:i A').'</td>
													<td>'.date_format($activity->endDate, 'm/d/Y H:i A').'</td>
													<td>
                                                        <div class="btn-group btn-group-xs">
															<a data-toggle="tooltip" title="Details" class="btn btn-default" href="/activity/gotoEditActivity?activity_id='.$activity->activity_id.'" '.$edit_btn_disabled.'><i class="fa fa-edit"></i></a>
														</div>
                                                    </td>
												</tr>
												';
											}

										?>


										</tbody>
									</table>
								</div>
								<!--
								<div class="data-table-toolbar">
									<ul class="pagination">
									  <li class="disabled"><a href="#">&laquo;</a></li>
									  <li class="active"><a href="#">1</a></li>

									  <li><a href="#">&raquo;</a></li>
									</ul>
								</div>
								-->
							</div>
						</div>
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
	<script src="<?= asset_base_url()?>/libs/jquery-datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-datatables/js/dataTables.bootstrap.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
	<script src="<?= asset_base_url()?>/js/pages/datatables.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

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

			$('#StartTime').timepicker();

			$('#EndTime').timepicker();

			$('.iCheck-helper').click(function () {

				var parent = $(this).parent().get(0);
				var checkboxId = parent.getElementsByTagName('input')[0].id;

				if(checkboxId == "Repeats") {

					if(document.getElementById("Repeats").checked) {
						$('#RepeatsModal').modal('show');
					}

				}

			});
/*
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
					}
				}
			});
*/
		});

	</script>
	</body>
</html>