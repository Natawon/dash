<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Dropdown</title>

<style>
/* bootstrap dropdown hover menu*/


</style>
</head>
<body>

<ul id="nav" class="nav nav-pills clearfix right" role="tablist">
   
    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">menuC</a>
        <ul id="products-menu" class="dropdown-menu clearfix" role="menu">
            <li><a href=""></a></li>
            <li><a href=""><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i></a></li>
            <li><a href=""><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i></a></li>
            <li><a href=""><i class="fa fa-star" style="color:orange;"></i><i class="fa fa-star" style="color:orange;"></i></a></li>
        </ul>
    </li>
   
</ul>
<script>
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

</body>
</html>