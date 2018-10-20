<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1><i class="ti-plus"></i> Add Feedback</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-5 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item">Feedbacks</li>
                        <li class="breadcrumb-item active">Add Feedback</li>
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
                        <form action="add" method="post">
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Teacher:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control select2" name="teacher">
                                                <option value="" selected disabled></option>
                                                <?php foreach($teachers as $each): ?>
                                                    <option value="<?= $each->id?>"><?= $each->last_name.', '.$each->first_name.' '.$each->middle_name ?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <?= form_error('teacher', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Feedback:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="20" name="feedback"></textarea>
                                            <?= form_error('feedback', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a class="btn btn-danger" href="<?=base_url()?>feedbacks"><i class="ti-arrow-circle-left"></i> Back</a>
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