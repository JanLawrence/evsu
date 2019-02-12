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
<?php if(isset($_SESSION['msg'])):?>
    <script>alert("<?= $_SESSION['msg']?>");</script>
<?php endif;?>
<script src="<?= base_url()?>assets/modules/js/grades.js"></script>