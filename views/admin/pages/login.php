<?php 
$_SESSION['current_page'] = 'login';
require_once('../../includes/bootstrap.php');
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sahaya - Login</title>
	<link href="<?php echo BASEPLUGINS;?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo BASEPLUGINS;?>css/datepicker3.css" rel="stylesheet">
	<link href="<?php echo BASEPLUGINS;?>css/login-styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body style="background-color: #fff;">

	<div class="cotn_principal">

		<div class="cont_centrar">
			<h1 class="page-header" style="border-bottom: none;"></h1>
			<div class="cont_login">
				<div class="cont_info_log_sign_up">
					<div class="col_md_login">
						<div class="cont_ba_opcitiy">

							<h2>LOGIN</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							<button class="btn_login" onclick="cambiar_login()">LOGIN</button>
						</div>
					</div>
					<div class="col_md_sign_up">
						<div class="cont_ba_opcitiy">
							<h2>SIGN UP</h2>


							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

							<button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
						</div>
					</div>
				</div>


				<div class="cont_back_info">
					<div class="cont_img_back_grey">
						<img src="<?php echo BASEPLUGINS;?>images/login.jpg" alt="" />
					</div>

				</div>
				<div class="cont_forms">
					<div class="cont_img_back_">
						<img src="<?php echo BASEPLUGINS;?>images/login.jpg" alt="" />
					</div>
					<div class="cont_form_login">
						<a href="#" onclick="ocultar_login_sign_up()"><i class="glyphicon glyphicon-chevron-left"></i></a>
						<h2>LOGIN</h2>
						<form action="<?php echo BASEURL;?>login" method="post">
							<input type="text" placeholder="Username" name="employee_username" style="text-align: left;
							padding: 15px 5px;
							margin-left: 10px;
							margin-top: 20px;
							width: 260px;
							border: none;
							color: #757575;" />
							<input type="password" placeholder="Password" name="employee_password" style="text-align: left;
							padding: 15px 5px;
							margin-left: 10px;
							margin-top: 20px;
							width: 260px;
							border: none;
							color: #757575;" />
							<button class="btn_login" onclick="cambiar_login()" type="submit" style="margin-top: 40px;">LOGIN</button>
						</form>
					</div>

					<div class="cont_form_sign_up" style="height: 470px;">
						<a href="#" onclick="ocultar_login_sign_up()"><i class="glyphicon glyphicon-chevron-left"></i></a>
						<h2>SIGN UP</h2>
						<form action="<?php echo BASEURL;?>signup" method="post">
							<input type="text" placeholder="Email" name="signup_email" style="text-align: left;
							padding: 15px 5px;
							margin-left: 10px;
							margin-top: 20px;
							width: 260px;
							border: none;
							color: #757575;"/>
							<input type="text" placeholder="User" name="signup_username" style="text-align: left;
							padding: 15px 5px;
							margin-left: 10px;
							margin-top: 20px;
							width: 260px;
							border: none;
							color: #757575;"/>
							<input type="password" placeholder="Password" name="signup_password" style="text-align: left;
							padding: 15px 5px;
							margin-left: 10px;
							margin-top: 20px;
							width: 260px;
							border: none;
							color: #757575;"/>
							<input type="password" placeholder="Confirm Password" name="signup_confirm_password" style="text-align: left;
							padding: 15px 5px;
							margin-left: 10px;
							margin-top: 20px;
							width: 260px;
							border: none;
							color: #757575;"/>
							<button class="btn_sign_up" onclick="cambiar_sign_up()" type="submit">SIGN UP</button>
						</form>
					</div>

				</div>

			</div>
		</div>
	</div>


	<script src="<?php echo BASEPLUGINS;?>js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo BASEPLUGINS;?>js/bootstrap.min.js"></script>
	<script src="<?php echo BASEPLUGINS;?>js/login.js"></script>
</body>

</html>
