<?php
    $type = array('admin' => 'Admin', 'staff' => 'Staff');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1><i class="ti-plus"></i> Edit User</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('users')?>">Users</a></li>
                        <li class="breadcrumb-item active">Add User</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <span>User Information</span>
                        </div>
                        <form action="" method="post" id="editForm">
                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">First Name:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="firstName" value="<?= $users[0]->first_name ?>">
                                            <?= form_error('firstName', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Middle Name:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="middleName" value="<?= $users[0]->middle_name ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Last Name:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="lastName" value="<?= $users[0]->last_name ?>">
                                            <?= form_error('lastName', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="email" value="<?= $users[0]->email ?>">
                                            <?= form_error('email', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">User Level:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="type">
                                                <?php foreach($type as $key => $each): ?>
                                                <option value="<?= $key?>" <?= $key == $users[0]->admin_type ? 'selected' : ''?>><?=$each?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <?= form_error('type', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Username:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="username" value="<?= $users[0]->username ?>">
                                            <?= form_error('username', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Old Password:</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="oldpassword">
                                            <?= form_error('oldpassword', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">New Password:</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="password">
                                            <?= form_error('password', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Confirm Password:</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="confirmpass">
                                            <?= form_error('confirmpass', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a class="btn btn-danger" href="<?=base_url()?>users"><i class="ti-arrow-circle-left"></i> Back</a>
                                    <button class="btn btn-default" type="submit"><i class="ti-save"></i> Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?= base_url()?>assets/modules/js/users.js"></script>