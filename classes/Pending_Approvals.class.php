<?php
/**
 * Created by PhpStorm.
 * User: Nikhil Ghind
 * Date: 09-03-2019
 * Time: 02:35 PM
 */

class Pending_Approvals
{

    private $collectionName = "Pending_Approvals";
    private $collection;


    public function __construct($db_name)
    {
        $this->collection = (new Database($db_name))->getRequiredCollection($this->collectionName);
    }

    public function insertPendingApproval($array){
        extract($array);

        $pending_approvals_id = $this->getCount();


        $this->collection->insertOne(["pending_approvals_id"=>$pending_approvals_id,"parent_id"=>$parent_id,"child_id"=>$child_id,"status"=>"Pending","deleted"=>0 , "applied_on" => date("Y-m-d H:i:s")]);


    }



    public function  rejectApproval($pending_approvals_id){
        $array = ['$set'=>["status"=>"Rejected","deleted"=>1]];

        $this->collectionName->updateOne(array("pending_approvals_id"=>$pending_approvals_id),$array);

    }


    public function approveApproval($pending_approvals_id){

        $array = ['$set'=>["status"=>"Accepted","deleted"=>1]];

        $this->collectionName->updateOne(array("pending_approvals_id"=>$pending_approvals_id),$array);



    }


    





    public function getCount(){
        return $this->collection->countDocuments();
    }
}