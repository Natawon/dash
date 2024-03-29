<?php
//session_start();
include 'include/controller.php';
// $session_username = $_SESSION['user_name'];
// $session_role = $_SESSION['role'];
// if(empty($_SESSION['user_name'])){
//     header("location:login.php");
// }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>หน้าหลัก</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <!-- Loader -->
        <link rel="stylesheet" href="css/loader.css">
        <script src="js/jquery-1.12.4.js"></script>
        <link rel="stylesheet" type="text/css" href="dashboard/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <script>
            $(document).ready(function() {
                $('#example').DataTable({

                });
            });

        </script>
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="css/responsive.bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

    </head>
    <bodyy onload="myFunction()" style="margin:0;">
            <p style="color: #218c74; font-size: 1.3em; text-align: center; margin-top: 20px; font-family: 'Prompt', sans-serif;">หน้าภาพรวมทั้งหมดของระบบ Domain Expire</p>
        <div class="container">
            <div class="dropdown">
                
                    
            </div><br>



            <table id="example" class="display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>web_link</th>
                        <th>sale</th>
                        <th>expire</th>
                        <th>##</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>web_link</th>
                    <th>sale</th>
                    <th>expire<th>
                    <th>##</th>
                    
                    </tr>
                </tfoot>
                <tbody>
                    <?php 
                    $sql = "SELECT * FROM domain";
        $conn->query('SET NAMES utf8');

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $web = $row['web'];
                            $sale = $row['sale'];
                            

                            // $qty = $row['qty'];

                            // if($qty == 0){
                            //     $alert = "<div class='alert alert-danger'>
                            //     <strong>$qty</strong> No Stock
                            //     </div>";
                            // }else if($critical_lvl >= $qty){
                            //     $alert = "<div class='alert alert-warning'>
                            //     <strong>$qty</strong> Critical Level
                            //     </div>";
                            // }else {
                            //     $alert = $qty;
                            // }

                            echo "<tr>
            <td>$id</td>
            <td>$name</td>
            <td>$web</td>
            <td>$sale</td>
            <td></td>
            <td></td>
           

            ";
                    ?>
                    <td>
                       
                            <!-- <a href="#view<?php echo $id;?>" data-toggle="modal"><button type='button' class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></button></a> -->
                            <a href="#edit<?php echo $id;?>" data-toggle="modal"><button type='button' class='btn btn-warning btn-sm'>edit expire&nbsp;<span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
                             <a href="#edit10<?php echo $id;?>" data-toggle="modal"><button type='button' class='btn btn-warning btn-sm'>edit web_link&nbsp;<span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
                            <!-- <a href="#delete<?php echo $id;?>" data-toggle="modal"><button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a> -->
                        </div>
                    </td>



                    <!--In Stock/s Modal -->
                    <div id="add<?php echo $id; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add Stocks</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="post" class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Item Name:</label>
                                            <div class="col-sm-3">
                                                <input type="hidden" name="add_stocks_id" value="<?php echo $id; ?>">
                                                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name" required readonly value="<?php echo $item_name; ?>">
                                            </div>
                                            <label class="control-label col-sm-2" for="item_code">Item Code:</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="item_code" name="item_code" placeholder="Item Code" required readonly value="<?php echo $item_code; ?>">
                                            </div>
                                            <label class="control-label col-sm-1" for="item_code">DR #:</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="item_code" name="dr_no" placeholder="Item Code" requiredS>
                                            </div>
                                        </div><br><br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Quantity:</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required min="1">
                                            </div>
                                            <label class="control-label col-sm-2" for="item_name">Remarks:</label>
                                            <div class="col-sm-4">
                                                <textarea class="form-control" id="remarks" name="remarks" placeholder="Remarks"></textarea>
                                            </div>
                                        </div>
                                        <br><br><br>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="add_inventory"><span class="glyphicon glyphicon-plus"></span> Add</button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
        </div>

        <!--Out Stocks Modal -->
        <div id="out<?php echo $id; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Out Stocks</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="item_name">Item Name:</label>
                                <div class="col-sm-2">
                                    <input type="hidden" name="add_stocks_id" value="<?php echo $id; ?>">
                                    <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name" required readonly value="<?php echo $item_name; ?>">
                                </div>
                                <label class="control-label col-sm-2" for="item_code">Item Code:</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="item_code" name="item_code" placeholder="Item Code" required readonly value="<?php echo $item_code; ?>">
                                </div>
                                <label class="control-label col-sm-2" for="item_code">DR no:</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="item_code" name="dr_no" placeholder="Item Code" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="item_name">Quantity:</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" value="1" required max="<?php echo $qty; ?>" min="1">
                                </div>
                                <label class="control-label col-sm-2" for="received_by" data-toggle="tooltip" title="Unit of Measurement">Receive By:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="received_by" name="received_by" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="item_name">Remarks:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="remarks" name="remarks" placeholder="Remarks"></textarea>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="minus_inventory"><span class="glyphicon glyphicon-plus"></span> Out</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        </div>

        <!--View Modal -->
         <div id="view<?php echo $id; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">View</h4>
                        
                    </div>
                    <div class="modal-body">
                        <img src="upload/<?php echo $row['Slip']; ?>" class="img-rounded" class="img-responsive" width="440px" height="450px" style="padding-left: 150px;" /><br>

                        <div class="form-group" style="padding-left: 150px;" >

                        <label class="control-label col-sm-2" for="item_name">EMS:</label>
                                <div class="col-sm-4">
                                    <p><?php echo $EMS; ?></p>
                                </div>
                       </div>
                       <br>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="changepass" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Change Password</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Current:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="current_password" required placeholder="Current Password" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">New:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="new_password" required placeholder="New Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Repeat:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="repeat_password" required placeholder="Repeat Password">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="change_pass">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Edit Item Modal -->
         <div id="edit<?php echo $id; ?>" class="modal fade" role="dialog">
            <form method="post" class="form-horizontal" role="form">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">edit expire</h4>
                        </div>
                        <div class="modal-body" style="padding-left: 230px;">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="form-group">
                               <!--  <label class="control-label col-sm-2" for="item_name">Item Name:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $name; ?>" placeholder="Item Name" required autofocus>
                                </div> -->
                                <label class="control-label col-sm-2" for="name">Name:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" placeholder="Name" >
                                    <input type="text" class="form-control" id="date_start" name="date_start" value="<?php echo $date_start; ?>" placeholder="date_start" >
                                    <input type="text" class="form-control" id="date_expire" name="date_expire" value="<?php echo $date_expire; ?>" placeholder="date_expire" >

                                </div>
                                
                            </div>
                            <br>
                            <!-- <div class="form-group">
                                <label class="control-label col-sm-2" for="item_description">Description:</label>
                                <div class="col-sm-4">
                                    <textarea cclass="form-control" id="item_description" name="item_description" placeholder="Description" required style="width: 100%;"><?php echo $item_description; ?></textarea>
                                </div>
                                <label class="control-label col-sm-2" for="item_category">Category:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="item_category" name="item_category" value="<?php echo $item_category; ?>" placeholder="Category" required>
                                </div>
                            </div> -->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="update_item"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
        </div>

         <!--Edit Item Modal -->
        <div id="edit10<?php echo $id; ?>" class="modal fade" role="dialog">
            <form method="post" class="form-horizontal" role="form">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal1">&times;</button>
                            <h4 class="modal-title">web link</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <!-- <div class="form-group">
                                <label class="control-label col-sm-2" for="item_name">Item Name:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $item_name; ?>" placeholder="Item Name" required autofocus>
                                </div>
                                <label class="control-label col-sm-2" for="item_code">Item Code:</label>
                                <div class="col-sm-4">
                                    <input type="text" readonly class="form-control" id="item_code" name="item_code" value="<?php echo $item_code; ?>" placeholder="Item Code" required>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="item_name">edit :</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="web" name="web" value="<?php echo $web; ?>" placeholder="web_link" required autofocus>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="control-label col-sm-2" for="item_description">Description:</label>
                                <div class="col-sm-4">
                                    <textarea cclass="form-control" id="item_description" name="item_description" placeholder="Description" required style="width: 100%;"><?php echo $item_description; ?></textarea>
                                </div>
                                <label class="control-label col-sm-2" for="item_category">Category:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="item_category" name="item_category" value="<?php echo $item_category; ?>" placeholder="Category" required>
                                </div>
                            </div> -->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="update_item1"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
        </div>

        <!--Delete Modal -->
        <div id="delete<?php echo $id; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <form method="post">
                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Delete</h4>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                            <p>
                                <div class="alert alert-danger">Are you Sure you want Delete <strong><?php echo $item_name; ?>?</strong></p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
        </tr>


        <?php
                        }
                        if(isset($_POST['change_pass'])){
                            $sql = "SELECT password FROM tbl_user WHERE username='$session_username'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    if($row['password'] != $current_password){
                                        echo "<script>window.alert('Invalid Password');</script>";
                                        $passwordErr = '<div class="alert alert-warning">
                        <strong>Password!</strong> Invalid.
                        </div>';
                                    } elseif($new_password != $repeat_password) {
                                        echo "<script>window.alert('Password Not Match!');</script>";
                                        $passwordErr = '<div class="alert alert-warning">
                        <strong>Password!</strong> Not Match.
                        </div>';
                                    } else{
                                        $sql = "UPDATE tbl_user SET password='$new_password' WHERE username='$session_username'";

                                        if ($conn->query($sql) === TRUE) {
                                            echo "<script>window.alert('Password Successfully Updated');</script>";
                                        } else {
                                            echo "Error updating record: " . $conn->error;
                                        }
                                    }    
                                }
                            } else {
                                $usernameErr = '<div class="alert alert-danger">
          <strong>Username</strong> Not Found.
          </div>';
                                $username = "";
                            }
                        }


                            if(isset($_POST['update_item'])){
                            $id = $_POST['id'];
                            $Bill = $_POST['bill'];
                            // $item_code = $_POST['item_code'];
                            // $item_category = $_POST['item_category'];
                            // $item_description = $_POST['item_description'];
                            $sql = "UPDATE donate SET 
                                Bill='$Bill'

                                -- item_code='$item_code',
                                -- item_category='$item_category',
                                -- item_description='$item_description'
                                WHERE id='$id' ";
                            if ($conn->query($sql) === TRUE) {
                                echo '<script>window.location.href="inventory.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }
                        //Update Items
                        if(isset($_POST['update_item1'])){
                            $id = $_POST['id'];
                            $web = $_POST['web'];
                            
                            $sql = "UPDATE domain SET 
                                web='$web'
                               
                                WHERE id='$id' ";
                            if ($conn->query($sql) === TRUE) {
                                echo '<script>window.location.href="inventory.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }

                        if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM tbl_items WHERE id='$delete_id' ";
                            if ($conn->query($sql) === TRUE) {
                                $sql = "DELETE FROM tbl_inventory WHERE id='$delete_id' ";
                                if ($conn->query($sql) === TRUE) {
                                    $sql = "DELETE FROM tbl_inventory WHERE id='$delete_id' ";
                                    echo '<script>window.location.href="inventory.php"</script>';
                                } else {
                                    echo "Error deleting record: " . $conn->error;
                                }
                            } else {
                                echo "Error deleting record: " . $conn->error;
                            }
                        }
                    }

                    //Add Item        
                    if(isset($_POST['add_item'])){
                        $item_name = $_POST['item_name'];
                        $item_code = $_POST['item_code'];
                        $item_category = $_POST['item_category'];
                        $item_description = $_POST['item_description'];
                        $sql = "INSERT INTO tbl_items 
            (item_name,
            item_code,
            item_description,
            item_category,
            item_critical_lvl,
            item_date)
            VALUES (
            '$item_name',
            '$item_code',
            '$item_description',
            '$item_category',
            '$item_critical_lvl',
            '$date'
            )";
                        if ($conn->query($sql) === TRUE) {
                            $add_inventory_query = "INSERT INTO tbl_inventory
            (item_name,
            item_code,
            date,
            qty
            )
            VALUES (
            '$item_name',
            '$item_code',
            '$date',
            '0'
            )";

                            if ($conn->query($add_inventory_query) === TRUE) {
                                echo '<script>window.location.href="inventory.php"</script>';
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }

                    if(isset($_POST['add_inventory'])){
                        $remarks = clean($_POST["remarks"]);
                        $sql = "INSERT INTO tbl_issuance
            (
            date,
            item_name,
            item_code,
            qty, 
            in_out,            
            remarks
            )
            VALUES (
            '$date_time',
            '$item_name',
            '$item_code',
            '$quantity',
            'in',
            '$remarks'
            )";
                        if ($conn->query($sql) === TRUE) {
                            $add_inv = "UPDATE tbl_inventory SET 
                qty=(qty + '$quantity')
                WHERE id='$id' ";
                            if ($conn->query($add_inv) === TRUE) {
                                echo '<script>window.location.href="inventory.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }

                    if(isset($_POST['minus_inventory'])){
                        $remarks = clean($_POST["remarks"]);
                        $sql = "INSERT INTO tbl_issuance
            (
            date,
            item_name,
            item_code,
            qty, 
            sender_receiver,
            in_out,            
            remarks
            )
            VALUES (
            '$date_time',
            '$item_name',
            '$item_code',
            '$quantity',
            '$received_by',
            'out',
            '$remarks'
            )";
                        if ($conn->query($sql) === TRUE) {
                            $add_inv = "UPDATE tbl_inventory SET 
                qty=(qty - '$quantity')
                WHERE id='$id' ";
                            if ($conn->query($add_inv) === TRUE) {
                                echo '<script>window.location.href="inventory.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
?>
            </tbody>
            </table>
            </div>

            <!--Add Item Modal -->
            <div id="add" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Item</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="item_name">Item Name:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name" autofocus required>
                                    </div>
                                    <label class="control-label col-sm-2" for="item_code">Item Code:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="item_code" name="item_code" placeholder="Item Code" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="item_category">Category:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="item_category" name="item_category" placeholder="Item Category" required>
                                    </div>
                                    <label class="control-label col-sm-2" for="item_critical_lvl">Critical Level:</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" id="item_critical_lvl" name="item_critical_lvl" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="item_sub_category">Description:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="item_description" name="item_description" required></textarea>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="add_item"><span class="glyphicon glyphicon-plus"></span> Add</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            </div>

            <!--Logout Modal -->
            <div id="logout" class="modal fade" role="dialog">
                <div class="modal-dialog modal-md">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Logout</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                            <p>
                                <div class="alert alert-danger">Are you Sure you want to logout <strong><?php echo $_SESSION['user_name']; ?>?</strong></p>
                            </div>
                            <div class="modal-footer">
                                <a href="logout.php"><button type="button" class="btn btn-danger">YES </button></a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
                </body>

    </html>
