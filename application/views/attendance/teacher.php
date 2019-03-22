<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Teacher Attendance</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Teacher Attendance</li>
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
                        <form action="teacher" method="get">
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
                                            <button class="btn btn-default" type="submit"><i class="ti-reload"></i> Filter</button>
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
                                        <!-- IF user type is admin hide checkbox & show teacher -->
                                        <th>Teacher Name</th>
                                        <th>Date</th>
                                        <th>Time in AM</th>
                                        <th>Time out AM</th>
                                        <th>Time in PM</th>
                                        <th>Time out PM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($attendance as $each): ?>
                                        <tr>
                                            <!-- IF user type is admin hide checkbox & show teacher -->
                                            <td><?= $each->name?></td>
                                            <td><?= date('F d, Y', strtotime($each->date))?></td>
                                            <td><?= !empty($each->time_in_am) ? date('H:i A', strtotime($each->time_in_am)) : ''?></td>
                                            <td><?= !empty($each->time_out_am) ? date('H:i A', strtotime($each->time_out_am)) : ''?></td>
                                            <td><?= !empty($each->time_in_pm) ? date('H:i A', strtotime($each->time_in_pm)) : ''?></td>
                                            <td><?= !empty($each->time_out_pm) ? date('H:i A', strtotime($each->time_out_pm)) : ''?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- <script src="<?= base_url()?>assets/modules/js/announcement.js"></script> -->