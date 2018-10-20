<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Grades</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Grades</li>
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
                                    <a href="<?=base_url();?>grades/add" class="btn btn-standard btn-sm"><i class="ti-plus"></i> <span>New</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hovered table-striped datatables">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>1st Grading</th>
                                        <th>2nd Grading</th>
                                        <th>3rd Grading</th>
                                        <th>4th Grading</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Jan Lawrence D.C. Tolentino</td>
                                        <td>90</td>
                                        <td>91</td>
                                        <td>92</td>
                                        <td>89</td>
                                    </tr>
                                    <tr>
                                        <td>Khariza Fe L. Gapuz</td>
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
<script src="<?= base_url()?>assets/modules/js/grades.js"></script>