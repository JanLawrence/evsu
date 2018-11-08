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
    <body style=" background: transparent; padding: 10px;">
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
                            <!-- /# column -->
                    </section>
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
