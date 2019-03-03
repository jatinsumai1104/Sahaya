<?php require_once('../../includes/bootstrap.php');?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<div class="profile-sidebar">
		<div class="profile-userpic">
			<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
		</div>
		<div class="profile-usertitle">
			<div class="profile-usertitle-name">
				<?php echo $_SESSION['employee_username']?>
			</div>
			<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="divider"></div>
	<form role="search">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search">
		</div>
	</form>
	<ul class="nav menu">
		<li class="<?php if($_SESSION['current_page'] == "dashboard") { echo "active" ; }else{ echo "" ; } ?>"><a href="<?php echo BASEURL; ?>dashboard"><em class="fa fa-dashboard">&nbsp;</em> Updates and Details</a></li>

		<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				Children <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
			</a>
			<ul class="children collapse" id="sub-item-1">
				<li class="<?php if($_SESSION['current_page'] == "viewChilds") { echo "active" ; }else{ echo "" ; } ?>">
					<a href="<?php echo BASEURL; ?>getchilds"><em class="fa fa-child">&nbsp;</em> Show Children</a></li>
				<li class="<?php if($_SESSION['current_page'] == "submitChild") { echo "active" ; }else{ echo "" ; } ?>"><a href="<?php echo BASEURL; ?>submitchild"><em class="fa fa-handshake-o">&nbsp;</em> Register Child</a></li>
			</ul>
		</li>
		<?php if($_SESSION['employee_role'] <= 2){?>

		<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				Parent <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
			</a>
			<ul class="children collapse" id="sub-item-2">
				<li class="<?php if($_SESSION['current_page'] == "registerparent") { echo "active" ; }else{ echo "" ; } ?>"><a href="<?php echo BASEURL; ?>registerparent"><em class="fa fa-dashboard">&nbsp;</em> Register Parent</a></li>
				<li class="<?php if($_SESSION['current_page'] == "dashboard") { echo "active" ; }else{ echo "" ; } ?>"><a href="<?php echo BASEURL; ?>dashboard"><img src="<?php echo BASEPLUGINS;?>images/page-logos/accept.png" alt="" width="15px" height="15px"> View All Parent Request</a></li>
			</ul>
		</li>
		<?php } ?>

		<li><a href="<?php echo BASEURL; ?>logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
	</ul>
</div>
