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
    <body>
    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content" style="margin: 40px;">
                        <div class="login-logo" style=" background: linear-gradient(120deg, #a73737, #7a2828); padding: 10px;">
                            <img src="<?= base_url(); ?>assets/img/evsu.png" class="logo-img" alt="" />
                        </div>
                        <div class="login-form">
                            <h4>Student Registration</h4>
                            <form method="post" action="">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">School ID:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="schoolId" value="<?= $students[0]->school_id ?>">
                                        <?= form_error('schoolId', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">First Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="firstName" value="<?= $students[0]->first_name ?>">
                                        <?= form_error('firstName', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Middle Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="middleName" value="<?= $students[0]->middle_name ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Last Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="lastName" value="<?= $students[0]->last_name ?>">
                                        <?= form_error('lastName', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="20" name="address"><?= $students[0]->address ?></textarea>
                                        <?= form_error('address', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Phone:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="phone" value="<?= $students[0]->phone ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="email" value="<?= $students[0]->email ?>">
                                        <?= form_error('email', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Username:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="username" value="<?= $students[0]->username?>">
                                        <input type="hidden" class="form-control" name="cred_id" value="<?= $students[0]->cred_id?>">
                                        <?= form_error('licenseNo', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password:</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password">
                                        <?= form_error('password', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Confirm Password:</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password_confirm">
                                        <?= form_error('password_confirm', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger btn-flat m-b-30 m-t-30" style=" background: linear-gradient(120deg, #a73737, #7a2828);">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url();?>assets/js/lib/jquery.nanoscroller.min.js"></script>
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
