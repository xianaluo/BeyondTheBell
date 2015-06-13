<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>   
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
            <div class="profile-banner" style="background-image: url(/images/stock/1epgUO0.jpg);">
                <div class="col-sm-3 avatar-container">
                    <img src="<?php echo gf_profile_picture2($userinfo->user_id, $userinfo->profilePicture); ?>" class="img-circle profile-avatar" alt="User avatar">
                </div>
            </div>
            <div class="content">

                <div class="row">
                    <div class="col-sm-3">
                        <!-- Begin user profile -->
                        <div class="text-center user-profile-2">
                            <?php
                                $fullName = $userinfo->firstName.' '.$userinfo->middleInitial.' '.$userinfo->lastName;
                            ?>
                            <h4><b><?php echo $fullName;?></b>'s Profile</h4>
                            
                            <h5><?php echo $userinfo->userType; ?></h5>
                            
                                
                                <!-- User button -->
                            
                        </div><!-- End div .box-info -->
                        <!-- Begin user profile -->
                    </div><!-- End div .col-sm-4 -->
                    <?php 
                        if(gf_cu_rightsChat()) {
                            $tab_disable = "";
                            $tab_disabled = 'href="#mymessage" data-toggle="tab"';
                        } else {
                            $tab_disable = " disabled";
                            $tab_disabled = "";
                        }
                    ?>
                    <div class="col-sm-9">
                        <div class="widget widget-tabbed">
                            <!-- Nav tab -->
                            <ul class="nav nav-tabs nav-justified">
                           <?php  if (!isset($_GET['cat'])) {?>
                              <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-user"></i> User Details</a></li>
                              <li id="msgmsg" class="<?php echo $tab_disable;?>"><a class="<?php echo $tab_disable;?>" <?php echo $tab_disabled;?>><i class="fa fa-envelope"></i> Message</a></li>
                           <?php } else { ?>
                              <li><a href="#about" data-toggle="tab"><i class="fa fa-user"></i> User Details</a></li>
                              <li id="msgmsg" class="active <?php echo $tab_disable;?>"><a class="<?php echo $tab_disable;?>" <?php echo $tab_disabled;?>><i class="fa fa-envelope"></i> Message</a></li>
                           <?php }?>
                            </ul>
                            <!-- End nav tab -->


                            <!-- Tab panes -->
                            <div class="tab-content">


                                <!-- Tab about -->

                           <?php  if (!isset($_GET['cat'])) {?>
                                <div class="tab-pane animated active fadeInRight" id="about">
                           <?php } else { ?>
                                <div class="tab-pane animated fadeInRight" id="about">
                           <?php } ?>
                                    <form role="form" action="/user/editUser" method="post" enctype="multipart/form-data" id="registerForm" name="registerForm">

                                    <div class="user-profile-content">
                                        <h5><b><?php echo $fullName; ?></b>'s ACCOUNT</h5>
                                        <?php
                                        if($error) {
                                            echo '<div class="alert alert-danger nomargin">'.$error.'</div>';
                                        }

                                        if(validation_errors()) {
                                            echo '<div class="alert alert-danger nomargin">'.validation_errors().'</div>';
                                        }
                                        ?>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h5><strong>Edit </strong></h5>
                                                  <div class="form-group">
                                                    <label for="exampleInputEmail1">User Type</label>

                                                    <select class="form-control" id="UserType" name="UserType">
                                                        <?php
                                                            foreach($arr_usertype as $usertype) {
                                                                if($userinfo->userType == $usertype->cate_name)
                                                                    echo '<option value="'.$usertype->cate_name.'" selected>'.$usertype->cate_name.'</option>';
                                                                else
                                                                    echo '<option value="'.$usertype->cate_name.'">'.$usertype->cate_name.'</option>';
                                                            }
                                                        ?>
                                                    </select>

                                                  </div>
                                                    <div class="form-group">
                                                    <label for="exampleInputEmail1">First Name</label>
                                                    <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="" value="<?php echo $userinfo->firstName?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="exampleInputEmail1">Middle Initial</label>
                                                    <input type="text" class="form-control" id="MiddleInitial" name="MiddleInitial" placeholder="" value="<?php echo $userinfo->middleInitial?>">
                                                  </div>
                                                   <div class="form-group">
                                                    <label for="exampleInputEmail1">Last Name</label>
                                                    <input type="text" class="form-control" id="LastName" name="LastName" placeholder="" value="<?php echo $userinfo->lastName?>">
                                                  </div>
                                                    <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" id="EmailAddress" name="EmailAddress" placeholder="Enter email" value="<?php echo $userinfo->emailAddress?>">
                                                  </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Profile picture</label>
                                                    <br>
                                                    <input type="file" class="btn btn-default" title="Select profile picture" id="ProfilePicture" name="ProfilePicture">
                                                </div>
                                               

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Phone Number</label>
                                                    <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="" value="<?php echo $userinfo->phoneNumber?>">
                                                  </div>
                                                 <div class="form-group">
                                                    <label for="exampleInputEmail1">Address 1</label>
                                                    <input type="text" class="form-control" id="Address1" name="Address1" placeholder="" value="<?php echo $userinfo->address1?>">
                                                  </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Address 2</label>
                                                    <input type="text" class="form-control" id="Address2" name="Address2" placeholder="" value="<?php echo $userinfo->address2?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="exampleInputEmail1">City</label>
                                                    <input type="text" class="form-control" id="City" name="City" placeholder="" value="<?php echo $userinfo->city?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="exampleInputEmail1">State</label>

                                                    <select class="form-control" id="State" name="State">
                                                        <?php
                                                            foreach($arr_state as $state) {
                                                                if($userinfo->state == $state->cate_id)
                                                                    echo '<option value="'.$state->cate_id.'" selected>'.$state->cate_name.'</option>';
                                                                else
                                                                    echo '<option value="'.$state->cate_id.'">'.$state->cate_name.'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="exampleInputEmail1">Zip Code</label>
                                                    <input type="text" class="form-control" id="ZipCode" name="ZipCode" placeholder="" value="<?php echo $userinfo->zipCode?>">
                                                  </div>
                                    
                                            </div>
                                        </div><!-- End div .row -->

<?php if (gf_isAdmin()) {?>
                                        <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <h5><strong>User Management Rights</strong></h5>
                                                          <label>
                                                            <input class="viewCheck" type="checkbox" id="RightsView" name="RightsView" value="View" <?php if($userinfo->rightsView) echo "checked";?>>
                                                            View Users
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsAdd" name="RightsAdd" value="Add" <?php if($userinfo->rightsAdd) echo "checked";?>>
                                                           Add Users
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsDelete" name="RightsDelete" value="Delete" <?php if($userinfo->rightsDelete) echo "checked";?>>
                                                            Delete Users
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsEdit" name="RightsEdit" value="Edit" <?php if($userinfo->rightsEdit) echo "checked";?>>
                                                            Edit Users
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsChat" name="RightsChat" value="Chat" <?php if($userinfo->rightsChat) echo "checked";?>>
                                                            Chat
                                                          </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <h5><strong>School Management Rights</strong></h5>
                                                          <label>
                                                            <input class="viewCheck" type="checkbox" id="RightsSchoolView" name="RightsSchoolView" value="View" <?php if($userinfo->rightsSchoolView) echo "checked";?>>
                                                            View Schools
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsSchoolAdd" name="RightsSchoolAdd" value="Add" <?php if($userinfo->rightsSchoolAdd) echo "checked";?>>
                                                           Add Schools
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsSchoolDelete" name="RightsSchoolDelete" value="Delete" <?php if($userinfo->rightsSchoolDelete) echo "checked";?>>
                                                            Delete Schools
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsSchoolEdit" name="RightsSchoolEdit" value="Edit" <?php if($userinfo->rightsSchoolEdit) echo "checked";?>>
                                                            Edit Schools
                                                          </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <h5><strong>Activity Management Rights</strong></h5>
                                                          <label>
                                                            <input class="viewCheck" type="checkbox" id="RightsActivityView" name="RightsActivityView" value="View" <?php if($userinfo->rightsActivityView) echo "checked";?>>
                                                            View Activity
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsActivityAdd" name="RightsActivityAdd" value="Add" <?php if($userinfo->rightsActivityAdd) echo "checked";?>>
                                                           Add Activity
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsActivityEdit" name="RightsActivityEdit" value="Edit" <?php if($userinfo->rightsActivityEdit) echo "checked";?>>
                                                            Edit Activity
                                                          </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <h5><strong>Discount Management Rights</strong></h5>
                                                          <label>
                                                            <input class="viewCheck" type="checkbox" id="RightsDiscountView" name="RightsDiscountView" value="View" <?php if($userinfo->rightsDiscountView) echo "checked";?>>
                                                            View Discounts
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsDiscountAdd" name="RightsDiscountAdd" value="Add" <?php if($userinfo->rightsDiscountAdd) echo "checked";?>>
                                                           Add Discounts
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsDiscountDelete" name="RightsDiscountDelete" value="Delete" <?php if($userinfo->rightsDiscountDelete) echo "checked";?>>
                                                            Delete Discounts
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsDiscountEdit" name="RightsDiscountEdit" value="Edit" <?php if($userinfo->rightsDiscountEdit) echo "checked";?>>
                                                            Edit Discounts
                                                          </label>
                                                        </div>
                                                    </div>
                                        </div>
                                        <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <h5><strong>Message Center Rights</strong></h5>
                                                          <label>
                                                            <input class="viewCheck" type="checkbox" id="RightsMsgView" name="RightsMsgView" value="View" <?php if($userinfo->rightsMsgView) echo "checked";?>>
                                                            View Messages
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsMsgAdd" name="RightsMsgAdd" value="Add" <?php if($userinfo->rightsMsgAdd) echo "checked";?>>
                                                           Add Messages
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsMsgDelete" name="RightsMsgDelete" value="Delete" <?php if($userinfo->rightsMsgDelete) echo "checked";?>>
                                                            Delete Messages
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsMsgEdit" name="RightsMsgEdit" value="Edit" <?php if($userinfo->rightsMsgEdit) echo "checked";?>>
                                                            Edit Messages
                                                          </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <h5><strong>Student Management Rights</strong></h5>
                                                          <label>
                                                            <input class="viewCheck" type="checkbox" id="RightsStudentView" name="RightsStudentView" value="View" <?php if($userinfo->rightsStudentView) echo "checked";?>>
                                                            View Students
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsStudentAdd" name="RightsStudentAdd" value="Add" <?php if($userinfo->rightsStudentAdd) echo "checked";?>>
                                                           Add Students
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsStudentDelete" name="RightsStudentDelete" value="Delete" <?php if($userinfo->rightsStudentDelete) echo "checked";?>>
                                                            Delete Students
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsStudentEdit" name="RightsStudentEdit" value="Edit" <?php if($userinfo->rightsStudentEdit) echo "checked";?>>
                                                            Edit Students
                                                          </label>
                                                        </div>
                                                    </div>                                                    

                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <h5><strong>Attendance Rights</strong></h5>
                                                          <label>
                                                            <input class="viewCheck" type="checkbox" id="RightsAttendanceView" name="RightsAttendanceView" value="View" <?php if($userinfo->rightsAttendanceView) echo "checked";?>>
                                                            View Attendances
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsAttendanceAdd" name="RightsAttendanceAdd" value="Add" <?php if($userinfo->rightsAttendanceAdd) echo "checked";?>>
                                                           Add Attendances
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsAttendanceDelete" name="RightsAttendanceDelete" value="Delete" <?php if($userinfo->rightsAttendanceDelete) echo "checked";?>>
                                                            Delete Attendances
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsAttendanceEdit" name="RightsAttendanceEdit" value="Edit" <?php if($userinfo->rightsAttendanceEdit) echo "checked";?>>
                                                            Edit Attendances
                                                          </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <h5><strong>Report Center Rights</strong></h5>
                                                          <label>
                                                            <input class="viewCheck" type="checkbox" id="RightsReportsView" name="RightsReportsView" value="View" <?php if($userinfo->rightsReportsView) echo "checked";?>>
                                                            View Reports
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsReportsAdd" name="RightsReportsAdd" value="Add" <?php if($userinfo->rightsReportsAdd) echo "checked";?>>
                                                           Add Reports
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsReportsDelete" name="RightsReportsDelete" value="Delete" <?php if($userinfo->rightsReportsDelete) echo "checked";?>>
                                                            Delete Reports
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox"  id="RightsReportsEdit" name="RightsReportsEdit" value="Edit" <?php if($userinfo->rightsReportsEdit) echo "checked";?>>
                                                            Edit Reports
                                                          </label>
                                                        </div>
                                                    </div>
                                        </div>
                                        <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <h5><strong>Daily Message Rights</strong></h5>
                                                          <label>
                                                            <input class="viewCheck" type="checkbox" id="RightsDaily" name="RightsDaily" value="Edit" <?php if($userinfo->rightsDaily) echo "checked";?>>
                                                            Edit Message
                                                          </label>
                                                        </div>
                                                    </div>                                                  
                                        </div><!-- End div .row -->
<?php }?>
       
                                        <?php
                                                if(gf_cu_rightsEdit()) {
                                                    echo '
                                                    <button type="submit" class="btn btn-default">Save</button>
                                                    ';
                                                }
                                            ?>  
                                    </div><!-- End div .user-profile-content -->

                                    <?php

                                        if(gf_cu_rightsDelete()) {
                                            echo '
                                            <div class="user-profile-content">
                                                <h5>DANAGER AREA</h5>
                                                <hr />
                                                <a class="btn btn-danger md-trigger" data-modal="delete-modal"><i class="fa fa-trash-o"></i> Delete</a>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                    </div>
                                                 </div>
                                            </div><!-- End div .user-profile-content -->
                                            ';
                                        }

                                    ?>

                                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $userinfo->user_id?>">
                                    </form>
                                    <!-- End Tab about -->
                                </div><!-- End div .tab-pane -->

                                <!-- Tab user messages -->
                            <?php  if (!isset($_GET['cat'])) {?>
                                <div class="tab-pane animated fadeInRight" id="mymessage">
                           <?php } else { ?>
                                <div class="tab-pane animated active fadeInRight" id="mymessage">
                           <?php } ?>
                                    <div class="scroll-user-widget">
                                        <form role="form" class="post-to-timeline" style = "padding:10px;" id="chatForm" name="chatForm">
                                            <input type="text" class="form-control" placeholder="Whats on your mind..." id="chatMessage" name="chatMessage">
                                            <div class="row" style="padding-top:10px;">
                                                <div class="col-sm-6 text-right" style = "float: right;"><a class="btn btn-primary" id="SendBtn" name="SendBtn">Post</a></div>
                                            </div>
                                        </form>
                                        <ul class="media-list" id="chatList" name="chatList">
                                            <!--
                                            <li class="media">
                                                <a class="pull-left" href="#fakelink">
                                                    <img class="media-object" src="images/users/user-100.jpg" alt="Avatar">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a href="#fakelink">Sean Richardson</a> <small>Just now</small></h4>
                                                    <p>Going great! It should be done today.</p>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <a class="pull-left" href="#fakelink">
                                                    <img class="media-object" src="images/users/user-100-2.jpg" alt="Avatar">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a href="#fakelink">You</a> <small>Today at 08:55 AM</small></h4>
                                                    <p>Hey, good morning! How is the progress of the parent portal?</p>
                                                </div>
                                            </li>
                                            -->
                                        </ul>
                                        <div class="row"  style = "padding:10px;">
                                            <div class="col-sm-6 text-right" style = "float: right;"><a class="btn btn-primary btn-xs" id="MoreBtn" name="MoreBtn">More...</a></div>
                                        </div>
                                    </div><!-- End div .scroll-user-widget -->
                                </div><!-- End div .tab-pane -->

                                <!-- End Tab user messages -->
                            </div><!-- End div .tab-content -->
                        </div><!-- End div .box-info -->
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
    <script src="<?= asset_base_url()?>/libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?= asset_base_url()?>/libs/jquery-icheck/icheck.min.js"></script>

    <script>
         $('.viewCheck').each(function(){
             
             if ($(this).prop('checked')) {
                 $(this).parent().parent().siblings('.checkbox').each(function(){
                    $(this).find('input').prop('disabled', false); 
                 });
                 $(this).parent().parent().parent().siblings('.checkbox').each(function(){
                     $(this).find('input').iCheck('enable');
                 });
             } else {
                 $(this).parent().parent().siblings('.checkbox').each(function(){
                    $(this).find('input').prop('disabled', true); 
                 });
                 $(this).parent().parent().parent().siblings('.checkbox').each(function(){
                     $(this).find('input').iCheck('enable');
                 });
             }   
         });    
     
         $('.viewCheck').change(function() {
             if ($(this).prop('checked')) {
                 $(this).parent().parent().siblings('.checkbox').each(function(){
                    $(this).find('input').prop('disabled', false); 
                 });
             } else {
                 $(this).parent().parent().siblings('.checkbox').each(function(){
                    $(this).find('input').prop('disabled', true); 
                 });
             }
         });
         
         $('input').on('ifChecked', function(event) {
             if ($(this).hasClass('viewCheck')) {
                 $(this).parent().parent().parent().siblings('.checkbox').each(function(){
                     $(this).find('input').iCheck('enable');
                 })
             }
         });
         $('input').on('ifUnchecked', function(event) {
             if ($(this).hasClass('viewCheck')) {
                 $(this).parent().parent().parent().siblings('.checkbox').each(function(){
                     $(this).find('input').iCheck('disable');
                 })
             }
         });
         
    </script>
    
    <!-- Demo Specific JS Libraries -->
    <script src="<?= asset_base_url()?>/libs/prettify/prettify.js"></script>

    <script src="<?= asset_base_url()?>/js/init.js"></script>
    <!-- Page Specific JS Libraries -->
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="<?= asset_base_url()?>/libs/jquery-gmap3/gmap3.min.js"></script>
    <script src="<?= asset_base_url()?>/js/pages/google-maps.js"></script>
    <script src="<?= asset_base_url()?>/libs/bootstrap-validator/js/bootstrapValidator.min.js"></script>
    <script src="<?= asset_base_url()?>/libs/jquery-notifyjs/notify.min.js"></script>
    <script src="<?= asset_base_url()?>/libs/jquery-notifyjs/styles/metro/notify-metro.js"></script>

    <script>

        <?php

            echo '

            var from = "'.gf_cu_id().'";
            var from_profile = "'.gf_profile_picture().'";
            var to = "'.$userinfo->user_id.'";
            var to_profile = "'.gf_profile_picture2($userinfo->user_id, $userinfo->profilePicture).'";
            var to_name = "'.$fullName.'";

            ';

        ?>

        var timerId = -1;
        var chat_list_limit = 10;
        var chat_more_count = 5;
        var chat_list = new Array();

        var checkDuplicate = function(chat_one) {

            for(var i=(chat_list.length-1);i>=0;i--) {

                if(chat_list[i][3] == chat_one[3]) {

                    return true;
                }
            }

            return false;

        }

        var addChats = function(arrayOfData) {

            for(var i=0;i<arrayOfData.length;i++) {

                var chat_one = arrayOfData[i];

                if(!checkDuplicate(chat_one)) {

                    chat_list.push(chat_one);

                    var name;
                    var profile;

                    if(chat_one[0] == from) {
                        name = "You";
                        profile = from_profile;
                    } else {
                        name = to_name;
                        profile = to_profile;
                    }

                    var child = '';
                    child += '<li class="media">';
                    child += '    <a class="pull-left" href="#fakelink">';
                    child += '    <img class="media-object" src="' + profile + '" alt="Avatar">';
                    child += '    </a>';
                    child += '    <div class="media-body">';
                    child += '    <h4 class="media-heading"><a href="#fakelink">' + name + '</a> <small>'+ chat_one[4] +'</small></h4>';
                    child += '    <p>' + chat_one[2] + '</p>';
                    child += '    </div>';
                    child += '</li>';

                    $("#chatList").prepend(child);

                    time = chat_one[3];
                }
            }

            while(chat_list.length > chat_list_limit) {

                chat_list.shift(); //chat_list.splice(0,1);

                $('#chatList li:last-child').remove();

            }

        }

        var addChatsOld = function(arrayOfData) {

            for(var i=arrayOfData.length-1;i>=0;i--) {

                var chat_one = arrayOfData[i];

                chat_list.unshift(chat_one);

                var name;
                var profile;

                if(chat_one[0] == from) {
                    name = "You";
                    profile = from_profile;
                } else {
                    name = to_name;
                    profile = to_profile;
                }

                var child = '';
                child += '<li class="media">';
                child += '    <a class="pull-left" href="#fakelink">';
                child += '    <img class="media-object" src="' + profile + '" alt="Avatar">';
                child += '    </a>';
                child += '    <div class="media-body">';
                child += '    <h4 class="media-heading"><a href="#fakelink">' + name + '</a> <small>'+ chat_one[4] +'</small></h4>';
                child += '    <p>' + chat_one[2] + '</p>';
                child += '    </div>';
                child += '</li>';

                $("#chatList").append(child);

            }

            chat_list_limit += arrayOfData.length;

        }

        var getNewChats = function () {

            var time = "";
            if(chat_list.length > 0) {
                time = chat_list[chat_list.length-1][3];
            }

            var get_url = "/chat/get?from=" + from + "&to=" + to + "&time=" + time;

            $.getJSON(get_url, function (data){

                if(timerId != -1) {

                    addChats(data);

                }
            });
        }


        var getOldChats = function() {


            if(chat_list.length == 0) return;

            stopTimer();

            var time = chat_list[0][3];


            $("#MoreBtn").attr("disabled", true);

            var get_url = "/chat/getOld?from=" + from + "&to=" + to + "&time=" + time + "&more=" + chat_more_count;

            $.getJSON(get_url, function (data){

                addChatsOld(data);

                $("#MoreBtn").attr("disabled", false);
                startTimer();

            });

            setTimeout('$("#MoreBtn").attr("disabled", false);', 5000);
            setTimeout("startTimer()", 5000);

        }

        var startTimer = function() {
            
            if(timerId == -1) {

                timerId = setInterval(function () {
                    getNewChats(0);
                    if ($("#msgmsg").hasClass('active')) {
                    console.log("start");
                    var get_url = "/chat/setMark?from=<?php echo $userinfo->user_id;?>";
                    $.getJSON(get_url, function (data){
                        console.log("success");
                        $("#unreadBadge").text("0");        
                        $("#unreadBadge").removeClass("red");        
                        $("#unread").html("");
                    });    
                }
                }, 2000);
            }
        }

        var stopTimer = function() {

            if(timerId != -1) {

                clearInterval(timerId);
                timerId = -1;
            }
        }


        var sendChat = function() {

            var message = $("#chatMessage").val();


            if($.trim(message) == "") {
                return;
            }

            stopTimer();

            var time = "";
            if(chat_list.length > 0) {
                time = chat_list[chat_list.length-1][3];
            }

            $("#chatMessage").val('');

            var send_url = "/chat/send?from=" + from + "&to=" + to + "&message=" + message + "&time=" + time;

            $.getJSON(send_url, function (data) {

                addChats(data);

//                startTimer();
            });

            setTimeout("startTimer()", 5000);

        }
        
        $(document).ready(function() {
//            alert("xsssxxxss");

            $( "#chatForm" ).submit(function( event ) {
                event.preventDefault();
                sendChat();

            });

            
            //for char
            $("#SendBtn").click(function () {

                sendChat();
            });

            $("#MoreBtn").click(function () {
                getOldChats();

            });
            
            
            startTimer();

            $('#registerForm').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    FirstName: {
                        message: 'First Name is not valid',
                        validators: {
                            notEmpty: {
                                message: 'First Name is required and can\'t be empty'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\. ]+$/,
                                message: 'First Name can only consist of alphabetical, number, space, dot and underscore'
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
                                regexp: /^[a-zA-Z0-9_\. ]+$/,
                                message: 'First Name can only consist of alphabetical, number, space, dot and underscore'
                            }
                        }
                    },
                    EmailAddress: {
                        validators: {
                            notEmpty: {
                                message: 'The email address is required and can\'t be empty'
                            },
                            emailAddress: {
                                message: 'The input is not a valid email address'
                            }
                        }
                    },
                    PhoneNumber: {
                        message: 'Phone Number is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Phone Number is required and can\'t be empty'
                            },
                            digits: {
                                message: 'The value can contain only digits'
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
                                regexp: /^[a-zA-Z0-9_\. ]+$/,
                                message: 'Address1 can only consist of alphabetical, number, space, dot and underscore'
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
                                regexp: /^[a-zA-Z0-9_\. ]+$/,
                                message: 'City can only consist of alphabetical, number, space, dot and underscore'
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
                                regexp: /^[a-zA-Z0-9_\. ]+$/,
                                message: 'Zip Code can only consist of alphabetical, number, space, dot and underscore'
                            }
                        }
                    }
                }
            });

        });

    </script> 
    </body>
</html>