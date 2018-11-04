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
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item">Grades</li>
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
                                        <div class="col-md-4">
                                            <label class="col-sm-4 col-form-label">Grading</label>
                                            <div class="sol-sm-8">
                                                <select name="grading" id="" class="form-control">
                                                    <option value="" selected disabled>Select Grading</option>
                                                    <option value="1st">1st Grading</option>
                                                    <option value="2nd">2nd Grading</option>
                                                    <option value="3rd">3rd Grading</option>
                                                    <option value="4th">4th Grading</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-sm-3 col-form-label">Year</label>
                                            <div class="sol-sm-9">
                                                <select name="school_year" id="" class="form-control">
                                                    <option value="" selected disabled>Select Year</option>
                                                    <option value="2018-2019">2018-2019</option>
                                                    <option value="2019-2020">2019-2020</option>
                                                    <option value="2020-2021">2020-2021</option>
                                                    <option value="2021-2022">2021-2022</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-sm-3 col-form-label">Subject</label>
                                            <div class="col-sm-9">
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
                            </div>
                            <div class="table-responsive mt-0">
                                <table class="table table-hovered table-striped datatables">
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($students as $each){?>
                                            <tr>
                                                <td style="width:70%"><?= $each->student?></td>
                                                <input name="stud_id[]" type="hidden" value="<?= $each->student_id?>">
                                                <td style="width:30%"><input name="grade[]" type="text"></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                        <a class="btn btn-danger" href="<?=base_url()?>grades"><i class="ti-arrow-circle-left"></i> Back</a>
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