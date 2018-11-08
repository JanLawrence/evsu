<?php  
    $user = $this->session->userdata['user'];
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
        <?php if( $user->user_type == 'student'): ?>
        <link href="<?= base_url(); ?>assets/css/style-me-student.css" rel="stylesheet">
        <?php elseif( $user->user_type == 'parent'): ?>
        <link href="<?= base_url(); ?>assets/css/style-me-parent.css" rel="stylesheet">
        <?php elseif( $user->user_type == 'teacher'): ?>
        <link href="<?= base_url(); ?>assets/css/style-me-teacher.css" rel="stylesheet">
        <?php elseif( $user->user_type == 'admin'): ?>
        <link href="<?= base_url(); ?>assets/css/style-me-admin.css" rel="stylesheet">
        <?php endif; ?>
        <script src="<?= base_url();?>assets/js/lib/jquery.min.js"></script>
        <script>
            var URL = "<?= base_url(); ?>"
        </script>
    </head>
    <body>
    <?php include('sidebar.php') ?>
    <?php include('navbar.php') ?>

    <!-- content-wrap -->
    <div class="content-wrap">
        <div class="main">
