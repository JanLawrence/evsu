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
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
                        <form>
                            <div class="row mt-2">
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
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Year:</label>
                                        <div class="col-sm-9">
                                            <select name="" id="" class="form-control">
                                                <option value="" selected disabled>List of Year</option>
                                                <option value="">2018-2019</option>
                                                <option value="">2019-2020</option>
                                                <option value="">2020-2021</option>
                                                <option value="">2021-2022</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-default" type=""><i class="ti-reload"></i> Generate</button>
                                            <button class="btn btn-default" type=""><i class="ti-export"></i> Export</button>
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
                                    <tr>
                                        <td>Science</td>
                                        <td>90</td>
                                        <td>90</td>
                                        <td>90</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>Math</td>
                                        <td>75</td>
                                        <td>75</td>
                                        <td>75</td>
                                        <td>75</td>
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