<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>E-mail </title>   
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
		<link href="<?= asset_base_url()?>/libs/bootstrap-validator/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css">
		<link href="<?= asset_base_url()?>/libs/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css">
		<link href="<?= asset_base_url()?>/libs/bootstrap-multiemail/bootstrap-multiemail.css" rel="stylesheet" type="text/css">
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
	<!-- Contact Lookup modal -->
	<div id="ContactModal" name="ContactModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Contact Lookup</h4>
				</div>
				<div class="modal-body ">
					<div class="widget-content padding form-horizontal">
						<div class="table-responsive">

							<table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
								<tr>
									<th>No</th>
									<th>Full Name</th>
									<th>Email</th>
									<th data-sortable="false">Option</th>
								</tr>
								</thead>

								<tbody>


								<?php

								$num = 0;

								foreach($userlist as $user) {

									$num++;

									echo '
												<tr>
													<td>'.$num.'</td>
													<td><strong>'.$user->firstName.($user->lastName == '' ? ' ' : ' '.$user->middleInitial).' '.$user->lastName.'</strong></td>
													<td><a href="mailto:#">'.$user->emailAddress.'</a></td>
													<td>
														<div class="btn-group btn-group-xs">
															<a data-toggle="tooltip" title="Add To" class="btn btn-default" onclick="addTo(\''.$user->emailAddress.'\')">To</a>
															<a data-toggle="tooltip" title="Add Cc" class="btn btn-default" onclick="addCc(\''.$user->emailAddress.'\')">Cc</a>
															<a data-toggle="tooltip" title="Add Bcc" class="btn btn-default" onclick="addBcc(\''.$user->emailAddress.'\')">Bcc</a>
														</div>
													</td>
												</tr>
												';
								}

								?>


								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal"> Close</button>
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

		<form role="form" method="post" id="registerForm" name="registerForm" enctype="multipart/form-data">
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
				<!-- Your awesome content goes here -->
				<div class="box-info box-messages animated fadeInDown">
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

                            <div class="btn-group new-message-btns stacked">
                                <a class="btn btn-primary btn-lg btn-block text-left" data-toggle="modal" data-target="#ContactModal"><i class="glyphicon glyphicon-search"></i> Contact Lookup</a>
                            </div>
						
						</div><!-- ENd div .col-md-2 -->
						
						
						<div class="col-md-9">
							<div class="widget">
								<div class="widget-content padding form-horizontal">
									<?php
										if($mode == MODE_SENT || $mode == MODE_DRAFTS) {
											if($error) {
												echo '<div class="alert alert-danger">'.$error.'</div>';
											}

											if(validation_errors()) {
												echo '<div class="alert alert-danger">'.validation_errors().'</div>';
											}
										}

										//MessageTo
										if(set_value('MessageTo')) {//Validation failed

											$MessageTo = set_value('MessageTo');

										} else {

											if($by) {

												if($by != MODE_TEMPL)
													$MessageTo = $selected->to;

											} else {

												$MessageTo = "";
											}
										}
										//MessageCc
										if(set_value('MessageCc')) {//Validation failed

											$MessageCc = set_value('MessageCc');

										} else {

											if($by) {

												if($by != MODE_TEMPL)
													$MessageCc = $selected->cc;

											} else {

												$MessageCc = "";
											}
										}
											if($MessageCc) $cc_display = '';
											else $cc_display = 'display: none;';
										//MessageBcc
										if(set_value('MessageBcc')) {//Validation failed

											$MessageBcc = set_value('MessageBcc');

										} else {

											if($by) {

												if($by != MODE_TEMPL)
													$MessageBcc = $selected->bcc;

											} else {

												$MessageBcc = "";
											}
										}
											if($MessageBcc) $bcc_display = '';
											else $bcc_display = 'display: none;';
										//MessageSubject
										if(set_value('MessageSubject')) {//Validation failed

											$MessageSubject = set_value('MessageSubject');

										} else {

											if($by) {

												if($by != MODE_TEMPL)
													$MessageSubject = $selected->subject;

											} else {

												$MessageSubject = "";
											}
										}
										//MessageContents
										if(set_value('MessageContents')) {//Validation failed

											$MessageContents = set_value('MessageContents');

										} else {

											if($by) {

												$MessageContents = $contents;

											} else {

												$MessageContents = "";
											}
										}

									?>
									<div class="form-group">
										<label class="control-label col-sm-1 col-xs-1">To:</label>
										<div class="col-sm-11">
											<input type="text" class="form-control input-invis" data-role="multiemail" placeholder="someone@company.com" id="MessageTo" name="MessageTo" value="<?php echo $MessageTo; ?>">
										</div>
									</div>
									<div class="form-group cc-hidden hidden">
										<label class="control-label col-sm-1">Cc:</label>
										<div class="col-sm-11">
											<input type="text" class="form-control input-invis">
										</div>
									</div>
									<div class="form-group bcc-hidden hidden">
										<label class="control-label col-sm-1">Bcc:</label>
										<div class="col-sm-11">
											<input type="text" class="form-control input-invis">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 btn btn-default" id="MessageCcLabel" name="MessageCcLabel">Cc:</label>
										<div class="col-sm-11" style="<?php echo $cc_display;?>" id="MessageCcDiv" name="MessageCcDiv">
											<input type="text" class="form-control " data-role="multiemail" id="MessageCc" name="MessageCc" value="<?php echo $MessageCc; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 btn btn-default" id="MessageBccLabel" name="MessageBccLabel">Bcc:</label>
										<div class="col-sm-11" style="<?php echo $bcc_display;?>" id="MessageBccDiv" name="MessageBccDiv">
											<input type="text" class="form-control " data-role="multiemail" id="MessageBcc" name="MessageBcc" value="<?php echo $MessageBcc; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-1">Subject:</label>
										<div class="col-sm-11">
											<input type="text" class="form-control " id="MessageSubject" name="MessageSubject" value="<?php echo $MessageSubject; ?>">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<textarea class="summernote-small form-control" id="MessageContents" name="MessageContents"><?php echo $MessageContents; ?></textarea>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-8">
											<button type="submit" class="btn btn-success" id="SendBtn" name="SendBtn"><i class="icon-export"></i> Send</button>
											<button type="submit" class="btn btn-danger" id="SaveDraftBtn" name="SaveDraftBtn"><i class="icon-pencil"></i> Save</button>
											<a class="btn btn-default md-trigger" data-toggle="modal" data-target="#NewTemplModal"><i class="fa fa-folder-open"></i> Save as Template</a>
										</div>
										<div class="col-xs-4">
											<p class="quick-post message">
												<a href="javascript" title="Attach Files" data-toggle="tooltip"><i class="fa fa-paperclip"></i></a>
											</p>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End of your awesome content -->
			
				

				            <!-- Footer Start -->
           
            <!-- Footer End -->			
            </div>
			<!-- ============================================================== -->
			<!-- End content here -->
			<!-- ============================================================== -->

        </div>
		<!-- End right content -->

		<!-- Template modal -->
		<div id="NewTemplModal" name="NewTemplModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">New Template</h4>
					</div>
					<div class="modal-body ">
						<div class="widget-content padding form-horizontal">
							<?php
							if($mode == MODE_TEMPL) {
								if($error) {
									echo '<div class="alert alert-danger">'.$error.'</div>';
								}

								if(validation_errors()) {
									echo '<div class="alert alert-danger">'.validation_errors().'</div>';
								}
							}
							?>
							<div class="form-group">
								<label for="input-text" class="col-sm-2 control-label">Name: </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="TemplateName" name="TemplateName" value="<?php echo set_value('TemplateName'); ?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="input-text" class="col-sm-2 control-label">Description: </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="TemplateDesc" name="TemplateDesc" value="<?php echo set_value('TemplateDesc'); ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Shareable</label>
								<div class="col-sm-10">
									<input type="checkbox" id="TemplateShareable" name="TemplateShareable" <?php if(set_value('TemplateShareable')) echo 'checked'; ?>>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger" id="SaveTemplBtn" name="SaveTemplBtn"> Save</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal"> Cancel</button>
					</div>

				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		</form>
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
	<script src="<?= asset_base_url()?>/libs/bootstrap-validator/js/bootstrapValidator.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-tag/bootstrap-tagsinput.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-multiemail/bootstrap-multiemail.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-datatables/js/dataTables.bootstrap.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
	<script src="<?= asset_base_url()?>/js/pages/datatables.js"></script>

	<?php

		if($mode == MODE_TEMPL) {

			echo '
			<script>
				$("#NewTemplModal").modal("show");
			</script>
			';
		}
	?>

	<script>

		function addTo(emailAddress) {

			$("#MessageTo").tagsinput('add', emailAddress);

		}

		function addCc(emailAddress) {

			if($('#MessageCcDiv').css('display') == 'none'){
				$('#MessageCcDiv').show();
			}

			$("#MessageCc").tagsinput('add', emailAddress);
		}

		function addBcc(emailAddress) {

			if($('#MessageBccDiv').css('display') == 'none'){
				$('#MessageBccDiv').show();
			}

			$("#MessageBcc").tagsinput('add', emailAddress);
		}

		$(document).ready(function() {

			$('#MessageCcLabel').click(function () {

				if($('#MessageCcDiv').css('display') == 'none'){
					$('#MessageCcDiv').show();
				} else {
					$('#MessageCcDiv').hide();
				}
			});

			$('#MessageBccLabel').click(function () {

				if($('#MessageBccDiv').css('display') == 'none'){
					$('#MessageBccDiv').show();
				} else {
					$('#MessageBccDiv').hide();
				}
			});


<?php
	//Speciall by draft
	//by draft case
	//if save, update draft
	//if send, chnage status DRAFT to SENT

	if($by == MODE_DRAFTS) {
		echo '
			$("#SendBtn").click(function () {
				$("#registerForm").attr("action", "/message_center/sendByDraft?id='.$selected->message_id.'&by='.$by.'");
			});

			$("#SaveDraftBtn").click(function () {
				$("#registerForm").attr("action", "/message_center/saveByDraft?id='.$selected->message_id.'&by='.$by.'");
			});
		';
	} else {
		echo '
			$("#SendBtn").click(function () {
				$("#registerForm").attr("action", "/message_center/send");
			});

			$("#SaveDraftBtn").click(function () {
				$("#registerForm").attr("action", "/message_center/saveDraft");
			});
		';
	}

?>

			$('#SaveTemplBtn').click(function () {
				$('#registerForm').attr("action", "/message_center/saveTemplate");

			});
		});
	</script>
	</body>
</html>