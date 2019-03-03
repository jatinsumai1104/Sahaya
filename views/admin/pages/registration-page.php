<?php require_once('../../includes/bootstrap.php');?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sahaya - Registration Page</title>
	<link href="<?php echo BASEPLUGINS;?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo BASEPLUGINS;?>css/datepicker3.css" rel="stylesheet">
	<link href="<?php echo BASEPLUGINS;?>css/login-styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body style="background-color: #fff;">
	<div class="col-sm-9 col-sm-offset-3 col-lg-12 col-lg-offset-0 main">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Final Register</div>
					<div class="panel-body">
						<form role="form" action="<?php echo BASEURL."views/admin/helper/login_routing.php";?>" method="post" enctype="multipart/form-data">
							<div class="col-md-6">

								<div class="form-group">
									<label>Full Name</label>
									<input class="form-control" placeholder="Employee Name" name="emp_name">
								</div>
								<div class="form-group">
									<label>Date Of Birth</label>
									<input type="date" class="form-control" placeholder="Date Of Birth" name="emp_dob" required>
								</div>
								<div class="form-group">
									<label>Gender</label>
									<select class="form-control" name="emp_gender">
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
								<div class="form-group">
									<label>Contact Number</label>
									<input class="form-control" placeholder="Enter your Contact Number.." name="emp_contact">
								</div>


							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Addhar UID</label>
									<input class="form-control" placeholder="Enter Aadhar UID" name="emp_uid">
								</div>
								<div class="form-group">
									<label>Employee Image</label>
									<input type="file" name="emp_image" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Employee All Documents <span>(Documents are used only for Verification)</span></label>
									<input type="file" name="emp_documents" class="form-control" required>
								</div>

								<div class="form-group">
									<label>Address: </label>
									<textarea class="form-control" rows="3" name="emp_address"></textarea>
								</div>

							</div>
							<div class="col-md-12">
								<input type="text" name="branch" value="<?php echo $_REQUEST['branch'];?>" hidden>
								<input type="text" name="email" value="<?php echo $_REQUEST['email'];?>" hidden>
								<button type="submit" class="btn btn-lg btn-info" name="completeSignUp">SUBMIT</button>
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.panel-->
		</div><!-- row-->
	</div>
	<script src="<?php echo BASEPLUGINS;?>js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo BASEPLUGINS;?>js/bootstrap.min.js"></script>
	<script src="<?php echo BASEPLUGINS;?>js/login.js"></script>
</body>

</html>
