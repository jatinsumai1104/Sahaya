<?php
session_start();
require_once ("../../includes/bootstrap.php");
require_once ("../../includes/constants.php");
if(isset($_POST["register_child"])){
    extract($_POST);
    $child_image = "";
    $image_extension = "";
    $personal_documents = "";
    $document_extension= "";

    if(isset($_FILES['child_image'])){
        $child_image = new MongoDB\BSON\Binary(file_get_contents($_FILES['child_image']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
        $temp = explode("/", $_FILES['child_image']['type']);
        $image_extension = $temp[1];
    }

    if(isset($_FILES['personal_documents'])) {
        $personal_documents = new MongoDB\BSON\Binary(file_get_contents($_FILES['personal_documents']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
        $temp = explode("/", $_FILES['personal_documents']['type']);
        $document_extension = $temp[1];
    }

    $child_details_array=["child_name"=>$child_first_name." ".$child_last_name,"gender"=>$gender,"dob"=>$dob,"birthmark"=>$birthmark,"disability"=>$disability,"date_of_admission"=>$date_of_admission,"source_of_admission"=>$source_of_admission,"child_image"=>$child_image,"image_extension"=>$image_extension,"current_standard"=>$current_standard,"personal_documents"=>$personal_documents,"document_extension"=>$document_extension];



    $child_object =new Children($_SESSION['branch']);
    $child_object->insertChild($child_details_array);
    $basepage= BASEPAGES;
	$_SESSION['register_child_status'] = "success";
    header("Location: {$basepage}childrens.php");


//    var_dump($child_details_array);
}else if (isset($_POST['update_child'])){
//    extract($_POST);
//	print_r($_POST);
//	echo '<br>';
//    if($_FILES['updated_child_image']["error"]!=4 && $_FILES['updated_personal_documents']["error"]!=4){
//        $child_image = new MongoDB\BSON\Binary(file_get_contents($_FILES['updated_child_image']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
//        $temp = explode("/", $_FILES['updated_child_image']['type']);
//        $image_extension = $temp[1];
//
//        $personal_documents = new MongoDB\BSON\Binary(file_get_contents($_FILES['updated_personal_documents']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
//        $temp = explode("/", $_FILES['updated_personal_documents']['type']);
//        $document_extension = $temp[1];
//
//        $child_details_array=["child_name"=>$child_first_name." ".$child_last_name,"gender"=>$gender,"dob"=>$dob,"birthmark"=>$birthmark,"disability"=>$disability,"date_of_admission"=>$date_of_admission,"source_of_admission"=>$source_of_admission,"child_image"=>$child_image,"image_extension"=>$image_extension,"current_standard"=>$current_standard,"personal_documents"=>$personal_documents,"document_extension"=>$document_extension];
//
//    }else if($_FILES['updated_child_image']["error"]!=4 && $_FILES['updated_personal_documents']["error"]==4) {
//        $child_image = new MongoDB\BSON\Binary(file_get_contents($_FILES['updated_child_image']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
//        $temp = explode("/", $_FILES['updated_child_image']['type']);
//        $image_extension = $temp[1];
//
//        $child_details_array=["child_name"=>$child_first_name." ".$child_last_name,"gender"=>$gender,"dob"=>$dob,"birthmark"=>$birthmark,"disability"=>$disability,"date_of_admission"=>$date_of_admission,"source_of_admission"=>$source_of_admission,"current_standard"=>$current_standard,"child_image"=>$child_image,"image_extension"=>$image_extension];
//    }else if($_FILES['updated_child_image']["error"]==4 && $_FILES['updated_personal_documents']["error"]!=4) {
//        $personal_documents = new MongoDB\BSON\Binary(file_get_contents($_FILES['updated_personal_documents']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
//        $temp = explode("/", $_FILES['updated_personal_documents']['type']);
//        $document_extension = $temp[1];
//
//        $child_details_array=["child_name"=>$child_first_name." ".$child_last_name,"gender"=>$gender,"dob"=>$dob,"birthmark"=>$birthmark,"disability"=>$disability,"date_of_admission"=>$date_of_admission,"source_of_admission"=>$source_of_admission,"current_standard"=>$current_standard,"personal_documents"=>$personal_documents,"document_extension"=>$document_extension];
//    }else{
//
//        $child_details_array=["child_name"=>$child_first_name." ".$child_last_name,"gender"=>$gender,"dob"=>$dob,"birthmark"=>$birthmark,"disability"=>$disability,"date_of_admission"=>$date_of_admission,"source_of_admission"=>$source_of_admission,"current_standard"=>$current_standard];
//    }
////Session dbname
	
	if(isset($_FILES['updated_personal_documents']) && $_FILES['updated_personal_documents']['error'] != 4){
		$fileBlob_document = new MongoDB\BSON\Binary(file_get_contents($_FILES['updated_personal_documents']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
		$temp = explode("/", $_FILES['updated_personal_documents']['type']);
		$fileExt_document = $temp[1];
		$_POST["personal_documents"]=["personal_documents"=>$fileBlob_document,"document_extension"=>$fileExt_document];
	}
	if(isset($_FILES['updated_child_image']) && $_FILES['updated_child_image']['error'] != 4){
		$fileBlob_image = new MongoDB\BSON\Binary(file_get_contents($_FILES['updated_child_image']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
		$temp = explode("/", $_FILES['updated_child_image']['type']);
		$fileExt_image = $temp[1];
		$_POST["child_image"]=["image"=>$fileBlob_image,"image_extension"=>$fileExt_image];
	}
    $child_object =new Children($_SESSION['branch']);
	unset($_POST['update_child']);
//	print_r($_POST);
    $child_object->updateChild($_POST['child_id'],$_POST);
    $basepage= BASEPAGES;
	$_SESSION['update_child_status'] = "success";
    header("Location: {$basepage}childrens.php");

}