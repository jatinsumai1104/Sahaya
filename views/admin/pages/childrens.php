<?php 
require_once('../includes/header-bp.php');
require_once('../includes/navigation.php');
require_once('../includes/sidebar.php');
require_once('../includes/breadcrumbs.php');
?>
<style>
	.card {
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
		max-width: 300px;
		margin: auto;
		text-align: center;
	}

	button {
		border: none;
		outline: 0;
		display: inline-block;
		padding: 8px;
		color: white;
		background-color: #000;
		text-align: center;
		cursor: pointer;
		width: 100%;
		font-size: 18px;
	}

	.card:hover {
		opacity: 0.85;
		cursor: pointer;
	}

</style>
<div class="row">

	<?php for($i = 0; $i < count($allChild); $i++){
		$year = explode("-", $allChild[$i]['date_of_admission'])[0];
		$count = 0;
		$keys =array_keys((array)$allChild[$i]['child_image']);
		foreach($keys as $key){
			file_put_contents("assets/images/uploads/".$allChild[$i]['child_id']."_{$count}.".$allChild[$i]['child_image']->{$key}->image_ext, $allChild[$i]['child_image']->{$key}->image);
			$count++;
		}
//		file_put_contents("assets/images/uploads/".$allChild[$i]['child_id']."_0.".$allChild[$i]['child_image']->{$year}->image_ext, $allChild[$i]['child_image']->{$year}->image);
	?>
	<form action="<?php echo BASEURL;?>childcompletedetails" method="post">
		<div class="col-md-3 col-sm-6 col-xs-6">
			<div class="card">
				<img src="<?php echo BASEPLUGINS."images/uploads/".$allChild[$i]['child_id']."_0.".$allChild[$i]['child_image']->{2019}->image_ext?>" class="img-responsive" alt="<?php echo $allChild[$i]['child_first_name']." ".$allChild[$i]['child_last_name']?>" style="width:100%;height:161px;">
				<h1>
					<?php echo $allChild[$i]['child_first_name'];?>
				</h1>
				<h1>
					<?php echo $allChild[$i]['child_last_name'];?>
				</h1>
				<p>Age:
					<?php echo $allChild[$i]['child_detail']->age;?>
				</p>
										<input name="childId" value="<?php echo $allChild[$i]['child_id'];?>" hidden>
				<p><button type="submit" name="viewChildDetails">View</button></p>
			</div>
		</div>
	</form>
	<?php } ?>

</div>
<?php 
require_once('../includes/footer-bp.php');
?>