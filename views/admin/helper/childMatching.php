<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 10-03-2019
 * Time: 07:31 PM
 */

 require_once("../../includes/bootstrap.php");

session_start();
   if(isset($_POST['child_submit'])){
       
	   $parent = new Parents($_SESSION['branch']);
       $adopted = new AdoptedChildrens($_SESSION['branch']);
	   
       $children = new Children($_SESSION['branch']);
	   $result = $adopted->getChildByParentId($_SESSION['emp_id']);
       
	   $detect = new Detection();
	   
	   $file2 = base64_encode(file_get_contents($_FILES['child_image']['tmp_name']));
	   $file = base64_encode(file_get_contents("../../../assets/images/uploads/".$result['child_id'].".".$result['child_image']['image_extension'], true));
       
	   $r = $detect->performDetection($file,$file2);
//       var_dump($r);
	   if($r['confidence']>0.8){
		   $adopted = new AdoptedChildrens($_SESSION['branch']);
		   
//		   print_r($_FILES);
//		   die();
		   $image_blob = new MongoDB\BSON\Binary(file_get_contents($_FILES['child_image']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
		   $temp = explode("/", $_FILES['child_image']['type']);
		   $img_ext = $temp[1];
		   $image = array("child_image"=>["image"=>$image_blob, "image_extension"=>$img_ext]);
		   $adopted->updateImage($result['child_id'], $image);
		   $_SESSION['image_update'] = "success";
		   $basepage = BASEPAGES;
		   header("Location: {$basepage}dashboard.php");
	   }else{
		   $_SESSION['image_update'] = "warning";
		   $basepage = BASEPAGES;
		   header("Location: {$basepage}childImageVerification.php");
	   }
   }
?>