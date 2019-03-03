<?php 
require_once('../includes/header-bp.php');
require_once('../includes/navigation.php');
require_once('../includes/sidebar.php');
require_once('../includes/breadcrumbs.php');
if(isset($updateDetailsData)){  ?>
<!--Update Panel-->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Update Child Details</div>
			<div class="panel-body">
				<form role="form" action="<?php echo BASEURL."updateChildDetails"?>" method="post" enctype="multipart/form-data">
					<div class="col-md-6">
						<input hidden value="<?php echo $updateDetailsData[0]['child_id'];?>" name="child_id">
						<div class="form-group">
							<label>First Name</label>
							<input class="form-control" placeholder="First Name" name="child_first_name" required value="<?php echo $updateDetailsData[0]['child_first_name']; ?>">
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input class="form-control" placeholder="Last Name" name="child_last_name" required value="<?php echo $updateDetailsData[0]['child_last_name'];?>">
						</div>

						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="weight">Weight</label>
									<input type="number" class="custom-range" min="10" max="100" step="1" id="weight" name="weight" style="color: rgb(144, 144, 144);" required value="<?php echo $updateDetailsData[0]['child_detail']->weight;?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="height">Height</label><br>
									<input type="number" class="custom-range" min="10" max="100" step="1" id="height" name="height" style="color: rgb(144, 144, 144);" required value="<?php echo $updateDetailsData[0]['child_detail']->height;?>">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="birth_mark">Birth Mark</label><br>
									<input type="text" class="custom-range" id="birth_mark" name="birth_marks" style="color: rgb(144, 144, 144);" required value="<?php echo $updateDetailsData[0]['child_detail']->birth_marks;?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="age">Age</label><br>
									<input type="number" class="custom-range" min="1" max="18" step="1" id="age" name="age" style="color: rgb(144, 144, 144);" required value="<?php echo $updateDetailsData[0]['child_detail']->age;?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Gender</label>
									<select class="form-control" name="child_gender">
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="disability_type">Disability type</label><br>
									<!--									<input type="text" class="custom-range" id="disability_type" name="disability_type" style="color: rgb(144, 144, 144);" required>-->
									<input class="form-control" placeholder="Any Disability Mention here??" name="disability_type" required value="<?php echo $updateDetailsData[0]['child_detail']->disability_type;?>">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Date Of Birth</label>
							<input type="date" class="form-control" placeholder="Date Of Birth" name="child_dob" required value="<?php echo $updateDetailsData[0]['child_dob'];?>">
						</div>
						<br>

						<div class="form-group">
							<label>Profile Pic</label>
							<img src="<?php echo BASEPLUGINS."images/uploads/".$updateDetailsData[0]['child_id']."_0.".$updateDetailsData[0]['child_image']->{2019}->image_ext?>" class="img-responsive" alt="<?php echo $updateDetailsData[0]['child_first_name']." ".$updateDetailsData[0]['child_last_name']?>" style="width:250px;height:161px;">
						</div>
						<div class="form-group">
							<label>Add New Image</label>
							<input type="file" name="child_image" class="form-control">
						</div>
						<br>
						<div class="form-group">
							<label>Previously Submitted Documents</label>
							<!--							<label>Child All Documents <span>(Please Input a pdf file of documents)</span></label>-->
							<br>
							<a class="btn btn-md btn-info" type="button" href="<?php echo BASEPLUGINS."documents/".$updateDetailsData[0]['child_id'].".".$updateDetailsData[0]['child_documents']->document_ext;?>">Click Me</a>
						</div>
						<div class="form-group">
							<label>Update Documents</label>
							<input type="file" name="child_documents" class="form-control"></div> 
						</div> 
						<div class="row form-group">
							<div class="col-md-12 col-md-offset-5">
								<button type="submit" class="btn btn-lg btn-info">SUBMIT</button>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div><!-- /.panel-->
	<?php }else{ ?>
	<!--Add Panel-->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Submit Child</div>
				<div class="panel-body">
					<form role="form" action="<?php echo BASEURL."addchild"?>" method="post" enctype="multipart/form-data">
						<div class="col-md-6">

							<div class="form-group">
								<label>First Name</label>
								<input class="form-control" placeholder="First Name" name="child_first_name" required>
							</div>
							<div class="form-group">
								<label>Last Name</label>
								<input class="form-control" placeholder="Last Name" name="child_last_name" required>
							</div>

							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="weight">Weight</label>
										<input type="number" class="custom-range" min="10" max="100" step="1" id="weight" name="weight" style="color: rgb(144, 144, 144);" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="height">Height</label><br>
										<input type="number" class="custom-range" min="10" max="100" step="1" id="height" name="height" style="color: rgb(144, 144, 144);" required>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="birth_mark">Birth Mark</label><br>
										<input type="text" class="custom-range" id="birth_mark" name="birth_marks" style="color: rgb(144, 144, 144);" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="age">Age</label><br>
										<input type="number" class="custom-range" min="1" max="18" step="1" id="age" name="age" style="color: rgb(144, 144, 144);" required>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Gender</label>
								<select class="form-control" name="child_gender">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>


							<br>


							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="disability_type">Disability type</label><br>
										<!--									<input type="text" class="custom-range" id="disability_type" name="disability_type" style="color: rgb(144, 144, 144);" required>-->
										<input class="form-control" placeholder="Any Disability Mention here??" name="disability_type" required>
									</div>
								</div>
							</div>


							<div class="form-group">
								<label>Date Of Birth</label>
								<input type="date" class="form-control" placeholder="Last Name" name="child_dob" required>
							</div>
							<br>

							<div class="form-group">
								<label>Child Image</label>
								<input type="file" name="child_image" class="form-control" required>
							</div>
							<br>
							<div class="form-group">
								<label>Child All Documents <span>(Please Input a pdf file of documents)</span></label>
								<input type="file" name="child_documents" class="form-control" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-md-offset-5">
								<button type="submit" class="btn btn-lg btn-info">SUBMIT</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div><!-- /.panel-->
		<?php } ?>
<?php require_once('../includes/footer-bp.php');?>