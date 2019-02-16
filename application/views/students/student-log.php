<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Student Log</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Student Log</li>
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
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">To:</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 text-right">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button class="btn btn-default" type=""><i class="ti-reload"></i> Filter</button>
                                        <button class="btn btn-default hidden" type=""><i class="ti-export"></i> Export</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hovered table-striped datatables">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Date</th>
                                        <th>Time in AM</th>
                                        <th>Time out AM</th>
                                        <th>Time in PM</th>
                                        <th>Time out PM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Jan Lawrence D.C. Tolentino</td>
                                        <td>October 16, 2018</td>
                                        <td>8:00 AM</td>
                                        <td>12:00 PM</td>
                                        <td>1:00 PM</td>
                                        <td>5:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Khariza Fe L. Gapuz</td>
                                        <td>October 16, 2018</td>
                                        <td>8:00 AM</td>
                                        <td>12:00 PM</td>
                                        <td>1:00 PM</td>
                                        <td>5:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Rejie T. Salvador</td>
                                        <td>October 16, 2018</td>
                                        <td>8:00 AM</td>
                                        <td>12:00 PM</td>
                                        <td>1:00 PM</td>
                                        <td>5:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Marianne Angelica A. Bunyi</td>
                                        <td>October 16, 2018</td>
                                        <td>8:00 AM</td>
                                        <td>12:00 PM</td>
                                        <td>1:00 PM</td>
                                        <td>5:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Christian T. Nieva</td>
                                        <td>October 16, 2018</td>
                                        <td>8:00 AM</td>
                                        <td>12:00 PM</td>
                                        <td>1:00 PM</td>
                                        <td>5:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Maria Flor C. Velasquez</td>
                                        <td>October 16, 2018</td>
                                        <td>8:00 AM</td>
                                        <td>12:00 PM</td>
                                        <td>1:00 PM</td>
                                        <td>5:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Joan D. Rivera</td>
                                        <td>October 16, 2018</td>
                                        <td>8:00 AM</td>
                                        <td>12:00 PM</td>
                                        <td>1:00 PM</td>
                                        <td>5:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Mary Jane G. Cruz</td>
                                        <td>October 16, 2018</td>
                                        <td>8:00 AM</td>
                                        <td>12:00 PM</td>
                                        <td>1:00 PM</td>
                                        <td>5:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Shie Ann O. Dao</td>
                                        <td>October 16, 2018</td>
                                        <td>8:00 AM</td>
                                        <td>12:00 PM</td>
                                        <td>1:00 PM</td>
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