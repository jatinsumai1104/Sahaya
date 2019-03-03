<?php 
require_once('../includes/header-bp.php');
require_once('../includes/navigation.php');
require_once('../includes/sidebar.php');
require_once('../includes/breadcrumbs.php');
?>
	<!--Add Panel-->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Submit Child</div>
				<div class="panel-body">
                    <form role="form" action="<?php echo BASEURL."views/admin/helper/registerChild_routing.php"?>" method="post" enctype="multipart/form-data">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="First Name" name="child_first_name" required>
                            </div>


                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name" name="child_last_name">
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_of_admission">Date of Admission</label><br>
                                        <input type="date" class="form-control" id="date_of_admission" name="date_of_admission" style="color: rgb(144, 144, 144);" required>
                                    </div>
                                </div>
<!--                            <div class="row">-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="source_of_admission">Source of Admission</label><br>
                                        <input type="text" class="form-control" id="source_of_admission" name="source_of_admission" style="color: rgb(144, 144, 144);" required>
                                    </div>
                                </div>
<!--                            </div>-->
                            </div>

<!--                            <div class="row">-->
<!--                                <div class="col-md-12">-->
                                    <div class="form-group">
                                        <label for="birth_mark">Birth Mark</label><br>
                                        <input type="text" class="form-control" id="birthmark" name="birthmark" style="color: rgb(144, 144, 144);" required>
                                    </div>
<!--                                </div>-->
<!--                            </div>-->

                            <div class="form-group">
                                <label>Child Image</label>
                                <input type="file" name="child_image" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" name="gender" style="margin-bottom: 27px !important;">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Disability</label>
                                <input class="form-control" placeholder="Any Disability " name="disability" required>
                            </div>


                                    <div class="form-group">
                                        <label for="date_of_admission">Date of Birth</label>
                                        <input type="date" class="form-control" id="dob" name="dob" style="color: rgb(144, 144, 144);" required>
                                    </div>
                            <div class="form-group">
                                <label for="current_standard">Current Standard</label>
                                <input type="text" class="form-control" id="current_standard" name="current_standard" style="color: rgb(144, 144, 144);" required>
                            </div>

                            <div class="form-group">
                                <label>Child Documents <span>(Please Input a pdf file of documents)</span></label>
                                <input type="file" name="personal_documents" class="form-control" required>
                            </div>

                        </div>
						<div class="row">
							<div class="col-md-12 col-md-offset-5">
								<button type="submit" name="register_child" class="btn btn-lg btn-info">SUBMIT</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div><!-- /.panel-->
<?php require_once('../includes/footer-bp.php');?>