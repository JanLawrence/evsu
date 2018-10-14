<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Students</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Students</li>
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
                                    <a href="<?=base_url();?>students/add" class="btn btn-standard btn-sm"><i class="ti-plus"></i> <span>New</span></a>
                                    <a href="<?=base_url();?>students/edit" class="btn btn-standard btn-sm"><i class="ti-pencil-alt"></i> <span>Edit</span></a>
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
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>School ID</th>
                                        <th>Guardian</th>
                                        <th>Guardian Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" ></td>
                                        <td>Jan Lawrence D.C. Tolentino</td>
                                        <td>09251232323</td>
                                        <td>2017-0035</td>
                                        <td>Jan D. Tolentino</td>
                                        <td><span class="badge badge-pill badge-success">Registered</span></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" ></td>
                                        <td>Khariza Fe L. Gapuz</td>
                                        <td>09251232323</td>
                                        <td>2014-0017</td>
                                        <td>YzahFe L. Gapuz</td>
                                        <td><span class="badge badge-pill badge-danger">Not Registered</span></td>
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