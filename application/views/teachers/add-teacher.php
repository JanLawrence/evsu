<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1><i class="ti-plus"></i> Add Teacher</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Teachers</a></li>
                        <li class="breadcrumb-item active">Add Teacher</li>
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
                            <span>Teacher Information</span>
                        </div>
                        <form action="add" method="post" id="addForm">
                            <div class="row mt-1">
                                <div class="col-md-6">
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
                                    <!-- <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Advisory:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="advisory">
                                            <?= form_error('advisory', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="20" name="address"></textarea>
                                            <?= form_error('address', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Phone:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="phone">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="email">
                                            <?= form_error('email', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Subject:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control select2" name="subject">
                                                <option value="" selected disabled></option>
                                                <?php foreach($subjects as $each): ?>
                                                    <option value="<?= $each->id?>"><?= $each->subject_name?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <?= form_error('subject', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a class="btn btn-danger" href="<?=base_url()?>teachers"><i class="ti-arrow-circle-left"></i> Back</a>
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
<script src="<?= base_url()?>assets/modules/js/teachers.js"></script>