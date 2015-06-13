<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Attendance Report</title>
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

		<style>.datepicker { z-index: 1151 !important;  }</style>

    </head>
    <body class="fixed-left">
	<?php

		$this->load->view("common/modal");

	?>

	<!-- DetailModal -->
	<!-- Filter modal -->
	<div id="FilterModal" name="FilterModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form role="form" action="/reports/filterAttend" method="post" id="registerForm" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Filter Attendance</h4>
					</div>
					<div class="modal-body ">
						<div class="widget-content padding form-horizontal">

							<div class="form-group">
								<label class="col-sm-3 control-label">Start Date: </label>
								<div class="col-sm-9">
									<input type="text" class="form-control datepicker-input" id="StartDate" name="StartDate" value="<?= $StartDate?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">End Date: </label>
								<div class="col-sm-9">
									<input type="text" class="form-control datepicker-input" id="EndDate" name="EndDate" value="<?= $EndDate?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">School: </label>
								<div class="col-sm-9">
									<select class="form-control selectpicker" multiple data-selected-text-format="count>3" data-size="5" data-live-search = "true" id="School[]" name="School[]">
										<?php
										foreach($school_list as $school_one) {

											if(in_array($school_one->school_id, $School))
												echo '<option value="' . $school_one->school_id . '" selected>' . $school_one->schoolName . '</option>';
											else
												echo '<option value="' . $school_one->school_id . '">' . $school_one->schoolName . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Activity: </label>
								<div class="col-sm-9">
									<select class="form-control selectpicker" multiple data-selected-text-format="count>3" data-size="5" data-live-search = "true" id="Activity[]" name="Activity[]">
										<?php
										foreach($activity_list as $activity_one) {

											if(in_array($activity_one->activity_id, $Activity))
												echo '<option value="' . $activity_one->activity_id . '" selected>' . $activity_one->sessionName . '</option>';
											else
												echo '<option value="' . $activity_one->activity_id . '">' . $activity_one->sessionName . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Student: </label>
								<div class="col-sm-9">
									<select class="form-control selectpicker" multiple data-selected-text-format="count>3" data-size="5" data-live-search = "true" id="Student[]" name="Student[]">
										<?php
										foreach($student_list as $student_one) {

											$fullname = $student_one->firstName;
											if($student_one->middleInitial) {
												$fullname .= ' '.$student_one->middleInitial;
											}
											$fullname .= ' '.$student_one->lastName;

											if(in_array($student_one->student_id, $Student))
												echo '<option value="' . $student_one->student_id . '" selected>' . $fullname . '</option>';
											else
												echo '<option value="' . $student_one->student_id . '">' . $fullname . '</option>';
										}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger" id="FilterBtn"> Apply </button>
						<a class="btn btn-primary" data-dismiss="modal"> Cancel </a>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

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
            		<h1><i class='fa fa-book'></i> Attendance Report</h1>
            		<h3></h3>
				</div>
            	<!-- Page Heading End-->				<!-- Your awesome content goes here -->

				<div class="row">
					<div class="col-md-12">

						<div class="widget">

							<div class="widget-header transparent">
								<!--
								<h2>Beyond the Bell Activities</h2>
								<div class="additional-btn">
									<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
									<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
									<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
								</div>
								-->
								<?php
									if($error) {
										echo '<div class="alert alert-danger nomargin">'.$error.'</div>';
									}

									if(validation_errors()) {
										echo '<div class="alert alert-danger nomargin">'.validation_errors().'</div>';
									}
								?>
							</div>
							<div class="widget-content">


								<div class="data-table-toolbar">
									<div class="row">
										<div class="col-md-12">
											<div class="toolbar-btn-action">
												<a class="btn btn-danger md-trigger" data-toggle="modal" data-target="#FilterModal"><i class="fa fa-filter"></i> Filter</a>
												<button class="btn btn-primary" id="DownloadPDFBtn"><i class="fa fa-download"></i> Download PDF</button>
												<button class="btn btn-primary" id="DownloadCSVBtn"><i class="fa fa-download"></i> Download CSV</button>
											</div>
										</div>
									</div>
								</div>
								<div class="table-responsive">

									<table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Student Name</th>
												<th>School</th>
												<th>Activity</th>
												<th>Date</th>
												<th>Attendance</th>
											</tr>
										</thead>
										<tbody>
										<?php

											$num = 0;

											foreach($list as $item_one) {

												$num++;

												if($item_one['attendance']) {
													$attendance = '<span class="label label-success">Yes</span>';
												} else {
													$attendance = '<span class="label label-danger">No</span>';
												}

												echo '
												<tr>
													<td >'.$num.'</td>
													<td ><strong>'.$item_one['student'].'</strong></td>
													<td >'.$item_one['school'].'</td>
													<td >'.$item_one['activity'].'</td>
													<td >'.date_format($item_one['attendDate'],"m/d/Y").'</td>
													<td >'.$attendance.'</td>
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
	<script src="<?= asset_base_url()?>/libs/bootstrap-multiselect/js/bootstrap-select.js"></script>
	<script>

		$(document).ready(function() {
			$("#FilterBtn").click(function() {
				$("#registerForm").attr("action", "/reports/filterAttend");
			});

			$("#DownloadPDFBtn").click(function() {
				$("#registerForm").attr("action", "/reports/downloadpdf");
				$("#registerForm").submit();
			});

			$("#DownloadCSVBtn").click(function() {
				$("#registerForm").attr("action", "/reports/downloadcsv");
				$("#registerForm").submit();
			});
		});

	</script>
	</body>
</html>