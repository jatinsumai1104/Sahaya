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


    public function __construct()
    {
        $this->collection = (new Database("testing"))->getRequiredCollection($this->collectionName);
    }

    public function insertEmployee($formdata){
        extract($formdata);
        $emp_id="DADAR_EMP_".(getEmpCount()+1);

        $this->collection->insertOne(["emp_id"=>$emp_id,"emp_name"=>$emp_name,"emp_dob"=>$emp_dob,"emp_gender"=>$emp_dob,"emp_role"=>$emp_role,"emp_address"=>$emp_address,"emp_uid"=>$emp_uid,"emp_contact"=>$emp_contact,"emp_email"=>$emp_email,"emp_image"=>["image"=>$emp_image,"image_extension"=>$image_extension],"emp_document_details"=>["emp_documents"=>$emp_documents,"document_extension"=>$doc_extension]]);
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

	public function sendRegistrationMail($email){
		$ciphertext_email= $this->encryption->encrypt($email);
		require_once('Mailer.php');
		$mailer = new Mailer();
		$user_email = "$email";
		$subject = "Sahaya Account Confirmation";

		$base_url_link = "http://localhost/Sahaya/views/admin/pages/registration-page.php?XSRS=$ciphertext_email";
		$body = "
		<div style='font-family:Roboto; font-size:16px; max-width: 600px; line-height: 21px;'>
			<h4>Hello,</h4>
			<h3>Your Sahaya Account is Ready.</h3>
			<br>
			<a style='text-decoration:none; color:#fff; background-color:#348eda;border:solid #348eda; border-width:2px 10px; line-height:2;font-weight:bold; text-align:center; display:inline-block;border-radius:4px' href='$base_url_link'>
			Activate your account </a>
			<br>
			<h3>Thank you for Registering.</h3>
			<br>
			<br>
			<h4>Sincerely,</h4>
			<h5>The Sahaya Foundation.</h5>
			</div>";

		$boolean=$mailer->send_mail($user_email, $body, $subject);
		if($boolean){
			$_SESSION['status']="SUCCESSMAIL";
			header("Location: ../..");
		}
		else
			$_SESSION['status']="FAILUREMAIL";

	}
	
    public function updateEmployee($emp_id,$formdata){
        extract($formdata);
        $newdata=array('$set'=>array("emp_name"=>$emp_name,"emp_dob"=>$emp_dob,"emp_gender"=>$emp_dob,"emp_role"=>$emp_role,"emp_address"=>$emp_address,"emp_uid"=>$emp_uid,"emp_contact"=>$emp_contact,"emp_email"=>$emp_email,"emp_image"=>["image"=>$emp_image,"image_extension"=>$image_extension],"emp_document_details"=>["emp_documents"=>$emp_documents,"document_extension"=>$doc_extension]));
        $this->collection->updateOne(array("emp_id" => $emp_id), $newdata);
    }

}