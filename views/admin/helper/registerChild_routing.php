<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 03-03-2019
 * Time: 07:30 PM
 */
require_once ("../../includes/bootstrap.php");
if(isset($_POST["register_child"])){
    extract($_POST);
//echo"hello";
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
//Session dbname
    $child_object =new Children('testing');
    $child_object->insertChild($child_details_array);

//    var_dump($child_details_array);
}else if (isset($_POST['update_child'])){
    extract($_POST);
    if($_FILES['updated_child_image']["error"]!=4 && $_FILES['updated_personal_documents']["error"]!=4){
        $child_image = new MongoDB\BSON\Binary(file_get_contents($_FILES['updated_child_image']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
        $temp = explode("/", $_FILES['updated_child_image']['type']);
        $image_extension = $temp[1];

        $personal_documents = new MongoDB\BSON\Binary(file_get_contents($_FILES['updated_personal_documents']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
        $temp = explode("/", $_FILES['updated_personal_documents']['type']);
        $document_extension = $temp[1];

        $child_details_array=["child_name"=>$child_first_name." ".$child_last_name,"gender"=>$gender,"dob"=>$dob,"birthmark"=>$birthmark,"disability"=>$disability,"date_of_admission"=>$date_of_admission,"source_of_admission"=>$source_of_admission,"child_image"=>$child_image,"image_extension"=>$image_extension,"current_standard"=>$current_standard,"personal_documents"=>$personal_documents,"document_extension"=>$document_extension];

    }else if($_FILES['updated_child_image']["error"]!=4 && $_FILES['updated_personal_documents']["error"]==4) {
        $child_image = new MongoDB\BSON\Binary(file_get_contents($_FILES['updated_child_image']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
        $temp = explode("/", $_FILES['updated_child_image']['type']);
        $image_extension = $temp[1];

        $child_details_array=["child_name"=>$child_first_name." ".$child_last_name,"gender"=>$gender,"dob"=>$dob,"birthmark"=>$birthmark,"disability"=>$disability,"date_of_admission"=>$date_of_admission,"source_of_admission"=>$source_of_admission,"current_standard"=>$current_standard,"child_image"=>$child_image,"image_extension"=>$image_extension];
    }else if($_FILES['updated_child_image']["error"]==4 && $_FILES['updated_personal_documents']["error"]!=4) {
        $personal_documents = new MongoDB\BSON\Binary(file_get_contents($_FILES['updated_personal_documents']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
        $temp = explode("/", $_FILES['updated_personal_documents']['type']);
        $document_extension = $temp[1];

        $child_details_array=["child_name"=>$child_first_name." ".$child_last_name,"gender"=>$gender,"dob"=>$dob,"birthmark"=>$birthmark,"disability"=>$disability,"date_of_admission"=>$date_of_admission,"source_of_admission"=>$source_of_admission,"current_standard"=>$current_standard,"personal_documents"=>$personal_documents,"document_extension"=>$document_extension];
    }else{

        $child_details_array=["child_name"=>$child_first_name." ".$child_last_name,"gender"=>$gender,"dob"=>$dob,"birthmark"=>$birthmark,"disability"=>$disability,"date_of_admission"=>$date_of_admission,"source_of_admission"=>$source_of_admission,"current_standard"=>$current_standard];
    }
//Session dbname
    $child_object =new Children('testing');

    $child_object->updateChild($_POST['child_id'],$child_details_array);

}