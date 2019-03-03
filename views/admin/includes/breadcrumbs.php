<?php require_once('../../includes/bootstrap.php');?>
<!--	Main Body-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="<?php echo BASEURL; ?>getchilds">
					<em class="fa fa-home"></em>
				</a></li>
			<li class="active"><?php echo $_SESSION['current_page'];?></li>
		</ol>
	</div>
	<!--		Page Header-->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php 
//				<?php if($_SESSION['current_page'] == "dashboard") { echo "active" ; }
			switch($_SESSION['current_page']){
				case "dashboard": echo "DashBoard";break;
				case "viewChilds":;
				case "submitChild": echo "Kids :)";break;
				case "registerparent": echo "Parent Portal";break;
			}	
			?></h1>
		</div>
	</div>
	<!--/.row-->
