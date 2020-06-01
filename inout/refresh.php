<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
    <script>
    $(document).ready(function(){
		 $("#div_refresh").load("loadtime.php");
        setInterval(function() {
            $("#div_refresh").load("/color/loadtime.php");
        }, 2000);
    });
 
</script>

</head>
<body>
		
<div id="div_refresh" >
</div>
	 
</body>
</html>