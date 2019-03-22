<?php 
    $this->db->order_by('sy_from', 'DESC');
    $query = $this->db->get('tbl_school_year', 1);
    $sy = $query->result();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SPTA</title>

        <!-- Styles -->
        <link href="<?= base_url(); ?>assets/css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/css/lib/themify-icons.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/datatables/datatables.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/css/lib/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/css/lib/select2/select2.min.css">

        <link href="<?= base_url(); ?>assets/css/lib/helper.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/css/lib/select2/select2.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/css/style-me.css" rel="stylesheet">
        <script src="<?= base_url();?>assets/js/lib/jquery.min.js"></script>
        <script>
            var URL = "<?= base_url(); ?>"
        </script>
    </head>
    <body style="background-image: url('<?= base_url(); ?>assets/img/evsu-bg.jpg');background-repeat: no-repeat; background-size: 100%;">
        <div class="container-fluid  mt-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-logo mx-auto">
                                <img src="<?= base_url(); ?>assets/img/evsu-dark.png" class="logo-img" alt="" />
                            </div>
                        </div>
                    </div>
                    <!-- /# row -->
                    <section id="main-content">
                                <div class="row">
                                    <div class="col-lg-10 mx-auto">
                                    <hr>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <a href="<?=base_url()?>home/teacher">
                                                    <div class="card">
                                                        <div class="stat-widget-one">
                                                            <div class="stat-icon dib"><i class="ti-user color-success border-success"></i></div>
                                                            <div class="stat-content dib">
                                                                <div class="stat-text">Teacher</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-lg-3">
                                                <a href="<?=base_url()?>home/student">
                                                    <div class="card">
                                                        <div class="stat-widget-one">
                                                            <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i></div>
                                                            <div class="stat-content dib">
                                                                <div class="stat-text">Student</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <a href="<?=base_url()?>home/parent">
                                                    <div class="card">
                                                        <div class="stat-widget-one">
                                                            <div class="stat-icon dib"><i class="ti-user color-pink border-pink"></i></div>
                                                            <div class="stat-content dib">
                                                                <div class="stat-text">Parent</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-lg-3">
                                                <a href="<?=base_url()?>home/admin">
                                                    <div class="card">
                                                        <div class="stat-widget-one">
                                                            <div class="stat-icon dib"><i class="ti-user color-danger border-danger"></i></div>
                                                            <div class="stat-content dib">
                                                                <div class="stat-text">Admin</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <button class="btn btn-info btn-lg" style="padding: 10px 30px;" data-toggle="modal" data-target="#myModal"> About</button>
                                    </div>
                                </div>
                            <!-- /# column -->
                    </section>
                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal" id="myModal">
        	<div class="modal-dialog modal-lg">
        		<div class="modal-content" style="margin-top: 150px;">

        			<!-- Modal Header -->
        			<div class="modal-header">
        				<h6 class="modal-title"><img src="<?= base_url(); ?>assets/img/logo.png" class="logo-img" alt="" style="width: 16%;" /> About Us</h6>
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        			</div>

        			<!-- Modal body -->
        			<div class="modal-body text-center">
        				<p style="font-family: Montserrat;">The advancement of technology today has absorbed itself towards education. The presence of technology has reached its maximum of providing sustainable technology towards quality education through portals. Although starting with a portal that has a limited constitiuency may make sense, the goal of a school should be to move as quickly as possible to a web portal that serves everyone: students, parentss, faculty members and prospective students who would like to use the school web portal
                        </p>
        				<p style="font-family: Montserrat;">Students with parents who are involved in school tend to have fewer behavioural problems and better academic performance, and are more likely to complete secondary school than students with parents that are not involved in schools' (p. 1) Henderson and Berla (1994) found that parents who monitored the student's school work and daily activities, communicated frequently with the teachers, and help develop plans for education or work after high school had children who were more likely to graduate from high cshool and to pursue post-secondary education
                        </p>
        				<p style="font-family: Montserrat;">This system is intended to automate the traditional way of grading a student,recording its attendance, giving announcements and at the same parents are given the privilege to monitor their Childs' academic performance from time to time. This stydy will enhance the involvement of the parents in the child academic achievements. The proponents of this study believe that parental involvement in a childs's education inspire the child to achieve better and reach full potetial. That is the main reason why the proponents came up with the idea in developiong this system for the Laboratory School Department of Eastern Visayas State University
                        </p>
        			</div>

        			<!-- Modal footer -->
        			<div class="modal-footer text-center">
                        <p style="font-family: Montserrat;width: 100%;display: block;">All Rights Reserved, Laboratory School Department, School Year <?= !empty($sy) ? $sy[0]->sy_from.' - '.$sy[0]->sy_to : ' - '?></p>
        			</div>

        		</div>
        	</div>
        </div>
    <!-- nano scroller -->
    <script src="<?= base_url();?>assets/js/lib/menubar/sidebar.js"></script>
        <script src="<?= base_url();?>assets/js/lib/preloader/pace.min.js"></script>
        <!-- selectpicker -->
        <script src="<?= base_url();?>assets/js/lib/select2/select2.full.min.js"></script>
        <!-- sidebar -->
        <script src="<?= base_url();?>assets/js/lib/bootstrap.min.js"></script>
        <script src="<?= base_url();?>assets/js/lib/select2/select2.full.min.js"></script>
        <script src="<?= base_url();?>assets/datatables/datatables.min.js"></script>
        <script src="<?= base_url();?>assets/js/script-me.js"></script>

        <!-- bootstrap -->

        <script src="<?= base_url();?>assets/js/lib/circle-progress/circle-progress.min.js"></script>
        <script src="<?= base_url();?>assets/js/lib/circle-progress/circle-progress-init.js"></script>

        <script src="<?= base_url();?>assets/js/lib/morris-chart/raphael-min.js"></script>
        <script src="<?= base_url();?>assets/js/lib/morris-chart/morris.js"></script>
        <script src="<?= base_url();?>assets/js/lib/morris-chart/morris-init.js"></script>

        <!--  flot-chart js -->
        <script src="<?= base_url();?>assets/js/lib/flot-chart/jquery.flot.js"></script>
        <script src="<?= base_url();?>assets/js/lib/flot-chart/jquery.flot.resize.js"></script>
        <script src="<?= base_url();?>assets/js/lib/flot-chart/flot-chart-init.js"></script>
        <!-- // flot-chart js -->

        <!-- scripit init-->
        <script src="<?= base_url();?>assets/js/scripts.js"></script>
        
    </body>

</html>
