<?php 
require_once('../includes/header-bp.php');
$_SESSION['current_page'] = "Register Children";
require_once('../includes/navigation.php');
require_once('../includes/sidebar.php');
require_once('../includes/breadcrumbs.php');
require_once('../../includes/bootstrap.php');
?>
	<!--Add Panel-->
<?php
if(isset($_POST['updateDetails'])){
//echo "hello";
//echo $_POST['child_id'];

    //dbname will be extracted from Session later currently use testing
    $child_object = new Children('testing');
    $rs = iterator_to_array($child_object->getChild($_POST['child_id']));
    $child_first_name= (explode(' ',$rs[0]['child_name']))[0];
    $child_last_name= (explode(' ',$rs[0]['child_name']))[1];
    $child_gender=$rs[0]['gender'];
?>

    <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Update Child Details</div>
            <div class="panel-body">
                <form role="form" action="<?php echo BASEURL."views/admin/helper/registerChild_routing.php"?>" method="post" enctype="multipart/form-data">
                    <input type="text" name="child_id" value="<?php echo $_POST['child_id'];?>"hidden>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" placeholder="First Name" name="child_first_name"  value="<?php echo $child_first_name;?>" required>
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name" value="<?php echo  $child_last_name;?>" name="child_last_name">
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_of_admission">Date of Admission</label><br>
                                    <input type="date" class="form-control" id="date_of_admission" value="<?php echo $rs[0]['date_of_admission'];?>" name="date_of_admission" style="color: rgb(144, 144, 144);" required>
                                </div>
                            </div>
                            <!--                            <div class="row">-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="source_of_admission">Source of Admission</label><br>
                                    <input type="text" class="form-control" id="source_of_admission" name="source_of_admission" value="<?php echo $rs[0]['source_of_admission'];?>" style="color: rgb(144, 144, 144);" required>
                                </div>
                            </div>
                            <!--                            </div>-->
                        </div>

                        <!--                            <div class="row">-->
                        <!--                                <div class="col-md-12">-->
                        <div class="form-group">
                            <label for="birth_mark">Birth Mark</label><br>
                            <input type="text" class="form-control" id="birthmark" value="<?php echo $rs[0]['birthmark'];?>" name="birthmark" style="color: rgb(144, 144, 144);" required>
                        </div>
                        <!--                                </div>-->
                        <!--                            </div>-->

                        <div class="form-group">
                            <label>Child Image</label>
                            <input type="file" name="updated_child_image" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="gender" style="margin-bottom: 27px !important;">
                                <option value="Male" <?php if($child_gender == "Male"){ echo "selected";}?>>Male</option>
                                <option value="Female" <?php if($child_gender == "Female"){ echo "selected";}?>>Female</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Disability</label>
                            <input class="form-control" placeholder="Any Disability..." value="<?php echo $rs[0]['disability'];?>" name="disability" required>
                        </div>


                        <div class="form-group">
                            <label for="date_of_admission">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $rs[0]['dob'];?>" style="color: rgb(144, 144, 144);" required>
                        </div>
                        <div class="form-group">
                            <label for="current_standard">Current Standard</label>
                            <input type="text" class="form-control" id="current_standard" name="current_standard" value="<?php echo $rs[0]['qualification_details']['current_standard'];?>" style="color: rgb(144, 144, 144);" required>
                        </div>

                        <div class="form-group">
                            <label>Child Documents <span>(Please Input a pdf file of documents)</span></label>
                            <input type="file" name="updated_personal_documents" class="form-control" >
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 col-md-offset-5">
                            <button type="submit" name="update_child" class="btn btn-lg btn-info">SUBMIT</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div><!-- /.panel-->
<?php }else{
?>
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
<?php } require_once('../includes/footer-bp.php');?>