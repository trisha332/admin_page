<?php 
    require('config.php');
    require('checksession.php');
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
                        <h2 class="mt-4">All Categories</h2>
                        <?php
                        if(isset($_GET['msg'])){
                            ?>
                            <div class="alert alert-success">
                               <?php echo $_GET['msg']; ?>
                            </div>
                            <?php
                        }elseif(isset($_GET['err'])){
                            ?>
                            <div class="alert alert-danger">
                               <?php echo $_GET['err']; ?>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="col-12">
                            <div class="col-6">
                                <form name="cat-frm" method="post">
                                    <div class="form-group">
                                        <label for="cat_name">Category Name</label>
                                        <input type="text" name="cat_name" class="form-control">
                                    </div>
                                    <input type="submit" name="ok" value="Add Category" class="btn btn-primary">
                                </form>
                                <?php
                                if(isset($_POST['ok'])){
                                    $cat_name=$_POST['cat_name'];
                                    $sql="INSERT INTO category (cat_name) VALUES ('$cat_name')";
                                    $result=mysqli_query($con, $sql);
                                    if($result==1){
                                        ?>
                                        <div class="alert alert-success">
                                             Category Added Successfully
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <div class="alert alert-danger">
                                             Category Not Added Successfully
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>

                            <?php
                                $src="SELECT * FROM category";
                                $rs=mysqli_query($con,$src)or die(mysqli_error($con));
                                //echo mysqli_num_rows($rs); // show number of records in record set or database table
                                if(mysqli_num_rows($rs)>0){
                                    ?>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name of Category</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while($rec=mysqli_fetch_assoc($rs)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $rec['cat_name'] ?></td>
                                                    <td><a href="upd_cat.php?cat_id=<?php echo $rec['cat_id']; ?>">
                                                        <i class="far fa-edit text-primary"></i>
                                                    </a></td>
                                                    <td><a href="del_cat.php?cat_id=<?php echo $rec['cat_id']; ?>">
                                                        <i class="far fa-trash-alt text-danger"></i></a></td>
                                                    
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                }else{
                                    ?>
                                    <h3 class="text-danger text-center">Sorry No details found</h3>
                                    <?php
                                }
                            ?>
                            
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
