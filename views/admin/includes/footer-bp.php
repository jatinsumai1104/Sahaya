<?php require_once('../../includes/bootstrap.php');?>
</div>
<!--/.main-->

<script src="<?php echo BASEPLUGINS;?>js/jquery-1.11.1.min.js"></script>
<script src="<?php echo BASEPLUGINS;?>js/bootstrap.min.js"></script>
<script src="<?php echo BASEPLUGINS;?>js/chart.min.js"></script>
<script src="<?php echo BASEPLUGINS;?>js/chart-data.js"></script>
<script src="<?php echo BASEPLUGINS;?>js/easypiechart.js"></script>
<script src="<?php echo BASEPLUGINS;?>js/easypiechart-data.js"></script>
<script src="<?php echo BASEPLUGINS;?>js/bootstrap-datepicker.js"></script>
<script src="<?php echo BASEPLUGINS;?>plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script src="<?php echo BASEPLUGINS;?>plugins/sweet-alert/sweet-alert.min.js"></script>
<script src="<?php echo BASEPLUGINS;?>js/custom.js"></script>
<script>
	window.onload = function() {
		var chart1 = document.getElementById("line-chart").getContext("2d");
		window.myLine = new Chart(chart1).Line(lineChartData, {
			responsive: true,
			scaleLineColor: "rgba(0,0,0,.2)",
			scaleGridLineColor: "rgba(0,0,0,.05)",
			scaleFontColor: "#c5c7cc"
		});
	};
</script>
<?php if(isset($_SESSION['register_child_status']) && $_SESSION['register_child_status'] == "success"){ ?>	
	<script>
		swal("Insertion", "Insertion of child Successfull", "success");
	</script>
<?php unset($_SESSION['register_child_status']);}else if(isset($_SESSION['update_child_status']) && $_SESSION['update_child_status'] == "success"){?>
	<script>
		swal("Updation", "Updation of child Successfull", "success");
	</script>
<?php unset($_SESSION['update_child_status']);}else if(isset($_SESSION['register_parent']) && $_SESSION['register_parent'] == "success"){?>
	<script>
		swal("Registration", "Registration of parent Successfull", "success");
	</script>
<?php unset($_SESSION['register_parent']);}else if(isset($_SESSION['parent_approval']) && $_SESSION['parent_approval'] == "success"){?>
	<script>
		swal("Approval", "Approval of parent successfull", "success");
	</script>
<?php unset($_SESSION['parent_approval']);}else if(isset($_SESSION['child_request_by_parent']) && $_SESSION['child_request_by_parent'] == "success"){?>
	<script>
		swal("Request", "Requested of child Successfully", "success");
		swal("Note", "Whenever any updation comes our team will inform u :)", "info");
	</script>
<?php unset($_SESSION['child_request_by_parent']);}else if(isset($_SESSION['image_update']) && $_SESSION['image_update'] == "success"){?>
	<script>
		swal("Updation", "Image is Matched and Updated Successfull", "success");
	</script>
<?php unset($_SESSION['image_update']);}else if(isset($_SESSION['image_update']) && $_SESSION['image_update'] == "warning"){?>
	<script>
		swal("Updation", "You have submitted Image of some other child Image. Please enter a clear image and image of same child!!", "error");
	</script>
<?php unset($_SESSION['image_update']);}else if(isset($_SESSION['approve_child_adoption']) && $_SESSION['approve_child_adoption'] == "success"){?>
	<script>
		swal("Adoption", "Child has been Adopted by the specified parent!", "info");
	</script>
<?php unset($_SESSION['approve_child_adoption']);}else if(isset($_SESSION['parent_approval']) && $_SESSION['parent_approval'] == "warning"){?>
	<script>
		swal("Parent Requests", "You are Rejecting this parent", "warning");
	</script>
<?php unset($_SESSION['parent_approval']);}?>
</body>

</html>
