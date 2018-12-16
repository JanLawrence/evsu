<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Advisory</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Advisory</li>
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
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label>School Year</label>
                                <select name="school_year" id="" class="form-control">
                                    <?php foreach($sy as $each):?>
                                        <option value="<?= $each->id?>"> <?= $each->sy_from.' - '.$each->sy_to?></option>
                                    <?php endforeach;?> 
                                </select>
                            </div>
                        </div>
                        <div class="search-box">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ti-search"></i></span>
                                </div>
                                <input type="text" class="form-control search-box-input" placeholder="Search">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hovered table-striped datatables" id="advisoryTable">
                                <thead>
                                    <tr>
                                        <th>School Id</th>
                                        <th>Name</th>
                                        <th>View</th>
                                        <th>Export</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($advisory as $each){ ?>
                                        <tr>
                                            <td><?= $each->school_id?></td>
                                            <td><?= $each->last_name.', '.$each->first_name.' '.$each->middle_name?></td>
                                            <td><button type="button" class="btn btn-info btn-sm view-grade" stud-id="<?= $each->id?>">View</button></td>
                                            <td><button type="button" class="btn btn-info btn-sm export-grade" stud-id="<?= $each->id?>">Export</button></td>
                                        </tr>
                                    <?php }?>
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
        <div class="modal-content" style="margin-top: 350px;">
            <div class="modal-body" id="viewModalAdvisory">
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" data-dismiss="modal"><i class="ti-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url()?>assets/modules/js/advisory.js"></script>