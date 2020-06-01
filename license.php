
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
$conn->query('SET NAMES utf8');

if(isset($_GET['delete_id']))
  {
    
    
    // it will delete an actual record from db
    $stmt_delete = $conn->prepare('DELETE FROM stock WHERE id =:id');
    $stmt_delete->bindParam(':id',$_GET['delete_id']);
    $stmt_delete->execute();
    
  }
$sth = $conn->prepare("SELECT id, name,web,sale,date_start, date_expire, DATEDIFF(date_expire, date_start) as ddiff FROM domain order by 'id', ddiff ");
$sth->execute();
?>
 <div class="navbar navbar-default" role="navigation">
               <div class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Unchisa pharmacy v.1</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li ><a href="index.php">หน้าขายสินค้า</a></li>
                            <li ><a href="cart.php">รายการสั่งซื้อ <span class="badge"><?php echo $meQty; ?></span></a></li>
                                                        <li ><a href="order.php">ออเดอร์</a></li>

                            <li class="active"><a href="test2.php">ตรวจสอบวันหมดอายุ </a></li>

                            <li><a href="summary2.php">สรุปยอดขาย</a></li>
                            <li><a href="<?php echo BASE_URL; ?>logout.php">Logout</a></li>
       
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </div>

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
          <h4 class="modal-title">Unchisa Pharmacy v1</h4>
        </div>
<div class="modal-body">
<script src="app.js"></script>
<div class="container" ng-app="sa_app" ng-controller="kuy" >
  <h2>เพิ่มรายการยา</h2>
  <p>(วันหมดอายุ)</p>
  <form >
    <div class="form-group">
      <label for="name">ชื่อยา:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <input type="text" class="form"  ng-model="name" placeholder="Enter name" name="email">
    </div>
    <div class="form-group">
      <label for="date">วันผลิต:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <input type="text" class="form"  id="" ng-model="date_starts" placeholder="yyyy/mm/dd" name="">
    </div>
    <div class="form-group">
      <label for="date">วันหมดอายุ:&nbsp;&nbsp;&nbsp;</label>

      <input type="text"  class="form" id="" ng-model="date_expire" placeholder="yyyy/mm/dd" name="">
    </div>
    
<div>
        <button  type="button" class="btn btn-success" ng-click="insert()" value="{{btnName}}">Save</button>
        </div>  
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
                <th>link</th>
                <th>sale</th>
                <th>วันที่ผลืต</th>
                <th>วันหมดอายุ</th>
                <th>จำนวนวันหมดอายุที่เหลือ</th>
                <th>สถาณะ</th>
                <th>แก้ไข</th>
                <th>ลบ</th>




 
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
                <td><?php echo $row['date_starts'];?></td>
                <td><?php echo $row['date_expire'];?></td>
                <td><?php echo $row['ddiff']."วัน";?></td>
                <td><?php  
                if($row['ddiff'] <= 0){
  echo "<font color=\"red\">สินค้าหมดอายุแล้ว</font>"; //เราก็เพียงใช้คำสั่ง Font
                }elseif($row['ddiff'] <= 90){
  echo "<font color=\"Goldenrod\">สินค้าใกล้หมดอายุ</font>";
                }else{
  echo "<font color=\"green\">สินค้าปกติ</font>";
                }
                ?></h3></td>
                <td>
                 <a class="btn btn-info" href="editform.php?edit_id=<?php echo $row['id']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 

                </td>
                <td>
                  <a class="btn btn-danger" href="?delete_id=<?php echo $row['id']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
                </td>
                




            </tr>

            
            <?php  }   echo $i.""."รายการที่ใกล้หมดอายุ"; ?> 
