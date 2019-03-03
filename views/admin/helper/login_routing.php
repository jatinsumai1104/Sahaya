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

		if($rs == false){
		  echo "Fuck u";
		}
		else{
			$array = iterator_to_array($rs);
			$_SESSION['emp_id'] = $array[0]['emp_id'];
			$_SESSION['emp_role'] = $array[0]['emp_role'];
			$_SESSION['emp_name'] = $array[0]['emp_name'];
			$_SESSION['branch'] = $branch;
//			var_dump($array);
			$baseurl = BASEPAGES;
			header("Location: {$baseurl}dashboard.php");
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
	}
