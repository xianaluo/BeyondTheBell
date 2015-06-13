<!-- Left Sidebar Start -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!-- Search form -->

        <form role="search" class="navbar-form">
            <div class="form-group">
                <input type="text" placeholder="Search" class="form-control">
                <button type="submit" class="btn search-button"><i class="fa fa-search"></i></button>
            </div>
        </form>
        <div class="clearfix"></div>
        <!--- Profile -->
        <div class="profile-info">
            <div class="col-xs-4">
                <a href="/parents/profile" class="rounded-image profile-image"><img src="<?php echo gf_profile_picture();?>"></a>
            </div>
            <div class="col-xs-8">
                <div class="profile-text">Welcome <b><?php echo gf_cu_firstName();?></b></div>
                <div class="profile-buttons">

                    <a href="/parents/auth/logout" title="Sign Out"><i class="fa fa-power-off text-red-1"></i></a>
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
                    <a href='/parents/dashboard'><i class='icon-home-3'></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href='/parents/children'><i class='fa fa-user'></i><!-- class='active'-->
                        <span>Your children</span>
                    </a>
                </li>
                <li>
                    <a href='/parents/billing'><i class='icon-chart-line'></i>
                        <span>Billing</span>
                    </a>
                </li>
                <li>
                    <a href='/parents/support'><i class='icon-megaphone'></i>
                        <span>Support</span>
                    </a>
                </li>
            </ul><div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <div class="portlets">


            <div id="recent_tickets" class="widget transparent nomargin">
                <div class="widget-content">
                    <ul class="list-unstyled">
                        <li>
                            <a href="javascript:;">Let's have a great day!</span></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"></div><br><br><br>
    </div>

</div>
<!-- Left Sidebar End -->