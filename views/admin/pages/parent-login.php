<?php
require_once ("../../includes/bootstrap.php");
require_once('../includes/header-bp.php');
$_SESSION['current_page'] = "Parent Login";
$_SESSION['db_name'] = "DADAR";
?>

<div class="row">
	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<h3 style="color: black;text-align: center;"><span><img src="<?php echo BASEPLUGINS;?>images/logo.png" alt="" width="75px" height="75px"> SAHAYA</span> - THE CHILD ADOPTION</h3>
		<div class="login-panel panel panel-default">
			<div class="panel-heading">Login!</div>
			<div class="panel-body">
				<form action="<?php echo BASEURL;?>views/admin/helper/login_routing.php" method="post">
					<fieldset>
						<div class="form-group">
							<select class="form-control form__input" name="branch">
								<option class="form__input" value="DADAR">Dadar</option>
								<option class="form__input" value="KURLA">Kurla</option>
							</select>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="UserName" name="parent_username" type="text" autofocus="" required>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Password" name="parent_password" type="password" value="" required>
						</div>
						<button type="submit" class="btn btn-md btn-info" name="parent_login">Login</button>
					</fieldset>
				</form>
			</div>
		</div>
	</div><!-- /.col-->
</div><!-- /.row -->
<?php 
require_once('../includes/footer-bp.php');
?>
