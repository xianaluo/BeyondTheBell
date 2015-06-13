<!-- Modal Start -->
<!-- Modal Task Progress -->
<div class="md-modal md-3d-flip-vertical" id="task-progress">
    <div class="md-content">
        <h3><strong>Task Progress</strong> Information</h3>
        <div>
            <p>CLEANING BUGS</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                    <span class="sr-only">80&#37; Complete</span>
                </div>
            </div>
            <p>POSTING SOME STUFF</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                    <span class="sr-only">65&#37; Complete</span>
                </div>
            </div>
            <p>BACKUP DATA FROM SERVER</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                    <span class="sr-only">95&#37; Complete</span>
                </div>
            </div>
            <p>RE-DESIGNING WEB APPLICATION</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="sr-only">100&#37; Complete</span>
                </div>
            </div>
            <p class="text-center">
                <button class="btn btn-danger btn-sm md-close">Close</button>
            </p>
        </div>
    </div>
</div>
<!-- Modal Confirmation -->
<div class="md-modal md-fade-in-scale-up" id="delete-modal">
    <div class="md-content">
        <h3><strong>Delete</strong> Confirmation</h3>
        <div>
            <p class="text-center">Are you sure want to delete the User Account?</p>
            <p class="text-center">
                <button class="btn btn-danger md-close">No</button>
                <a href="/user/deleteUser?user_id=<?php echo $userinfo->user_id?>" class="btn btn-success md-close">Yes</a>
            </p>
        </div>
    </div>
</div>

<!-- Modal Logout -->
<div class="md-modal md-just-me" id="logout-modal">
    <div class="md-content">
        <h3><strong>Logout</strong> Confirmation</h3>
        <div>
            <p class="text-center">Are you sure want to logout from this awesome system?</p>
            <p class="text-center">
                <button class="btn btn-danger md-close">Nope!</button>
                <a href="/auth/logout" class="btn btn-success md-close">Yeah, I'm sure</a>
            </p>
        </div>
    </div>
</div>
<!-- Modal End -->

<div id="change-msg" name="change-msg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Update Side Menu Message</h4>
            </div>
            <div class="modal-body ">
                <form role="form" id="sendForm1" name="sendForm1" method="post" action="/auth/saveInfo" enctype="multipart/form-data">
                    <?php
                    if($error) {
                        echo '<div class="alert alert-danger nomargin">'.$error.'</div>';
                    }

                    if(validation_errors()) {
                        echo '<div class="alert alert-danger nomargin">'.validation_errors().'</div>';
                    }
                    ?>
                    <div class="form-group">
                        <label for="cngMsgCat">Area:</label>
                        <select class="form-control" id="cngMsgCat" name="cngMsgCat">
                            <?php
                                if(gf_cu_msg_cat() == 1) {
                                    echo '<option value="1" selected>Backend</option>';
                                } else {
                                    echo '<option value="1">Backend</option>';
                                }
                                
                                if(gf_cu_msg_cat() == 2) {
                                    echo '<option value="2" selected>Parent Portal</option>';
                                } else {
                                    echo '<option value="2">Parent Portal</option>';
                                }
                                
                                if(gf_cu_msg_cat() == 3) {
                                    echo '<option value="3" selected>Both</option>';
                                } else {
                                    echo '<option value="3">Both</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cngMsg">Message:</label>
                        <input type="text" class="form-control input-lg" placeholder="Please input message" id="cngMsg" name="cngMsg" value="<?php echo gf_cu_msg(); ?>">
                    </div>
                    <div class="form-group">
                        <label for="cngMsgLink">Link:</label>
                        <select class="form-control" id="cngMsgLink" name="cngMsgLink" onchange="selectionChange()">
                            <?php
                                if(gf_cu_msg_link() == '/dashboard') {
                                    echo '<option value="/dashboard" selected>Dashboard</option>';
                                } else {
                                    echo '<option value="/dashboard">Dashboard</option>';
                                }
                                
                                if(gf_cu_msg_link() == '/user') {
                                    echo '<option value="/user" selected>User Management</option>';
                                } else {
                                    echo '<option value="/user">User Management</option>';
                                }
                                
                                if(gf_cu_msg_link() == '/schools') {
                                    echo '<option value="/schools" selected>School Management</option>';
                                } else {
                                    echo '<option value="/schools">School Management</option>';
                                }
                                
                                if(gf_cu_msg_link() == '/activity') {
                                    echo '<option value="/activity" selected>Activity Management</option>';
                                } else {
                                    echo '<option value="/activity">Activity Management</option>';
                                }
                                
                                if(gf_cu_msg_link() == '/discount') {
                                    echo '<option value="/discount" selected>Discount Management</option>';
                                } else {
                                    echo '<option value="/discount">Discount Management</option>';
                                }
                                
                                if(gf_cu_msg_link() == '/message_center') {
                                    echo '<option value="/message_center" selected>Message Center</option>';
                                } else {
                                    echo '<option value="/message_center">Message Center</option>';
                                }
                                
                                if(gf_cu_msg_link() == '/student') {
                                    echo '<option value="/student" selected>Student Management</option>';
                                } else {
                                    echo '<option value="/student">Student Management</option>';
                                }
                                
                                if(gf_cu_msg_link() == '/attendance') {
                                    echo '<option value="/attendance" selected>Attendance</option>';
                                } else {
                                    echo '<option value="/attendance">Attendance</option>';
                                }
                                
                                if(gf_cu_msg_link() == '/reports') {
                                    echo '<option value="/reports" selected>Reports</option>';
                                } else {
                                    echo '<option value="/reports">Reports</option>';
                                }
                                
                                if(gf_cu_msg_link() == '/') {
                                    echo '<option value="/" selected>Other Link</option>';
                                } else {
                                    echo '<option value="/">Other Link</option>';
                                    $hidden = ' hide';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group<?php echo $hidden;?>" id="other-link" >
                        <label for="MsgCat">Other Link:</label>
                        <input type="url" class="form-control input-lg" placeholder="Please input Message Link" id="cngMsgOther" name="cngMsgOther" value="<?php echo gf_cu_msg_other();?>">
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <button type="submit" class="btn btn-success btn-sm" id="SendBtn1" name="SendBtn1">Update</button>
                        </div>
                        
                    </div>
                    <script>
                        function selectionChange(){
//                            alert("ddd");
                            if (document.getElementById('cngMsgLink').value == '/') {
                                document.getElementById('other-link').className = "form-group";
                            } else {
                                document.getElementById('other-link').className = "form-group hide";
                            }        
                        }
                        
                    </script>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->