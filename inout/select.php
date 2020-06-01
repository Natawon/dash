

<!-- <table border="2" style="width:100%;">
<tr>
<th>ID</th>
<th>Image</th>
</tr> -->
<?php
    include "connect.php";
    $select = $con->prepare("SELECT employee.id, EmployeeName,EmpDeptName,Note, InOutDate, InTime ,TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 as ddiff ,timediff(InTime,'8:30:00') as ddiff2 ,user.image
    FROM employee
    INNER JOIN user
    ON employee.user_id = user.id
    WHERE TIME_TO_SEC(SUBTIME(InTime,'8:30:00'))/60 <= 00 order by ddiff ASC  ");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    while($data=$select->fetch()){
?>
    <!-- <tr> -->
        <!-- <td><?php echo $data['id']; ?></td> -->
        <img src="uploads/<?php echo $data['image']; ?>" width="400" height="300">
    <?php
    }?>
    <!-- </tr> -->

<!-- </table> -->
