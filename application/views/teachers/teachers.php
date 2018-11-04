<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Teachers</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Teachers</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <form action="teachers/delete" method="post" id="deleteForm">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="search-box">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-search"></i></span>
                                    </div>
                                    <input type="text" class="form-control search-box-input" placeholder="Search">
                                    <div class="input-group-prepend input-group-left">
                                        <a href="<?=base_url();?>teachers/add" class="btn btn-standard btn-sm"><i class="ti-plus"></i> <span>New</span></a>
                                        <button type="button" class="btn btn-standard btn-sm btn-edit"><i class="ti-pencil-alt"></i> <span>Edit</span></button>
                                        <!-- <button class="btn btn-standard btn-sm"><i class="ti-pencil-alt"></i> <span>Edit</span></button> -->
                                        <button type="submit" class="btn btn-standard btn-sm"><i class="ti-trash"></i> <span>Delete</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hovered table-striped datatables">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" ></th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone No.</th>
                                            <th>Subject</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($teachers as $each): ?>
                                        <tr>
                                            <td><input type="checkbox" class="table-check" name="teacherId[]" value="<?= $each->id?>"></td>
                                            <td><?= $each->last_name.', '.$each->first_name.' '.$each->middle_name ?></td>
                                            <td><?= $each->address?></td>
                                            <td><?= $each->phone?></td>
                                            <td><?= $each->subject_name?></td>
                                            <td>    
                                                <span class="badge badge-pill badge-<?=$each->registered == 'yes' ? 'success' : 'danger'?>">
                                                    <?= $each->registered == 'yes' ? 'Registered' : 'Not Registered'?>
                                                </span>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>1
        </div>
    </section>
</div>
<?php if(isset($_SESSION['msg'])):?>
    <script>alert("<?= $_SESSION['msg']?>");</script>
<?php endif;?>
<script src="<?= base_url()?>assets/modules/js/teachers.js"></script>