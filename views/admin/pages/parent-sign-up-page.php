<?php
require_once ("../../includes/bootstrap.php");
require_once('../includes/header-bp.php');
$_SESSION['current_page'] = "Sign Up";
?>

<div class="row">
	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">Sign Up Now!</div>
			<div class="panel-body">
				<form action="../helper/login_routing.php" method="post">
					<fieldset>
						<div class="form-group">
							<input class="form-control" placeholder="UserName" name="parent_username" type="text" autofocus="" required>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Password" name="parent_password" type="password" value="" required>
						</div>
						<input type="text" name="branch" value="<?php echo $_REQUEST['branch']?>" hidden>
						<input type="text" name="email" value="<?php echo $_REQUEST['email']?>" hidden>
						<input type="text" name="parent_id" value="<?php echo $_REQUEST['id']?>" hidden>
						<button type="submit" class="btn btn-md btn-info" name="parent_sign_up">Sign Up</button>
					</fieldset>
				</form>
			</div>
		</div>
	</div><!-- /.col-->
</div><!-- /.row -->
<?php 
require_once('../includes/footer-bp.php');
?>
