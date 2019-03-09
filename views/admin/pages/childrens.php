<?php
require_once ("../../includes/bootstrap.php");
require_once('../includes/header-bp.php');
$_SESSION['current_page'] = "All Childrens";
require_once('../includes/navigation.php');
require_once('../includes/sidebar.php');
require_once('../includes/breadcrumbs.php');
?>
<style>
	.card {
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
		max-width: 300px;
		margin: auto;
		text-align: center;
	}

	button {
		border: none;
		outline: 0;
		display: inline-block;
		padding: 8px;
		color: white;
		background-color: #000;
		text-align: center;
		cursor: pointer;
		width: 100%;
		font-size: 18px;
	}

	.card:hover {
		opacity: 0.85;
		cursor: pointer;
	}

</style>
<div class="row">


    <?php

    $children = new Children($_SESSION['branch']);
    $parent = new Parents($_SESSION['branch']);
    if($_SESSION['emp_role']==3){

        $result = $parent->getParent($_SESSION['emp_id']);

        $result = iterator_to_array($result);

        $rs = $children->getChildrenByGender($result[0]['perspective_parent_1']['gender']);

        $array = iterator_to_array($rs);



    }else{
        $rs = $children->getChildren();

        $array = iterator_to_array($rs);



    }




//        var_dump($array);
    ?>
<? 
    for($i=0;$i<$children->getChildrenCount();$i++) {
        file_put_contents("../../../assets/images/uploads/".$array[$i]['child_id'].".".$array[$i]['child_image']["image_extension"],$array[$i]['child_image']['image']);
?>
    <form action="complete-child-detail.php" method="post">
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="card">
                <img src="../../../assets/images/uploads/<?php echo $array[$i]['child_id'].".".$array[$i]['child_image']["image_extension"] ?>" class="img-responsive" alt="">
                <h1>
                    <?php echo $array[$i]["child_name"] ?>
                </h1>
                <p>Age:
                    <?php echo $children->calculateChildAge($array[$i]["child_id"]) ?>
                </p>
                <input name="child_id" value="<?php echo $array[$i]['child_id']?>" hidden>
                <p>
                    <button type="submit" name="viewChildDetails">View</button>
                </p>
            </div>
        </div>
    </form>
    <?php
}
    ?>
</div>
<?php 
require_once('../includes/footer-bp.php');
?>