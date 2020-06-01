<?php
// Start the session
session_start();
?>
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

$sth = $conn->prepare("SELECT id, name FROM stock2 order by 'id' ");
$conn->query('SET NAMES utf8');

$sth->execute();
?>
 <div class="navbar navbar-default" role="navigation">
  <h1 style="text-align: center;"> Domain wesite </h1>
<div class="col-md-12">
  <!-- <div style="float: right;">
   <button type="button" class="btn btn-info btn-lg"  data-toggle="modal" data-target="#myModal">เพิ่มรายการ</button>
  </div> -->
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alert Domain  v1</h4>
        </div>
<div class="modal-body">

        
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
                <!-- <th>ลำดับ</th> -->
                <th>โดเมน</th>
                
                
                <!-- <th>แก้ไข</th>
                <th>ลบ</th> -->
           </tr>
        </thead>
        <tbody>
            <?php 
            function url_test( $url ) {
                $timeout = 10;
                $ch = curl_init();
                curl_setopt ( $ch, CURLOPT_URL, $url );
                curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
                curl_setopt ( $ch, CURLOPT_TIMEOUT, $timeout );
                $http_respond = curl_exec($ch);
                $http_respond = trim( strip_tags( $http_respond ) );
                $http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
                if ( ( $http_code == "200" ) || ( $http_code == "302" ) ) {
                  return true;
                } else {
                   return $http_code;
                  return false;
                }
                curl_close( $ch );
              }
            $i=0;
// เช็ควัน
echo "<br>";
$website = $row['name'];

            while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                $website = $row['name'];

             ?>
             
             
             
            <tr>
                
                <td><?php if( !url_test( $website ) ) {
            echo $website ."<font color=\"red\">is down!</font> "; 
            $_SESSION['varname'] = $website;
            header("Location:test.php"); 

            ?></td>
                <td><?php }else { 
                    echo $website ."<font color=\"green\">is online</font>."; 
                
                
                
                } ?></td>



            </tr>

<?php
 }  # echo $i.""."รายการที่ใกล้หมดอายุ"; 
     //Update Items
    
   
  ?>
