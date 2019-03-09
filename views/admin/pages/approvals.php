<?php
require_once ("../../includes/bootstrap.php");
require_once('../includes/header-bp.php');
$_SESSION['current_page'] = "All Approvals";
require_once('../includes/navigation.php');
require_once('../includes/sidebar.php');
require_once('../includes/breadcrumbs.php');
require_once('../../../classes/Pending_Approvals.class.php');
require_once('../../../classes/Parents.class.php');
require_once('../../../classes/Children.class.php');

$approvals = new Pending_Approvals($_SESSION['branch']);
$result = $approvals->getData();
$parent = new Parents($_SESSION['branch']);
$child = new Children($_SESSION['branch']);
for($i = 0 ; $i < count($result) ; $i++) {
    $parent_id = $result[$i]['parent_id'];
    $parent_name = $parent->getParentName($parent_id);
//    echo $parent_name;
    $child_id = $result[$i]['child_id'];
    $child_name = $child->getChildName($child_id);

?>
<div class="row">
	<h1 class="page-header">Pending Approvals</h1>


	<table class="table table-bordered">
		<thead class="thead-dark" style="background: #222;color: #fff;">
			<tr style="text-align: center;">
				<th scope="col">#</th>
				<th scope="col">Parent name</th>
				<th scope="col">Child Name</th>
				
				<th scope="col">View</th>
				<th scope="col">Approve</th>
				<th scope="col">Reject</th>
			</tr>
		</thead>
		<tbody>

			
			<tr style="text-alig$pn: center;">
				<th scope="row"><?php echo ($i+1);?></th>
				<td><?php  echo $parent_name;?></td>
				<td><?php echo $child_name; ?></td>
				<td>
					<form action="../helper/pending_approvals_routing.php" method="post">
						<input type="text" value="<?php echo $result[$i]['pending_approvals_id'];?>" hidden name="Pending_approvals_id">
						<button type="submit" class="btn btn-sm btn-info" name="view_parent">View</button>
					</form>
				</td>
			</tr>
			
		</tbody>
	</table>
</div>
<?php 
}//for loop closing
    require_once('../includes/footer-bp.php');
?>
