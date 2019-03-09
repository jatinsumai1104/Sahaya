<?php
/**
 * Created by PhpStorm.
 * User: Nikhil Ghind
 * Date: 02-03-2019
 * Time: 07:12 PM
 */

require_once ("Children.class.php");
$child_obj = (new Children("DADAR"))->calculateChildAge("DADAR_CHD_1");

//$parents = new Parents();

//if(isset($_POST['child_submit'])){
//    unset($_POST['child_submit']);
////    $children->insertChild($_POST);
//
//    $fileBlob_image = "";
//    $fileExt_image = "";
//    $fileBlob_document = "";
//    $fileExt_document = "";
//
//    if(isset($_FILES['child_image'])){
//        $fileBlob_image = new MongoDB\BSON\Binary(file_get_contents($_FILES['child_image']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
//        $temp = explode("/", $_FILES['child_image']['type']);
//        $fileExt_image = $temp[1];
//        $_POST['child_image'] = $fileBlob_image;
//        $_POST['image_extension'] = $fileExt_image;
//    }else{
//        $_POST['child_image'] = null;
//        $_POST['image_extension'] = null;
//    }
//
//    if(isset($_FILES['personal_documents'])) {
//        $fileBlob_document = new MongoDB\BSON\Binary(file_get_contents($_FILES['personal_documents']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
//        $temp = explode("/", $_FILES['personal_documents']['type']);
//        $fileExt_document = $temp[1];
//        $_POST['personal_documents'] = $fileBlob_document;
//        $_POST['image_extension_doc'] = $fileExt_document;
//    }
//
//        $children->insertChild($_POST);
//}else{
//    var_dump();
//
//}if(isset($_POST['child_update'])){
//    $fileBlob_image = "";
//    $fileExt_image = "";
//    $fileBlob_document = "";
//    $fileExt_document = "";
//
//    if(isset($_FILES['child_image'])) {
//        $fileBlob_image = new MongoDB\BSON\Binary(file_get_contents($_FILES['child_image']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
//        $temp = explode("/", $_FILES['child_image']['type']);
//        $fileExt_image = $temp[1];
//        $_POST['child_image'] = $fileBlob_image;
//        $_POST['image_extension'] = $fileExt_image;
//    }
////    }else{
////        $_POST['child_image'] = null;
////        $_POST['image_extension'] = null;
////    }
//
//    if(isset($_FILES['personal_documents'])) {
//        $fileBlob_document = new MongoDB\BSON\Binary(file_get_contents($_FILES['personal_documents']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
//        $temp = explode("/", $_FILES['personal_documents']['type']);
//        $fileExt_document = $temp[1];
//        $_POST['personal_documents'] = $fileBlob_document;
//        $_POST['document_extension'] = $fileExt_document;
//    }
//
//    $children->updateChild($_POST['child_id'],$_POST);
//}
//

