<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Student Grade</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Student Grade</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-table">
                    <div class="card-body">
                        <form action="studentgrade" method="get">
                            <!-- <div class="row mt-2">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Student:</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" placeholder="Khariza Fe L. Gapuz">
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Section:</label>
                                        <div class="col-sm-9">
                                            <input class="form-control">
                                        </div>
                                    </div>
                                </div> 
                            </div> -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Year:</label>
                                        <div class="col-sm-9">
                                            <select name="school_year" id="" class="form-control">
                                                <?php foreach($sy as $each):?>
                                                    <option value="<?= $each->id?>" <?= isset($_GET['school_year']) &&  $_GET['school_year'] == $each->id ? 'selected' : ''?>> <?= $each->sy_from.' - '.$each->sy_to?></option>
                                                <?php endforeach;?> 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row text-right">
                                        <div class="col-sm-12">
                                            <button class="btn btn-default" type="submit"><i class="ti-reload"></i> Generate</button>
                                            <button class="btn btn-default hidden" type=""><i class="ti-export"></i> Export</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-hovered table-striped datatables">
                                <thead>
                                    <tr>
                                        <th style="width:40%">Subject</th>
                                        <th style="width:15%">1st Grading</th>
                                        <th style="width:15%">2nd Grading</th>
                                        <th style="width:15%">3rd Grading</th>
                                        <th style="width:15%">4th Grading</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($grades as $each){?>
                                        <tr>
                                            <td><?= $each->subject_name?></td>
                                            <td><?= $each->period_1?></td>
                                            <td><?= $each->period_2?></td>
                                            <td><?= $each->period_3?></td>
                                            <td><?= $each->period_4?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?= base_url()?>assets/modules/js/students.js"></script>