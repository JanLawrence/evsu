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
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
                        <div class="search-box">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ti-search"></i></span>
                                </div>
                                <input type="text" class="form-control search-box-input" placeholder="Search">
                                <div class="input-group-prepend input-group-left">
                                    <a href="<?=base_url();?>feedbacks/add" class="btn btn-standard btn-sm"><i class="ti-plus"></i> <span>New</span></a>
                                    <!-- <button class="btn btn-standard btn-sm"><i class="ti-pencil-alt"></i> <span>Edit</span></button> -->
                                    <button class="btn btn-standard btn-sm"><i class="ti-trash"></i> <span>Delete</span></button>
                                </div>
                            </div>
                        </div>
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
                                    <tr>
                                        <td>Yumang, Rose Ann</td>
                                        <td>Science</td>
                                        <td>October 15, 2018</td>
                                        <td>Always late</td>
                                        <td>
                                            <button class="btn btn-standard btn-sm" data-toggle="modal" data-target="#viewModal">View More</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bunyi, Marianne Angelica</td>
                                        <td>Math</td>
                                        <td>October 15, 2018</td>
                                        <td>Everyday gives homework</td>
                                        <td>
                                            <button class="btn btn-standard btn-sm" data-toggle="modal" data-target="#viewModal">View More</button>
                                        </td>
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
<div class="modal fade" id="viewModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="ti-comments"></i> Feedback</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <p><span>Teacher: Rose Ann Yumang</span></p>
                        <p><span>Subject: Science</span></p> 
                        <p><span>Date: Science</span></p> 
                    </div>
                    <div class="col-sm-6">
                        <p><span>Feedback:</span></p>
                        <p><span>1231231qeqeqweqweqwewqe23213</span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal"><i class="ti-close"></i>Close</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url()?>assets/modules/js/teachers.js"></script>