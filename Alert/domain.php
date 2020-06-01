<html>
    <head>
       <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>  

<style>
.right{
  flex: right;
}
.table table {
  width:100%;
  margin:15px 0;
  border:0;
}
.table th {
  background-color:#D3D3D3;
  color:#000000
}
.table,.table th,.table td {
  font-size:0.95em;
  text-align:center;
  padding:4px;
  border-collapse:collapse;
}
.table th,.table td {
  border: 1px solid #bae3fc;
  border-width:1px 0 1px 0
}
.table tr {
  border: 1p
.table tr:nth-child(odd){
  background-color:#d7eefd;
}
.table tr:nth-child(even){
  background-color:#fdfdfd;
}

</style>
    </head>
     <body>
            
        </body>
</html><?php
$conn  = new PDO("mysql:host=localhost;dbname=tests", "admin", "1234");   

if(isset($_GET['delete_id']))
  {
    
    
    // it will delete an actual record from db
    $stmt_delete = $conn->prepare('DELETE FROM stock WHERE id =:id');
    $stmt_delete->bindParam(':id',$_GET['delete_id']);
    $stmt_delete->execute();
    
  }
// $sth = $conn->prepare("SELECT id, name, date_starts, date_expire, DATEDIFF(date_expire, date_starts) as ddiff FROM stock order by 'id', ddiff ");
// $sth->execute();

$sth = $conn->prepare("SELECT id, name, web, sale FROM domain order by 'id' ");
$conn->query('SET NAMES utf8');

$sth->execute();
?>
 <div class="navbar navbar-default" role="navigation">
  <h1 style="text-align: center;">Alert Expire Domain wesite </h1>
<div class="col-md-12">
  <div style="float: right;">
   <button type="button" class="btn btn-info btn-lg"  data-toggle="modal" data-target="#myModal">เพิ่มรายการ</button>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alert Domain Expire v1</h4>
        </div>
<div class="modal-body">
<div >
  <h2>เพิ่มรายการ</h2>
  <p>(วันหมดอายุ)</p>
  <form action="insert2.php" method="post">
<label>Student Name :</label>
<input type="text" name="stu_name" id="name" required="required" placeholder="Please Enter Domain"/><br /><br />
<label>Student date_start :</label>
<input type="test" name="stu_start" id="start" required="required" placeholder="yyyy/mm/dd"/><br/><br />
<label>Student date_expire :</label>
<input type="text" name="stu_expire" id="expire" required="required" placeholder="yyyy/mm/dd"/><br/><br />
<!-- <input type="submit" value=" Submit " name="submit"/><br /> -->
<button type="submit" class="btn btn-primary" value=" Submit " name="submit">ADD</button></br>

</form>
</div>
        
</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อผลิตภัณฑ์</th>
                <th>web link</th>
                <th>sale</th>
                <th>จำนวนวันหมดอายุที่เหลือ</th>
                <th>สถาณะ</th>
                
                <!-- <th>แก้ไข</th>
                <th>ลบ</th> -->
           </tr>
        </thead>
        <tbody>
            <?php 
            $i=0;
// เช็ควัน
            while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                if ($row['ddiff']<=90) { 
                  $i++;
                }
             ?>
             
             
             
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['web'];?></td>
                <td><?php echo $row['sale'];?></td>
                <td><?php ?></td>
                <td><?php ?></td>
               <td> <a href="#edit10<?php echo $id;?>" data-toggle="modal"><button type='button' class='btn btn-warning btn-sm'>แก้ไขเลข&nbsp;<span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a></td>                <!-- <td><?php echo $row['ddiff']."วัน";?></td> -->
                <!-- <td><?php  
                if($row['ddiff'] <= 0){
  echo "<font color=\"red\">สินค้าหมดอายุแล้ว</font>"; //เราก็เพียงใช้คำสั่ง Font
                }elseif($row['ddiff'] <= 90){
  echo "<font color=\"Goldenrod\">สินค้าใกล้หมดอายุ</font>";
                }else{
  echo "<font color=\"green\">สินค้าปกติ</font>";
                }
                ?></h3></td> -->
                <!-- <td>
                 <a class="btn btn-info" href="editform.php?edit_id=<?php echo $row['id']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 

                </td>
                <td>
                  <a class="btn btn-danger" href="?delete_id=<?php echo $row['id']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
                </td>
                
 -->



            </tr>

            

            <div id="edit10<?php echo $id; ?>" class="modal fade" role="dialog">
            <form method="post" class="form-horizontal" role="form">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal1">&times;</button>
                            <h4 class="modal-title">edit data</h4>
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
                                <label class="control-label col-sm-2" for="item_name">Data:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" placeholder="Item name" required autofocus>
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

<?php
 }   echo $i.""."รายการที่ใกล้หมดอายุ"; 
     //Update Items
     if(isset($_POST['update_item1'])){
      $id = $_POST['id'];
      $ems = $_POST['ems'];
      
      $sql = "UPDATE donate SET 
          Ems='$ems'
         
          WHERE id='$id' ";
      if ($conn->query($sql) === TRUE) {
          echo '<script>window.location.href="inventory.php"</script>';
      } else {
          echo "Error updating record: " . $conn->error;
      }
  }
  ?>
