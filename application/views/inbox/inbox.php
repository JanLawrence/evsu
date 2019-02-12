<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Inbox</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Inbox</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <form action="subjects/delete" method="post" id="deleteForm">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="search-box">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-search"></i></span>
                                    </div>
                                    <input type="text" class="form-control search-box-input" placeholder="Search">
                                    
                                </div>
                            </div>
                            <div class="table-responsive">
                                <?php  
                                    $user = $this->session->userdata['user'];
                                ?>
                                <?php if($user->user_type == 'teacher'):?>
                                <table class="table table-hovered table-striped datatables">
                                    <thead>
                                        <tr>
                                            <th>Parent Name</th>
                                            <th>Student Name</th>
                                            <!-- <th>Last Communication</th> -->
                                            <th>Chat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($inbox as $each):?>
                                        <tr>
                                            <td><?= $each->first_name.' '.$each->middle_name.' '.$each->last_name ?></td>
                                            <td><?= $each->stud_name?></td>
                                            <!-- <td></td> -->
                                            <td><a href="<?=base_url('inbox/chat/'.$each->id); ?>" class="btn btn-info btn-sm" parent-id ="<?=$each->id?>">Chat</button></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                                <?php elseif($user->user_type == 'parent'):?>
                                <table class="table table-hovered table-striped datatables">
                                    <thead>
                                        <tr>
                                            <th>Teacher Name</th>
                                            <!-- <th>Last Communication</th> -->
                                            <th>Chat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($inbox as $each):?>
                                        <tr>
                                            <td><?= $each->first_name.' '.$each->middle_name.' '.$each->last_name ?></td>
                                            <!-- <td></td> -->
                                            <td><a href="<?=base_url('inbox/chat/'.$each->id); ?>" class="btn btn-info btn-sm" parent-id ="<?=$each->id?>">Chat</button></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- <div class="modal fade" id="addModal">
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                    <button type="submit" class="btn btn-default"><i class="ti-save"></i> Submit</button>
                </div>
            </div>
        </div>
    </div> -->
</div>
<?php if(isset($_SESSION['msg'])):?>
    <script>alert("<?= $_SESSION['msg']?>");</script>
<?php endif;?>
<script src="<?= base_url()?>assets/modules/js/subjects.js"></script>