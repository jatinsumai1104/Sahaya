<?php 
require_once('../../includes/bootstrap.php');
if(isset($_POST['register_parent'])){
	if(isset($_POST['is_single_parent'])){
		
		//here we have to change dadar to db_name coming from employee session
		$parents = new Parents("dadar");
		if($_POST['is_single_parent']){
			$parents->insertParent($_POST);
			$baseurl = BASEPAGES;
			header('Loation: {$baseurl}parents.php');
		}else{
			$parents->insertParents($_POST);
			header('Loation: {$baseurl}parents.php');
		}
	}
}

?>