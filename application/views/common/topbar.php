<!-- Top Bar Start -->
<div class="topbar">
    <div class="topbar-left">
        <div class="logo">
            <h1><a href="#"><img src="/images/logo.png" alt="Logo"></a></h1>
        </div>
        <button class="button-menu-mobile open-left">
            <i class="fa fa-bars"></i>
        </button>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-collapse2">
                <ul class="nav navbar-nav hidden-xs">

                </ul>
                <style>
                    #unreadBadge {background:#bbb;}
                    #unreadBadge.red {background:#eb5055;}
                </style>
                <ul class="nav navbar-nav navbar-right top-navbar">
                    <li class="dropdown topbar-profile">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i><span id="unreadBadge" class="badge" style="padding:2px 5px;position:relative;top:-8px;left:-4px;">0</span></a>
                        <ul class="dropdown-menu"  style="min-width:300px;">
                            <li style="height:30px;"><a style="padding:8px 10px;"><i class="fa fa-envelope"></i>&nbsp;&nbsp;New Messages</a></li>    
                            <li>
                                <ul id="unread" style="list-style:none;padding:0;margin:0">
                                    
                                </ul>
                            </li>
                            <li><a href="/user" class="btn"><i class="glyphicon glyphicon-share-alt"></i>&nbsp;See all messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown iconify hide-phone"><a href="#" onclick="javascript:toggle_fullscreen()"><i class="icon-resize-full-2"></i></a></li>
                    <li class="dropdown topbar-profile">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="rounded-image topbar-profile-image"><img src="<?php echo gf_profile_picture();?>"></span> <?php echo gf_cu_fullName();?> <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="/user/profile">My Profile</a></li>
                            <li><a href="#">Change Password</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="icon-help-2"></i> Help</a></li>
                            <li><a class="md-trigger" data-modal="logout-modal"><i class="icon-logout-1"></i> Logout</a></li>
                        </ul>
                    </li>
                    <!--
                    <li class="right-opener">
                        <a href="javascript:;" class="open-right"><i class="fa fa-angle-double-left"></i><i class="fa fa-angle-double-right"></i></a>
                    </li>
                    -->
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- Top Bar End -->