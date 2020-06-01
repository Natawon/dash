<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="http://code.jquery.com/jquery-latest.js"></script>

    <title>loadtime</title>
    <style>
    #serverTime,
        #localTime {
            text-align: center;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
<div class="container-fluid">
<p id="localTime" class="mb-0"></p>

</div>
<script>
$(function () {
  $.ajax({
    type: 'GET',
    cache: false,
    url: location.href,
    complete: function (req, textStatus) {
      var dateString = req.getResponseHeader('Date');
      if (dateString.indexOf('GMT') === -1) {
        dateString += ' GMT';
      }
      var date = new Date(dateString);
        // var res = date.substr(17, 24);
        // var formatted = date.split(' ').slice(1, 4).join(' ');
        //   console.log(formatted);
        var n = localDate.toString();
        var res = n.substr(15,9);
      $('#serverTime').text(date);
    }
  });
  var localDate = new Date();
    var n = localDate.toString();
   var res = n.substr(15,9);
//   console.log(res);
  $('#localTime').text(res);
});
</script> 
</body>
</html>

