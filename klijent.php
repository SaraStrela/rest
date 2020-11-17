<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-Type' content='Type=text/html; charset=utf-8'>
<title>Primer</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
      var settings = {
        "url": "https://api.openweathermap.org/data/2.5/weather?zip=95050&units=imperial&appid=APIKEY",
        "method": "GET",
        "timeout": 0,
      };

      $.ajax(settings).done(function (response) {
        console.log(response);
        var content = response.wind.speed;
        $("#windSpeed").append(content);
      });

      </script>
</head>
<body>
wind speed: <span id="windSpeed"></span>

</body>
</html>
