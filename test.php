<?php 
require_once('../../includes/bootstrap.php');
$emp = new Children("DADAR");
$rs = $emp->getAllAdoptedChild();
print_r($rs);
?>