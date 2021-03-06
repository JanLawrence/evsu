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
                                            <button class="btn btn-default" type="submit"><i class="ti-reload"></i> Filter</button>
                                            <button class="btn btn-default hidden" type=""><i class="ti-export"></i> Export</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-hovered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:40%">Subject</th>
                                        <th style="width:15%">1st Grading</th>
                                        <th style="width:15%">2nd Grading</th>
                                        <th style="width:15%">3rd Grading</th>
                                        <th style="width:15%">4th Grading</th>
                                        <th style="width:15%">Average</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $period_1_total = 0;
                                        $period_2_total = 0;
                                        $period_3_total = 0;
                                        $period_4_total = 0;
                                    ?>
                                    <?php foreach($grades as $each){?>
                                        <?php $totalPerPeriod = $each->period_1+$each->period_2+$each->period_3+$each->period_4;
                                            $totalPerPeriod2 = $totalPerPeriod / 4;
                                            $totPerP = $totalPerPeriod2 < 70 ? 70 : $totalPerPeriod2;
                                        ?>
                                        <tr>
                                            <td><?= $each->subject_name?></td>
                                            <td><?= $each->period_1?></td>
                                            <td><?= $each->period_2?></td>
                                            <td><?= $each->period_3?></td>
                                            <td><?= $each->period_4?></td>
                                            <td><?= ( ($totalPerPeriod > 0) ? $totPerP : 70)?></td>
                                        </tr>
                                        <?php 
                                        $period_1_total += $each->period_1;
                                        $period_2_total += $each->period_2;
                                        $period_3_total += $each->period_3;
                                        $period_4_total += $each->period_4;
                                        ?>
                                    <?php } 
                                    	$period1Tot = $period_1_total / 4;
                                        $totperiod1 = $period1Tot < 70 ? 70 : $period1Tot;
                                
                                        $period2Tot = $period_2_total / 4;
                                        $totperiod2 = $period2Tot < 70 ? 70 : $period2Tot;
                                
                                        $period3Tot = $period_3_total / 4;
                                        $totperiod3 = $period3Tot < 70 ? 70 : $period3Tot;
                                
                                        $period4Tot = $period_4_total / 4;
                                        $totperiod4 = $period4Tot < 70 ? 70 : $period4Tot;
                                    
                                    ?>
                                    <tr>
                                        <td style="width:40%"><strong>Period Average: </strong></td>
                                        <td style="width:10%"><?= (($period_1_total > 0) ? $totperiod1 : 70)?></td>
                                        <td style="width:10%"><?= (($period_2_total > 0) ? $totperiod2 : 70)?></td>
                                        <td style="width:10%"><?= (($period_3_total > 0) ? $totperiod3 : 70)?></td>
                                        <td style="width:10%"><?= (($period_4_total > 0) ? $totperiod4 : 70)?></td>
                                        <td style="width:10%"></td>
                                    </tr>
                                    <tr>
                                        <td style="width:40%"><strong>General Average: </strong></td>
                                        <td style="width:10%"><?= ($totperiod1 + $totperiod2 + $totperiod3 + $totperiod4) / 4?></td>
                                        <td style="width:10%"></td>
                                        <td style="width:10%"></td>
                                        <td style="width:10%"></td>
                                        <td style="width:10%"></td>
                                    </tr>
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