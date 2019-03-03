<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 03-03-2019
 * Time: 04:44 PM
 */
require_once ("Database.class.php");
class Branch
{
    private $collection;
    private $collectionName = "Branch";
    private $branch_name;
    private $branch_id;
    private $branch_location;
    private $branch_contact;
    private $branch_email;
    private $branch_children_count=0;
    private $branch_adopted_children_count=0;

    public function __construct(){
        $this->collection = (new Database("testing"))->getRequiredCollection($this->collectionName);
        $this->childrenCollection = new Children();
    }

    public function insertBranch($formdata){
        extract($formdata);
        $branch_id="DADAR";

        $this->collection->insertOne(["branch_name"=>$branch_name,"branch_id"=>$branch_id,"branch_location"=>$branch_location,"branch_contact"=>$branch_contact,"branch_email"=>$branch_email,"branch_children_count"=>$branch_children_count,"branch_adopted_children_count"=>$branch_adopted_children_count;]);
    }

    public function getBranchChildrenCount($branch_id){
        $rs = $this->collection->findOne(["branch_id"=>$branch_id]);
        $rs = iterator_to_array($rs);
        return $rs[0]["branch_children_count"];
    }
    public function getBranchAdoptedChildrenCount($branch_id){
        $rs = $this->collection->findOne(["branch_id"=>$branch_id]);
        $rs = iterator_to_array($rs);
        return $rs[0]["branch_adopted_children_count"];
    }
    public function getChildrenInBranch($branch_id){
        $this->collection->updateOne(array("branch_id" => $branch_id), array('$set'=>["branch_children_count"=>(getBranchChildrenCount($branch_id)+1)]));
    }
    public function getAdoptedChildrenInBranch($branch_id){
        $this->collection->updateOne(array("branch_id" => $branch_id), array('$set'=>["branch_adopted_children_count"=>(getBranchAdoptedChildrenCount($branch_id)+1)]));
    }
}