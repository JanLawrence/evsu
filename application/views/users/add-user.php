<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1><i class="ti-plus"></i> Add User</h1>
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
                        <form action="add" method="post" id="addForm">
                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">First Name:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="firstName">
                                            <?= form_error('firstName', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Middle Name:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="middleName">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Last Name:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="lastName">
                                            <?= form_error('lastName', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">User Level:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="type">
                                                <option value="admin">Admin</option>
                                                <option value="staff">Staff</option>
                                            </select>
                                            <?= form_error('type', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Username:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="username">
                                            <?= form_error('username', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
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