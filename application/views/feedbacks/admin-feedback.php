<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Feedbacks</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Feedbacks</li>
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
                        <form action="feedbackList" method="get">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="search-box">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ti-search"></i></span>
                                            </div>
                                            <input type="text" class="form-control search-box-input" placeholder="Search">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">From:</label>
                                        <div class="col-sm-9">
                                        <input type="date" class="form-control" name="from" value="<?= isset($_GET['from']) ? $_GET['from'] : date('Y-m-01')?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">To:</label>
                                        <div class="col-sm-9">
                                        <input type="date" class="form-control" name="to" value="<?= isset($_GET['to']) ? $_GET['to'] : date('Y-m-d')?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 text-right">
                                    <div class="form-group row">
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
                                        <th>Teacher</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th>Feedback</th>
                                        <th>Read</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($feedbacksList as $each){?>
                                        <tr>
                                            <td><?= $each->t_lname.', '.$each->t_fname.' '.$each->t_mname ?></td>
                                            <td><?= $each->subject_name?></td>
                                            <td><?= date('F d, Y', strtotime($each->date_created))?></td>
                                            <td><?= $each->feedback?></td>
                                            <td>
                                                <button class="btn btn-info btn-sm view-more" fdate="<?= date('F d, Y', strtotime($each->date_created))?>" fback="<?= $each->feedback?>" sname="<?= $each->subject_name?>" tname="<?= $each->t_lname.', '.$each->t_fname.' '.$each->t_mname ?>">View More</button>
                                            </td>
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
<div class="modal fade" id="viewModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="ti-comments"></i> Feedback</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <p>Teacher: <span class="teacher"></span></p>
                        <p>Subject: <span class="subject"></span></p> 
                        <p>Date: <span class="date"></span></p> 
                    </div>
                    <div class="col-sm-6">
                        <p><span>Feedback:</span></p>
                        <p><span class="feedback"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" data-dismiss="modal"><i class="ti-close"></i>Close</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url()?>assets/modules/js/feedbacks.js"></script>