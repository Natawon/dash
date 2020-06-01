<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    $web=$_POST['web'];
    $sale=$_POST['sale'];    
    
    // checking empty fields
    if(empty($name) || empty($age) || empty($email)) {    
            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }        
    } else {    
        //updating the table
        $sql = "UPDATE users SET name=:name, age=:age, email=:email WHERE id=:id";
        $query = $dbConn->prepare($sql);
                
        $query->bindparam(':id', $id);
        $query->bindparam(':name', $name);
        $query->bindparam(':age', $age);
        $query->bindparam(':email', $email);
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
                
        //redirectig to the display page. In our case, it is index.php
        header("Location: domain.php");
    }
}
?>
<?php
$dbConn  = new PDO("mysql:host=localhost;dbname=tests", "admin", "1234");   

//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$sql = "SELECT * FROM users WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));
 
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $name = $row['name'];
    $web = $row['web'];
    $sale = $row['sale'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="domain.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Age</td>
                <td><input type="text" name="web" value="<?php echo $web;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="sale" value="<?php echo $sale;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>