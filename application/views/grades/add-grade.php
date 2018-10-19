<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1><i class="ti-plus"></i> New Grade</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item">Grades</li>
                        <li class="breadcrumb-item active">Add Grade</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label class="col-sm-4 col-form-label">Grading</label>
                                            <div class="sol-sm-8">
                                                <select name="" id="" class="form-control">
                                                    <option value="" selected disabled>Select Grading</option>
                                                    <option value="">1st Grading</option>
                                                    <option value="">2nd Grading</option>
                                                    <option value="">3rd Grading</option>
                                                    <option value="">4th Grading</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-sm-3 col-form-label">Year</label>
                                            <div class="sol-sm-9">
                                                <select name="" id="" class="form-control">
                                                    <option value="" selected disabled>Select Year</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-sm-3 col-form-label">Subject</label>
                                            <div class="col-sm-9">
                                                <input class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive mt-0">
                                <table class="table table-hovered table-striped datatables">
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width:70%">Jan Lawrence D.C. Tolentino</td>
                                            <td style="width:30%"><input type="text"></td>
                                        </tr>
                                        <tr>
                                            <td style="width:70%">Khariza Fe L. Gapuz</td>
                                            <td style="width:30%"><input type="text"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                        <a class="btn btn-danger" href="<?=base_url()?>grades"><i class="ti-arrow-circle-left"></i> Back</a>
                                        <button class="btn btn-default" type="submit"><i class="ti-save"></i> Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?= base_url()?>assets/modules/js/grades.js"></script>