<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>INVOICE</title>
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
				<!--
				<div class="page-heading">
            		<h1><i class='fa fa-file'></i> INVOICE</h1>
				</div>
				-->
            	<!-- Page Heading End-->

				<?php
					if($error) {
						echo '<div class="alert alert-danger nomargin">'.$error.'</div>';
					}
				?>

				<!-- Your awesome content goes here -->
				<form id="registerForm" name="registerForm" method="post" action="/student/completePending">
				<div class="widget invoice" id="InvoiceContents" name="InvoiceContents">
					<div class="widget-content padding">
					<div class="row">
						<div class="col-sm-4">
							<div class="company-column">
							<h4><img src="/images/pay_logo.png" alt="Logo"></h4>

								<address>
									<span id="LabelBillingAddress" name="LabelBillingAddress"><?= $invoice->billingAddress1?> <?php if($invoice->billingAddress2) echo $invoice->billingAddress2; ?></span><br>
									<span id="LabelBillingCityStateZip" name="LabelBillingCityStateZip"><?= $invoice->billingCity?>, <?= $invoice->billingState ?>, <?= $invoice->billingZipCode ?></span><br>
									<span id="LabelBillingPhoneNumber" name="LabelBillingPhoneNumber"><?= $invoice->billingPhoneNumber ?></span><br>
								</address>
							</div>
							
						</div>
						<div class="col-sm-8 text-right">
							<h1>INVOICE</h1>
							<h4><?= $invoice->invoiceCode?></h4>
							<a href="#" class="btn btn-primary btn-sm invoice-print no-print" onclick="jQuery('#InvoiceContents').print()"><i class="icon-print-2"></i> Print</a>
						</div>
					</div>
					
					<div class="bill-to">
						<div class="row">
							<div class="col-sm-6">
								<h4><strong><?= $parent->username?></strong></h4>
								<address>
									<span id="LabelAddress" name="LabelAddress"><?= $invoice->address1?> <?php if($invoice->address2) echo $invoice->address2; ?></span><br>
									<span id="LabelCityStateZip" name="LabelCityStateZip"><?= $invoice->city?>, <?= $invoice->state ?>, <?= $invoice->zipCode ?></span><br>
									<span id="LabelPhoneNumber" name="LabelPhoneNumber"><?= $invoice->phoneNumber?></span><br>
								</address>
							</div>
							<div class="col-sm-6"><br>
								<small class="text-right">
								<p><strong>DATE : </strong> <?= gf_utc2us_date($invoice->createdAt, "M d, Y") ?></p>
								<!--<p><strong>ORDER ID : </strong> #123456</p>-->
								</small>
							</div>
						</div>
					</div>

					<br><br>
					
					<div class="table-responsive">
						
						<table class="table table-condensed table-striped">
							<thead>
								<tr>
									<th>ITEMS</th>
									<th>QTY</th>
									<th>UNIT PRICE</th>
									<th width="100">TOTAL</th>
								</tr>
							</thead>
							
							<tbody>
								<?php

									foreach($list as $item) {

										echo '
											<tr>
												<td>Registration Fee</td>
												<td>1</td>
												<td>&#36;'.$item->reg_fee.'</td>
												<td>&#36;'.$item->reg_fee.'</td>
											</tr>
											<tr>
												<td>'.$item->activity['name'].'</td>
												<td>';
													$fee = $item->fee;
													if($fee["kind"] == "Weekly")
														echo $fee['name'].'( '.$fee['weeks'].'weeks )';
													else
														echo $fee['name'].'( Once )';

												echo '
												</td>
												<td id="Price_'.$item->student_id.'">&#36;'.$fee['price'].'</td>
												<td id="Total_'.$item->student_id.'">&#36;';
													if($fee["kind"] == "Weekly")
														echo $fee['price'] * $fee['weeks'];
													else
														echo $fee['price'];
												echo '
												</td>
											</tr>
										';

									}

								?>
								<tr>
									<td colspan="3" class="text-right"><strong>Subtotal</strong></td>
									<td id="SubtotalLbl" name="SubtotalLbl">&#36;<?= $invoice->subtotalAmount?></td>
								</tr>
								<tr>
									<td colspan="3" class="text-right"><strong>Discount</strong></td>
									<td><strong class="text-red-1" id="DiscountAmountLbl" name="DiscountAmountLbl"><?php if($invoice->discountAmount > 0) echo '&#36;'.$invoice->discountAmount?></strong></td>
								</tr>
								<tr>
									<td colspan="3" class="text-right"><strong>TOTAL Paid</strong></td>
									<td><strong class="text-primary"><span id="TotalAmountLbl" name="TotalAmountLbl">&#36;<?php echo $invoice->totalAmount?></span></strong></td>
								</tr>
							</tbody>
							
						</table>
						<?php
							if($invoice->status == BILLING_STATUS_PENDING)
								echo '<div class="alert alert-warning no-print"><h4>'.$invoice->status.'</h4><button type="submit"  class="btn btn-success btn-lg invoice-print no-print" id="PayWithCashBtn" name="PayWithCashBtn"> Complete Payment</button></div>';
							else if($invoice->status == BILLING_STATUS_PAID)
								echo '<div class="alert alert-success no-print"><h4>'.$invoice->status.'</h4></div>';
						?>

						<p class="text-right payment-methods"><i class="fa fa-cc-visa"></i> <i class="fa fa-cc-mastercard"></i> <i class="fa fa-cc-discover"></i> <i class="fa fa-cc-amex"></i> <i class="fa fa-cc-paypal"></i> <i class="fa fa-cc-stripe"></i></p>
					</div>
					</div>
				</div>
					<input type="hidden" id="sel_id" name="sel_id" value="<?=$invoice->invoice_id?>">
					<input type="hidden" id="parent_id" name="parent_id" value="<?= $parent->user_id?>">
				</form>
				<!-- End of your awesome content -->

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
	<script src="<?= asset_base_url()?>/js/jquery.print.js"></script>
	<script src="https://checkout.stripe.com/checkout.js"></script>

	</body>
</html>