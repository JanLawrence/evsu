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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <form action="announcements/delete" method="post" id="deleteForm">
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
                                            <!-- IF user type is admin hide checkbox & show teacher -->
                                            <th><input type="checkbox" ></th>
                                            <th>Subject</th>
                                            <th>Date</th>
                                            <th>Announcement Subject</th>
                                            <th>Read</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($genAnnouncements as $each): ?>
                                            <tr>
                                                <!-- IF user type is admin hide checkbox & show teacher -->
                                                <td><input type="checkbox" class="table-check" name="announcementId[]" value="<?= $each->id?>"></td>
                                                <td><?= $each->subject_name?></td>
                                                <td><?= date('F d, Y', strtotime($each->date))?></td>
                                                <td><?= $each->subject?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm view-more" tname="<?= $each->name?>" sname="<?= $each->subject_name?>" adate="<?= date('F d, Y', strtotime($each->date))?>" announce="<?=$each->announcement?>">View More</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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
                <h5 class="modal-title"><i class="ti-announcement"></i> Announcement</h5>
            </div>
            <div class="modal-body">
                 <div class="row">
                    <div class="col-sm-6">
                        <p>Teacher: <span class="teacher"></span></p>
                        <p>Subject: <span class="subject"></span></p> 
                        <p>Date: <span class="date"></span></p> 
                    </div>
                    <div class="col-sm-6">
                        <p><span>Announcement:</span></p>
                        <p><span class="announcement"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" data-dismiss="modal"><i class="ti-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<?php if(isset($_SESSION['msg'])):?>
    <script>alert("<?= $_SESSION['msg']?>");</script>
<?php endif;?>
<script src="<?= base_url()?>assets/modules/js/announcement.js"></script>