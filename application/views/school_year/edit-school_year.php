<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1><i class="ti-pencil-alt"></i> Edit School Year</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('school_year')?>">School Years</a></li>
                        <li class="breadcrumb-item active">Edit School Year</li>
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
                        <form action="" method="post" id="editForm">
                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">From:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="from" value="<?= $school_year[0]->sy_from ?>">
                                            <?= form_error('from', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                        <label class="col-sm-2 col-form-label">To:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="to" value="<?= $school_year[0]->sy_to ?>">
                                            <?= form_error('to', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a class="btn btn-danger" href="<?=base_url()?>school_year"><i class="ti-arrow-circle-left"></i> Back</a>
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
<script src="<?= base_url()?>assets/modules/js/school_year.js"></script>