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
                            <h4>SPTA</h4>
                            <div class="text-center"><span>Please set your new password below</span></div>
                            <form method="post" id="formChangePass">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="hidden" class="form-control" name="email" value="<?=$_GET['email']?>">
                                    <input type="password" class="form-control" name="newpassword" required>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" name="confirmpassword" required>
                                </div>
                                <button type="submit" class="btn btn-info btn-flat m-b-30 m-t-30" style=" background: linear-gradient(120deg, #ed213a, #93291e);">Proceed</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="successModal">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center">Success</h5>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">Password successfully changed, please login.</p>
                                <div class="modal-footer">
                                    <a class="btn btn-info btn-proceed" href="<?= base_url(); ?>home/teacher">Proceed</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $('#formChangePass').submit(function(){
                var newpass = $('input[name="newpassword"]').val();
                var confirmpass = $('input[name="confirmpassword"]').val();
                var form = $(this).serialize();
                if(newpass == confirmpass){
                    $.post(URL+'account/changePasswordTeacher', form)
                    .done(function(returnData){
                        $('#successModal').modal('toggle')
                    }) 
                } else {
                    alert('New password and confirm password does not match, please try again.')
                }
                return false;
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
