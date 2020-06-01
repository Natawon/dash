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
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">Time from server</div>
        <div class="panel-body">
          <p id="serverTime"></p>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">Time from browser</div>
        <div class="panel-body">
          <p id="localTime"></p>
        </div>
      </div>
    </div>
  </div>
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
      $('#serverTime').text(date);
    }
  });
  var localDate = new Date();
  $('#localTime').text(localDate);
});
</script> 
</body>
</html>