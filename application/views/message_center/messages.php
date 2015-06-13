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
		<link href="<?= asset_base_url()?>/css/style.css" rel="stylesheet" type="text/css" />
		<link href="<?= asset_base_url()?>/libs/bootstrap-validator/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css">
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
	<!-- Modal Confirmation -->
	<div class="md-modal md-fade-in-scale-up" id="RemoveConfirmStick" name="RemoveConfirmStick">
		<div class="md-content">
			<h3><strong>Delete</strong> Confirmation</h3>
			<div>
				<p class="text-center">Are you sure want to delete the User Account?</p>
				<p class="text-center">
					<button class="btn btn-danger md-close">No</button>
					<a href="#" class="btn btn-success md-close">Yes</a>
				</p>
			</div>
		</div>
	</div>
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
            		<h1><i class='fa fa-envelope'></i> Message Center</h1>
            		            	</div>
            	<!-- Page Heading End-->
				<!-- Begin Inbox -->
				<div class="widget transparent box-messages">
					<div class="row">
						<div class="col-sm-3 col-sm-offset-9">
						<?php
                            if(gf_cu_rightsMsgEdit()) {
                                $edit_btn1_disabled = " ";
                            } else {
                                $edit_btn1_disabled = " disabled";
                            }
                            
                            if(gf_cu_rightsMsgAdd()) {
                                $edit_btn2_disabled = " ";
                            } else {
                                $edit_btn2_disabled = " disabled";
                            }
                            
                            if(gf_cu_rightsMsgView()) {
                                $edit_btn3_disabled = " ";
                            } else {
                                $edit_btn3_disabled = " disabled";
                            }
                            
							if($mode == MODE_SENT) {
								$search_link = '/message_center/messages';
							} else if($mode == MODE_DRAFTS) {
								$search_link = '/message_center/drafts';
							} else if($mode == MODE_TRASH) {
								$search_link = '/message_center/trash';
							} else if($mode == MODE_TEMPL) {
								$search_link = '/message_center/templates';
							}

							$search_link .= '?RowsPerPage='.$RowsPerPage;

						?>
						<form class="form-horizontal" role="form" id="searchForm" name="searchForm" action="<?php echo $search_link; ?>">
							<div class="col-sm-9 col-sm-offset-3">
								<div class="form-group form-search search-box has-feedback">
								  <input type="text" class="form-control full-rounded" id="search_value" name="search_value" placeholder="Search.." value="<?php echo $search_value; ?>">
								  <a class="btn btn-link" id="SearchBtn" name="SearchBtn"><span class="fa fa-search form-control-feedback"></span></a>
								</div>
							</div>
						</form>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<!-- Sidebar Message -->
							<div class="btn-group new-message-btns stacked">
								<a href="/message_center/compose" class="btn btn-success btn-lg col-xs-10" <?php echo $edit_btn2_disabled;?>>Compose</a>
								<a class="btn btn-success md-trigger col-xs-2 btn-lg" data-toggle="modal" data-target="#new-message" <?php echo $edit_btn3_disabled;?>><i class="icon-pencil"></i></a>
							</div>
							<div class="list-group menu-message">
                              <a href="/message_center/drafts" class="list-group-item<?php if($mode==MODE_DRAFTS) echo ' active'; ?>"><i class="icon-pencil"></i> Drafts <span class="badge bg-green-1 pull-right"><?php echo $drafts_count; ?></span></a>
                              <a href="/message_center/messages" class="list-group-item<?php if($mode==MODE_SENT) echo ' active'; ?>"><i class="icon-export"></i> Sent</a>
                              <a href="/message_center/trash" class="list-group-item<?php if($mode==MODE_TRASH) echo ' active'; ?>"><i class="icon-cup"></i> Trash <span class="badge bg-lightblue-1 pull-right"><?php echo $trash_count; ?></span></a>
                              <a href="/message_center/templates" class="btn list-group-item<?php if($mode==MODE_TEMPL) echo ' active'; ?>" style="text-align:left;" <?php echo $edit_btn1_disabled;?>><i class="glyphicon glyphicon-folder-open"></i> Templates</a>
                            </div>


						</div><!-- ENd div .col-md-2 -->

						<div class="col-md-9">
							<div class="mail-list">
							<div class="clearfix"></div>
							<form role="form" id="mainForm" name="mainForm" method="post">
							<!-- Toolbar message -->
							<div class="data-table-toolbar">
								<div class="row">
									<div class="col-sm-8">
										<button class="btn btn-danger" id="RemoveBtn" name="RemoveBtn" disabled="true"> <i class="glyphicon glyphicon-trash"></i> </button>
									</div>
									<?php

										if($mode == MODE_SENT) {
											$href = '/message_center/messages';
										} else if($mode == MODE_DRAFTS) {
											$href = '/message_center/drafts';
										} else if($mode == MODE_TRASH) {
											$href = '/message_center/trash';
										} else if($mode == MODE_TEMPL) {
											$href = '/message_center/templates';
										}

										$href .= '?RowsPerPage='.$RowsPerPage;

										if($search_value) {
											$href .= '&search_value='.$search_value;
										}

										if($PageNum > 1) {
											$href_prev .= $href.'&PageNum='.($PageNum-1);
											$disable_prev = '';
										} else {
											$href_prev = '#';
											$disable_prev = ' disabled';
										}

										if($PageNum < $Pages) {
											$href_next .= $href.'&PageNum='.($PageNum+1);
											$disable_next = '';
										} else {
											$href_next = '#';
											$disable_next = ' disabled';
										}


									?>
									<div class="col-sm-4 hidden-xs">
										<div class="pull-right">
                                            <a class="btn" href="<?php echo $href_prev; ?>" <?php echo $disable_msg; ?>><i class="fa fa-envelope"></i><span class="badge pull-right">2</span></a>
											<span class="paging-status"><?php echo $PageNum.' of '.$Pages; ?></span>
											<div class="btn-group">
											  <a class="btn btn-default" href="<?php echo $href_prev; ?>" <?php echo $disable_prev; ?>><i class="fa fa-chevron-left"></i></a>
											  <a class="btn btn-default" href="<?php echo $href_next; ?>" <?php echo $disable_next; ?>><i class="fa fa-chevron-right"></i></a>
											</div>
											<div class="btn-group">

											  <ul class="dropdown-menu pull-right" role="menu">
												<li><a href="#fakelink">Action</a></li>
												<li><a href="#fakelink">Another action</a></li>
												<li><a href="#fakelink">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#fakelink">Separated link</a></li>
											  </ul>
											</div>
										</div>
									</div><!-- End div .col-sm-3 -->
								</div><!-- End div .row -->
							</div><!-- End div .data-table-toolbar -->
							<!-- End toolbar message -->
							<?php

								if($mode == MODE_TEMPL) {

									echo '
									<!-- Message table -->
									<div class="table-responsive">
										<table class="table table-hover table-message">
											<tbody>';

											foreach($list as $template) {

												if($template->shareable) {
													$shareable_icon = '<i class="icon-shareable warning"></i>';
												} else {
													$shareable_icon = '';
												}


												echo '
												<tr class="unread">
													<td style="width: 20px"><input type="checkbox" class="rows-check" id="sel_id['.$template->template_id.']" name="sel_id['.$template->template_id.']"></td>
													<td><a href="/message_center/read?id='.$template->template_id.'&mode='.$mode.'">'.$template->name.'</a></td>
													<td><a href="/message_center/read?id='.$template->template_id.'&mode='.$mode.'">'.$template->desc.'</a></td>
													<td style="width: 20px;">'.$shareable_icon.'</td>
												</tr>';
											}

									echo '
											</tbody>
										</table>
									</div><!-- End div .table-responsive -->
									<!-- End message table -->
									';

								} else {
									echo '
									<!-- Message table -->
									<div class="table-responsive">
										<table class="table table-hover table-message">
											<tbody>';

											foreach($list as $message) {

												if($message->subject) {
													$subject = $message->subject;
												} else {
													$subject = '(No Subject)';
												}

												if(gf_utc2us_date($message->updatedAt) == date('m/d/Y')) {
													$updatedAt = gf_utc2us_time($message->updatedAt);
												} else {
													$updatedAt = gf_utc2us_date($message->updatedAt);
												}

												echo '
														<tr class="unread">
															<td style="width: 20px"><input type="checkbox" class="rows-check" id="sel_id['.$message->message_id.']" name="sel_id['.$message->message_id.']"></td>
															<td><a href="/message_center/read?id='.$message->message_id.'&mode='.$mode.'">'.$subject.'</a></td>
															<td align="right">'.$updatedAt.'</td>
														</tr>';
											}

									echo '
											</tbody>
										</table>
									</div><!-- End div .table-responsive -->
									<!-- End message table -->
									';
								}
							?>

							<!-- Footer message toolbar -->
							<div class="data-table-toolbar-footer">
								<div class="pull-right">
									<span class="paging-status"><?php echo $PageNum.' of '.$Pages; ?></span>
									<div class="btn-group">
										<a class="btn btn-default" href="<?php echo $href_prev; ?>" <?php echo $disable_prev; ?>><i class="fa fa-chevron-left"></i></a>
										<a class="btn btn-default" href="<?php echo $href_next; ?>" <?php echo $disable_next; ?>><i class="fa fa-chevron-right"></i></a>
									</div><!-- End div .btn-group -->
								</div><!-- End div .pull-right -->
							</div><!-- End div .data-table-toolbar -->
							<!-- End Footer message toolbar -->
								<input type="hidden" id="mode" name="mode" value="<?php echo $mode; ?>">
								<input type="hidden" id="RowsPerPage" name="RowsPerPage" value="<?php echo $RowsPerPage; ?>">
								<input type="hidden" id="PageNum" name="PageNum" value="<?php echo $PageNum; ?>">
								<input type="hidden" id="search_value" name="search_value" value="<?php echo $search_value; ?>">
							</form>
							</div>
						</div><!-- End div .col-md-10 -->



					</div><!-- End div .row -->
				</div><!-- End div .box-info -->
				<!-- End inbox -->


				<?php
				$this->load->view("common/footer.php");
				?>
            </div>
			<!-- ============================================================== -->
			<!-- End content here -->
			<!-- ============================================================== -->

        </div>
		<!-- End right content -->

		<!-- Filter modal -->
		<div id="new-message" name="new-message" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">New Message</h4>
					</div>
					<div class="modal-body ">
						<form role="form" id="sendForm" name="sendForm" method="post" enctype="multipart/form-data">
							<?php
							if($error) {
								echo '<div class="alert alert-danger nomargin">'.$error.'</div>';
							}

							if(validation_errors()) {
								echo '<div class="alert alert-danger nomargin">'.validation_errors().'</div>';
							}
							?>
							<div class="form-group">
								<input type="email" class="form-control input-lg" placeholder="Message to" id="MessageTo" name="MessageTo" value="<?php echo set_value("MessageTo");?>" <?php  echo " ".$edit_btn1_disabled;?>>
							</div>
							<div class="form-group">
								<input type="text" class="form-control input-lg" placeholder="Message subject" id="MessageSubject" name="MessageSubject" value="<?php echo set_value("MessageSubject"); ?>" <?php  echo " ".$edit_btn1_disabled;?>>
							</div>
							<div class="form-group">
								<textarea class="summernote-small form-control" id="MessageContents" name="MessageContents" <?php echo " ".$edit_btn1_disabled;?>><?php echo set_value("MessageContents"); ?></textarea>
							</div>
							<div class="row">
								<div class="col-xs-8">
									<button type="submit" class="btn btn-success btn-sm" id="SendBtn" name="SendBtn" <?php  echo " ".$edit_btn1_disabled;?>>Send</button>
									<button type="submit" class="btn btn-warning btn-sm" id="SaveDraftBtn" name="SaveDraftBtn" <?php  echo " ".$edit_btn1_disabled;?>>Draft</button>
								</div>
								<div class="col-xs-4">
									<p class="quick-post message">
										<!--<a><i class="fa fa-picture-o"></i></a>-->
										<!--<a><i class="fa fa-video-camera"></i></a>-->
										<a><i class="icon-attach-3" data-toggle="tooltip"></i></a>
									</p>
								</div>
							</div>
						</form>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->



		<?php

		if($error || validation_errors()) {

			echo '
			<script>
				$("#new-message").modal("show");
			</script>
			';
		}
		?>
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
	<script src="<?= asset_base_url()?>/libs/bootstrap-validator/js/bootstrapValidator.min.js"></script>
	<script>

		var check_count = 0;

		$(document).ready(function() {

			$('.iCheck-helper').click(function () {

				var parent = $(this).parent().get(0);
				if(parent.getElementsByTagName('input')[0].checked) {
					check_count++;
				} else {
					check_count--;
				}

				if(check_count > 0) {

					$("#RemoveBtn").attr("disabled", false);

				} else {

					$("#RemoveBtn").attr("disabled", true);
				}
			});


			$('#RemoveBtn').click(function () {

				$('#mainForm').attr("action", "/message_center/remove");

			});


			$('#SearchBtn').click(function () {
				$('#searchForm').submit();
			});


			$('#SendBtn').click(function () {
				$('#sendForm').attr("action", "/message_center/sendSimple");
			});

			$('#SaveDraftBtn').click(function () {
				$('#sendForm').attr("action", "/message_center/saveDraftSimple");
			});

			$('#sendForm').bootstrapValidator({
				message: 'This value is not valid',
				fields: {
					MessageTo: {
						validators: {
							emailAddress: {
								message: 'The input is not a valid email address'
							}
						}
					},
					MessageContents: {
						message: 'Message Contents is not valid',
						validators: {
							notEmpty: {
								message: 'Message Contents is required and can\'t be empty'
							}
						}
					}
				}
			});
		});
	</script>
	</body>
</html>