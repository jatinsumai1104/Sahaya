<?php
session_start();
require_once('../../includes/bootstrap.php');
require_once("../../../classes/Pending_Approvals.class.php");

$pending_approvals_obj = new Pending_Approvals($_SESSION['branch']);

extract($_POST);
$array = $pending_approvals_obj->getPendingApprovalById($pending_approvals_id);
var_dump($array);

?>