<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Messages</title>   
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
                <link href="<?= asset_base_url()?>/libs/summernote/summernote.css" rel="stylesheet" type="text/css" />
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
				<div class="page-heading">
            		<h1><i class='fa fa-envelope'></i> E-mail</h1>
            		            	</div>
            	<!-- Page Heading End-->
				
				<!-- Begin Inbox -->
				<div class="box-messages">
					<div class="row">
						<div class="col-md-3">
							<!-- Sidebar Message -->

							<div class="btn-group new-message-btns stacked">
								<a href="/message_center" class="btn btn-primary btn-lg btn-block text-left"><i class="icon-left-open-1"></i> Back to Messages</a>
							</div>
							<div class="list-group menu-message">
								<a href="/message_center/drafts" class="list-group-item"><i class="icon-pencil"></i> Drafts <span class="badge bg-green-1 pull-right"><?php echo $drafts_count; ?></span></a>
								<a href="/message_center/messages" class="list-group-item"><i class="icon-export"></i> Sent</a>
								<a href="/message_center/trash" class="list-group-item"><i class="icon-cup"></i> Trash <span class="badge bg-lightblue-1 pull-right"><?php echo $trash_count; ?></span></a>
								<a href="/message_center/templates" class="list-group-item"><i class="glyphicon glyphicon-folder-open"></i> Templates</a>
                            </div>

							
						</div><!-- ENd div .col-md-2 -->

						<div class="col-md-9">
							<div class="widget" id="MessageContents" name="MessageContents">
								<div class="col-sm-12">
									<!-- Begin read message -->
									<!-- Message -->
									<div class="row">
										<div class="col-sm-8">
											<h3 class="semibold">
												<?php

													if($mode == MODE_TEMPL) {

														echo $selected->name;

													} else {

														echo $selected->subject;
													}

												?>
											</h3>
										</div>
										<div class="col-sm-4">
											<div class="btn-toolbar pull-right" role="toolbar">
												<div class="btn-group">
													<a class="btn btn-sm btn-primary no-print" data-toggle="tooltip" title="Print" onclick="jQuery('#MessageContents').print()"><i class="fa fa-print"></i></a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="mail-sender-details">
												<?php

													if($mode == MODE_TEMPL) {

														echo '<small>';

														echo '<b>Description : </b> <span class="text-muted">'.$selected->desc.'</span><br>';

														if($selected->shareable)
															echo '<b>Shareable</b> <i class="icon-shareable warning"></i><br>';

														echo '</small>';

													} else {

													 	echo '<small>';

														echo '<b>To : </b> <span class="text-muted">'.$selected->to.'</span><br>';

														if($selected->cc)
														echo '<b>Cc : </b> <span class="text-muted">'.$selected->cc.'</span><br>';

														if($selected->bcc)
														echo '<b>Bcc : </b> <span class="text-muted">'.$selected->bcc.'</span><br>';

														echo '<span class="text-muted">'.gf_utc2us_long($selected->updatedAt).'</span>';

														echo '</small>';

													}
												?>
											</div>
										</div>
										<div class="col-sm-6 text-right">
											<div class="btn-group spaced">
												<?php

													if($mode == MODE_TEMPL) {
														echo '<a class="btn btn-danger no-print" href="/message_center/composeby?id='.$selected->template_id.'&by='.$mode.'"> Write on Template</a>';
													} else if($mode == MODE_DRAFTS) {
														echo '<a class="btn btn-danger no-print" href="/message_center/composeby?id='.$selected->message_id.'&by='.$mode.'"> Continue writing</a>';
													} else {
														echo '<a class="btn btn-danger no-print" href="/message_center/composeby?id='.$selected->message_id.'&by='.$mode.'"> Duplicate</a>';
													}
												?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12 mail-body">
											<hr>
											<?php echo $contents; ?>
											<hr>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End div .col-md-10 -->
					</div><!-- End div .row -->
				</div><!-- End div .box-info -->
				<!-- End inbox -->
				
				

				            <!-- Footer Start -->
            <footer>
                Huban Creative &copy; 2014
                <div class="footer-links pull-right">
                	<a href="#">About</a><a href="#">Support</a><a href="#">Terms of Service</a><a href="#">Legal</a><a href="#">Help</a><a href="#">Contact Us</a>
                </div>
            </footer>
            <!-- Footer End -->			
            </div>
			<!-- ============================================================== -->
			<!-- End content here -->
			<!-- ============================================================== -->

        </div>
		<!-- End right content -->

		<!-- Modal New message -->	
		<div class="md-modal md-slide-stick-top" id="new-message">
			<div class="md-content">
			<div class="md-close-btn"><a class="md-close"><i class="fa fa-times"></i></a></div>
				<h3><strong>New</strong> Message</h3>
				<div>
					<form role="form">
						<div class="form-group">
							<input type="text" class="form-control input-lg" placeholder="Message to">
						</div>
						<div class="form-group">
							<input type="text" class="form-control input-lg" placeholder="Message subject">
						</div>
						<div class="form-group">
							<textarea class="summernote-small form-control"></textarea>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<button type="submit" class="btn btn-success btn-sm">Send</button>
								<button class="btn btn-warning btn-sm">Draft</button>
							</div>
							<div class="col-xs-4">
								<p class="quick-post message">
									<a><i class="fa fa-picture-o"></i></a>
									<a><i class="fa fa-video-camera"></i></a>
									<a><i class="icon-attach-3" data-toggle="tooltip" title="Business Contract.pdf - 2,238KB"></i></a>
								</p>
							</div>
						</div>	
					</form>
				</div>
			</div>
		</div>
		<!--
		MODAL OVERLAY
		Always place this div at the end of the page content
		-->
		<div class="md-overlay"></div>
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
	<script src="<?= asset_base_url()?>/libs/summernote/summernote.js"></script>
	<script src="<?= asset_base_url()?>/js/pages/new-message.js"></script>
	<script src="<?= asset_base_url()?>/js/jquery.print.js"></script>
	</body>
</html>