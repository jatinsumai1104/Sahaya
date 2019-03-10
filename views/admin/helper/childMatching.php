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


//       var_dump($_SESSION);
       $result = $adopted->getChildByParentId($_SESSION['emp_id']);
       $file = realpath("../../../assets/images/uploads/".$result['child_id'].".");




       file_put_contents("../../../assets/images/uploads/".$result['child_id'].".".$result['child_image']["image_extension"],$result['child_image']['image']);



////      var_dump($result);
//       file_put_contents(realpath("../../../assets/images/uploads/TEMP_".$result['child_id'].".".$result['child_image']["image_extension"]),$_FILES['child_image']['tmp_name']);
//       $file2 = realpath("../../../assets/images/uploads/TEMP_".$result['child_id'].".".$result['child_image']["image_extension"]);
//       $file2 = file_get_contents(realpath("../../../assets/images/uploads/".$result['child_id'].".".$result['child_image']["image_extension"]));


       $file2 = file_get_contents($_FILES['child_image']['tmp_name']);
      file_put_contents("../../../assets/images/uploads/TEMP_".$result['child_id'].".".(explode(".",$_FILES['child_image']['name'])[1]),$file2);
//       echo $file;
    $file2 = realpath("../../../assets/images/uploads/TEMP_".$result['child_id'].".png");
       $detect = new Detection();


       echo $file;
       echo "<br>";
       echo $file2;
       $r = $detect->performDetection($file,$file2);
       var_dump($r);
   }
?>