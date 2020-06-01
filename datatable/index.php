<!DOCTYPE html>
<html>
	<title>Datatable Demo </title>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<p>
        <label>Age Filter: </label><input type="text" id="live_range_val" readonly style="border:0; color:#f6931f; font-weight:bold;">
      </p>
      <div id="val_range" style="width:200px">

		<script type="text/javascript" language="javascript" >
			$(document).ready(function() {
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


				var dataTable = $('#employee-grid').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"employee-grid-data.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".employee-grid-error").html("");
							$("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#employee-grid_processing").css("display","none");
							
						}
					}
				} );
			} );
		</script>
		<style>
			div.container {
			    margin: 0 auto;
			    max-width:760px;
			}
			div.header {
			    margin: 100px auto;
			    line-height:30px;
			    max-width:760px;
			}
			body {
			    background: #f7f7f7;
			    color: #333;
			    font: 90%/1.45em "Helvetica Neue",HelveticaNeue,Verdana,Arial,Helvetica,sans-serif;
			}
		</style>
	</head>
	<body>
		<div class="header"><h1>DataTable demo (Server side) in Php,Mysql and Ajax </h1></div>
		<div class="container">
			<table id="employee-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
					<thead>
						<tr>
							<th>Employee name</th>
							<th>Salary</th>
							<th>Age</th>
						</tr>
					</thead>
			</table>
		</div>
	</body>
</html>
