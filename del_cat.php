<?php
require('config.php');
require('checksession.php');
$cat_id=$_GET['cat_id'];
$del=mysqli_query($con, "DELETE FROM category WHERE cat_id=$cat_id") or die(mysqli_error($con));
if($del==1){
    ?>
    <script>
        window.location='category.php?msg=Category delete successfully';
    </script>
    <?php
}else{
    ?>
    <script>
        window.location='category.php?err=Category not delete successfully';
    </script>
    <?php
}
?>