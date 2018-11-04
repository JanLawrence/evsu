<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Student Attendance</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Student Attendance</li>
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
                        <form>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Student:</label>
                                        <div class="col-sm-9">
                                            <input class="form-control">
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
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">From:</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">To:</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-default" type=""><i class="ti-reload"></i> Generate</button>
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
                                        <th style="width:40%">Date</th>
                                        <th style="width:15%">Time in AM</th>
                                        <th style="width:15%">Time ou AM</th>
                                        <th style="width:15%">Time in PM</th>
                                        <th style="width:15%">Time ou PM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>October 19, 2019</td>
                                        <td>8:00 AM</td>
                                        <td>12:00 PM</td>
                                        <td>1:00 AM</td>
                                        <td>5:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>October 20, 2019</td>
                                        <td>8:00 AM</td>
                                        <td>12:00 PM</td>
                                        <td>1:00 AM</td>
                                        <td>5:00 PM</td>
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