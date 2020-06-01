<?php
$conn  = new PDO("mysql:host=localhost;dbname=tests", "admin", "1234");
$query = $conn->prepare("
SELECT * FROM domain ");
$conn->query('SET NAMES utf8');
$query->execute();
$result = $query->fetchAll();
;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            
  <table class="table">
    <thead>
      <tr>
      <th>info.1</th>
      <th>info.2</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($result as $row){?>
        <tr>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['info'];?></td>
          <td><?php
              if($row['name'] != $row['info'] ){
                echo "<font color='red'> ต่างกัน <i class='fas fa-info-circle'></i> </font>"."<br>"."<br>";
              }else{
                echo "<font color='red'> เหมือนกัน <i class='fas fa-info-circle'></i> </font>"."<br>"."<br>";

              }
          ?></td>
  
        </tr>
        <?php }?>
       
    </tbody>
  </table>
</div>

</body>
</html>



