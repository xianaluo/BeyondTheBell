<!-- Left Sidebar Start -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!-- Search form -->

        <div class="clearfix" style="height:15px;"></div>
        <!--- Profile -->
        <div class="profile-info">
            <div class="col-xs-4">
                <a href="/user/profile" class="rounded-image profile-image"><img src="<?php echo gf_profile_picture();?>"></a>
            </div>
            <div class="col-xs-8">
                <div class="profile-text">Welcome <b><?php echo gf_cu_firstName();?></b></div>
                <div class="profile-buttons">

                    <a href="/auth/logout" title="Sign Out"><i class="fa fa-power-off text-red-1"></i></a>
                </div>
            </div>
        </div>
        <!--- Divider -->
        <div class="clearfix"></div>
        <hr class="divider" />
        <div class="clearfix"></div>
        <!--- Divider -->
        <div id="sidebar-menu">
           
            <ul>
                <li>
                    <a href='/dashboard'><i class='icon-home-3'></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php if(gf_cu_rightsView()) {?>
                <li>
                    <a href='/user'><i class='fa fa-user'></i><!-- class='active'-->
                        <span>User Management</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(gf_cu_rightsSchoolView()) {?>
                <li>
                    <a href='/schools'><i class='fa fa-sitemap'></i>
                        <span>School Management</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(gf_cu_rightsActivityView()) {?>
                <li>
                    <a href='/activity'><i class='fa fa-flag-o'></i>
                        <span>Activity Management</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(gf_cu_rightsDiscountView()) {?>
                <li>
                    <a href='/discount'><i class='fa fa-laptop'></i>
                        <span>Discount Management</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(gf_cu_rightsMsgView()) {?>
                <li>
                    <a href='/message_center'><i class='fa fa-envelope'></i>
                        <span>Message Center</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(gf_cu_rightsStudentView()) {?>
                <li>
                    <a href='/student'><i class='fa fa-group'></i>
                        <span>Student Management</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(gf_cu_rightsAttendanceView()) {?>
                <li>
                    <a href='/attendance'><i class='fa fa-calendar'></i>
                        <span>Attendance</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(gf_cu_rightsReportsView()) {?>
                <li>
                    <a href='/reports'><i class="fa fa-book"></i></i>
                        <span>Reports</span>
                    </a>
                </li>
                <?php } ?>
            </ul><div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <div class="portlets">


            <div id="recent_tickets" class="widget transparent nomargin">
                <div class="widget-content">
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?php echo gf_cu_msg_act_link();?>"><?php echo gf_cu_msg();?></span></a>
                        </li>
                        <?php if (gf_cu_rightsDaily()) {?>
                        <li>
                            <a class="btn" style="color:#3498db;text-align:left;" data-toggle="modal" data-target="#change-msg">Change this message.</span></a>
                        </li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"></div><br><br><br>
    </div>

</div>
<!-- Left Sidebar End -->