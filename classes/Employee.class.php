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


        if(($this->collection->findOne(["emp_email"=>$emp_email]))>0){
            return false;
        }

        $emp_id = $branch . "_EMP_".(getEmpCount()+1);

        $this->collection->insertOne(["emp_id"=>$emp_id,"emp_email"=>$emp_email,"emp_password"=>$emp_password,"branch_id"=>$branch]);


    }

    public function insertEmployee($emp_id,$formdata){
        extract($formdata);
        $this->updateEmployee($emp_id,$formdata);
    }
   
   public function checkEmployee($emp_email,$emp_password){
      if(($this->collection->countDocuments(["emp_email"=>$emp_email,"emp_password"=>$emp_password]))>1){
         return false;
      }
      $rs = $this->collection->find(["emp_email"=>$emp_email,"emp_password"=>$emp_password]);
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

    public function updateEmployee($emp_id,$formdata){
        extract($formdata);
        $newdata=array('$set'=>array("emp_name"=>$emp_name,"emp_dob"=>$emp_dob,"emp_gender"=>$emp_dob,"emp_role"=>$emp_role,"emp_address"=>$emp_address,"emp_uid"=>$emp_uid,"emp_contact"=>$emp_contact,"emp_email"=>$emp_email,"emp_image"=>["image"=>$emp_image,"image_extension"=>$image_extension],"emp_document_details"=>["emp_documents"=>$emp_documents,"document_extension"=>$doc_extension]));
        $this->collection->updateOne(array("emp_id" => $emp_id), $newdata);
    }

}