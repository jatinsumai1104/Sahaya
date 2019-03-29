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
        $this->collection->insertOne(["parent_id"=>$parent_id,"is_single_parent"=>$is_single_parent,"perspective_parent_1"=>["parent_name"=>$parent_name_1,"parent_age"=>$parent_age_1,"gender"=>$gender_1,"parent_address"=>$parent_address_1,"criminal_status"=>$criminal_status_1,"occupation"=>$occupation_1,"parent_document"=>["parent_document"=>$parent_document_1,"document_extension"=>$document_extension_1],"uid_no"=>$uid_no_1,"pan_no"=>$pan_no_1,"email"=>$email_1,"phone_no"=>$phone_no_1],"perspective_parent_2"=>["parent_name"=>$parent_name_2,"parent_age"=>$parent_age_2,"gender"=>$gender_2,"parent_address"=>$parent_address_2,"criminal_status"=>$criminal_status_2,"occupation"=>$occupation_2,"parent_document"=>["parent_document"=>$parent_document_2,"document_extension"=>$document_extension_2],"uid_no"=>$uid_no_2,"pan_no"=>$pan_no_2,"email"=>$email_2,"phone_no"=>$phone_no_2],"financial_status"=>$financial_status,"emp_id"=>$emp_id,"is_verified"=>$is_verified]);
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

	public function getAllParents(){
		return $this->collection->find();
	}
    public function calculateParentAge($parent_id){
        $rs = $this->getParent($parent_id);
        $array = iterator_to_array($rs);
        $dob = $array[0][""];
        $current_date = date("Y-m-d");
        $sdate = new DateTime($dob);
        $edate = new DateTime($current_date);
        $interval = $sdate->diff($edate);
        $age = $interval->y;
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
	
	public function getParentByEmail($user_name, $password){
		$rs = $this->collection->find(["parent_user_name"=>$user_name, "parent_password"=>$password]);
        return $rs;
	}
    public function changeStatusApprove($parent_id){
        $newdata=array('$set'=>array("is_verified"=>true));
        $this->collection->updateOne(array("parent_id" => $parent_id), $newdata);
    }

    public function getParentName($parent_id){
        $res = iterator_to_array($this->collection->find(["parent_id"=>$parent_id]));
        return $res[0]['perspective_parent_1']['parent_name'];
    }
    public function changeStatusReject($parent_id){
        $newdata=array('$set'=>array("is_verified"=>null));
        $this->collection->updateOne(array("parent_id" => $parent_id), $newdata);
    }

    public function sendApprovalMail($email, $parent_id){
        require_once('Mailer.php');
        $mailer = new Mailer();
        $user_email = "$email";
		$branch = $_SESSION['branch'];
		$username = explode("@", $email)[0];
        $subject = "Sahaya Approval Confirmation";
		$base_url_link = "http://localhost/Sahaya/views/admin/pages/parent-sign-up-page.php?email=$email&branch={$branch}&id={$parent_id}";
		$button = "Activate your account";
		$desc = "This email was sent to you because you are subscribed / Requested for recommendation related to help orphans on Sahaya Foundation";
        
		$body = $mailer->getMailBody($username, $base_url_link, $button, $desc);

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

    public function mailImageUpload($parent_id){
        require_once('Mailer.php');
        $mailer = new Mailer();

        $subject = "No Image Updated";

        $par = iterator_to_array($this->getParent($parent_id));

        if($par[0]['is_single_parent'] == '0'){
            $email = $par[0]['perspective_parent_1']['email'];
            $boolean=$mailer->send_mail($email, $body = $mailer->getMailBody($email, "http://localhost/Sahaya/views/admin/pages/parent-login.php", "Upload Image", "You haven't uploaded your Child photo and the date is very close to 1 year"), $subject);

        }
        else{
            $email =$par[0]['perspective_parent_1']['email'];
            $boolean=$mailer->send_mail($email, $body = $mailer->getMailBody($email, "http://localhost/Sahaya/views/admin/pages/parent-login.php", "Upload Image", "You haven't uploaded your Child photo and the date is very close to 1 year"), $subject);
            $email =$par[0]['perspective_parent_2']['email'];
            $boolean=$mailer->send_mail($email, $body = $mailer->getMailBody($email, "http://localhost/Sahaya/views/admin/pages/parent-login.php", "Upload Image", "You haven't uploaded your Child photo and the date is very close to 1 year"), $subject);
        }


    }

	public function updateCurrent($data){
		extract($data);
		$newdata=array('$set'=>array("parent_user_name"=>$parent_username, "parent_password"=>$parent_password));
        if($this->collection->updateOne(array("parent_id" => $parent_id), $newdata)){
			echo "Parent successfully updated";
		}else{
			echo "Something is wrong";
		}
		
	}


}