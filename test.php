<?php 
require_once('views/admin/includes/bootstrap.php');
$emp = new Employee("DADAR");
$emp->sendRegistrationMail("jatinsumai50", "DADAR");
?>