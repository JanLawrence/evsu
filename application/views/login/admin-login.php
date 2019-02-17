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
    <body style=" background-image: url('<?= base_url(); ?>assets/img/evsu-bg.jpg');background-repeat: no-repeat; background-size: 100%;">
    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content" style="margin: 40px;">
                        <div class="login-logo" style=" background: transparent; padding: 10px;">
                            <img src="<?= base_url(); ?>assets/img/evsu-dark.png" class="logo-img" alt="" />
                        </div>
                        <div class="login-form">
                            <h4>ADMIN LOGIN</h4>
                            <div class="text-center"><span>Please enter your details to login</span></div>
                            <form method="post" action="admin">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?=$username?>">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" value="<?=$password?>">
                                </div>
                                <div class="text-center">
                                    <?= validation_errors('<span class="alert alert-danger"><i class="ti-alert"></i> ', '</span>')?> 
                                </div>
                                <button type="submit" class="btn btn-info btn-flat m-b-30 m-t-30" style=" background: linear-gradient(120deg, #ed213a, #93291e);">Sign in</button>
                                <div class="form-group clearfix">
                                    <div class="float-left">
                                        <a class="btn-forgotpass" href="#"><small>Forgot Password?</small></a>
                                    </div>
                                    <div class="float-right">
                                        <a href="<?= base_url()?>"><small>< Back</small></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal fade" id="forgotPassModal">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center">Forgot Password</h5>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">Please enter your registered email. We will be sending and email to change your password.</p>
                                    <div class="form-group">
                                        <label>Email</label>
                                            <input type="text" class="form-control forgotemail" name="email">
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button class="btn btn-info btn-proceed">Proceed</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $('.btn-forgotpass').click(function(){
                $('#forgotPassModal').modal('toggle');
            })
            $('.btn-proceed').click(function(){
                var email = $('.forgotemail').val();
                if(email != ''){
                    $.post(URL+'account/emailSending', {'email': email})
                    .done(function(returnData){
                        if(returnData == 1){
                            location.href = URL + 'account/changePass?email=' + email;
                        } else {
                            alert('Invalid email')
                        }
                    }) 
                } else {
                    alert('Please input your email')
                }
            })
        })
    </script>
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
