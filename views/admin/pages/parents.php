<?php
/**
 * Created by PhpStorm.
 * User: Nikhil Ghind
 * Date: 04-03-2019
 * Time: 01:38 AM
 */

require_once ("../../includes/bootstrap.php");

$parents = new Parents("testing");

$single_parents = iterator_to_array($parents->getSingleParents());

$maried_parents = iterator_to_array($parents->getMariedParents());

?>

<h1>For Single Parent</h1>


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
        <th scope="col">Gender</th>
        <th scope="col">View</th>
        <th scope="col">Approve</th>
        <th scope="col">Reject</th>
    </tr>
  </thead>
  <tbody>

<?php
for($i = 0 ; $i < count($single_parents) ; $i++) {
    ?>

    <tr>
        <th scope="row"><?php echo ($i+1);?></th>
        <td><?php  echo $single_parents[$i]['perspective_parent_1']['parent_name'];?></td>
        <td><?php  echo $single_parents[$i]['perspective_parent_1']['age'];?></td>
        <td><?php  echo $single_parents[$i]['perspective_parent_1']['gender'];?></td>
        <td>
            <form action="">
                <input type="text" value="<?php echo $single_parents[$i]['parent_id']?>" hidden name="child_id">
                <input type="submit" value="View" name="view_parent">
            </form>
        </td>
        <td>
            <form action="">
                <input type="text" value="<?php echo $single_parents[$i]['parent_id']?>" hidden name="child_id">
                <input type="submit" value="Approve" name="approve_parent">
            </form>
        </td>
        <td>
            <form action="">
                <input type="text" value="<?php echo $single_parents[$i]['parent_id']?>" hidden name="child_id">
                <input type="submit" value="Reject" name="reject_parent">
            </form>
        </td>
    </tr>
    <?php }?>
  </tbody>
</table>



<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Parent 1 Name</th>
      <th scope="col">Parent 1 Age</th>
      <th scope="col">Parent 1 Gender</th>
        <th scope="col">Parent 2 Name</th>
        <th scope="col">Parent 2 Age</th>
        <th scope="col">Parent 2 Gender</th>
        <th scope="col">View</th>
        <th scope="col">Approve</th>
        <th scope="col">Reject</th>
    </tr>
  </thead>
  <tbody>

  <?php for($i = 0 ; $i < count($maried_parents); $i++){ ?>
      <tr>
          <th scope="row"><?php echo ($i+1);?></th>
          <td><?php  echo $maried_parents[$i]['perspective_parent_1']['parent_name'];?></td>
          <td><?php  echo $single_parents[$i]['perspective_parent_1']['age'];?></td>
          <td><?php  echo $single_parents[$i]['perspective_parent_1']['gender'];?></td>

          <td><?php  echo $maried_parents[$i]['perspective_parent_2']['parent_name'];?></td>
          <td><?php  echo $single_parents[$i]['perspective_parent_2']['age'];?></td>
          <td><?php  echo $single_parents[$i]['perspective_parent_2']['gender'];?></td>
          <td>
              <form action="">
                  <input type="text" value="<?php echo $single_parents[$i]['parent_id']?>" hidden name="child_id">
                  <input type="submit" value="View" name="view_parent">
              </form>
          </td>
          <td>
              <form action="">
                  <input type="text" value="<?php echo $single_parents[$i]['parent_id']?>" hidden name="child_id">
                  <input type="submit" value="Approve" name="approve_parent">
              </form>
          </td>
          <td>
              <form action="">
                  <input type="text" value="<?php echo $single_parents[$i]['parent_id']?>" hidden name="child_id">
                  <input type="submit" value="Reject" name="reject_parent">
              </form>
          </td>
      </tr>

  <?php } ?>
  </tbody>
</table>