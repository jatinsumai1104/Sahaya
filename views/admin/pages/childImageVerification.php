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
        <div class="col-md-12" style="margin: 30px;">
            <label class="control-label col-md-2">Child Prev Image</label>
            <img src="<?php echo BASEPLUGINS;?>images/uploads/DADAR_CHD_1.jpeg" class="img-responsive" alt="" width="200px; height:150px;">
        </div>
        <form action="../helper/childMatching.php" method="post" enctype="multipart/form-data">
            <div class="col-md-12" style="margin: 30px;">
                <div class="form-group last">
                    <label class="control-label col-md-2">Child Image</label>
                    <div class="col-md-10">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                            <div>
								<span class="btn default btn-file">
									<span class="fileinput-new btn btn-info"> Select image </span>
									<span class="fileinput-exists btn btn-warning"> Change </span>
									<input type="file" name="child_image" accept="image/*"></span>
                                <a href="javascript:;" class="btn red fileinput-exists btn btn-default" data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>
                        <div class="clearfix margin-top-10">
                            <span class="label label-danger">NOTE!</span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead. </div>

                    </div><br>
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-success btn-lg" style="margin: 20px;" name="child_submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
require_once('../includes/footer-bp.php');
?>
