<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1><i class="ti-plus"></i> Add Announcement</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-5 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item">Announcements</li>
                        <li class="breadcrumb-item active">Add Announcement</li>
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
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Date:</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Subject:</label>
                                        <div class="col-sm-9">
                                            <input class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Announcement Subject:</label>
                                        <div class="col-sm-9">
                                            <input class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Announcement:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="20"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                        <a class="btn btn-danger" href="<?=base_url()?>announcements"><i class="ti-arrow-circle-left"></i> Back</a>
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
<script src="<?= base_url()?>assets/modules/js/announcement.js"></script>