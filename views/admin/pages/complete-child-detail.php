<?php 
//print_r($_SESSION);
file_put_contents("assets/documents/".$childDetails[0]['child_id'].".".$childDetails[0]['child_documents']->document_ext, $childDetails[0]['child_documents']->document_blob);
?>
<div class="row">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h1 class="panel-title" style="font-size: 22px;">
				<?php echo $childDetails[0]['child_first_name']." ".$childDetails[0]['child_last_name']?>
			</h1>
		</div>
		<div class="panel-body">
			<div class="row">
				<div id="demo" class="carousel slide col-md-3 col-lg-3" data-ride="carousel" align="center">
					<!-- The slideshow -->
					<div class="carousel-inner">
						<?php 
							$count = 0;
							$keys =array_keys((array)$childDetails[0]['child_image']);
							foreach($keys as $key){
						?>
							<div class="carousel-item">
								<img src="<?php echo BASEPLUGINS."images/uploads/".$childDetails[0]['child_id']."_{$count}.".$childDetails[0]['child_image']->{$key}->image_ext?>" class="img-responsive" alt="<?php echo $childDetails[0]['child_first_name']." ".$childDetails[0]['child_last_name']?>" style="width:100%;height:161px;">
							</div>
						<?php $count++;} ?>
					</div>

					<!-- Left and right controls -->
					<a class="carousel-control-prev" href="#demo" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					</a>
					<a class="carousel-control-next" href="#demo" data-slide="next">
						<span class="carousel-control-next-icon"></span>
					</a>
				</div>
				<div class=" col-md-9 col-lg-9 ">
					<table class="table table-user-information">
						<tbody>
							<tr>
								<td>Height:</td>
								<td>
									<?php echo $childDetails[0]['child_detail']->height;?>
								</td>
							</tr>
							<tr>
								<td>Weight:</td>
								<td>
									<?php echo $childDetails[0]['child_detail']->height;?>
								</td>
							</tr>
							<tr>
								<td>Date of Birth</td>
								<td>
									<?php echo $childDetails[0]['child_dob'];?>
								</td>
							</tr>
							<tr>
								<td>Age</td>
								<td>
									<?php echo $childDetails[0]['child_detail']->age;?>
								</td>
							</tr>
							<tr>
							<tr>
								<td>Gender</td>
								<td>
									<?php echo $childDetails[0]['child_gender'];?>
								</td>
							</tr>
							<tr>
								<td>Disability</td>
								<td>
									<?php echo $childDetails[0]['child_detail']->disability_type;?>
								</td>
							</tr>
							<tr>
								<td>View Documents</td>
								<td><a class="btn btn-md btn-info" type="button" href="<?php echo BASEPLUGINS."documents/".$childDetails[0]['child_id'].".".$childDetails[0]['child_documents']->document_ext;?>">Click Me</a> </td> </tr> <tr>
								<td>
									Adoption
								</td>
								<td>
									<?php if($childDetails[0]['adoption_flag']==1){echo "Adopted";}else{echo "Not Adopted";}?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="panel-footer">
			<a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
			<span class="pull-right">
				<?php if($childDetails[0]['adoption_flag'] == 0 && $_SESSION['employee_role'] == 3){?>
				<a href="#" class="btn btn-primary">Request For Adoption</a>
				<?php }else if($_SESSION['employee_role'] < 3){ ?>
				<form action="<?php echo BASEURL;?>fetchingChild" method="post">
					<input name="childId" value="<?php echo $childDetails[0]['child_id'];?>" hidden>
					<button type="submit" class="btn btn-primary" name="updateDetails">Update Details</button>
				</form>
				<?php } ?>
			</span>
		</div>

	</div>
</div>
