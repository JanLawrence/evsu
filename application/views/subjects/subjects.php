<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Subjects</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Subjects</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <form action="teachers/delete" method="post">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="search-box">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-search"></i></span>
                                    </div>
                                    <input type="text" class="form-control search-box-input" placeholder="Search">
                                    <div class="input-group-prepend input-group-left">
                                        <!-- <a href="<?=base_url();?>subjects/add" class="btn btn-standard btn-sm" data-toggle="modal" data-target="#addModal"><i class="ti-plus"></i> <span>New</span></a> -->
                                        <button class="btn btn-standard btn-sm" data-toggle="modal" data-target="#addModal"><i class="ti-plus"></i> <span>New</span></button>
                                        <button class="btn btn-standard btn-sm" data-toggle="modal" data-target="#editModal"><i class="ti-pencil-alt"></i> <span>Edit</span></button>
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
                                            <th>Teacher</th>
                                            <th>Teacher Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($subjects as $each): ?>
                                        <tr>
                                            <td><input type="checkbox" name="subjectId" value="<?= $each->id?>"></td>
                                            <td><?= $each->subject_name ?></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <div class="modal fade" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-header"><i class="ti-plus"></i> Add Subject</h5>       
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Subject Name:</label>
                                <div class="col-sm-8">
                                    <input class="form-control">
                                </div>
                            </div>            
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                    <button type="submit" class="btn btn-default"><i class="ti-save"></i> Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-header"><i class="ti-pencil-alt"></i> Edit Subject</h5>       
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Subject Name:</label>
                                <div class="col-sm-8">
                                    <input class="form-control">
                                </div>
                            </div>            
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                    <button type="button" class="btn btn-default"><i class="ti-save"></i> Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url()?>assets/modules/js/subjects.js"></script>