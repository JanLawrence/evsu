<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Announcements</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Announcements</li>
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
                                    <a href="<?=base_url();?>announcements/add" class="btn btn-standard btn-sm"><i class="ti-plus"></i> <span>New</span></a>
                                    <a href="<?=base_url();?>announcements/edit" class="btn btn-standard btn-sm"><i class="ti-pencil-alt"></i> <span>Edit</span></a>
                                    <!-- <button class="btn btn-standard btn-sm"><i class="ti-pencil-alt"></i> <span>Edit</span></button> -->
                                    <button class="btn btn-standard btn-sm"><i class="ti-trash"></i> <span>Delete</span></button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hovered table-striped datatables">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" ></th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th>Announcement Subject</th>
                                        <th>Read</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" ></td>
                                        <td>Science</td>
                                        <td>October 15, 2018</td>
                                        <td>Assignment on Science</td>
                                        <td>View More</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" ></td>
                                        <td>Math</td>
                                        <td>October 15, 2018</td>
                                        <td>Assignment on Math</td>
                                        <td>View More</td>
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
<script src="<?= base_url()?>assets/modules/js/teachers.js"></script>