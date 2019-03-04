<?php
require_once ("../../includes/bootstrap.php");
require_once('../includes/header-bp.php');
$_SESSION['current_page'] = "All Parents";
require_once('../includes/navigation.php');
require_once('../includes/sidebar.php');
require_once('../includes/breadcrumbs.php');

$parents = new Parents($_SESSION['branch']);

$single_parents = iterator_to_array($parents->getSingleParents());

$maried_parents = iterator_to_array($parents->getMariedParents());

?>
<div class="row">
	<h1 class="page-header">For Single Parent</h1>


	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Age</th>
				<th scope="col">Gender</th>
				<th scope="col">View</th>
				<th scope="col">Approve</th>
				<th scope="col">Reject</th>
			</tr>
		</thead>
		<tbody>

			<?php
//	  var_dump($single_parents);
			if(count($single_parents)){
				for($i = 0 ; $i < count($single_parents) ; $i++) {
			?>
			<tr>
				<th scope="row"><?php echo ($i+1);?></th>
				<td><?php  echo $single_parents[$i]['perspective_parent_1']['parent_name'];?></td>
				<td><?php  echo $single_parents[$i]['perspective_parent_1']['parent_age'];?></td>
				<td><?php  echo $single_parents[$i]['perspective_parent_1']['gender'];?></td>
				<td>
					<form action="../helper/parent_routing.php" method="post">
						<input type="text" value="<?php echo $single_parents[$i]['parent_id']?>" hidden name="parent_id">
						<button type="submit" class="btn btn-sm btn-info" name="view_parent">View</button>
					</form>
				</td>
				<td>
					<form action="../helper/parent_routing.php" method="post">
						<input type="text" value="<?php echo $single_parents[$i]['parent_id']?>" hidden name="parent_id">
						<button type="submit" class="btn btn-sm btn-success" name="approve_parent">Approve</button>
					</form>
				</td>
				<td>
					<form action="../helper/parent_routing.php" method="post">
						<input type="text" value="<?php echo $single_parents[$i]['parent_id']?>" hidden name="parent_id">
						<button type="submit" class="btn btn-sm btn-danger" name="reject_parent">Reject</button>
					</form>
				</td>
			</tr>
			<?php }}else{echo "No Data";}?>
		</tbody>
	</table>


	<h1 class="page-header">For Married Parent</h1>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Parent 1 Name</th>
				<th scope="col">Parent 1 Age</th>
				<th scope="col">Parent 1 Gender</th>
				<th scope="col">Parent 2 Name</th>
				<th scope="col">Parent 2 Age</th>
				<th scope="col">Parent 2 Gender</th>
				<th scope="col">View</th>
				<th scope="col">Approve</th>
				<th scope="col">Reject</th>
			</tr>
		</thead>
		<tbody>

			<?php for($i = 0 ; $i < count($maried_parents); $i++){ ?>
			<tr>
				<th scope="row"><?php echo ($i+1);?></th>
				<td><?php  echo $maried_parents[$i]['perspective_parent_1']['parent_name'];?></td>
				<td><?php  echo $maried_parents[$i]['perspective_parent_1']['parent_age'];?></td>
				<td><?php  echo $maried_parents[$i]['perspective_parent_1']['gender'];?></td>

				<td><?php  echo $maried_parents[$i]['perspective_parent_2']['parent_name'];?></td>
				<td><?php  echo $maried_parents[$i]['perspective_parent_2']['parent_age'];?></td>
				<td><?php  echo $maried_parents[$i]['perspective_parent_2']['gender'];?></td>
				<td>
					<form action="">
						<input type="text" value="<?php echo $maried_parents[$i]['parent_id']?>" hidden name="parent_id">
						<button type="submit" class="btn btn-sm btn-info" name="view_parent">View</button>
					</form>
				</td>
				<td>
					<form action="../helper/parent_routing.php" method="post">
						<input type="text" value="<?php echo $maried_parents[$i]['parent_id']?>" hidden name="parent_id">
						<button type="submit" class="btn btn-sm btn-success" name="approve_parent">Approve</button>
					</form>
				</td>
				<td>
					<form action="../helper/parent_routing.php" method="post">
						<input type="text" value="<?php echo $maried_parents[$i]['parent_id']?>" hidden name="parent_id">
						<button type="submit" class="btn btn-sm btn-danger" name="reject_parent">Reject</button>
					</form>
				</td>
			</tr>

			<?php } ?>
		</tbody>
	</table>
</div>
<?php 
require_once('../includes/footer-bp.php');
?>
