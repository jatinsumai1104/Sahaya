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
    private $collectionName = "Parents";
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
		$parent_id = $_SESSION['branch']."_PRT_".($this->getParentCount()+1);
        $this->collection->insertOne(["parent_id"=>$parent_id,"is_single_parent"=>$is_single_parent,"perspective_parent_1"=>["parent_name"=>$parent_name_1,"parent_age"=>$parent_age_1,"gender"=>$gender_1,"parent_address"=>$parent_address_1,"criminal_status"=>$criminal_status_1,"occupation"=>$occupation_1,"parent_document"=>["parent_document"=>$parent_document_1,"document_extension"=>$document_extension_1],"uid_no"=>$uid_no_1,"pan_no"=>$pan_no_1,"email"=>$email_1,"phone_no"=>$phone_no_1],"financial_status"=>$financial_status,"emp_id"=>$emp_id,"is_verified"=>$is_verified]);

    }

    public function insertParents($array){
        extract($array);
		
		$emp_id = $_SESSION['emp_id'];
		$is_verified = false;
		$parent_id = $_SESSION['branch']."_PRT_".($this->getParentCount()+1);
        $this->collection->insertOne(["parent_id"=>$parent_id,"is_single_parent"=>$is_single_parent,"perspective_parent_1"=>["parent_name"=>$parent_name_1,"parent_age"=>$parent_age_1,"gender"=>$gender_1,"parent_address"=>$parent_address_1,"criminal_status"=>$criminal_status_1,"occupation"=>$occupation_1,"parent_document"=>["parent_document"=>$parent_document_1,"document_extension"=>$document_extension],"uid_no"=>$uid_no_1,"pan_no"=>$pan_no_1,"email"=>$email_1,"phone_no"=>$phone_no_1],"perspective_parent_2"=>["parent_name"=>$parent_name_2,"parent_age"=>$parent_age_2,"gender"=>$gender_2,"parent_address"=>$parent_address_2,"criminal_status"=>$criminal_status_2,"occupation"=>$occupation_2,"parent_document"=>["parent_document"=>$parent_document_2,"document_extension"=>$document_extension_2],"uid_no"=>$uid_no_2,"pan_no"=>$pan_no_2,"email"=>$email_2,"phone_no"=>$phone_no_2],"financial_status"=>$financial_status,"emp_id"=>$emp_id,"is_verified"=>$is_verified]);
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
        $rs = $this->collection->find(["is_single_parent"=>"0","is_verified"=>false]);

        if($rs == null){
            return false;
        }
//		var_dump($rs);
        return $rs;

    }

    public function getMariedParents(){
        $rs = $this->collection->find(["is_single_parent"=>"1","is_verified"=>false]);

        if($rs == null){
            return false;
        }

        return $rs;
    }

    public function changeStatusApprove($parent_id){
        $newdata=array('$set'=>array("is_verified"=>true));
        $this->collection->updateOne(array("parent_id" => $parent_id), $newdata);
    }


    public function changeStatusReject($parent_id){
        $newdata=array('$set'=>array("is_verified"=>null));
        $this->collection->updateOne(array("parent_id" => $parent_id), $newdata);
    }



    public function sendApprovalMail($email, $parent_id){
//		$ciphertext_email= $this->encryption->encrypt($email);
        require_once('Mailer.php');
        $mailer = new Mailer();
        $user_email = "$email";
		$branch = $_SESSION['branch'];
        $subject = "Sahaya Approval Confirmation";
		$base_url_link = "http://localhost/Sahaya/views/admin/pages/parent-sign-up-page.php?email=$email&branch={$branch}&id={$parent_id}";

        $body = "
		<div style='font-family:Roboto; font-size:16px; max-width: 600px; line-height: 21px;'>
			<h4>Hello,</h4>
			<h3>Your Approval for adoption is Accepted</h3>
			<h4>Please Continue for SignUp</h4>
			<br>
			<a style='text-decoration:none; color:#fff; background-color:#348eda;border:solid #348eda; border-width:2px 10px; line-height:2;font-weight:bold; text-align:center; display:inline-block;border-radius:4px' href='$base_url_link'>
			Continue to activate your account </a>
			<br>
			<h3>Thank you for Applying.</h3>
			<br>
			<br>
			<h4>Sincerely,</h4>
			<h5>The Sahaya Foundation.</h5>
			</div>";

        $boolean=$mailer->send_mail($user_email, $body, $subject);
        if($boolean){
            $_SESSION['status']="SUCCESSMAIL";
            header("Location: ../pages/parents.php");
        }
        else{
            $_SESSION['status']="FAILUREMAIL";
            header("Location: ../pages/parents.php");
        }


    }
	
	public function updateCurrent($data){
		extract($data);
		$newdata=array('$set'=>array("parent_user_name"=>$parent_username, "parent_password"=>$parent_password));
        if($this->collection->updateOne(array("parent_id" => $parent_id), $newdata)){
			//session of parent needs to be created
			$baseurl = BASEPAGES;
			header("Location: {$baseurl}dashboard.php");	
		}else{
			echo "Something is wrong";
		}
		
	}


}