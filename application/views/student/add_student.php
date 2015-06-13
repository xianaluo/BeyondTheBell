<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <title>Registration and Consent</title>
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
		<link href="<?= asset_base_url()?>/libs/bootstrap-multiselect2/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
		<!-- Extra CSS Libraries End -->
        <link href="<?= asset_base_url()?>/css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<script src="<?= asset_base_url()?>/libs/jSignature/flashcanvas.js"></script>
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
					<h1><i class='fa fa-user'></i> Registration and Consent Form Wizard</h1>
				</div>
				<?php

				if($error) {
					echo '<div class="alert alert-danger nomargin">'.$error.'</div>';
				}

				if(validation_errors()) {
					echo '<div class="alert alert-danger nomargin">'.validation_errors().'</div>';
				}


				if($error || validation_errors()) {

					$SchoolYear = set_value("SchoolYear");
					$Activity = set_value("Activity");
					$FirstName = set_value("FirstName");
					$MiddleInitial = set_value("MiddleInitial");
					$LastName = set_value("LastName");
					$Birthday = set_value("Birthday");
					$MF = set_value("MF");
					$GradeFall = set_value("GradeFall");
					$Address1 = set_value("Address1");
					$Address2 = set_value("Address2");
					$City = set_value("City");
					$State = set_value("State");
					$ZipCode = set_value("ZipCode");
					$PrimaryPhone = set_value("PrimaryPhone");

					$MotherGaurdian = set_value("MotherGaurdian");
					$MotherEmployer = set_value("MotherEmployer");
					$MotherWorkPhone = set_value("MotherWorkPhone");
					$MotherAltPhone = set_value("MotherAltPhone");

					$FatherGaurdian = set_value("FatherGaurdian");
					$FatherEmployer = set_value("FatherEmployer");
					$FatherWorkPhone = set_value("FatherWorkPhone");
					$FatherAltPhone = set_value("FatherAltPhone");

					$OtherGaurdian = set_value("OtherGaurdian");
					$OtherEmployer = set_value("OtherEmployer");
					$OtherWorkPhone = set_value("OtherWorkPhone");
					$OtherAltPhone = set_value("OtherAltPhone");

					$Ethnicity = array();
					$ethnicity_one = set_value("Ethnicity[]");
					while($ethnicity_one) {
						$Ethnicity[] = $ethnicity_one;
						$ethnicity_one = set_value("Ethnicity[]");
					}

					$ConsentPhoto = set_value("ConsentPhoto");

					$ConsentGrade = set_value("ConsentGrade");

					$ConsentPerson = set_value("ConsentPerson");

					$EmergenciesDoctor = set_value("EmergenciesDoctor");
					$DoctorPhone = set_value("DoctorPhone");
					$EmergenciesHospital = set_value("EmergenciesHospital");
					$EmergenciesDentist = set_value("EmergenciesDentist");
					$DentistPhone = set_value("DentistPhone");
					$Medication = set_value("Medication");
					$MedicationYN = set_value("MedicationYN");
					$AllergiesNeeds = set_value("AllergiesNeeds");
					$EmergenciesContactPerson = set_value("EmergenciesContactPerson");
					$EmergenciesContactNumber = set_value("EmergenciesContactNumber");
					$SignDate = set_value("SignDate");

					$Parent = set_value("Parent");
					$Status = set_value("Status");

				} else {

					if($selected) {

						$SchoolYear = $selected->schoolYear;
						$SchoolYearBase = explode( '-', $SchoolYear );
						$Activity = $selected->activity;
						$FirstName = $selected->firstName;
						$MiddleInitial = $selected->middleInitial;
						$LastName = $selected->lastName;
						$Birthday = date_format($selected->birthday,"m/d/Y");
						$MF = $selected->mf;
						$GradeFall = $selected->gradeFall;
						$Address1 = $selected->address1;
						$Address2 = $selected->address2;
						$City = $selected->city;
						$State = $selected->state;
						$ZipCode = $selected->zipCode;
						$PrimaryPhone = $selected->primaryPhone;

						$MotherGaurdian = $selected->motherGaurdian;
						$MotherEmployer = $selected->motherEmployer;
						$MotherWorkPhone = $selected->motherWorkPhone;
						$MotherAltPhone = $selected->motherAltPhone;

						$FatherGaurdian = $selected->fatherGaurdian;
						$FatherEmployer = $selected->fatherEmployer;
						$FatherWorkPhone = $selected->fatherWorkPhone;
						$FatherAltPhone = $selected->fatherAltPhone;

						$OtherGaurdian = $selected->otherGaurdian;
						$OtherEmployer = $selected->otherEmployer;
						$OtherWorkPhone = $selected->otherWorkPhone;
						$OtherAltPhone = $selected->otherAltPhone;

						$Ethnicity = $selected->ethnicity;

						$ConsentPhoto = $selected->consentPhoto;

						$ConsentGrade = $selected->consentGrade;

						$ConsentPerson = $selected->consentPerson;

						$EmergenciesDoctor = $selected->emergenciesDoctor;
						$DoctorPhone = $selected->doctorPhone;
						$EmergenciesHospital = $selected->emergenciesHospital;
						$EmergenciesDentist = $selected->emergenciesDentist;
						$DentistPhone = $selected->dentistPhone;
						$Medication = $selected->medication;
						$MedicationYN = $selected->medicationYN;
						$AllergiesNeeds = $selected->allergiesNeeds;
						$EmergenciesContactPerson = $selected->emergenciesContactPerson;
						$EmergenciesContactNumber = $selected->emergenciesContactNumber;
						$signature = $selected->signature;
						$SignDate = date_format($selected->signDate,"m/d/Y");

						$Parent = $selected->parent_id;
						$Status = $selected->status;

					} else {

						$SchoolYearBase[0] = date("Y")-1;
						$SchoolYearBase[1] = date("Y");
						$SchoolYear = $SchoolYearBase[0]."-".$SchoolYearBase[1];

						$Activity = "";
						$FirstName = "";
						$MiddleInitial = "";
						$LastName = "";
						$Birthday = "";
						$MF = "";
						$GradeFall = "";
						$Address1 = "";
						$Address2 = "";
						$City = "";
						$State = "";
						$ZipCode = "";
						$PrimaryPhone = "";

						$MotherGaurdian = "";
						$MotherEmployer = "";
						$MotherWorkPhone = "";
						$MotherAltPhone = "";

						$FatherGaurdian = "";
						$FatherEmployer = "";
						$FatherWorkPhone = "";
						$FatherAltPhone = "";

						$OtherGaurdian = "";
						$OtherEmployer = "";
						$OtherWorkPhone = "";
						$OtherAltPhone = "";

						$Ethnicity = array();

						$ConsentPhoto = "";

						$ConsentGrade = "";

						$ConsentPerson = "";

						$EmergenciesDoctor = "";
						$DoctorPhone = "";
						$EmergenciesHospital = "";
						$EmergenciesDentist = "";
						$DentistPhone = "";
						$Medication = "";
						$MedicationYN = "";
						$AllergiesNeeds = "";
						$EmergenciesContactPerson = "";
						$EmergenciesContactNumber = "";
						$signature = "";
						$SignDate = date("m/d/Y");

						$Parent = "";
						$Status = STUD_STATUS_NOTAPPROVED;

					}

				}


				if($selected) {
					$action = "/student/update";
				} else {
					$action = "/student/register";
				}

				?>
				<!-- Page Heading End-->
				<div class="row">
					<div class="col-md-12 portlets">
						<!-- Your awesome content goes here -->
						<div class="widget animated fadeInDown">

							<form id="myWizard" name="myWizard" method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
								<section class="step" data-step-title="Child Information">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group nomargin">
												<label >School Year</label>
												<select class="form-control" id="SchoolYear" name="SchoolYear">
													<?php
														for($i=$SchoolYearBase[0];$i<=$SchoolYearBase[0]+1;$i++) {

															$one = $i.'-'.($i+1);

															if($one == $SchoolYear) {

																echo '<option value="'.$one.'" selected>'.$one.'</option>';

															} else {
																echo '<option value="'.$one.'">'.$one.'</option>';
															}
														}
													?>
												</select>
											</div>
											<div class="form-group nomargin">
												<label >Activity</label>
												<select class="form-control selectpicker" id="Activity" name="Activity" data-size="5" data-live-search = "true">
													<?php
													foreach($activity_list as $activity_one) {

														if( $activity_one->activity_id == $Activity) {
															echo '<option value="' . $activity_one->activity_id . '" selected>' . $activity_one->sessionName . '</option>';
														} else {
															echo '<option value="' . $activity_one->activity_id . '">' . $activity_one->sessionName . '</option>';
														}
													}
													?>
												</select>
											</div>
											<div class="form-group nomargin">
												<label >Child's Name</label>
												<div class="row">
													<div class="col-sm-4">
														<input type="text" id="FirstName" name="FirstName" class="form-control" placeholder="First Name" value = "<?php echo $FirstName; ?>">
													</div>
													<div class="col-sm-4">
														<input type="text" id="MiddleInitial" name="MiddleInitial" class="form-control" placeholder="Middle Initial" value = "<?php echo $MiddleInitial; ?>">
													</div>
													<div class="col-sm-4">
														<input type="text" id="LastName" name="LastName" class="form-control" placeholder="Last Name" value = "<?php echo $LastName; ?>">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group nomargin">
														<label >Birthday</label>
														<input type="text" id="Birthday" name="Birthday" class="form-control datepicker-input"  value = "<?php echo $Birthday; ?>">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group nomargin">
														<label >M / F</label>
														<div class="row">
															<div class="col-sm-6">
																<div class="radio iradio nomargin">
																	<label>
																		<input type="radio" name="MF" id="MF_Male" value="true" <?php if($MF) echo "checked"; ?>>
																		Male
																	</label>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="radio iradio nomargin">
																	<label>
																		<input type="radio" name="MF" id="MF_Female" value="false" <?php if(!$MF) echo "checked"; ?>>
																		Female
																	</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group nomargin">
												<label >Grade in the Fall</label>
												<select class="form-control" id="GradeFall" name="GradeFall">
													<?php
													foreach($grade_list as $item) {
														if($GradeFall == $state->cate_id)
															echo '<option $item="'.$item->cate_name.'" selected>'.$item->cate_name.'</option>';
														else
															echo '<option value="'.$item->cate_name.'">'.$item->cate_name.'</option>';
													}
													?>
												</select>
											</div>

											<div class="form-group nomargin">
												<label >Address</label>
												<div class="row">
													<div class="col-sm-6">
														<input type="text" class="form-control" id="Address1" name="Address1" placeholder="Address1" value="<?php echo $Address1?>">
													</div>
													<div class="col-sm-6">
														<input type="text" class="form-control" id="Address2" name="Address2" placeholder="Address2" value="<?php echo $Address2?>">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group nomargin">
														<label for="exampleInputEmail1">City</label>
														<input type="text" class="form-control" id="City" name="City" placeholder="" value="<?php echo $City?>">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group nomargin">
														<label for="exampleInputEmail1">State</label>
														<select class="form-control" id="State" name="State">
															<?php
															foreach($state_list as $state) {
																if($State == $state->cate_id)
																	echo '<option value="'.$state->cate_id.'" selected>'.$state->cate_name.'</option>';
																else
																	echo '<option value="'.$state->cate_id.'">'.$state->cate_name.'</option>';
															}
															?>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group nomargin">
														<label for="exampleInputEmail1">Zip Code</label>
														<input type="text" class="form-control" id="ZipCode" name="ZipCode" placeholder="" value="<?php echo $ZipCode?>">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group nomargin">
														<label for="exampleInputEmail1">Primary Phone</label>
														<input type="text" class="form-control" id="PrimaryPhone" name="PrimaryPhone" placeholder="" value="<?php echo $PrimaryPhone?>">
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group nomargin">
														<label >Mother/Gaurdian</label>
														<input type="text" id="MotherGaurdian" name="MotherGaurdian" class="form-control" value = "<?php echo $MotherGaurdian; ?>">
													</div>
													<div class="form-group nomargin">
														<label >Employer</label>
														<input type="text" id="MotherEmployer" name="MotherEmployer" class="form-control" value = "<?php echo $MotherEmployer; ?>">
													</div>
													<div class="form-group nomargin">
														<label >Work Phone</label>
														<input type="text" id="MotherWorkPhone" name="MotherWorkPhone" class="form-control" value = "<?php echo $MotherWorkPhone; ?>">
													</div>
													<div class="form-group nomargin">
														<label >Alt. Phone</label>
														<input type="text" id="MotherAltPhone" name="MotherAltPhone" class="form-control" value = "<?php echo $MotherAltPhone; ?>">
													</div>
													<div class="form-group nomargin">
														<label >Other</label>
														<input type="text" id="OtherGaurdian" name="OtherGaurdian" class="form-control" value = "<?php echo $OtherGaurdian; ?>">
													</div>
													<div class="form-group nomargin">
														<label >Employer</label>
														<input type="text" id="OtherEmployer" name="OtherEmployer" class="form-control" value = "<?php echo $OtherEmployer; ?>">
													</div>
													<div class="form-group nomargin">
														<label >Work Phone</label>
														<input type="text" id="OtherWorkPhone" name="OtherWorkPhone" class="form-control" value = "<?php echo $OtherWorkPhone; ?>">
													</div>
													<div class="form-group nomargin">
														<label >Alt. Phone</label>
														<input type="text" id="OtherAltPhone" name="OtherAltPhone" class="form-control" value = "<?php echo $OtherAltPhone; ?>">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group nomargin">
														<label >Father/Gaurdian</label>
														<input type="text" id="FatherGaurdian" name="FatherGaurdian" class="form-control" value = "<?php echo $FatherGaurdian; ?>">
													</div>
													<div class="form-group nomargin">
														<label >Employer</label>
														<input type="text" id="FatherEmployer" name="FatherEmployer" class="form-control" value = "<?php echo $FatherEmployer; ?>">
													</div>
													<div class="form-group nomargin">
														<label >Work Phone</label>
														<input type="text" id="FatherWorkPhone" name="FatherWorkPhone" class="form-control" value = "<?php echo $FatherWorkPhone; ?>">
													</div>
													<div class="form-group nomargin">
														<label >Alt. Phone</label>
														<input type="text" id="FatherAltPhone" name="FatherAltPhone" class="form-control" value = "<?php echo $FatherAltPhone; ?>">
													</div>
												</div>
											</div>
										</div>

									</div>
								</section>
								<section class="step" data-step-title="Ethnicity">
									<div class="row">
										<div class="col-sm-3">
											<div class="checkbox">
												<label>
													<input type="checkbox" value="1" id="Ethnicity[]" name="Ethnicity[]" <?php if(in_array("1", $Ethnicity)) echo "checked"; ?>>
													American Indian or Alaska Native
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" value="2" id="Ethnicity[]" name="Ethnicity[]" <?php if(in_array("2", $Ethnicity)) echo "checked"; ?>>
													Asian
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" value="3" id="Ethnicity[]" name="Ethnicity[]" <?php if(in_array("3", $Ethnicity)) echo "checked"; ?>>
													Black or African American
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" value="4" id="Ethnicity[]" name="Ethnicity[]" <?php if(in_array("4", $Ethnicity)) echo "checked"; ?>>
													Hispanic or Latino
												</label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="checkbox">
												<label>
													<input type="checkbox" value="5" id="Ethnicity[]" name="Ethnicity[]" <?php if(in_array("5", $Ethnicity)) echo "checked"; ?>>
													Native Hawaiian or Other
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" value="6" id="Ethnicity[]" name="Ethnicity[]" <?php if(in_array("6", $Ethnicity)) echo "checked"; ?>>
													Pacific Islander
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" value="7" id="Ethnicity[]" name="Ethnicity[]" <?php if(in_array("7", $Ethnicity)) echo "checked"; ?>>
													White
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" value="8" id="Ethnicity[]" name="Ethnicity[]" <?php if(in_array("8", $Ethnicity)) echo "checked"; ?>>
													Other
												</label>
											</div>
										</div>
									</div>
								</section>
								<section class="step" data-step-title="Additional Information">
									<div class="row">
										<div class="col-sm-6">
											<div class="checkbox">
												<label>
													<input type="checkbox" value="9" id="Ethnicity[]" name="Ethnicity[]" <?php if(in_array("9", $Ethnicity)) echo "checked"; ?>>
													I am employed by BTB
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" value="10" id="Ethnicity[]" name="Ethnicity[]" <?php if(in_array("10", $Ethnicity)) echo "checked"; ?>>
													My spouse is employed by BTB
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" value="11" id="Ethnicity[]" name="Ethnicity[]" <?php if(in_array("11", $Ethnicity)) echo "checked"; ?>>
													I am an employee of the Sioux City Community School District
												</label>
											</div>
										</div>
									</div>
								</section>
								<section class="step" data-step-title="Consent">
									<div class="row">
										<div class="col-sm-1"></div>
										<div class="col-sm-10">
											<div class="form-group">
												<label >I give consent for my child to be photographed (for use in newspapers and other media)</label>
												<div class="radio iradio">
													<label>
														<input type="radio" name="ConsentPhoto" id="ConsentPhoto_Yes" value="true" <?php if($ConsentPhoto) echo "checked"; ?>>
														Yes
													</label>
												</div>
												<div class="radio iradio">
													<label>
														<input type="radio" name="ConsentPhoto" id="ConsentPhoto_No" value="false" <?php if(!$ConsentPhoto) echo "checked"; ?>>
														No
													</label>
												</div>
											</div>
											<div class="form-group">
												<label >I give consent for my child’s grades to be obtained for academic tracking. All grades will be kept strictly confidential.</label>
												<div class="radio iradio">
													<label>
														<input type="radio" name="ConsentGrade" id="ConsentGrade_Yes" value="true" <?php if($ConsentGrade) echo "checked"; ?>>
														Yes
													</label>
												</div>
												<div class="radio iradio">
													<label>
														<input type="radio" name="ConsentGrade" id="ConsentGrade_No" value="false" <?php if(!$ConsentGrade) echo "checked"; ?>>
														No
													</label>
												</div>
											</div>
											<div class="form-group">
												<label >This person may NOT pick up my child (if applicable):</label>
												<input type="text" id="ConsentPerson" name="ConsentPerson" class="form-control" value = "<?php echo $ConsentPerson; ?>">
												<label >I will provide copies of legal custody/visitation documents for this to be enforced.</label>
											</div>
										</div>
										<div class="col-sm-1"></div>
									</div>
								</section>
								<section class="step" data-step-title="Emergencies">
									<div class="row">
										<div class="col-sm-1"></div>
										<div class="col-sm-10">
											<div class="form-group">
												<label>
													If my child is injured or in need of medical attention, and authorized persons, including myself, cannot be reached, the Beyond the Bell staff is
													authorized to take my child to a local hospital, at my expense. This may involve additional costs.
												</label>
											</div>
											<div class="row">
												<div class="form-group col-sm-2">
													<label >Doctor</label>
												</div>
												<div class="form-group col-sm-4">
													<input type="text" id="EmergenciesDoctor" name="EmergenciesDoctor" class="form-control" value = "<?php echo $EmergenciesDoctor; ?>">
												</div>
												<div class="form-group col-sm-2" style="text-align: right">
													<label >Phone</label>
												</div>
												<div class="form-group col-sm-4">
													<input type="text" id="DoctorPhone" name="DoctorPhone" class="form-control" value = "<?php echo $DoctorPhone; ?>">
												</div>
											</div>
											<div class="row">
												<div class="form-group col-sm-2">
													<label >*If necessary, take my child to</label>
												</div>
												<div class="form-group col-sm-4">
													<input type="text" id="EmergenciesHospital" name="EmergenciesHospital" class="form-control" value = "<?php echo $EmergenciesHospital; ?>">
												</div>
												<div class="form-group col-sm-6">
													<label >Hospital.</label>
												</div>

											</div>
											<div class="row">
												<div class="form-group col-sm-2">
													<label >Dentist</label>
												</div>
												<div class="form-group col-sm-4">
													<input type="text" id="EmergenciesDentist" name="EmergenciesDentist" class="form-control" value = "<?php echo $EmergenciesDentist; ?>">
												</div>
												<div class="form-group col-sm-2" style="text-align: right">
													<label >Phone</label>
												</div>
												<div class="form-group col-sm-4">
													<input type="text" id="DentistPhone" name="DentistPhone" class="form-control" value = "<?php echo $DentistPhone; ?>">
												</div>
											</div>
											<div class="form-group">
												<label>
													Health Information – Medications, allergies, medical conditions, special needs:
												</label>
											</div>
											<div class="row">
												<div class="form-group col-sm-2">
													<label >Medication</label>
												</div>
												<div class="form-group col-sm-4">
													<input type="text" id="Medication" name="Medication" class="form-control" value = "<?php echo $Medication; ?>">
												</div>
												<div class="form-group col-sm-4">
													<label >Will BTB be administering Medications?</label>
												</div>
												<div class="form-group col-sm-1">
													<div class="radio iradio">
														<label>
															<input type="radio" name="MedicationYN" id="MedicationYN_Yes" value="true" <?php if($MedicationYN) echo "checked"; ?>>
															Yes
														</label>
													</div>
												</div>
												<div class="form-group col-sm-1">
													<div class="radio iradio">
														<label>
															<input type="radio" name="MedicationYN" id="MedicationYN_No" value="false" <?php if(!$MedicationYN) echo "checked"; ?>>
															No
														</label>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label >AllergiesNeeds:</label>
												<input type="text" id="AllergiesNeeds" name="AllergiesNeeds" class="form-control" value = "<?php echo $AllergiesNeeds; ?>">
											</div>
											<div class="row">
												<div class="form-group col-sm-4">
													<label >In an emergency, please contact this person first: </label>
												</div>
												<div class="form-group col-sm-3">
													<input type="text" id="EmergenciesContactPerson" name="EmergenciesContactPerson" class="form-control" value = "<?php echo $EmergenciesContactPerson; ?>">
												</div>
												<div class="form-group col-sm-2" style="text-align: right">
													<label >at this number</label>
												</div>
												<div class="form-group col-sm-3">
													<input type="text" id="EmergenciesContactNumber" name="EmergenciesContactNumber" class="form-control" value = "<?php echo $EmergenciesContactNumber; ?>">
												</div>
											</div>
										</div>
										<div class="col-sm-1"></div>
									</div>
								</section>
								<section class="step" data-step-title="Agreement">
									<div class="row">
										<div class="col-sm-1"></div>
										<div class="col-sm-10">
											<div class="form-group">
												<label>
													<h4>
													I have read, understood and agreed to the policies stated in the cover letter, contract, and BTB handbook including the “hold harmless” agreements, payments, and weather policies. I understand my child will have sunscreen applied in accordance with DHS licensing. My child has my permission to participate in field trips and to be transported by a school district or private bus.
													</h4>
												</label>
											</div>
											<div class="row">
												<div class="form-group col-sm-2">
													<label >Parent Signature</label>
												</div>
												<div class="col-sm-6">
													<?php
														if($selected) {
															echo '
																<img id="sigImg" name="sigImg" src="'.$selected->signature.'">
															';
														} else {
															echo '
																<div id="signature" style="border: 1px dotted black"></div>
																<a href="#" id="ClearSigBtn" name="ClearSigBtn">Clear</a>
															';
														}
													?>
												</div>
												<div class="form-group col-sm-2" style="text-align: right">
													<label >Date</label>
												</div>
												<div class="form-group col-sm-2">
													<input type="text" id="SignDate" name="SignDate" class="form-control" readonly value = "<?php echo $SignDate; ?>">
												</div>
											</div>
											<div class="row" style="margin-top: 30px">
												<div class="form-group col-sm-2">
													<label >Parent</label>
												</div>
												<div class="col-sm-6">
													<select class="form-control selectpicker" id="Parent" name="Parent" data-size="5" data-live-search = "true">
														<?php
														foreach($parent_list as $parent_one) {

															if( $parent_one->user_id == $Parent) {
																echo '<option value="' . $parent_one->user_id . '" selected>' . $parent_one->username . '</option>';
															} else {
																echo '<option value="' . $parent_one->user_id . '">' . $parent_one->username . '</option>';
															}
														}
														?>
													</select>
												</div>
												<div class="form-group col-sm-2" style="text-align: right">
													<label >Status</label>
												</div>
												<div class="col-sm-2">
													<select class="form-control" id="Status" name="Status">
														<?php
														foreach($status_list as $status_one) {

															if( $status_one == $Status) {
																echo '<option value="' . $status_one . '" selected>' . $status_one . '</option>';
															} else {
																echo '<option value="' . $status_one . '">' . $status_one . '</option>';
															}
														}
														?>
													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-1"></div>
									</div>
								</section>
								<input type="hidden" id="sel_id" name="sel_id" value="<?php echo $selected->student_id;?>">
								<input type="hidden" id="sig_base64" name="sig_base64">
							</form>
						</div>
					</div>
				</div>
				<!-- Footer Start -->
				<?php
					$this->load->view("parents/common/footer.php");
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
	<!-- Page Specific JS Libraries -->
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-gmap3/gmap3.min.js"></script>
	<script src="<?= asset_base_url()?>/js/pages/google-maps.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-validator/js/bootstrapValidator.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-notifyjs/notify.min.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-notifyjs/styles/metro/notify-metro.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-multiselect/js/bootstrap-select.js"></script>
	<script src="<?= asset_base_url()?>/libs/bootstrap-multiselect2/js/bootstrap-multiselect.js"></script>
	<script src="<?= asset_base_url()?>/libs/jquery-wizard/jquery.easyWizard.js"></script>
	<script src="<?= asset_base_url()?>/js/pages/form-wizard.js"></script>

	<script src="<?= asset_base_url()?>/libs/jSignature/jSignature.min.js"></script>

	<script>

		$(document).ready(function() {



			$('#myWizard').css("overflow", "visible");

			$('.selectpicker').selectpicker('refresh');

			$("#signature").jSignature();

			$("#ClearSigBtn").click(function () {
				$("#signature").jSignature('reset')
			});

			$("#signature").bind('change', function(e){

				var datapair = $("#signature").jSignature("getData", "image");
				var src = "data:" + datapair[0] + "," + datapair[1]
				$("#sig_base64").val(src);
			});

			$('#myWizard')
				.bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						SchoolYear: {
							message: 'School Year is not valid',
							validators: {
								notEmpty: {
									message: 'School Year is required and can\'t be empty'
								}
							}
						},
						FirstName: {
							message: 'First Name is not valid',
							validators: {
								notEmpty: {
									message: 'First Name is required and can\'t be empty'
								},
								regexp: {
									regexp: /^[a-zA-Z ]+$/,
									message: 'First Name can only consist of alphabetical, number'
								}
							}
						},
						LastName: {
							message: 'Last Name is not valid',
							validators: {
								notEmpty: {
									message: 'Last Name is required and can\'t be empty'
								},
								regexp: {
									regexp: /^[a-zA-Z ]+$/,
									message: 'Last Name can only consist of alphabetical, number'
								}
							}
						},
						GradeFall: {
							message: 'Grade in the Fall is not valid',
							validators: {
								notEmpty: {
									message: 'Grade in the Fall is required and can\'t be empty'
								}
							}
						},
						Address1: {
							message: 'Address1 is not valid',
							validators: {
								notEmpty: {
									message: 'Address1 is required and can\'t be empty'
								},
								regexp: {
									regexp: /^[a-zA-Z0-9 ]+$/,
									message: 'Address1 can only consist of alphabetical, number, space'
								}
							}
						},
						City: {
							message: 'City is not valid',
							validators: {
								notEmpty: {
									message: 'City is required and can\'t be empty'
								},
								regexp: {
									regexp: /^[a-zA-Z0-9 ]+$/,
									message: 'City can only consist of alphabetical, number, space'
								}
							}
						},
						ZipCode: {
							message: 'Zip Code is not valid',
							validators: {
								notEmpty: {
									message: 'Zip Code is required and can\'t be empty'
								},
								regexp: {
									regexp: /^[a-zA-Z0-9 ]+$/,
									message: 'Zip Code can only consist of alphabetical, number'
								}
							}
						},
						PrimaryPhone: {
							message: 'Primary Phone is not valid',
							validators: {
								notEmpty: {
									message: 'Primary Phone is required and can\'t be empty'
								},
								regexp: {
									regexp: /^[0-9 ]+$/,
									message: 'Primary Phone can only consist of number'
								}
							}
						},
						Parent: {
							message: 'Parent is not valid',
							validators: {
								notEmpty: {
									message: 'Parent is required and can\'t be empty'
								}
							}
						},
						Status: {
							message: 'Status is not valid',
							validators: {
								notEmpty: {
									message: 'Status is required and can\'t be empty'
								}
							}
						}

					}
				});

		});

	</script>

	</body>
</html>