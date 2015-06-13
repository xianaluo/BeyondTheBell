<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Record Attendance</title>
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
	<!-- DetailModal -->
	<div id="DetailsModal" name="DetailsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Details</h4>
				</div>
				<div class="modal-body ">
					<div class="widget-content padding form-horizontal">
						<div class="form-group">
							<label class="col-sm-3 control-label">Student Name: </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="Details_StudentName" name="Details_StudentName">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Parent Name: </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="Details_ParentName" name="Details_ParentName">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Special Instructions: </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="Details_Instructions" name="Details_Instructions">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Status: </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="Details_Status" name="Details_Status">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>

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
            		<h1><i class='fa fa-calendar'></i>  <strong><?= $attendDate?></strong> Attendance for <strong><?= $activityName?></strong></h1>
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
								<form role="form" action="/attendance/record" method="post" id="registerForm">
								<?php
								if(gf_cu_rightsAdd()) {
									echo '

										<div class="data-table-toolbar">
											<div class="row">
												<div class="col-md-12">
													<div class="toolbar-btn-action">
														<button class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
													</div>
												</div>
											</div>
										</div>';
								}
								?>

								<div class="table-responsive">

									<table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Student Name</th>
												<th>Parent Name</th>
												<th>Special Instructions</th>
												<th>Status</th>
												<th data-sortable="false">Attendance</th>
											</tr>
										</thead>

										<tbody>


										<?php

											$num = 0;

											foreach($list as $student) {

												$num++;

												if($student['attendance'])
													$attend_check = " checked";
												else
													$attend_check = "";

												echo '
												<tr style="cursor:pointer">
													<td onclick="viewDetail(\''.$student['student_id'].'\', \''.$student['name'].'\', \''.$student['parent'].'\', \''.$student['instructions'].'\', \''.$student['status'].'\');">'.$num.'</td>
													<td onclick="viewDetail(\''.$student['student_id'].'\', \''.$student['name'].'\', \''.$student['parent'].'\', \''.$student['instructions'].'\', \''.$student['status'].'\');"><strong>'.$student['name'].'</strong></td>
													<td onclick="viewDetail(\''.$student['student_id'].'\', \''.$student['name'].'\', \''.$student['parent'].'\', \''.$student['instructions'].'\', \''.$student['status'].'\');">'.$student['parent'].'</td>
													<td onclick="viewDetail(\''.$student['student_id'].'\', \''.$student['name'].'\', \''.$student['parent'].'\', \''.$student['instructions'].'\', \''.$student['status'].'\');"></td>
													<td onclick="viewDetail(\''.$student['student_id'].'\', \''.$student['name'].'\', \''.$student['parent'].'\', \''.$student['instructions'].'\', \''.$student['status'].'\');"><span class="label label-success">'.$student['status'].'</span></td>
													<td data-id="'.$student['student_id'].'"><input type="checkbox" class="ios-switch ios-switch-success ios-switch-sm" id="AttendChk_'.$student['student_id'].'" name="Attendance[]" value="'.$student['student_id'].'" '.$attend_check.'/></td>
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
									<input type="hidden" id="activity_id" name="activity_id" value="<?= $activity_id ?>">
									<input type="hidden" id="attendDate" name="attendDate" value="<?= $attendDate ?>">
								</form>
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

		function viewDetail(student_id, studentName, parentName, instructions, status)
		{
			$("#Details_StudentName").val(studentName);
			$("#Details_ParentName").val(parentName);
			$("#Details_Instructions").val(instructions);
			$("#Details_Status").val(status);
			$("#DetailsModal").modal("show");
		}

		$(document).ready(function() {

<?php
		echo '
			var activity_id = "'.$activity_id.'";
			var attendDate = "'.$attendDate.'";
		';
?>
/*
			$('.iswitch').click(function () {

				var student_id = $(this).parent().data("id");

				var attendance = document.getElementById("AttendChk_" + student_id).checked;

				var get_url = "/attendance/checkAttendance?activity_id=" + activity_id + "&attendDate=" + attendDate + "&student_id=" + student_id + "&attendance=" + attendance;

				//alert(get_url);

				$.getJSON(get_url, function (data){

					if(data[0]) {

					} else {

						if(attendance)
							$(this).attr('class', 'iswitch ios-switch-success ios-switch-sm off');
						else
							$(this).attr('class', 'iswitch ios-switch-success ios-switch-sm on');
					}
				});

			});
*/
		});

	</script>
	</body>
</html>