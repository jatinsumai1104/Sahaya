<?php 
require_once('../includes/header-bp.php');
$_SESSION['current_page'] = "Dashboard";
require_once('../includes/navigation.php');
require_once('../includes/sidebar.php');
require_once('../includes/breadcrumbs.php');
?>
<div class="row">
	<?php 
	
//	print_r($_SESSION);
	if($_SESSION['emp_role'] == 1){?>
	<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-user-secret color-blue"></em>
							<div class="large"><?php echo $emp_count;?></div>
							<div class="text-muted">emp Count</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-exclamation color-red"></em>
							<div class="large">2</div>
							<div class="text-muted">Pending Requests</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-child color-orange"></em>
							<div class="large"><?php echo $student_count;?></div>
							<div class="text-muted">Children Count</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large"><?php echo $parent_count;?></div>
							<div class="text-muted">Parent Count</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
	<?php } ?>
	<div class="col-md-6"></div>
	<?php if($_SESSION['emp_role'] == 3){?>
	<div class="col-md-6">
		<div class="panel panel-default ">
			<div class="panel-heading">
				Adoption Status
			</div>
			<div class="panel-body timeline-container">
				<ul class="timeline">
					<li>
						<div class="timeline-badge primary"><i class="glyphicon glyphicon-pushpin"></i></div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
							</div>
							<div class="timeline-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="timeline-badge"><i class="glyphicon glyphicon-link"></i></div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
							</div>
							<div class="timeline-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="timeline-badge"><i class="glyphicon glyphicon-camera"></i></div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
							</div>
							<div class="timeline-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="timeline-badge"><i class="glyphicon glyphicon-paperclip"></i></div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
							</div>
							<div class="timeline-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>

	</div>
	<?php }?>
</div>
<?php 
require_once('../includes/footer-bp.php');
?>