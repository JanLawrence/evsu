<?php  
    $user = $this->session->userdata['user'];
    if($user->user_type=='admin'){
        $query = $this->db->get_where('tbl_admin', array('id' => $user->user_id));
        $dataUser = $query->result();
    }
?>
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <div class="logo">
                <a href="index.html">
                    <img src="<?= base_url(); ?>assets/img/evsu.png" style="width: 130px;" class="logo-img" alt="" />
                </a>
            </div>
            <ul>
                <??>
                <?php if($user->user_type == 'admin'):?>
                    <li><a href="<?= base_url(); ?>dashboard"><i class="ti-dashboard"></i> Dashboard</a></li>
                    <li><a href="<?= base_url(); ?>teachers"><i class="ti-user"></i> Teachers</a></li>
                    <li><a href="<?= base_url(); ?>section"><i class="ti-comments"></i> Sections</a></li>
                    <li><a href="<?= base_url(); ?>subjects"><i class="ti-book"></i> Subjects</a></li>
                    <li><a href="<?= base_url(); ?>students"><i class="ti-user"></i> Students</a></li>
                    <!-- <li><a href="<?= base_url(); ?>students/studentlog"><i class="ti-agenda"></i> Student Log</a></li> -->
                    <li><a href="<?= base_url(); ?>announcements/announcementList"><i class="ti-announcement"></i> Announcements</a></li>
                    <li><a href="<?= base_url(); ?>feedbacks/feedbackList"><i class="ti-comments"></i> Feedbacks</a></li>
                    <li><a href="<?= base_url(); ?>school_year"><i class="ti-comments"></i> School Year</a></li>
                    <li><a href="<?= base_url(); ?>admingrade"><i class="ti-book"></i> Grades</a></li>
                    <?php if($dataUser[0]->admin_type=='admin'):?>
                        <li><a href="<?= base_url(); ?>users"><i class="ti-user"></i> User</a></li>
                    <?php endif;?>
                    <li><a href="<?= base_url(); ?>logs/userlogs"><i class="ti-agenda"></i> User Logs</a></li>
                    <li><a href="<?= base_url(); ?>help"><i class="ti-announcement"></i> Help</a></li>
                <?php endif;?>


                <?php if($user->user_type == 'teacher'):?>
                    <li><a href="<?= base_url(); ?>announcements"><i class="ti-announcement"></i> Announcements</a></li>
                    <li><a href="<?= base_url(); ?>grades/add"><i class="ti-clipboard"></i> Grades</a></li>
                    <!-- <li><a href="<?= base_url(); ?>students/studentattendance"><i class="ti-agenda"></i> Student Attendance</a></li> -->
                    <li><a href="<?= base_url(); ?>inbox"><i class="ti-comments"></i> Inbox</a></li>
                    <li><a href="<?= base_url(); ?>advisory"><i class="ti-write"></i> Class Cards</a></li>
                <?php endif;?>

                <?php if($user->user_type == 'student'):?>
                    <li><a href="<?= base_url(); ?>announcements/announcementList"><i class="ti-announcement"></i> Announcements</a></li>
                    <li><a href="<?= base_url(); ?>students/studentgrade"><i class="ti-clipboard"></i> Student Grade</a></li>
                    <!-- <li><a href="<?= base_url(); ?>students/studentattendance"><i class="ti-agenda"></i> Student Attendance</a></li> -->
                    <li><a href="<?= base_url(); ?>feedbacks"><i class="ti-comments"></i> Feedbacks</a></li>
                    <li><a href="<?= base_url(); ?>attendance"><i class="ti-comments"></i> Attendance</a></li>
                <?php endif;?>
                <?php if($user->user_type == 'parent'):?>
                    <li><a href="<?= base_url(); ?>students/studentgrade"><i class="ti-clipboard"></i> Student Grade</a></li>
                    <li><a href="<?= base_url(); ?>inbox"><i class="ti-comments"></i> Inbox</a></li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</div>