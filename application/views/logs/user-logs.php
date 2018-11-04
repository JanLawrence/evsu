<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>User Logs</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">User Logs</li>
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
                        <form action="userlogs" method="get">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="search-box">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ti-search"></i></span>
                                            </div>
                                            <input type="text" class="form-control search-box-input" placeholder="Search">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">From:</label>
                                        <div class="col-sm-9">
                                        <input type="date" class="form-control" name="from" required value="<?= isset($_GET['from']) ? $_GET['from'] : date('Y-m-01')?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">To:</label>
                                        <div class="col-sm-9">
                                        <input type="date" class="form-control" name="to" required value="<?= isset($_GET['to']) ? $_GET['to'] : date('Y-m-d')?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 text-right">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-default" type="submit"><i class="ti-reload"></i> Generate</button>
                                            <button class="btn btn-default hidden" type=""><i class="ti-export"></i> Export</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-hovered table-striped datatables">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Name</th>
                                        <th>User Type</th>
                                        <th>Transaction</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($logs as $each){?>
                                        <tr>
                                            <td><?= date('Y-m-d', strtotime($each->transaction_date)) ?></td>
                                            <td><?= date('h:i:s A', strtotime($each->transaction_date)) ?></td>
                                            <td><?= $each->whole_name?></td>
                                            <td><?= ucfirst($each->user_type)?></td>
                                            <td><?= $each->transaction?></td>
                                            <td></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?= base_url()?>assets/modules/js/feedbacks.js"></script>