<?php
session_start();
require_once ('../../includes/bootstrap.php');
require_once('../includes/header-bp.php');
require_once('../includes/navigation.php');
require_once('../includes/sidebar.php');
require_once('../includes/breadcrumbs.php');
//print_r($_SESSION);

$children = new Children($_SESSION['branch']);

$array = iterator_to_array($children->getChild($_POST['child_id']));


file_put_contents("../../../assets/images/uploads/".$array[0]['child_id'].".".$array[0]['child_image']["image_extension"],$array[0]['child_image']['image']);
file_put_contents("../../../assets/images/uploads/".$array[0]['child_id'].".".$array[0]['personal_documents']["document_extension"],$array[0]['personal_documents']['personal_documents']);
?>
<div class="row">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h1 class="panel-title" style="font-size: 22px;">
				<?php echo $array[0]['child_name'];?>
			</h1>
		</div>
		<div class="panel-body">
			<div class="row">
				<div id="demo" class="carousel slide col-md-3 col-lg-3" data-ride="carousel" align="center">
					<!-- The slideshow -->
					<div class="carousel-inner">

							<div class="carousel-item">
                                <img src="../../../assets/images/uploads/<?php echo $array[0]['child_id'].".".$array[0]['child_image']["image_extension"] ?>" class="img-responsive" alt="">
							</div>

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
								<td>Date of Birth</td>
								<td>
									<?php echo $array[0]['dob'];?>
								</td>
							</tr>
							<tr>
								<td>Age</td>
								<td>
									<?php echo $children->calculateChildAge($_POST['child_id']);?>
								</td>
							</tr>
							<tr>
							<tr>
								<td>Gender</td>
								<td>
									<?php echo $array[0]['gender'];?>
								</td>
							</tr>
							<tr>
								<td>Disability</td>
								<td>
									<?php echo $array[0]['disability'];?>
								</td>
							</tr>
							<tr>
								<td>View Documents</td>
								<td><a class="btn btn-md btn-info" type="button" href="../../../assets/documents/<? echo $array[0]['child_id'].'.'.$array[0]['personal_documents']['document_extension'];?>">Click Me</a> </td> </tr> <tr>
								<td>
									Adoption
								</td>
								<td>
									<?php  if($array[0]['is_adopted']=="NO"){echo "NOT ADOPTED";}
									else{
									    echo "ADOPTED";
                                    }?>
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
				<form action="<?php echo BASEURL."views/admin/pages/submitChild.php";?>" method="post">
					<input name="child_id" value="<?php echo $array[0]['child_id'];?>" hidden>
					<?php if($_SESSION['emp_role'] == 3){?>
					<button type="submit" class="btn btn-primary" name="updateDetails">Mark Request</button>
					<?php }else{?>
					<button type="submit" class="btn btn-primary" name="updateDetails">Update Details</button>
					<?php }?>
				</form>

			</span>
		</div>

	</div>
</div>
<?php
require_once('../includes/footer-bp.php');
?>