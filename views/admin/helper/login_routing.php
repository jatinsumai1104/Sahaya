<?php
   session_start();
   	require_once('../../includes/bootstrap.php');
//	require_once("../../../classes/Employee.class.php");
	
	if(isset($_POST["emp_login"])){

		$emp_email = $_POST["emp_email"];
		$emp_password = $_POST['emp_password'];
		$branch = $_POST["branch"];
		$employee = new Employee($branch);
		$_SESSION["db_name"] = $branch;
		$rs=$employee->checkEmployee($emp_email,$emp_password);
		$array = iterator_to_array($rs);
		if(count($array) != 1){
		  echo "Invalid Login Credentials";
		}
		else{
			$_SESSION['emp_id'] = $array[0]['emp_id'];
			$_SESSION['emp_role'] = $array[0]['emp_role'];
			$_SESSION['emp_name'] = $array[0]['emp_name'];
			$_SESSION['branch'] = $branch;
			$basepage = BASEPAGES;
			header("Location: {$basepage}dashboard.php");
		}

	}else if(isset($_POST['registerSignUp'])){
		$branch = $_POST["branch"];
		$employee = new Employee($branch);
		$employee->registerEmployee($_POST);
	}else if(isset($_POST['completeSignUp'])){
		$branch = $_REQUEST['branch'];
		echo $branch;
		$employee = new Employee($branch);
		
		if(isset($_FILES['emp_image'])){
            $image_blob = new MongoDB\BSON\Binary(file_get_contents($_FILES['emp_image']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
			$temp = explode("/", $_FILES['emp_image']['type']);
            $img_ext = $temp[1];
        }

        if(isset($_FILES['emp_documents'])){
            $document_blob = new MongoDB\BSON\Binary(file_get_contents($_FILES['emp_documents']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
			$temp = explode("/", $_FILES['emp_documents']['type']);
            $document_ext = $temp[1];
        }
		$_POST['image_blob'] = $image_blob;
		$_POST['image_extension'] = $img_ext;
		$_POST['document_blob'] = $document_blob;
		$_POST['document_extension'] = $document_ext;
		$employee->insertEmployee($_REQUEST['email'], $_POST);	
		$baseurl = BASEPAGES;
		header("Location: {$baseurl}login2.php");
	}else if(isset($_REQUEST['parent_sign_up'])){
		$branch = $_REQUEST['branch'];
		$parent = new Parents($branch);
		$parent->updateCurrent($_POST);
		
		$_SESSION['emp_id'] = $_REQUEST['parent_id'];
		$_SESSION['emp_role'] = 3;
		$_SESSION['emp_name'] = $_REQUEST['parent_username'];
		$_SESSION['branch'] = $_REQUEST['branch'];
		
		$baseurl = BASEPAGES;
		header("Location: {$baseurl}dashboard.php");
	}else if(isset($_REQUEST['logout']) && $_REQUEST['logout'] == 1){
		
		session_destroy();
		
		$baseurl = BASEPAGES;
		header("Location: {$baseurl}login2.php");
	}
