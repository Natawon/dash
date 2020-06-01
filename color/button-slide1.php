<!DOCTYPE html>
<html>
  <head>
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="http://yadcf-showcase.appspot.com/resources/js/jquery.dataTables.yadcf.js"></script>
    <link href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    
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

/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
    </style>
  </head>
  <body onload="myFunction()" style="margin:0;">
    <div class="container">
      <p>
        <label>Age Filter: </label><input type="text" id="live_range_val" readonly style="border:0; color:#f6931f; font-weight:bold;">
      </p>
      <div id="val_range" style="width:200px">

    </div>
      <!-- <p>
        <label>Salary Filter: </label><input type="text" id="live_range_val_salary" readonly style="border:0; color:#f6931f; font-weight:bold;">
      </p> -->
      <!-- <div id="val_range_salary" style="width:200px"></div> -->
      <div id="loader"></div>
      <div style="display:none;" id="myDiv" class="animate-bottom">


      <table id="sort_table" class="display nowrap" width="100%">
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
          <tr>
            <td>Ashton Cox</td>
            <td>Technical Author</td>
            <td>San Francisco</td>
            <td>66</td>
            <td>2009/01/12</td>
            <td>4800</td>
          </tr>
          <tr>
            <td>Cedric Kelly</td>
            <td>Javascript Developer</td>
            <td>Edinburgh</td>
            <td>22</td>
            <td>2012/03/29</td>
            <td>3600</td>
          </tr>
          <tr>
            <td>Jenna Elliott</td>
            <td>Financial Controller</td>
            <td>Edinburgh</td>
            <td>33</td>
            <td>2008/11/28</td>
            <td>5300</td>
          </tr>
          <tr>
            <td>Brielle Williamson</td>
            <td>Integration Specialist</td>
            <td>New York</td>
            <td>61</td>
            <td>2012/12/02</td>
            <td>4525</td>
          </tr>
          <tr>
            <td>Herrod Chandler</td>
            <td>Sales Assistant</td>
            <td>San Francisco</td>
            <td>59</td>
            <td>2012/08/06</td>
            <td>4080</td>
          </tr>
          <tr>
            <td>Rhona Davidson</td>
            <td>Integration Specialist</td>
            <td>Edinburgh</td>
            <td>55</td>
            <td>2010/10/14</td>
            <td>6730</td>
          </tr>
          <tr>
            <td>Colleen Hurst</td>
            <td>Javascript Developer</td>
            <td>San Francisco</td>
            <td>39</td>
            <td>2009/09/15</td>
            <td>5000</td>
          </tr>
          <tr>
            <td>Sonya Frost</td>
            <td>Software Engineer</td>
            <td>Edinburgh</td>
            <td>23</td>
            <td>2008/12/13</td>
            <td>3600</td>
          </tr>
          <tr>
            <td>Jena Gaines</td>
            <td>System Architect</td>
            <td>London</td>
            <td>30</td>
            <td>2008/12/19</td>
            <td>5000</td>
          </tr>
          <tr>
            <td>Quinn Flynn</td>
            <td>Financial Controller</td>
            <td>Edinburgh</td>
            <td>22</td>
            <td>2013/03/03</td>
            <td>4200</td>
          </tr>
          <tr>
            <td>Charde Marshall</td>
            <td>Regional Director</td>
            <td>San Francisco</td>
            <td>36</td>
            <td>2008/10/16</td>
            <td>5300</td>
          </tr>
          <tr>
            <td>Haley Kennedy</td>
            <td>Senior Marketing Designer</td>
            <td>London</td>
            <td>43</td>
            <td>2012/12/18</td>
            <td>4800</td>
          </tr>
          <tr>
            <td>Tatyana Fitzpatrick</td>
            <td>Regional Director</td>
            <td>London</td>
            <td>19</td>
            <td>2010/03/17</td>
            <td>2875</td>
          </tr>
          <tr>
            <td>Michael Silva</td>
            <td>Senior Marketing Designer</td>
            <td>London</td>
            <td>66</td>
            <td>2012/11/27</td>
            <td>3750</td>
          </tr>
          <tr>
            <td>Paul Byrd</td>
            <td>Javascript Developer</td>
            <td>New York</td>
            <td>64</td>
            <td>2010/06/09</td>
            <td>5000</td>
          </tr>
          <tr>
            <td>Gloria Little</td>
            <td>Systems Administrator</td>
            <td>New York</td>
            <td>59</td>
            <td>2009/04/10</td>
            <td>3120</td>
          </tr>
          <tr>
            <td>Bradley Greer</td>
            <td>Software Engineer</td>
            <td>London</td>
            <td>41</td>
            <td>2012/10/13</td>
            <td>3120</td>
          </tr>
          <tr>
            <td>Dai Rios</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>35</td>
            <td>2012/09/26</td>
            <td>4200</td>
          </tr>
          <tr>
            <td>Jenette Caldwell</td>
            <td>Financial Controller</td>
            <td>New York</td>
            <td>30</td>
            <td>2011/09/03</td>
            <td>4965</td>
          </tr>
          <tr>
            <td>Yuri Berry</td>
            <td>System Architect</td>
            <td>New York</td>
            <td>40</td>
            <td>2009/06/25</td>
            <td>3600</td>
          </tr>
          <tr>
            <td>Caesar Vance</td>
            <td>Technical Author</td>
            <td>New York</td>
            <td>21</td>
            <td>2011/12/12</td>
            <td>4965</td>
          </tr>
          <tr>
            <td>Doris Wilder</td>
            <td>Sales Assistant</td>
            <td>Edinburgh</td>
            <td>23</td>
            <td>2010/09/20</td>
            <td>4965</td>
          </tr>
          <tr>
            <td>Angelica Ramos</td>
            <td>System Architect</td>
            <td>London</td>
            <td>36</td>
            <td>2009/10/09</td>
            <td>2875</td>
          </tr>
          <tr>
            <td>Gavin Joyce</td>
            <td>Developer</td>
            <td>Edinburgh</td>
            <td>42</td>
            <td>2010/12/22</td>
            <td>4525</td>
          </tr>
          <tr>
            <td>Jennifer Chang</td>
            <td>Regional Director</td>
            <td>London</td>
            <td>28</td>
            <td>2010/11/14</td>
            <td>4080</td>
          </tr>
          <tr>
            <td>Brenden Wagner</td>
            <td>Software Engineer</td>
            <td>San Francisco</td>
            <td>18</td>
            <td>2011/06/07</td>
            <td>3750</td>
          </tr>
          <tr>
            <td>Ebony Grimes</td>
            <td>Software Engineer</td>
            <td>San Francisco</td>
            <td>48</td>
            <td>2010/03/11</td>
            <td>2875</td>
          </tr>
          <tr>
            <td>Russell Chavez</td>
            <td>Director</td>
            <td>Edinburgh</td>
            <td>20</td>
            <td>2011/08/14</td>
            <td>3600</td>
          </tr>
          <tr>
            <td>Michelle House</td>
            <td>Integration Specialist</td>
            <td>Edinburgh</td>
            <td>37</td>
            <td>2011/06/02</td>
            <td>3750</td>
          </tr>
          <tr>
            <td>Suki Burks</td>
            <td>Developer</td>
            <td>London</td>
            <td>53</td>
            <td>2009/10/22</td>
            <td>2875</td>
          </tr>
          <tr>
            <td>Prescott Bartlett</td>
            <td>Technical Author</td>
            <td>London</td>
            <td>27</td>
            <td>2011/05/07</td>
            <td>6730</td>
          </tr>
          <tr>
            <td>Gavin Cortez</td>
            <td>Technical Author</td>
            <td>San Francisco</td>
            <td>22</td>
            <td>2008/10/26</td>
            <td>6730</td>
          </tr>
          <tr>
            <td>Martena Mccray</td>
            <td>Integration Specialist</td>
            <td>Edinburgh</td>
            <td>46</td>
            <td>2011/03/09</td>
            <td>4080</td>
          </tr>
          <tr>
            <td>Unity Butler</td>
            <td>Senior Marketing Designer</td>
            <td>San Francisco</td>
            <td>47</td>
            <td>2009/12/09</td>
            <td>3750</td>
          </tr>
          <tr>
            <td>Howard Hatfield</td>
            <td>Financial Controller</td>
            <td>San Francisco</td>
            <td>51</td>
            <td>2008/12/16</td>
            <td>4080</td>
          </tr>
          <tr>
            <td>Hope Fuentes</td>
            <td>Financial Controller</td>
            <td>San Francisco</td>
            <td>41</td>
            <td>2010/02/12</td>
            <td>4200</td>
          </tr>
          <tr>
            <td>Vivian Harrell</td>
            <td>System Architect</td>
            <td>San Francisco</td>
            <td>62</td>
            <td>2009/02/14</td>
            <td>4965</td>
          </tr>
          <tr>
            <td>Timothy Mooney</td>
            <td>Financial Controller</td>
            <td>London</td>
            <td>37</td>
            <td>2008/12/11</td>
            <td>4200</td>
          </tr>
          <tr>
            <td>Jackson Bradshaw</td>
            <td>Director</td>
            <td>New York</td>
            <td>65</td>
            <td>2008/09/26</td>
            <td>5000</td>
          </tr>
          <tr>
            <td>Miriam Weiss</td>
            <td>Support Engineer</td>
            <td>Edinburgh</td>
            <td>64</td>
            <td>2011/02/03</td>
            <td>4965</td>
          </tr>
          <tr>
            <td>Bruno Nash</td>
            <td>Software Engineer</td>
            <td>London</td>
            <td>38</td>
            <td>2011/05/03</td>
            <td>4200</td>
          </tr>
          <tr>
            <td>Odessa Jackson</td>
            <td>Support Engineer</td>
            <td>Edinburgh</td>
            <td>37</td>
            <td>2009/08/19</td>
            <td>3600</td>
          </tr>
          <tr>
            <td>Thor Walton</td>
            <td>Developer</td>
            <td>New York</td>
            <td>61</td>
            <td>2013/08/11</td>
            <td>3600</td>
          </tr>
          <tr>
            <td>Finn Camacho</td>
            <td>Support Engineer</td>
            <td>San Francisco</td>
            <td>47</td>
            <td>2009/07/07</td>
            <td>4800</td>
          </tr>
          <tr>
            <td>Elton Baldwin</td>
            <td>Data Coordinator</td>
            <td>Edinburgh</td>
            <td>64</td>
            <td>2012/04/09</td>
            <td>6730</td>
          </tr>
          <tr>
            <td>Zenaida Frank</td>
            <td>Software Engineer</td>
            <td>New York</td>
            <td>63</td>
            <td>2010/01/04</td>
            <td>4800</td>
          </tr>
          <tr>
            <td>Zorita Serrano</td>
            <td>Software Engineer</td>
            <td>San Francisco</td>
            <td>56</td>
            <td>2012/06/01</td>
            <td>5300</td>
          </tr>
          <tr>
            <td>Jennifer Acosta</td>
            <td>Javascript Developer</td>
            <td>Edinburgh</td>
            <td>43</td>
            <td>2013/02/01</td>
            <td>2875</td>
          </tr>
          <tr>
            <td>Cara Stevens</td>
            <td>Sales Assistant</td>
            <td>New York</td>
            <td>46</td>
            <td>2011/12/06</td>
            <td>4800</td>
          </tr>
          <tr>
            <td>Hermione Butler</td>
            <td>Director</td>
            <td>London</td>
            <td>47</td>
            <td>2011/03/21</td>
            <td>4080</td>
          </tr>
          <tr>
            <td>Lael Greer</td>
            <td>Systems Administrator</td>
            <td>London</td>
            <td>21</td>
            <td>2009/02/27</td>
            <td>3120</td>
          </tr>
          <tr>
            <td>Jonas Alexander</td>
            <td>Developer</td>
            <td>San Francisco</td>
            <td>30</td>
            <td>2010/07/14</td>
            <td>5300</td>
          </tr>
          <tr>
            <td>Shad Decker</td>
            <td>Regional Director</td>
            <td>Edinburgh</td>
            <td>51</td>
            <td>2008/11/13</td>
            <td>5300</td>
          </tr>
          <tr>
            <td>Michael Bruce</td>
            <td>Javascript Developer</td>
            <td>Edinburgh</td>
            <td>29</td>
            <td>2011/06/27</td>
            <td>4080</td>
          </tr>
          <tr>
            <td>Donna Snider</td>
            <td>System Architect</td>
            <td>New York</td>
            <td>27</td>
            <td>2011/01/25</td>
            <td>3120</td>
          </tr>
        </tbody>
      </table>
      </div>


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
  });
});

$(window).on('load', function () {
$("#cover").fadeOut(1750);
});


var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}


function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";


}
  </script>
  
</html>