<?php
 require('config.php');
 require('checksession.php');
$src="SELECT * FROM category ORDER BY cat_name";
$rs=mysqli_query($con, $src) or die(mysqli_error($con));
?>
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashborad Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php require('menu.php') ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">Add New Items</h2>
                        <div class="col-12">
                            <div class="col-6">
                                
                                <form name="frm" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                        <label for="i_title">Item Title</label>
                                        <input type="text" name="i_title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="i_s_desc">Item Short Decription</label>
                                        <textarea name="i_s_desc" class="form-control" rows="2"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="i_price">Item Price</label>
                                        <input type="text" name="i_price" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="i_desc">Item Description</label>
                                        <textarea name="i_desc" class="form-control" rows="5"></textarea>
                                    </div>
                                  
                                    
                                  
                                       
                                    <div class="form-group">
                                        <label for="cat_id">Select Category</label>
                                        <select name="cat_id" class="form-control">
                                        <option value="">-Select Category-</option>
                                        <?php
                                            while($rec=mysqli_fetch_assoc($rs)){
                                                ?>
                                                <option value="<?php echo $rec['cat_id'] ?>"><?php echo $rec['cat_name'] ?></option>
                                                <?php
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ff">Select Image</label>
                                        <input type="file" name="ff" class="form-control">
                                    </div>
                                    <input type="submit" name="ok" value="Add Item" class="btn btn-primary">
                                </form>

                                <?php
                                if(isset($_POST['ok'])){
                                //    $f_type_arr=array('png','PNG','jpg','JPG','jpeg','JPEG','webp','WEBP','img');
                                    $i_title=$_POST['i_title'];
                                    $i_s_desc=$_POST['i_s_desc'];  
                                    $i_price=$_POST['i_price'];
                                    $i_desc=$_POST['i_desc'];
                                    $cat_id=$_POST['cat_id'];
                                    $fname=$_FILES['ff']['name'];
                                    // $ftype_arr=explode(".",$fname);
                                    // $ftype=end($f_type_arr);
                                    $i_img="../item_img/".$fname;
                                    if(move_uploaded_file($_FILES['ff']['tmp_name'], $i_img)){
                                        $sql="INSERT INTO item (i_title, i_price, i_s_desc, i_desc, cat_id, i_img) VALUES ('$i_title', '$i_price', '$i_s_desc', '$i_desc', '$cat_id', '$i_img')";
                                        $res=mysqli_query($con, $sql)or die(mysqli_error($con));
                                        if($res==1){
                                            echo "Item add successfully";
                                        }else{
                                            echo "Item not add successfully";

                                        }
                                    }else{
                                        echo "Please try again later";
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </main>
                <?php require('footer.php') ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
