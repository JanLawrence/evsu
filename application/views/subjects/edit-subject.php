<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1><i class="ti-pencil-alt"></i> Edit Subject</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('subjects')?>">Subjects</a></li>
                        <li class="breadcrumb-item active">Edit Subject</li>
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
                                        <label class="col-sm-1 col-form-label">Subject:</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="subject" value="<?= $subjects[0]->subject_name ?>">
                                            <?= form_error('subject', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                        <label class="col-sm-1 col-form-label">Grade:</label>
                                        <div class="col-sm-5">
                                            <select name="grade" class="form-control">
                                                <?php
                                                    $grade = array(7,8,9,10,11,12);
                                                ?>
                                                <option value="" selected disabled> Select Grade</option>
                                                <?php foreach($grade as $each):?>
                                                    <option value="<?= $each?>" <?= $each == $subjects[0]->grade ? "selected" : ""?>> <?= $each?></option>
                                                <?php endforeach;?> 
                                            </select>
                                            <?= form_error('grade', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-1 col-form-label">Section:</label>
                                        <div class="col-sm-5">
                                            <select name="section" class="form-control">
                                                <option value="" selected disabled> Select Section</option>
                                                <?php foreach($section as $each){?>
                                                    <option value="<?= $each->id?>" <?= $each->id == $subjects[0]->section_id ? 'selected' : '' ?>> <?= $each->section?></option>
                                                <?php }?>
                                            </select>
                                            <?= form_error('section', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                        <label class="col-sm-1 col-form-label">Teacher:</label>
                                        <!-- <div class="col-sm-5">
                                            <select name="teacher" class="form-control">
                                                <option value="" selected disabled> Select Adviser</option>
                                                <?php foreach($teacher as $each){?>
                                                    <option value="<?= $each->id?>" <?= $each->id == $subjects[0]->teacher_id ? 'selected' : '' ?>> <?= $each->name?></option>
                                                <?php }?>
                                            </select>
                                            <?= form_error('teacher', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a class="btn btn-danger" href="<?=base_url()?>subjects"><i class="ti-arrow-circle-left"></i> Back</a>
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
<script src="<?= base_url()?>assets/modules/js/subjects.js"></script>