<?php  
    $user = $this->session->userdata['user'];
    $this->db->select('id, title, portal');
    $help = $this->db->get_where('tbl_help', array('portal'=>$user->user_type));
    $help = $help->result();
?>
<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="float-right">
                    <ul>
                        <!-- <li class="header-icon dib"><i class="ti-bell"></i>
                            <div class="drop-down">
                                <div class="dropdown-content-heading">
                                    <span class="text-left">Recent Notifications</span>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr. John</div>
                                            <div class="notification-text">5 members joined today </div>
                                        </div>
                                    </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mariam</div>
                                            <div class="notification-text">likes a photo of you</div>
                                        </div>
                                    </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Tasnim</div>
                                            <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr. John</div>
                                            <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                        </li>
                                        <li class="text-center">
                                            <a href="#" class="more-link">See All</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="header-icon dib"><i class="ti-email"></i>
                            <div class="drop-down">
                                <div class="dropdown-content-heading">
                                    <span class="text-left">2 New Messages</span>
                                    <a href="email.html"><i class="ti-pencil-alt pull-right"></i></a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
                                            <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/1.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Michael Qin</div>
                                            <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                        </li>
                                        <li class="notification-unread">
                                            <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/2.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr. John</div>
                                            <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Michael Qin</div>
                                            <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/2.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr. John</div>
                                            <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                        </li>
                                        <li class="text-center">
                                            <a href="#" class="more-link">See All</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li> -->
                        <li class="header-icon dib"><span class="user-avatar">Help <i class="ti-angle-down f-s-10"></i></span>
                            <div class="drop-down dropdown-profile">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <?php foreach($help as $each): ?>
                                        <li><a href="<?= base_url()?>help/download?id=<?=$each->id?>" style="font-size: 12px;"><?= $each->title?></a></li> 
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="header-icon dib"><span class="user-avatar">Welcome! <?= $user->username ?> <i class="ti-angle-down f-s-10"></i></span>
                            <div class="drop-down dropdown-profile">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="<?= base_url('account/'.$user->user_type.'/'.$user->user_id)?>"><i class="ti-settings"></i> <span>Manage Account</span></a></li>
                                        <li><a id="openPass"><i class="ti-key"></i> <span>Change Password</span></a></li>
                                        <li><a href="<?= base_url()?>home/logout" id="logout"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="changePassForm" method="post">
    <div class="modal fade mt-5" id="changePassModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content mt-5">
                <div class="modal-header mt-5">
                    <h5 class="modal-title"><i class="ti-key"></i> Change Password</h5>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" class="form-control" name="oldpass">
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="pass">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="confirmpass">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                    <button type="submit" class="btn btn-default"><i class="ti-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $(function(){
        $('#logout').click(function(){
            var r = confirm('Are you sure you want to logout?');
            if(r==true){
                return;
            } else {
                return false;
            }
        })
        $('#openPass').click(function(){
            $('#changePassModal').modal('toggle');
        })
        $('#changePassForm').submit(function(){
            var r = confirm('Are you sure you want to change your password?');
            if(r==true){
                var form = $(this).serialize(); // get form declare to variable form
                var pass = $('#changePassForm').find('input[name=pass]').val(); // get value of pass input to changepassform
                var confirmpass = $('#changePassForm').find('input[name=confirmpass]').val(); // get value of confirmpass input to changepassform
                if(pass == confirmpass){ //if equal return to post
                    $.post(URL+'register/changepass', form) // post to register/changepass
                    .done(function(returnData){
                        if(returnData == 1){
                            alert('Invalid Old Password'); // alert error if old password is invalid
                        } else {
                            alert('Password successfully changed');
                            location.reload();
                        }
                    })
                } else {
                    alert('Password do not match'); // alert error
                }
            } else {
                return false;
            }
            return false;
        })
    })
</script>