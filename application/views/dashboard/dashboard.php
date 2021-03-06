        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
                                <li class="breadcrumb-item active">Home</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">
            <div class="row">
                            <div class="col-lg-4">
                                <a href="<?= base_url()?>teachers">
                                    <div class="card">
                                        <div class="stat-widget-one">
                                            <div class="stat-icon dib"><i class="ti-user color-success border-success"></i></div>
                                            <div class="stat-content dib">
                                                <div class="stat-text">Teacher</div>
                                                <div class="stat-digit"><?= count($teachers)?></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="<?= base_url()?>students">
                                    <div class="card">
                                        <div class="stat-widget-one">
                                            <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i></div>
                                            <div class="stat-content dib">
                                                <div class="stat-text">Student</div>
                                                <div class="stat-digit"><?= count($students)?></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-user color-pink border-pink"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Parent</div>
                                            <div class="stat-digit"><?= count($parents)?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- /# column -->
            </section>
        </div>
    </div>
</div>