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
						<form role="form" action="<?php echo BASEURL."complete_signup";?>" method="post" enctype="multipart/form-data">
							<div class="col-md-6">

								<div class="form-group">
									<label>First Name</label>
									<input class="form-control" placeholder="First Name" name="first_name">
								</div>
								<div class="form-group">
									<label>Last Name</label>
									<input class="form-control" placeholder="Last Name" name="last_name">
								</div>



							</div>
							<div class="col-md-6">

								<div class="form-group">
									<label>Contact Number</label>
									<input class="form-control" placeholder="Enter your Contact Number.." name="employee_contact">
								</div>

								<div class="form-group">
									<label>Address: </label>
									<textarea class="form-control" rows="3" name="employee_address"></textarea>
								</div>

							</div>
							<button type="submit" class="btn btn-lg btn-info">SUBMIT</button>
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
