<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1> Student Info</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Student Info</li>
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
                        <form action="" method="post">
                            <div class="card-title">
                                <span>Student Information</span>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">School ID:</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" class="form-control" name="schoolId" value="<?= $students[0]->school_id ?>">
                                            <?= form_error('schoolId', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">First Name:</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" class="form-control" name="firstName" value="<?= $students[0]->first_name ?>">
                                            <?= form_error('firstName', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Middle Name:</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" class="form-control" name="middleName" value="<?= $students[0]->middle_name ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Last Name:</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" class="form-control" name="lastName" value="<?= $students[0]->last_name ?>">
                                            <?= form_error('lastName', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address:</label>
                                        <div class="col-sm-9">
                                            <textarea readonly class="form-control" rows="20" name="address"><?= $students[0]->address ?></textarea>
                                            <?= form_error('address', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Phone:</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" class="form-control" name="phone" value="<?= $students[0]->phone ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email:</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" class="form-control" name="email" value="<?= $students[0]->email ?>" onblur="checkEmail(this.value)">
                                            <?= form_error('email', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Grade:</label>
                                        <div class="col-sm-9">
                                            <select  readonly name="grade" class="form-control">
                                                <?php
                                                    $grade = array(7,8,9,10,11,12);
                                                ?>
                                                <option value="" selected disabled> Select Grade</option>
                                                <?php foreach($grade as $each):?>
                                                    <option value="<?= $each?>" <?= $each == $students[0]->grade ? "selected" : ""?>> <?= $each?></option>
                                                <?php endforeach;?> 
                                            </select>
                                            <?= form_error('grade', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Section:</label>
                                        <div class="col-sm-9">
                                            <select  readonly name="section" class="form-control">
                                                <?php foreach($students as $each):?>
                                                    <option value="<?= $each->sec_id?>"><?= $each->section?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <?= form_error('section', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-title">
                                <span>Guardian Information</span>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">First Name:</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" class="form-control" name="g_firstName" value="<?= $students[0]->g_fname ?>">
                                            <?= form_error('g_firstName', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Middle Name:</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" class="form-control" name="g_middleName" value="<?= $students[0]->g_mname ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Last Name:</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" class="form-control" name="g_lastName" value="<?= $students[0]->g_lname ?>">
                                            <?= form_error('g_lastName', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email:</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" class="form-control" name="g_email" value="<?= $students[0]->g_email ?>">
                                            <?= form_error('g_email', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>