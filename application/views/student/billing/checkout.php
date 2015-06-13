<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Checkout</title>
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
	<?php

		$Billing_Address1 = "2500 Glenn Ave #78";
		$Billing_Address2 = "";
		$Billing_City = "Sioux City";
		$Billing_State = "IA";
		$Billing_ZipCode = "51106";
		$Billing_PhoneNumber = "(712) 277-3600";

		$ParentName = $parent->username;
		$Address1 = $parent->address1;
		$Address2 = $parent->address2;
		$City = $parent->city;
		$State = $parent->state;
		$ZipCode = $parent->zipCode;
		$PhoneNumber = $parent->phoneNumber;
	?>

	<!-- ChangeAddressModal -->
	<div id="ChangeAddressModal" name="ChangeAddressModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Change address</h4>
				</div>
				<div class="modal-body ">
					<div class="widget-content padding form-horizontal">
						<div class="form-group">
							<label class="col-sm-3 control-label">Address1: </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="ChangeAddress_Address1" name="ChangeAddress_Address1" value="<?= $Address1?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Address2: </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="ChangeAddress_Address2" name="ChangeAddress_Address2" value="<?= $Address2?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">City: </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="ChangeAddress_City" name="ChangeAddress_City" value="<?= $City?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">State: </label>
							<div class="col-sm-9">
								<select class="form-control" id="ChangeAddress_State" name="ChangeAddress_State">
									<?php
									foreach($arr_state as $state) {
										if($State == $state->cate_id)
											echo '<option value="'.$state->cate_id.'" selected>'.$state->cate_name.'</option>';
										else
											echo '<option value="'.$state->cate_id.'">'.$state->cate_name.'</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Zip Code: </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="ChangeAddress_ZipCode" name="ChangeAddress_ZipCode" value="<?= $ZipCode?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Phone Number: </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="ChangeAddress_PhoneNumber" name="ChangeAddress_PhoneNumber" value="<?= $PhoneNumber?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label"></label>
							<div class="col-sm-9">
								<label class="checkbox-inline icheckbox">
									<input type="checkbox" id="ChangeAddress_ApplyProfile" name="ChangeAddress_ApplyProfile">Apply to Profile
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal" id="ChangeAddress_ApplyBtn" name="ChangeAddress_ApplyBtn">Apply</button>
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
				<form id="registerForm" name="registerForm" method="post" action="/student/pay">
				<div class="widget invoice" id="InvoiceContents" name="InvoiceContents">
					<div class="widget-content padding">
					<div class="row">
						<div class="col-sm-4">
							<div class="company-column">
							<h4><img src="/images/pay_logo.png" alt="Logo"></h4>

								<address>
									<span id="LabelBillingAddress" name="LabelBillingAddress"><?= $Billing_Address1?> <?php if($Billing_Address2) echo $Billing_Address2; ?></span><br>
									<span id="LabelBillingCityStateZip" name="LabelBillingCityStateZip"><?= $Billing_City?>, <?= $Billing_State ?> <?= $Billing_ZipCode ?></span><br>
									<span id="LabelBillingPhoneNumber" name="LabelBillingPhoneNumber"><?= $Billing_PhoneNumber?></span><br>
									<!--<a href="#" class="no-print" id="ChangeBillingBtn" name="ChangeBillingBtn" data-toggle="modal" data-target="#ChangeBillingModal">Change billing address</a>-->
								</address>
							</div>
							
						</div>
						<div class="col-sm-8 text-right">
							<h1>INVOICE</h1>
							<h4><?= $invoice_code?></h4>
							<a href="#" class="btn btn-primary btn-sm invoice-print no-print" onclick="jQuery('#InvoiceContents').print()"><i class="icon-print-2"></i> Print</a>
						</div>
					</div>
					
					<div class="bill-to">
						<div class="row">
							<div class="col-sm-6">
								<h4><strong><?= $ParentName?></strong></h4>
								<address>
									<span id="LabelAddress" name="LabelAddress"><?= $Address1?> <?php if($Address2) echo $Address2; ?></span><br>
									<span id="LabelCityStateZip" name="LabelCityStateZip"><?= $City?>, <?= $State ?>, <?= $ZipCode ?></span><br>
									<span id="LabelPhoneNumber" name="LabelPhoneNumber"><?= $PhoneNumber?></span><br>
									<a href="#" class="no-print" id="ChangeAddressBtn" name="ChangeAddressBtn" data-toggle="modal" data-target="#ChangeAddressModal">Change address</a>
								</address>
							</div>
							<div class="col-sm-6"><br>
								<small class="text-right">
								<p><strong>DATE : </strong> <?= date("M d, Y");?></p>
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
												<td>&#36;'.$registration_fee.'</td>
												<td>&#36;'.$registration_fee.'</td>
											</tr>
											<tr>
												<td>'.$item->activity['name'].'</td>
												<td>
												<select class="form-control" onchange="changeFee(\''.$item->student_id.'\')" id="Item_'.$item->student_id.'" name="Item_'.$item->student_id.'">';

													foreach($item->activity['fee_list'] as $fee) {
														if($fee["kind"] == "Weekly")
															echo '<option id="Fee_'.$fee['id'].'" name="Fee_'.$fee['id'].'" data-price="'.$fee['price'].'" data-weeks="'.$fee['weeks'].'" value="'.$fee['id'].'">'.$fee['name'].'( '.$fee['weeks'].'weeks )</option>';
														else
															echo '<option id="Fee_'.$fee['id'].'" name="Fee_'.$fee['id'].'" data-price="'.$fee['price'].'" data-weeks="1" value="'.$fee['id'].'">'.$fee['name'].'( Once )</option>';
													}

												echo '
												</select>
												</td>
												<td id="Price_'.$item->student_id.'"></td>
												<td id="Total_'.$item->student_id.'"></td>
											</tr>
										';

									}

								?>
								<tr>
									<td colspan="3" class="text-right"><strong>Subtotal</strong></td>
									<td id="SubtotalLbl" name="SubtotalLbl"></td>
								</tr>
								<tr>
									<td colspan="3" class="text-right">
										<span class="no-print">
											Code:
											<input type="text" id="VerifyCode" name="VerifyCode" style="40px">
											<a class="btn-xs btn-danger" id="DiscountVerifyBtn" name="DiscountVerifyBtn" style="cursor: pointer">Verify</a>&nbsp;&nbsp;
										</span>
										<strong>Discount</strong></td>
									<td><strong class="text-red-1" id="DiscountAmountLbl" name="DiscountAmountLbl"></strong></td>
								</tr>
								<tr>
									<td colspan="3" class="text-right"><strong>TOTAL</strong></td>
									<td><strong class="text-primary"><span id="TotalAmountLbl" name="TotalAmountLbl"></span></strong></td>
								</tr>
							</tbody>
							
						</table>
						<br><br>
						<span class="no-print" style="margin: 10px"><input type="checkbox" class="form-control" id="PayWithCash" name="PayWithCash"> Pay with Cash</span>
						<button type="submit"  class="btn btn-success btn-lg invoice-print no-print" id="PayWithCardBtn" name="PayWithCardBtn"> Pay with Card</button>
						<button type="submit"  class="btn btn-success btn-lg invoice-print no-print" id="PayWithCashBtn" name="PayWithCashBtn" style="display: none"> Complete</button>
						<!-- <h4 class="text-center">Thank you for your payment!</h4><br><br> -->
						<p class="text-right payment-methods"><i class="fa fa-cc-visa"></i> <i class="fa fa-cc-mastercard"></i> <i class="fa fa-cc-discover"></i> <i class="fa fa-cc-amex"></i> <i class="fa fa-cc-paypal"></i> <i class="fa fa-cc-stripe"></i></p>
					</div>
					</div>
				</div>
					<input type="hidden" id="BillingAddress1" name="BillingAddress1" value="<?= $Billing_Address1 ?>">
					<input type="hidden" id="BillingAddress2" name="BillingAddress2" value="<?= $Billing_Address2 ?>">
					<input type="hidden" id="BillingCity" name="BillingCity" value="<?= $Billing_City ?>">
					<input type="hidden" id="BillingState" name="BillingState" value="<?= $Billing_State ?>">
					<input type="hidden" id="BillingZipCode" name="BillingZipCode" value="<?= $Billing_ZipCode ?>">
					<input type="hidden" id="BillingPhoneNumber" name="BillingPhoneNumber" value="<?= $Billing_PhoneNumber ?>">
					<input type="hidden" id="Address1" name="Address1" value="<?= $Address1 ?>">
					<input type="hidden" id="Address2" name="Address2" value="<?= $Address2 ?>">
					<input type="hidden" id="City" name="City" value="<?= $City ?>">
					<input type="hidden" id="State" name="State" value="<?= $State ?>">
					<input type="hidden" id="ZipCode" name="ZipCode" value="<?= $ZipCode ?>">
					<input type="hidden" id="PhoneNumber" name="PhoneNumber" value="<?= $PhoneNumber ?>">
					<input type="hidden" id="InvoiceCode" name="InvoiceCode" value="<?= $invoice_code ?>">
					<input type="hidden" id="DiscountCode" name="DiscountCode" >
					<input type="hidden" id="DiscountAmount" name="DiscountAmount" >
					<input type="hidden" id="SubtotalAmount" name="SubtotalAmount" >
					<input type="hidden" id="TotalAmount" name="TotalAmount" >
					<input type="hidden" id="Token" name="Token">
					<input type="hidden" id="sel_id" name="sel_id" value="<?= $sel_id?>">
					<input type="hidden" id="parent_id" name="parent_id" value="<?= $parent->user_id?>">
					<?php
						foreach($list as $item) {
							echo '<input type="hidden" id="Item[]" name="Item[]" value="'.$item->student_id.'">';
						}
					?>
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

	<script>


		var discount_valid = false;
		var discount_type;
		var discount_amount;
		var total_amount;

<?php
	echo '
		var item_arr = [];
		var registraion_fee = '.$registration_fee.';
	';
	for($i=0;$i<count($list);$i++) {
		echo '
		item_arr['.$i.'] = "'.$list[$i]->student_id.'";
		';
	}
?>


		function changeFee(item_id) {
			/*
			var fee_id = document.getElementById("Item_" + item_id).value;
			var price = $("#Fee_"+fee_id).data("price");
			var weeks = $("#Fee_"+fee_id).data("weeks");
			$("#Price_"+item_id).text("$"+price);
			$("#Total_"+item_id).text("$"+price*weeks);
			*/
			refreshPrice();
		}

		function refreshPrice() {

			var total_amount = registraion_fee * item_arr.length;

			for(var i=0;i<item_arr.length;i++) {
				var item_id = item_arr[i];
				var fee_id = document.getElementById("Item_" + item_id).value;
				var price = $("#Fee_"+fee_id).data("price");
				var weeks = $("#Fee_"+fee_id).data("weeks");

				$("#Price_"+item_id).text("$"+price);
				$("#Total_"+item_id).text("$"+price*weeks);

				total_amount += price * weeks;
			}

			var subtotal = total_amount;

			if(discount_valid) {

				var amount;

				if(discount_type == "Amount") {

					amount = discount_amount;

				} else if(discount_type == "Percent") {

					amount = (total_amount * discount_amount/100);

				}

				$("#DiscountAmountLbl").text("$"+amount);
				$("#DiscountAmount").val(amount);

				total_amount -= amount;

			} else {

				$("#DiscountAmountLbl").text("");
				$("#DiscountAmount").val(0);
			}

			$("#SubtotalLbl").text("$"+subtotal);
			$("#TotalAmountLbl").text("$"+total_amount);
			$("#SubtotalAmount").val(subtotal);
			$("#TotalAmount").val(total_amount);

		}

		$(document).ready(function() {


			refreshPrice();


			var handler = StripeCheckout.configure({
				key: '<?= $PUBLISH_API_KEY?>',
				image: '/images/pay_logo.png',
				token: function(token) {
					// Use the token to create the charge with a server-side script.
					// You can access the token ID with `token.id`
					$("#Token").val(token.id);
					$("#registerForm").submit();
				}
			});

			$('#PayWithCardBtn').on('click', function(e) {

				var pay = $("#TotalAmount").val();

				// Open Checkout with further options
				handler.open({
					name: 'Beyond the Bell',
					description: '$' + pay,
					amount: pay*100
				});
				e.preventDefault();
			});

			// Close Checkout on page navigation
			$(window).on('popstate', function() {
				handler.close();
			});


			$("#DiscountVerifyBtn").click(function() {

				var code = $("#VerifyCode").val();

				if(code == 0 || code == "") return;

				var get_url = "/student/verifyDiscount?code=" + code;

				$.getJSON(get_url, function (data){

					discount_valid = data["result"];
					discount_type = data["type"];
					discount_amount = data["amount"];

					if(discount_valid) {

						$("#DiscountCode").val(code);

					} else {
						$("#DiscountCode").val("");
					}

					refreshPrice();

				});


			});

			$('.iCheck-helper').click(function () {

				var parent = $(this).parent().get(0);
				var checkboxId = parent.getElementsByTagName('input')[0].id;

				if(checkboxId == "PayWithCash") {

					if(document.getElementById("PayWithCash").checked) {

						$('#PayWithCashBtn').css("display", "inline");
						$('#PayWithCardBtn').css("display", "none");


					} else {

						$('#PayWithCashBtn').css("display", "none");
						$('#PayWithCardBtn').css("display", "inline");
					}

				}

			});

			$(window).keydown(function(event){
				if(event.keyCode == 13) {
					event.preventDefault();
					return false;
				}
			});

			$("#ChangeBilling_ApplyBtn").click(function(){

				$("#LabelBillingAddress").text($("#ChangeBilling_Address1").val() + " " + $("#ChangeBilling_Address2").val());
				$("#LabelBillingCityStateZip").text($("#ChangeBilling_City").val() + ", " + $("#ChangeBilling_State").val() + ", " + $("#ChangeBilling_ZipCode").val());
				$("#LabelBillingPhoneNumber").text($("#ChangeBilling_PhoneNumber").val());

				$("#BillingAddress1").val($("#ChangeBilling_Address1").val());
				$("#BillingAddress2").val($("#ChangeBilling_Address2").val());
				$("#BillingCity").val($("#ChangeBilling_City").val());
				$("#BillingState").val($("#ChangeBilling_State").val());
				$("#BillingZipCode").val($("#ChangeBilling_ZipCode").val());
				$("#BillingPhoneNumber").val($("#ChangeBilling_PhoneNumber").val());
			});

			$("#ChangeAddress_ApplyBtn").click(function(){

				$("#LabelAddress").text($("#ChangeAddress_Address1").val() + " " + $("#ChangeAddress_Address2").val());
				$("#LabelCityStateZip").text($("#ChangeAddress_City").val() + ", " + $("#ChangeAddress_State").val() + ", " + $("#ChangeAddress_ZipCode").val());
				$("#LabelPhoneNumber").text($("#ChangeAddress_PhoneNumber").val());

				$("#Address1").val($("#ChangeAddress_Address1").val());
				$("#Address2").val($("#ChangeAddress_Address2").val());
				$("#City").val($("#ChangeAddress_City").val());
				$("#State").val($("#ChangeAddress_State").val());
				$("#ZipCode").val($("#ChangeAddress_ZipCode").val());
				$("#PhoneNumber").val($("#ChangeAddress_PhoneNumber").val());

				if(document.getElementById("ChangeAddress_ApplyProfile").checked) {

					var address1 = $("#ChangeAddress_Address1").val();
					var address2 = $("#ChangeAddress_Address2").val();
					var city = $("#ChangeAddress_City").val();
					var state = $("#ChangeAddress_State").val();
					var zipCode = $("#ChangeAddress_ZipCode").val();
					var phoneNumber = $("#ChangeAddress_PhoneNumber").val();
					var parent_id = $("#parent_id").val();

					var get_url = "/student/updateAddress?parent_id=" + parent_id + "&address1=" + address1 + "&address2=" + address2 + "&city=" + city + "&state=" + state + "&zipCode=" + zipCode + "&phoneNumber=" + phoneNumber;

					$.getJSON(get_url, function (data){

					});
				}

			});
		});
	</script>
	</body>
</html>