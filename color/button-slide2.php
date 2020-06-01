<!DOCTYPE html>
<html>
  <head>
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="http://yadcf-showcase.appspot.com/resources/js/jquery.dataTables.yadcf.js"></script>
    <link href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">
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
  width: 100%;
	display: inline-block;
	float: left;
  padding : 2px 0%;
  background-color:red;
}
/* Center the loader */

    </style>
  </head>
  <body onload="myFunction()" style="margin:0;">
    <div class="container">
    <div class="a">
    <p>
        <label>Age Filter: </label><input type="text" id="live_range_val" readonly style="border:0; color:#f6931f; font-weight:bold;">
      </p>
     <div id="val_range" style="width:200px"> </div>
     </div>  
      <!-- <p>
        <label>Salary Filter: </label><input type="text" id="live_range_val_salary" readonly style="border:0; color:#f6931f; font-weight:bold;">
      </p> -->
      <!-- <div id="val_range_salary" style="width:200px"></div> -->


      <table id="sort_table" class="display nowrap" class= width="100%">
      <div id="cover"> <span class="glyphicon glyphicon-refresh w3-spin preloader-Icon"></span> loading...</div>

        <thead>
          <tr>
                  
              <th>Name</th>
              <th>Position</th>
              <th>Office</th>
              <th>Age</th>
              <th>Start date</th>
              <th>Salary</th>
          </tr>
        </thead>

        <tfoot>
          <tr>

            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
          </tr>

        </tfoot>

        <tbody>

          <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>3120</td>
          </tr>

          <tr>
            <td>Garrett Winters</td>
            <td>Director</td>
            <td>Edinburgh</td>
            <td>63</td>
            <td>2011/07/25</td>
            <td>5300</td>
          </tr>
       
        </tbody>
      </table>

    </div>


  </body>

  <script>
  var val_range;
var sal_range;
$.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
    var min = parseFloat(val_range.slider( "values", 0 ));
    var max = parseFloat(val_range.slider( "values", 1 ));
    var col = parseFloat( data[3] ) || 0; // data[number] = column number
    if ( ( isNaN( min ) && isNaN( max ) ) ||
         ( isNaN( min ) && col <= max ) ||
         ( min <= col   && isNaN( max ) ) ||
         ( min <= col   && col <= max ) )
    {
      return true;
    }
    return false;
  },
   function( settings, data, dataIndex ) {
    var min = parseFloat(sal_range.slider( "values", 0 ));
    var max = parseFloat(sal_range.slider( "values", 1 ));
    var col = parseFloat( data[5] ) || 0; // data[number] = column number
    if ( ( isNaN( min ) && isNaN( max ) ) ||
         ( isNaN( min ) && col <= max ) ||
         ( min <= col   && isNaN( max ) ) ||
         ( min <= col   && col <= max ) )
    {
      return true;
    }
    return false;
  }
);

$(document).ready(function() {

 sal_range = $( "#val_range_salary" );
  val_range = $( "#val_range" );
  var live_range_val = $( "#live_range_val" );
  var val_range_salary =$( "#live_range_val_salary" );
  val_range.slider({
    range: true,
  	min: 0,
  	max: 90,
  	step: 1,
  	values: [ 0, 90 ],
  	slide: function( event, ui ) {
      live_range_val.val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
    },
  	stop: function( event, ui ) {
      table.draw();
    }
  });
    sal_range.slider({
    range: true,
  	min: 0,
  	max: 10000,
  	step: 1000,
  	values: [ 0, 10000 ],
  	slide: function( event, ui ) {
      val_range_salary.val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
    },
  	stop: function( event, ui ) {
      table.draw();
    }
  });
  live_range_val.val(val_range.slider( "values", 0 ) + " - " + val_range.slider( "values", 1 ) );
  val_range_salary.val(sal_range.slider( "values", 0 ) + " - " + sal_range.slider( "values", 1 ) );

  var table = $( "#sort_table" ).DataTable({
    "bPaginate": false,
    "bFilter": true,
    "processing": true,
    
    
  });
});

$(window).on('load', function () {
$("#cover").fadeOut(1750);
});


$(window).load(function() {
   $('.preloader').fadeOut('slow');
});
  </script>
  
</html>