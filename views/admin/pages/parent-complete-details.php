<?php
//session_start();
require_once ('../../includes/bootstrap.php');
require_once('../includes/header-bp.php');
$_SESSION['current_page'] = "Approvals View";
require_once('../includes/navigation.php');
require_once('../includes/sidebar.php');
require_once('../includes/breadcrumbs.php');

$parent_obj = new Parents($_SESSION['branch']);
extract($_POST);
$parent = iterator_to_array($parent_obj->getParent($_POST['parent_id']));

file_put_contents("../../../assets/documents/".$parent[0]['parent_id']."_perspective_parent_1.".$parent[0]['perspective_parent_1']["parent_document"]["document_extension"],$parent[0]['perspective_parent_1']["parent_document"]["parent_document"]);
if($parent[0]['is_single_parent']!='0'){
    file_put_contents("../../../assets/documents/".$parent[0]['parent_id']."_perspective_parent_2.".$parent[0]['perspective_parent_2']["parent_document"]["document_extension"],$parent[0]['perspective_parent_2']["parent_document"]["parent_document"]);

}

?>
<div class="row"  style="margin: 0 20px;">
	<div class="panel panel-info <?php if($parent[0]['is_single_parent']=='0'){ echo "";}else { echo "row";}?>">
		<?php if($parent[0]['is_single_parent']=='0'){?>
		<div class="panel-heading">
			<h1 class="panel-title" style="font-size: 22px;">
				<?php echo $parent[0]['perspective_parent_1']['parent_name']?>
			</h1>
		</div>
		<?php }else{ ?>
		<div class="panel-heading col-md-5">
			<h1 class="panel-title" style="font-size: 22px;">
				<?php echo $parent[0]['perspective_parent_1']['parent_name']?>
			</h1>
		</div>
		<div class="panel-heading col-md-5 col-md-offset-2">
			<h1 class="panel-title" style="font-size: 22px;">
				<?php echo $parent[0]['perspective_parent_2']['parent_name']?>
			</h1>
		</div>
		<?php } ?>
		<div class="panel-body">
			<?if($parent[0]['is_single_parent']=='0'){?>
			<div class="row">
				<div class=" col-md-12 col-lg-12">
					<table class="table table-user-information">
						<tbody>
							<tr>
								<td>Marritial Status</td>
								<td>
									<?php if($parent[0]['is_single_parent']=='0'){ echo "Single Parent";}else { echo "Married";}?>
								</td>
							</tr>
							<tr>
								<td>Age</td>
								<td>
									<?php echo $parent[0]['perspective_parent_1']['parent_age']?>
								</td>
							</tr>
							<tr>
							<tr>
								<td>Gender</td>
								<td>
									<?php echo $parent[0]['perspective_parent_1']['gender']?>
								</td>
							</tr>
							<tr>
								<td>View Documents</td>
								<td><a class="btn btn-md btn-info" type="button" href="../../../assets/documents/<?php echo $parent[0]['parent_id']."_perspective_parent_1.".$parent[0]['perspective_parent_1']['parent_document']['document_extension'];?>">Click Me</a> </td>
							</tr>
							<tr>
								<td>
									Verified
								</td>
								<td>
									<?php echo ($parent[0]['is_verified']==true)?"Verified":"Not Verified";?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<?php }else{?>
			<div class="row">
				<div class=" col-md-5 col-lg-5">
					<table class="table table-user-information">
						<tbody>
							<tr>
								<td>Marritial Status</td>
								<td>
									<?php if($parent[0]['is_single_parent']=='0'){ echo "Single Parent";}else { echo "Married";}?>
								</td>
							</tr>
							<tr>
								<td>Age</td>
								<td>
									<?php echo $parent[0]['perspective_parent_2']['parent_age']?>
								</td>
							</tr>
							<tr>
							<tr>
								<td>Gender</td>
								<td>
									<?php echo $parent[0]['perspective_parent_1']['gender']?>
								</td>
							</tr>
							<tr>
								<td>View Documents</td>
								<td><a class="btn btn-md btn-info" type="button" href="../../../assets/documents/<?php echo $parent[0]['parent_id']."_perspective_parent_1.".$parent[0]['perspective_parent_1']['parent_document']['document_extension'];?>">Click Me</a> </td>
							</tr>
							<tr>
								<td>
									Verified
								</td>
								<td>
									<?php echo ($parent[0]['is_verified']==true)?"Verified":"Not Verified";?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class=" col-md-5 col-md-offset-2 col-lg-5 ">
					<table class="table table-user-information">
						<tbody>
							<tr>
								<td>Marritial Status</td>
								<td>
									<?php if($parent[0]['is_single_parent']=='0'){ echo "Single Parent";}else { echo "Married";}?>
								</td>
							</tr>
							<tr>
								<td>Age</td>
								<td>
									<?php echo $parent[0]['perspective_parent_1']['parent_age']?>
								</td>
							</tr>
							<tr>
							<tr>
								<td>Gender</td>
								<td>
									<?php echo $parent[0]['perspective_parent_2']['gender']?>
								</td>
							</tr>
							<tr>
								<td>View Documents</td>
								<td><a class="btn btn-md btn-info" type="button" href="../../../assets/documents/<?php echo $parent[0]['parent_id']."_perspective_parent_2.".$parent[0]['perspective_parent_2']['parent_document']['document_extension'];?>">Click Me</a> </td>
							</tr>
							<tr>
								<td>
									Verified
								</td>
								<td>
									<?php echo ($parent[0]['is_verified']==true)?"Verified":"Not Verified";?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<?php }?>
		</div>
		<div class="panel-footer">
			<a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-info" href="<?php echo BASEPAGES;?>parents.php">BACK</a>
			<span class="pull-right">
				<div class="col-md-6">
					<form action="<?php echo BASEURL?>views/admin/helper/parent_routing.php" method="post">
						<input type="text" value="<?php echo $parent[0]['parent_id']?>" hidden name="parent_id">
						<button type="submit" class="btn btn-sm btn-success" name="approve_parent">Approve</button>
					</form>
				</div>
				<div class="col-md-6">
					<form action="<?php echo BASEURL?>views/admin/helper/parent_routing.php" method="post">
						<input type="text" value="<?php echo $parent[0]['parent_id']?>" hidden name="parent_id">
						<button type="submit" class="btn btn-sm btn-danger" name="reject_parent">Reject</button>
					</form>
				</div>
			</span>
		</div>
	</div>
</div>
<?php
require_once('../includes/footer-bp.php');
?>
