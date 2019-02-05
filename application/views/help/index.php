<?php 
    $portal = array('admin', 'teacher', 'parent', 'student');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Help</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Help</li>
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
                                        <a href="#" class="btn btn-standard btn-sm btn-add"><i class="ti-plus"></i> <span>New</span></a>
                                                                 </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hovered table-striped datatables">
                                    <thead>
                                        <tr>
                                            <th>Date Created</th>
                                            <th>Portal</th>
                                            <th>Title</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($list as $each): ?>
                                        <tr>
                                            <td><?= $each->date_created ?></td>
                                            <td><?= ucwords($each->portal)?></td>
                                            <td><?= $each->title?></td>
                                            <td><a href="<?= base_url()?>help/download?id=<?=$each->id?>" class="text-info">Download</a></td> 
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
</div>
<form id="helpForm" enctype="multipart/form-data" method="post">
<div class="modal fade mt-5" id="addModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content mt-5">
            <div class="modal-header pt-5">
                <h5 class="modal-title"><i class="ti-settings"></i> New Help </h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Portal</label>
                    <select name="portal" class="form-control">
                        <?php foreach($portal as $each): ?>
                            <option><?=$each?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label>Upload</label>
                    <input class="form-control" name="file" type="file">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" type="button" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                <button class="btn btn-success" type="submit"> Submit</button>
            </div>
        </div>
    </div>
</div>
</form>
<script>
    $(function(){
        $('.btn-add').click(function(){
            $("#addModal").modal('toggle');
        })
        $('#helpForm').submit(function(e){ 
            var form = new FormData(this);
            if(confirm('Are you sure you want to save this?')){

                $.ajax({
                    url: URL + 'help/add',
                    type: "POST",
                    data:  form,
                    contentType: false,
                    cache: false, 
                    processData:false,
                    success: function(returnData){ 
                        if(returnData == 2){
                            alert('Please upload PDF files only');
                        } else if(returnData == 1){ 
                            alert('Error file uploaded');
                        } else {
                            alert('Data successfully saved!')
                            location.reload(); 
                        }
                    }
                });
                return false;
            } else {
                return false;
            }
        })
    })
</script>