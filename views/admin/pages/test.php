<?php 
require_once('../../includes/bootstrap.php');
$emp = new Children("DADAR");
$rs = iterator_to_array($emp->getAllAdoptedChild());
//print_r($rs);
for($i = 0; $i < count($rs); $i++){
	echo $rs[$i]['child_id'];
	echo $rs[$i]['child_name'];
	echo $rs[$i]['gender'];
}
?>