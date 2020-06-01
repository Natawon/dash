<!DOCTYPE html>
<html>
  <head>
<title>app trivago</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta charset=utf-8 />
    <title>DataTables - Range Slider</title>

    <style>
    body {
  font: 70%/1.45em "Helvetica Neue", HelveticaNeue, Verdana, Arial, Helvetica, sans-serif;
  margin: 0;
  padding: 0;
  color: #333;
  background-color: #fff;
}
#cover {
  position: fixed;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  background: #141526;
  z-index: 9999;
  font-size: 65px;
  text-align: center;
  padding-top: 200px;
  color: #fff;
  font-family:tahoma;
}
#loading {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 100;
  width: 100vw;
  height: 100vh;
  background-color: rgba(192, 192, 192, 0.5);
  background-image: url("https://i.stack.imgur.com/MnyxU.gif");
  background-repeat: no-repeat;
  background-position: center;
}
.a{
  margin-left:10%;
}
.head{
  width: 90%;
	display: inline-block;
	float: left;
  padding : 2px 0%;
  margin:5% 15%;
}
.head2{
  width: 10%;
	display: inline-block;
	float: left;
  padding : 20px 0%;
  margin:-5% 15%;
  background-color: #F2F3F4  ;

}
.head3{
  width: 10%;
	display: inline-block;
	float: left;
  padding : 20px 0%;
  margin:-5% 25%;
  background-color: #F2F3F4  ;

}
.head4{
  width: 10%;
	display: inline-block;
	float: left;
  padding : 20px 0%;
  margin:-5% 35%;
  background-color: #F2F3F4  ;

}
.head5{
  width: 10%;
	display: inline-block;
	float: left;
  padding : 20px 0%;
  margin:-5% 45%;
  background-color: #F2F3F4  ;

}
/* Center the loader */
#result {
    font-size: 2em;
}
    </style>
  </head>
  
  <body style="margin:0;">
  <?php 
  
  ?>
    <div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
        <div style="margin-top: 1em">
    <h6>CCU</h6><div class="head"></div>

    <form action="#" method="post" name="form1" >

    <input id="price" type="range" min="20" max="60" name="lmName1" value="" onchange="this.form.submit()"/>
</div>
</form>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
    <br>
    

<div class="head2">
<ul id="nav" class="nav nav-pills clearfix right" role="tablist">
    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Accommodation</a>
        <ul id="products-menu" class="dropdown-menu clearfix" role="menu">
            <li><a href=""></a></li>
            <li><a href=""><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i></a></li>
            <li><a href=""><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i></a></li>
            <li><a href=""><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i></a></li>
        </ul>
        
    </li>
   
   
</ul>
</div>
<div class="head3">
<ul id="nav" class="nav nav-pills clearfix right" role="tablist">
    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">rating</a>
        <ul id="products-menu" class="dropdown-menu clearfix" role="menu">
            <li><a href="">8+</a></li>
        </ul>
        
    </li>
   
   
</ul>
</div>
<!-- <div class="head4">
<ul id="nav" class="nav nav-pills clearfix right" role="tablist">
    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Accommodation</a>
        <ul id="products-menu" class="dropdown-menu clearfix" role="menu">
            <li><a href=""></a></li>
            <li><a href=""><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i></a></li>
            <li><a href=""><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i></a></li>
            <li><a href=""><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i></a></li>
        </ul>
        
    </li>
   
   
</ul>
</div>
<div class="head5">
<ul id="nav" class="nav nav-pills clearfix right" role="tablist">
    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Accommodation</a>
        <ul id="products-menu" class="dropdown-menu clearfix" role="menu">
            <li><a href=""></a></li>
            <li><a href=""><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i></a></li>
            <li><a href=""><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i></a></li>
            <li><a href=""><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i></a></li>
        </ul>
        
    </li>
   
   
</ul> -->
</div>
      <!-- <p>
        <label>Salary Filter: </label><input type="text" id="live_range_val_salary" readonly style="border:0; color:#f6931f; font-weight:bold;">
      </p> -->
      <!-- <div id="val_range_salary" style="width:200px"></div> -->
      <?php 
        // echo $_POST["lmName1"];
        $lmName1 = 22;
        if (isset($_POST['lmName1'])) {
          $lmName1 = $_POST['lmName1'];
        }
      ?>
<div class="head6"><p id="result"><?php echo $lmName1;?></p></div>
      <?php 
  $conn  = new PDO("mysql:host=monitor2.open-cdn.com;dbname=data", "root", "dootvazws3e");   
  $sth = $conn->prepare("SELECT * FROM employee where employee_age ='".$lmName1."'" );
  $conn->query('SET NAMES utf8');
  
  $sth->execute();

  

  
  ?>
      
  
  <div class="page bg-dark"> <!--page bg-dark-->
 <div class="container-fluid"> <!--container-fluid-->
    <div class="row"> <!--row-->
    <?php while($row = $sth->fetch(PDO::FETCH_ASSOC)) {?>
        <div class="col-12 bg-light">
        <a href="javascript:void(0);">
            <div class="bg-warning mb-3" style="height:100px;">
            <?php 
              echo $row['employee_name']."<br>";
              echo $row['employee_salary']."<br>";
              echo $row['employee_age']."<br>";


              
              ?>
              </div>
            </a>        
        </div>

        <?php } ?>
    </div> <!--row-->
 </div> <!--container-fluid-->
</div>  <!--page bg-dark-->
</body>
<script>
var p = document.getElementById("price"),
    res = document.getElementById("result");

p.addEventListener("input", function() {
    res.innerHTML = "" + p.value;
}, false); 


$(function(){
  $("#nav .dropdown").hover(
    function() {
      $('#products-menu.dropdown-menu', this).stop( true, true ).fadeIn("fast");
      $(this).toggleClass('open');
    },
    function() {
      $('#products-menu.dropdown-menu', this).stop( true, true ).fadeOut("fast");
      $(this).toggleClass('open');
    });
});
</script>
  
  
</html>