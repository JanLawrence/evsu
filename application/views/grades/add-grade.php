<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1><i class="ti-plus"></i> New Grade</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('grades')?>">Grades</a></li>
                        <li class="breadcrumb-item active">Add Grade</li>
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
                        <form action="add" method="post" id="addForm">
                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label>School Year</label>
                                            <select name="school_year" id="" class="form-control">
                                                <?php foreach($sy as $each):?>
                                                    <option value="<?= $each->id?>"> <?= $each->sy_from.' - '.$each->sy_to?></option>
                                                <?php endforeach;?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <!-- <div class="col-md-3">
                                            <label>Period</label>
                                            <select name="grading" id="" class="form-control">
                                                <option value="" selected disabled>Select Period</option>
                                                <option value="1st">1st Grading</option>
                                                <option value="2nd">2nd Grading</option>
                                                <option value="3rd">3rd Grading</option>
                                                <option value="4th">4th Grading</option>
                                            </select>
                                        </div> -->
                                        <div class="col-md-3">
                                            <label>Grade</label>
                                            <?php
                                                $grade = array(1,2,3,4,5,6,7,8,9,10,11,12);
                                            ?>
                                            <select name="gradelevel" id="" class="form-control">
                                                <option value="" selected disabled> Select Grade</option>
                                                <?php foreach($grade as $each):?>
                                                    <option value="<?= $each?>"> <?= $each?></option>
                                                <?php endforeach;?> 
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Section</label>
                                            <select name="section" id="" class="form-control">
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Subject</label>
                                            <select name="subject" id="" class="form-control">
                                                <option value="" selected disabled>Select Subject</option>
                                                <?php foreach ($subjects as $each) {?>
                                                    <option value="<?= $each->id?>"><?= $each->subject_name?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive mt-0 returnHere">
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
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
<script src="<?= base_url()?>assets/modules/js/grades.js"></script>