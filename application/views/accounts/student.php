<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<h6>Manage Accounts</h6>
					<form method="post" action="" id="accountForm">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">School ID:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="schoolId" value="<?= $students[0]->school_id ?>">
								<?= form_error('schoolId', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">First Name:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="firstName" value="<?= $students[0]->first_name ?>">
								<?= form_error('firstName', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Middle Name:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="middleName" value="<?= $students[0]->middle_name ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Last Name:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="lastName" value="<?= $students[0]->last_name ?>">
								<?= form_error('lastName', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Address:</label>
							<div class="col-sm-9">
								<textarea class="form-control" rows="20" name="address"><?= $students[0]->address ?></textarea>
								<?= form_error('address', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Phone:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="phone" value="<?= $students[0]->phone ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Email:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="email" value="<?= $students[0]->email ?>">
								<?= form_error('email', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
							</div>
						</div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Username:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="username" value="<?= $students[0]->username?>">
                                <input type="hidden" class="form-control" name="cred_id" value="<?= $students[0]->cred_id?>">
                                <?= form_error('licenseNo', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
                            </div>
                        </div>
						<button type="submit" class="btn btn-info btn-flat m-b-30 m-t-30" style=" background: linear-gradient(120deg, #00B4DB, #0083B0);">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if(isset($_SESSION['msg'])):?>
    <script>alert("<?= $_SESSION['msg']?>");</script>
<?php endif;?>
<script src="<?= base_url()?>assets/modules/js/account.js"></script>