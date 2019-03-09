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
//		$ciphertext_email= $this->encryption->encrypt($email);
        require_once('Mailer.php');
        $mailer = new Mailer();
        $user_email = "$email";
		$branch = $_SESSION['branch'];
		$username = explode("@", $email)[0];
        $subject = "Sahaya Approval Confirmation";
		$base_url_link = "http://localhost/Sahaya/views/admin/pages/parent-sign-up-page.php?email=$email&branch={$branch}&id={$parent_id}";

        $body = "<div><table border='0' cellpadding='0' cellspacing='0' height='100%' style='font-family:&quot;Arial&quot;' width='100%'><tbody><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' style='font-family:&quot;Arial&quot;;border:1px solid #ecedee' width='600'><tbody><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' height='50' style='font-family:&quot;Arial&quot;;font-size:13px;padding:20px 40px 0 40px' width='100%'><tbody><tr><td align='center' style='margin:0;padding:0' valign='middle'><a href='http://localhost/Sahaya/views/admin/pages/login2.php' style='text-decoration:none;color:#222;font-size: 20px;'> Sahaya Foundation <img alt='Sahaya FOundation' height='30' src='http://localhost/Sahaya/assets/images/logo.png' style='width:30px;height:30px' width='30'></a></td></tr></tbody></table></td></tr><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' style='font-family:&quot;Arial&quot;;background-color:#fff;font-size:14px;color:#46535e;border-radius:3px;padding-top:30px' width='100%'><tbody><tr><td align='left' valign='top'><div style='color:#fff;background-image:url(https://ci5.googleusercontent.com/proxy/HCXBN17Mw8b7GgEiF5k8bt56EMh5Q5WbYnIlta8fUehYfGpB4f79NphBAC6SC2py6927R3rcCLbGOc2MrQ0EgT4m-nKWg_HzlYWf13P36_ZvMGq24I82pvoD9JVbM2r494vwZyW800n9YuvFT6gsNA=s0-d-e1-ft#https://static-fastly.hackerearth.com/static/emails/images/practice/practice_intro_header.png);padding:48px 20px 48px 20px;text-align:center;font-size:30px;margin:0 0 24px 0'><span style='font-size:14px;line-height:2'>{$username}, are you helping for Good?</span><span style='display:block;font-size:24px;margin:10px 0 0 0'>LET`S HELP TOGETHER TODAY</span></div><div style='margin:0 30px 36px 30px'><span style='display:block;margin:0 0 18px 0;font-size:14px;line-height:2'>You joined Sahaya Foundation with a goal to be a better person.We aim to provide you with all the resources to achieve your goal.</span><div style='margin:0 auto;display:table'><a style='font-size:14px;border-radius:3px;display:inline-block;text-decoration:none;color:#fff;text-align:center;padding:15px 20px;width:180px;background-color:#f60' href='{$base_url_link}'>Activate your account</a></div></div><div style='line-height:2;margin:30px 0 18px 30px;color:#b2b2b2'><div>Regards,</div><div>Team Sahaya</div></div></td></tr></tbody></table></td></tr><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' style='font-family:&quot;Arial&quot;;font-size:12px;color:#666;padding-top:30px' width='100%'><tbody><tr><td align='left' style='padding:0 20px;font-size:12px;color:#90979e' valign='top'>This email was sent to you because you are subscribed / Requested for recommendation related to help orphans on Sahaya Foundation</td></tr><tr><td><a href='http://localhost/Sahaya/views/admin/pages/login2.php'><img height='auto' src='http://localhost/Sahaya/assets/images/mail-logo.png' style='width:100%;height:auto' width='100%' class='CToWUd'></a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div>";

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
			echo "Parent successfully updated";
			//session of parent needs to be created
//			$baseurl = BASEPAGES;
//			header("Location: {$baseurl}dashboard.php");	
		}else{
			echo "Something is wrong";
		}
		
	}


}