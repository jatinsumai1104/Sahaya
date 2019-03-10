<<<<<<< HEAD
=======
<?php

session_start();

require_once ("../../includes/bootstrap.php");
$pending_approvals = new Pending_Approvals($_SESSION['branch']);
if(isset($_POST['approveAdoption'])){



    $adopted = new AdoptedChildrens($_SESSION['branch']);

    $array = iterator_to_array($pending_approvals->getPendingApprovalById($_POST['pending_approvals_id']));

    $parent = new Parents($_SESSION['branch']);

    $children = new Children($_SESSION['branch']);

    $child_document = " ";

    $document_ext = " ";

    if(isset($_FILES)){
        $child_document = new MongoDB\BSON\Binary(file_get_contents($_FILES['child_consent_document']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
        $temp = explode("/", $_FILES['child_consent_document']['type']);
        $document_ext = $temp[1];
    }

    $child_image = iterator_to_array($children->getChild($array[0]['child_id']));



    $data = ["child_id"=>$array[0]['child_id'],"parent_id"=>$array[0]['parent_id'],"child_document"=>$child_document,"document_ext"=>$document_ext,"pending_approval_id"=>$array[0]['pending_approvals_id'],"child_image"=>$child_image[0]['child_image']];

    $pending_approvals->approveApproval($_POST['pending_approvals_id']);

    $adopted->insertAdoptedChildren($data);

}else{

    if(isset($_POST['rejectApprove'])){
        $pending_approvals->rejectApproval($_POST['pending_approvals_id']);
    }
}



?>
>>>>>>> 1f0088a6314fb69f8ff455e2ce322ca7a106969e
