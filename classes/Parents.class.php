<?php
/**
 * Created by PhpStorm.
 * User: Nikhil Ghind
 * Date: 02-03-2019
 * Time: 09:03 PM
 */

require_once "Database.class.php";

class Parents
{
    private $collection;
    private $database;
    private $collectionName = "Parents.class";
    private $parent_id;
    private $is_single_parent;
    private $parent_name;
    private $parent_age;
    private $gender;
    private $parent_address;
    private $document_verification;
    private $uid_no;
    private $pan_no;
    private $email;
    private $phone_no;
    private $financial_status;
    private $emp_id;
    private $is_verified;

    public function __construct($db_name)
    {

        $this->collection = (new Database($db_name))->getRequiredCollection($this->collectionName);


    }

    public function insertParent($array){
        extract($array);
		$emp_id = $_SESSION['emp_id'];
		$is_verified = false;
		$parent_id = $_SESSION['current_location']."_PRT_".($this->getParentCount()+1);
        $this->collection->insertOne(["parent_id"=>$parent_id,"is_single_parent"=>$is_single_parent,"perspective_parent_1"=>["parent_name"=>$parent_name_1,"parent_age"=>$parent_age_1,"gender"=>$gender_1,"parent_address"=>$parent_address_1,"criminal_status"=>$criminal_status_1,"occupation"=>$occupation_1,"document_verification"=>$document_verification_1,"uid_no"=>$uid_no_1,"pan_no"=>$pan_no_1,"email"=>$email_1,"phone_no"=>$phone_no_1],"financial_status"=>$financial_status,"emp_id"=>$emp_id,"is_verified"=>$is_verified]);

    }

    public function insertParents($array){
        extract($array);
		
		$emp_id = $_SESSION['emp_id'];
		$is_verified = false;
		$parent_id = $_SESSION['current_location']."_PRT_".($this->getParentCount()+1);
        $this->collection->insertOne(["parent_id"=>$parent_id,"is_single_parent"=>$is_single_parent,"perspective_parent_1"=>["parent_name"=>$parent_name_1,"parent_age"=>$parent_age_1,"gender"=>$gender_1,"parent_address"=>$parent_address_1,"criminal_status"=>$criminal_status_1,"occupation"=>$occupation_1,"document_verification"=>$document_verification_1,"uid_no"=>$uid_no_1,"pan_no"=>$pan_no_1,"email"=>$email_1,"phone_no"=>$phone_no_1],"perspective_parent_2"=>["parent_name"=>$parent_name_2,"parent_age"=>$parent_age_2,"gender"=>$gender_2,"parent_address"=>$parent_address_2,"criminal_status"=>$criminal_status_2,"occupation"=>$occupation_2,"document_verification"=>$document_verification_2,"uid_no"=>$uid_no_2,"pan_no"=>$pan_no_2,"email"=>$email_2,"phone_no"=>$phone_no_2],"financial_status"=>$financial_status,"emp_id"=>$emp_id,"is_verified"=>$is_verified]);
    }


    public function getParentCount(){
        return $this->collection->countDocuments();
    }

    public function getParents(){
        $rs =  $this->collection->find();

        if($rs == null){
            return false;
        }
        return $rs;
    }

    public function getParent($parent_id){
        $rs = $this->collection->find(["parent_id"=>$parent_id]);

        if($rs == null){
            return false;
        }
        return $rs;
    }

    public function calculateParentAge($parent_id){
        $rs = $this->getParent($parent_id);

        $array = iterator_to_array($rs);

        $dob = $array[0][""];

        $year =  explode("-",$dob)[0];

        $current_year = date("Y");

        $age =  $current_year - $year;

        return $age;

    }


    public function getSingleParents(){
        $rs = $this->collection->find(["is_single_parent"=>0]);

        if($rs == null){
            return false;
        }

        return $rs;

    }

    public function getMariedParents(){
        $rs = $this->collection->find(["is_single_parent"=>1]);

        if($rs == null){
            return false;
        }

        return $rs;
    }

}