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
                                        <div class="col-md-3">
                                            <label>Student</label>
                                            <select name="student" id="" class="form-control">
                                                <option value="" selected disabled>Select Student</option>
                                                <?php foreach ($students as $each) {?>
                                                    <option value="<?= $each->id?>"><?= $each->last_name.', '.$each->first_name.' '.$each->middle_name?></option>
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
                                        <button class="btn btn-warning lockbtn" type="button"><i class="ti-lock"></i> Lock</button>
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
<form id="lockForm" method="post">
<div class="modal fade" id="lockModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lock Grades</h5>
            </div>
            <div class="modal-body">
                <p>Please select the grading period you want to lock</p>
                <div class="form-check">
                    <input type="checkbox" name="period_1" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        1st grading
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="period_2" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        2nd grading
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="period_3" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        3rd grading
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="period_4" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        4th grading
                    </label>
                </div>
                <p>Note: Locking a grade period means that you will not be able to change the data for these students </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" data-dismiss="modal" type="button"><i class="ti-close"></i> Close</button>
                <button class="btn btn-success" type="submit"><i class="ti-save"></i> Submit</button>
            </div>
        </div>
    </div>
</div>
</form>
<?php if(isset($_SESSION['msg'])):?>
    <script>alert("<?= $_SESSION['msg']?>");</script>
<?php endif;?>
<script src="<?= base_url()?>assets/modules/js/grades.js"></script>