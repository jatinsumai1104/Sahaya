<?php 

require_once("Database.class.php");

class AdoptedChildrens
{
	private $collection;
    private $collectionName="AdoptedChildrens";
	private $db_name;
	
	public function __construct($db_name)
    {
		$this->db_name = $db_name;
        $this->collection = (new Database($db_name))->getRequiredCollection($this->collectionName);
    }
	
	public function insertAdoptedChildren($data){
		extract($data);
		require_once("Children.class.php");
		$children = new Children($this->db_name);
		$child = $children->getChild($child_id);
		$adopted_child_id = "DADAR_ADCHD_" .($this->getChildrenCount()+1);
		$this->collection->insertOne(["adopted_child_id"=>$adopted_child_id, "child_id"=>$child_id, "parent_id"=>$parent_id, "child_consent_document"=>["child_document"=>$child_document,"document_ext"=>$document_ext], "child_img_verified"=>0, "child_image"=>$child_image, "pending_approval_id"=>$pending_approval_id, "adopted_date"=>date("Y-m-d h:i:s"), "last_updated_at"=>date("Y-m-d h:i:s")]);
		$data = array("is_adopted"=>"YES");
		$children->updateChild($child_id, $data);
	}
	
	public function getChildrenCount(){
        return $this->collection->countDocuments();
    }
	
	//$data should contains array["child_image"=>["image"=>$child_image, "image_extension"=>$image_extension]];
	public function updateImage($adopted_child_id, $data){
		$data['last_updated_at'] = date("Y-m-d h:i:s");
		$data['child_img_verified'] = 1;
		$newdata=array('$set'=>$data);
		$rs = $this->collection->updateOne(array("child_id" => $adopted_child_id), $newdata);
		
		require_once('Children.class.php');
		$child = new Children($_SESSION['branch']);
		$child->updateChild($adopted_child_id, $data);
	}
	
	public function getAllAdoptedChild(){
		$rs =  $this->collection->find();
        return $rs;
	}
	
	public function getAdoptedChild($adopted_child_id){
       $rs = $this->collection->find(["adopted_child_id"=>$adopted_child_id]);
	}
    public function getChildByParentId($parent_id){
        return $this->collection->findOne(["parent_id"=>$parent_id]);
    }

}
?>