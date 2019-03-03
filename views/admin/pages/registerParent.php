<?php 

require_once('../includes/header-bp.php');
$_SESSION['current_page'] = "register parent";
require_once('../includes/navigation.php');
require_once('../includes/sidebar.php');
require_once('../includes/breadcrumbs.php');

?>
<!--Add Panel-->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Register Parent</div>
			<div class="panel-body">
				<form role="form" action="<?php echo BASEURL."views/admin/helper/parent_routing.php"?>" method="post" enctype="multipart/form-data">
					<div class="col-md-12">
						<div class="form-group">
							<label>Marital Status</label>
							<select class="form-control" name="is_single_parent" id="is_single_parent" style="margin-bottom: 27px !important;">
								<option disabled selected>Choose Your Marital Status</option>
								<option value="0">Single</option>
								<option value="1">Mingle</option>
							</select>
						</div>
						<div class="form-group">
							<label>Financial Status </label>
							<input type="text" class="form-control" placeholder="Financial Income Monthly" name="financial_status" required>
						</div>
					</div>
					<div></div>
					<div id="data" class="col-md-12">
					</div>

					<div class="row">
						<div class="col-md-12 col-md-offset-5">
							<button type="submit" name="register_parent" class="btn btn-lg btn-info">SUBMIT</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div><!-- /.panel-->
	<script>
		document.getElementById("is_single_parent").addEventListener("change", function() {
			var data = "";
			for (var i = 0; i <= parseInt(document.getElementById("is_single_parent").value); i++) {
				data += '<hr><h2>Perspective Parent ' + (i + 1) + ' Details</h2><div class="row"><div class="col-md-6"><div class="form-group"><label>Parent Name</label><input type="text" class="form-control" placeholder="Parent Name" name="parent_name_' + (i + 1) + '" required></div><div class="row"><div class="col-md-6"><div class="form-group"><label for="age">Age</label><br><input type="number" class="form-control" min="24" max="100" step="1" id="age" name="parent_age_' + (i + 1) + '" style="color: rgb(144, 144, 144);" required></div></div><div class="col-md-6"><div class="form-group"><label>Gender</label><select class="form-control" name="gender_' + (i + 1) + '" style="margin-bottom: 27px !important;"><option value="Male">Male</option><option value="Female">Female</option></select></div></div></div><div class="form-group"><label>Crimilair Status</label><select class="form-control" name="criminal_status_'+(i+1)+'" style="margin-bottom: 27px !important;"><option value="yes">Crimilair</option><option value="no">Non-Crimilair</option></select></div><div class="form-group"><label>Address: </label><textarea class="form-control" rows="3" name="parent_address_' + (i + 1) + '"></textarea></div><div class="form-group"><label>Occupation</label><input type="text" class="form-control" placeholder="Occupation" name="occupation_' + (i + 1) + '" required></div></div><div class="col-md-6"><div class="form-group"><label>Parent All Documents <span>(Documents are used only for Verification)</span></label><input type="file" name="parent_document_' + (i + 1) + '" class="form-control" required></div><div class="row"><div class="col-md-6"><div class="form-group"><label>UID Number</label><input type="text" class="form-control" placeholder="UID Number" name="uid_no_' + (i + 1) + '" required></div></div><div class="col-md-6"><div class="form-group"><label>Pan Number</label><input type="text" class="form-control" placeholder="Pan Number" name="pan_no_' + (i + 1) + '" required></div></div></div><div class="form-group"><label>Email </label><input type="email" class="form-control" placeholder="Email Address" name="email_' + (i + 1) + '" required></div><div class="form-group"><label>Phone Number </label><input type="text" class="form-control" placeholder="Phone Number" name="phone_no_' + (i + 1) + '" required></div></div></div>';
			}
			document.getElementById("data").innerHTML = data;
		});

	</script>
	<?php require_once('../includes/footer-bp.php');?>
