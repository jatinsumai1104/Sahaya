<?php 
session_start();
require_once('../../includes/bootstrap.php');
require_once("../../../classes/Pending_Approvals.class.php");
if(isset($_POST['requestChild'])){
    $parent_id=$_SESSION['emp_id'];
    $child_id=$_POST['child_id'];
    $pending=new Pending_Approvals($_SESSION['db_name']);
    $array = array("parent_id"=>$parent_id, "child_id"=>$child_id);
    $pending->insertPendingApproval($array);
    header("Location: ".BASEPAGES."childrens.php");
}
?>