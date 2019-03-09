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


        $this->collection->insertOne(["pending_approvals_id"=>$pending_approvals_id,"parent_id"=>$parent_id,"child_id"=>$child_id,"status"=>"Pending","deleted"=>0]);


    }



    public function getCount(){
        return $this->collection->countDocuments();
    }
}