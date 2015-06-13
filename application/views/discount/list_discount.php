<!DOCTYPE html>
<html>
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
            		<h1><i class='fa fa-laptop'></i> Discount Management</h1>
            		<h3></h3>            	</div>
            	<!-- Page Heading End-->				<!-- Your awesome content goes here -->

				<form role="form" action="/discount" method="post" id="listForm" name="listForm" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<div class="widget">
							<div class="widget-header transparent">
								<h2><strong>Beyond the Bell</strong> - Discounts List</h2>
								<!--
								<div class="additional-btn">
									<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
									<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
									<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
								</div>
								-->
							</div>
							<div class="widget-content">
								<?php
								if(gf_cu_rightsDiscountAdd()) {
									echo '
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
													<a class="btn btn-success" onclick="go_addview();"><i class="fa fa-plus-circle"></i> Add new</a>
												</div>
											</div>
										</div>
									</div>
									';
								}



								?>
								<div class="table-responsive">

									<table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
										<tr>
											<th>No</th>
											<th>Name</th>
											<th>Code</th>
											<th>Description</th>
											<th>Amount</th>
											<th>Status</th>
											<th data-sortable="false">Option</th>
										</tr>
										</thead>

										<tbody>


										<?php


										if(gf_cu_rightsDiscountEdit()) {
											$edit_btn_disabled = " ";
										} else {
											$edit_btn_disabled = " disabled";
										}



										$num = ($PageNum-1) * $RowsPerPage;

										foreach($list as $discount) {

											$num++;

											if($discount->type == "Amount") {
												$amount = '$'.$discount->amount;
											} else if($discount->type == "Percent") {
												$amount = $discount->amount.'%';
											}

											if($discount->status == "Live") {

												$status = '<span class="label label-success">' . $discount->status . '</span>';

												if(!$discount->neverExpires) {

													if($discount->expireDate < new DateTime()) {

														$expired = date_format($discount->expireDate, "m/d/Y");

														$status = '<span class="label label-warning">Expired('.$expired.')</span>';

													}

												}

											} else if($discount->status == "Not Live") {

												$status = '<span class="label label-danger">'.$discount->status.'</span>';
											}

											echo '

												<tr>
													<td>'.$num.'</td>
													<td>'.$discount->name.'</td>
													<td>'.$discount->code.'</td>
													<td>'.$discount->desc.'</td>
													<td>'.$amount.'</td>
													<td>'.$status.'</td>
													<td>
														<div class="btn-group btn-group-xs">
															<a data-toggle="tooltip" title="Edit" class="btn btn-default" onclick="go_editview(\''.$discount->discount_id.'\');" '.$edit_btn_disabled.'><i class="fa fa-edit"></i></a>
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
					<input type="hidden" id="sel_id" name="sel_id" value="<?php echo $sel_id;?>">
				</form>
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
        <script src="<?= asset_base_url()?>/libs/jquery-datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?= asset_base_url()?>/libs/jquery-datatables/js/dataTables.bootstrap.js"></script>
        <script src="<?= asset_base_url()?>/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
        <script src="<?= asset_base_url()?>/js/pages/datatables.js"></script>

	<script>



		$(document).ready(function() {


		});

		function go_editview(sel_id) {

			document.getElementById("sel_id").value = sel_id;
			document.getElementById("listForm").action = "/discount/editview";
			document.getElementById("listForm").submit();
		}

		function go_addview() {
			document.getElementById("listForm").action = "/discount/addview";
			document.getElementById("listForm").submit();
		}



	</script>
	</body>
</html>