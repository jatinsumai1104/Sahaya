<?php
require_once ("../../includes/bootstrap.php");
require_once('../includes/header-bp.php');
$_SESSION['current_page'] = "Image Verification";
require_once('../includes/navigation.php');
require_once('../includes/sidebar.php');
require_once('../includes/breadcrumbs.php');
?>
<div class="row">
    <div class="row">
        <div class="col-md-12">
            <img src="../../../assets/images/uploads/<?php echo $array[0]['child_id'].".".$array[0]['child_image']["image_extension"] 			?>" class="img-responsive" alt="">
        </div>
        <div class="col-md-12">
            <div class="form-group last">
                <label class="control-label col-md-2">Child Image</label>
                <div class="col-md-10">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                        <div>
							<span class="btn default btn-file">
								<span class="fileinput-new" style="background: red"> Select image </span>
								<span class="fileinput-exists" style="background: green"> Change </span>
								<input type="file" name="product_image" accept="image/*"></span>
                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                    </div>
                    <div class="clearfix margin-top-10">
                        <span class="label label-danger">NOTE!</span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead. </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once('../includes/footer-bp.php');
?>


