<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BTB Supports</title>
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
        <link rel="apple-touch-icon" sizes="152x152" href="<?= asset_base_url()?>/img/apple-touch-icon-152x152.png" />


    </head>
    <body class="fixed-left">
	<?php

		$this->load->view("parents/common/modal");
	?>
	<!-- Begin page -->
	<div id="wrapper">

		<?php
			$this->load->view("parents/common/topbar.php");
			$this->load->view("parents/common/leftsidebar.php");
			$this->load->view("parents/common/rightsidebar.php");
		?>

		<!-- Start right content -->
		<div class="content-page">

				<!-- ============================================================== -->
				<!-- Start Content here -->
				<!-- ============================================================== -->

				<div class="content">
					<!-- Page Heading Start -->
					<div class="page-heading">
						<h1><i class='icon-megaphone'></i> BTB Supports</h1>
					</div>

					<div class="row">

						<div class="col-sm-12">
							<div class="widget widget-tabbed">

								<!-- Tab panes -->
								<div class="tab-content">
									<form role="form" action="/parents/support/send" method="post" id="registerForm" enctype="multipart/form-data">

									<!-- Tab about -->

									<div class="tab-pane animated active fadeInRight" id="about">
										<div class="user-profile-content">
											<?php
											if($error) {
												echo '<div class="alert alert-danger ">'.$error.'</div>';
											}

											if(validation_errors()) {
												echo '<div class="alert alert-danger ">'.validation_errors().'</div>';
											}
											?>
											<div class="row">
												<div class="col-sm-1"></div>
												<div class="col-sm-10">

													<div class="form-group">
														<label for="exampleInputEmail1">Title</label>
														<input type="text" class="form-control" id="Title" name="Title" placeholder="" value="<?php echo set_value('Title'); ?>">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Topic</label>
														<select class="form-control" id="Topic" name="Topic">
															<?php
															foreach($topic_list as $topic_one) {
																if(set_value('Topic') == $topic_one->cate_name) {
																	echo '<option value="' . $topic_one->cate_name . '" selected>' . $topic_one->cate_name . '</option>';
																} else {
																	echo '<option value="' . $topic_one->cate_name . '">' . $topic_one->cate_name . '</option>';
																}
															}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Subject</label>
														<textarea class="form-control" id="Subject" name="Subject" style="height: 200px"><?php echo set_value('Subject'); ?></textarea>

													</div>

													<button type="submit" class="btn btn-primary">Send</button>

												</div>
												<div class="col-sm-1"></div>
											</div><!-- End div .row -->


										</div><!-- End div .user-profile-content -->
									</div><!-- End div .tab-pane -->
									<!-- End Tab about -->


									</form>


								</div><!-- End div .tab-content -->
							</div><!-- End div .box-info -->
						</div>
					</div>
					<?php
						$this->load->view("parents/common/footer.php");
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

		function autohidenotify(style,position, title, text) {
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
			$.notify({
				title: title,
				text: text,
				image: "<i class='"+icon+"'></i>"
			}, {
				style: 'metro',
				className: style,
				globalPosition:position,
				showAnimation: "show",
				showDuration: 0,
				hideDuration: 0,
				autoHideDelay: 5000,
				autoHide: true,
				clickToHide: true
			});
		}

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


<?php

	if($success) {
		echo '

			autohidenotify("success", "top right", "Sucess", "Your message was sent successfully to Beyond the BELL!");

		';
	}
?>

			$('#registerForm').bootstrapValidator({
				message: 'This value is not valid',
				fields: {
					Title: {
						message: 'Title is not valid',
						validators: {
							notEmpty: {
								message: 'Title is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[a-zA-Z0-9_\. ]+$/,
								message: 'Title can only consist of alphabetical, number, space, dot and underscore'
							}
						}
					},
					Subject: {
						message: 'Subject is not valid',
						validators: {
							notEmpty: {
								message: 'Subject is required and can\'t be empty'
							},
							regexp: {
								regexp: /^[a-zA-Z0-9_\. ]+$/,
								message: 'Subject can only consist of alphabetical, number, space, dot and underscore'
							}
						}
					}
				}
			});

		});

	</script>

	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var $_Tawk_API={},$_Tawk_LoadStart=new Date();
		(function(){
			var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
			s1.async=true;
			s1.src='https://embed.tawk.to/54c16c738db806621cde8444/default';
			s1.charset='UTF-8';
			s1.setAttribute('crossorigin','*');
			s0.parentNode.insertBefore(s1,s0);
		})();
	</script>
	<!--End of Tawk.to Script-->

	</body>
</html>