<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 03-03-2019
 * Time: 02:44 PM
 */
require_once ("Database.class.php");

class Employee
{
    private $collection;
    private $collectionName="Employee";
    private $emp_id;
    private $emp_name;
    private $emp_dob;
    private $emp_gender;
    private $emp_role;
    private $emp_address;
    private $emp_uid;
    private $emp_contact;
    private $emp_email;
    private $emp_image;
    private $emp_documents;
	private $emp_password;
	private $branch_id;


    public function __construct($db_name)
    {
        $this->collection = (new Database($db_name))->getRequiredCollection($this->collectionName);
    }

    public function registerEmployee($array){
        extract($array);

		if($emp_password == $emp_confirm_password){
//			if(($this->collection->countDocuments(["emp_email"=>$emp_email]))>0){
//				return false;
//			}
//
//			$emp_id = $branch . "_EMP_".($this->getEmployeeCount()+1);
//
//			$this->collection->insertOne(["emp_id"=>$emp_id,"emp_email"=>$emp_email,"emp_password"=>$emp_password,"branch_id"=>$branch]);

			$this->sendRegistrationMail($emp_email, $branch);
		}
        else{
			echo "Please Enter Same Password";
		}
    }

    public function insertEmployee($emp_email,$formdata){
        $this->updateEmployee($emp_email,$formdata);
    }
   
   public function checkEmployee($emp_email,$emp_password){

//        echo $this->collection->countDocuments(["emp_email"=>$emp_email,"emp_password"=>$emp_password]);
      if(($this->collection->countDocuments(["emp_email"=>$emp_email,"emp_password"=>$emp_password]))==1){

          $rs = $this->collection->find(["emp_email"=>$emp_email,"emp_password"=>$emp_password]);
          return $rs;
      }
      return null;

      $rs = $this->collection->find(array("emp_email"=>$emp_email,"emp_password"=>$emp_password));
      return $rs;

   }

    public function getEmployeeCount(){
        return $this->collection->countDocuments();
    }

    public function getAllEmployees(){
        $rs =  $this->collection->find();

        if($rs == null){
            return false;
        }
        return $rs;
    }

    public function getEmployeeById($emp_id){
        $rs = $this->collection->find(["emp_id"=>$emp_id]);

        if($rs == null){
            return false;
        }
        return $rs;
    }

	public function sendRegistrationMail($email, $branch){
//		$ciphertext_email= $this->encryption->encrypt($email);
		require_once('Mailer.php');
		$mailer = new Mailer();
		$user_email = "$email";
		$username = explode("@", $email)[0];
		$subject = "Sahaya Account Confirmation";

		$base_url_link = "http://localhost/Sahaya/views/admin/pages/registration-page.php?email=$email&branch={$branch}";
		$body = "<div><table border='0' cellpadding='0' cellspacing='0' height='100%' style='font-family:&quot;Arial&quot;' width='100%'><tbody><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' style='font-family:&quot;Arial&quot;;border:1px solid #ecedee' width='600'><tbody><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' height='50' style='font-family:&quot;Arial&quot;;font-size:13px;padding:20px 40px 0 40px' width='100%'><tbody><tr><td align='center' style='margin:0;padding:0' valign='middle'><a href='http://localhost/Sahaya/views/admin/pages/login2.php' style='text-decoration:none;color:#222;font-size: 20px;'> Sahaya Foundation <img height='30' src='cid:logo'  style='width:30px;height:30px' width='30'></a></td></tr></tbody></table></td></tr><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' style='font-family:&quot;Arial&quot;;background-color:#fff;font-size:14px;color:#46535e;border-radius:3px;padding-top:30px' width='100%'><tbody><tr><td align='left' valign='top'><div style='color:#fff;background-image:url(https://ci5.googleusercontent.com/proxy/HCXBN17Mw8b7GgEiF5k8bt56EMh5Q5WbYnIlta8fUehYfGpB4f79NphBAC6SC2py6927R3rcCLbGOc2MrQ0EgT4m-nKWg_HzlYWf13P36_ZvMGq24I82pvoD9JVbM2r494vwZyW800n9YuvFT6gsNA=s0-d-e1-ft#https://static-fastly.hackerearth.com/static/emails/images/practice/practice_intro_header.png);padding:48px 20px 48px 20px;text-align:center;font-size:30px;margin:0 0 24px 0'><span style='font-size:14px;line-height:2'>{$username}, are you helping for Good?</span><span style='display:block;font-size:24px;margin:10px 0 0 0'>LET`S HELP TOGETHER TODAY</span></div><div style='margin:0 30px 36px 30px'><span style='display:block;margin:0 0 18px 0;font-size:14px;line-height:2'>You joined Sahaya Foundation with a goal to be a better person.We aim to provide you with all the resources to achieve your goal.</span><div style='margin:0 auto;display:table'><a style='font-size:14px;border-radius:3px;display:inline-block;text-decoration:none;color:#fff;text-align:center;padding:15px 20px;width:180px;background-color:#f60' href='{$base_url_link}'>Activate your account</a></div></div><div style='line-height:2;margin:30px 0 18px 30px;color:#b2b2b2'><div>Regards,</div><div>Team Sahaya</div></div></td></tr></tbody></table></td></tr><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' style='font-family:&quot;Arial&quot;;font-size:12px;color:#666;padding-top:30px' width='100%'><tbody><tr><td align='left' style='padding:0 20px;font-size:12px;color:#90979e' valign='top'>This email was sent to you because you are subscribed / Requested for recommendation related to help orphans on Sahaya Foundation</td></tr><tr><td><a href='http://localhost/Sahaya/views/admin/pages/login2.php'><img height='auto' src='cid:mail-logo' style='width:100%;height:auto' width='100%'></a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div>";

		$boolean=$mailer->send_mail($user_email, $body, $subject);
		if($boolean){
			$_SESSION['status']="SUCCESSMAIL";			
			header("Location: ../pages/login2.php");
		}
		else{
			$_SESSION['status']="FAILUREMAIL";
//			header("Location: ../pages/login2.php");
			echo "failed to send mail";
		}
			

	}
	
    public function updateEmployee($emp_email,$formdata){
        extract($formdata);

       	$emp_role = 2;
		$newdata=array('$set'=>array("emp_name"=>$emp_name,"emp_dob"=>$emp_dob,"emp_gender"=>$emp_dob,"emp_role"=>$emp_role,"emp_address"=>$emp_address,"emp_uid"=>$emp_uid,"emp_contact"=>$emp_contact,"emp_email"=>$emp_email,"emp_image"=>["image"=>$image_blob,"image_extension"=>$image_extension],"emp_document_details"=>["emp_documents"=>$document_blob,"document_extension"=>$document_extension]));
        $this->collection->updateOne(array("emp_email" => $emp_email), $newdata);
    }

}
