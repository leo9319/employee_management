<!DOCTYPE html>
<html>
<head>
    <title>Address In Google Map</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/googlemap.js"></script>
    <style type="text/css">
        .container {
            height: 450px;
        }
        #map {
            width: 100%;
            height: 100%;
            border: 1px solid blue;
        }
        #data, #allData {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <center><h3>Google Map (Development Version)</h3></center>
        <div id="map"></div>
    </div>
</body>
<script type="text/javascript">
    
    var lat = "<?php echo $_GET["lat"]; ?>"
    var long = "<?php echo $_GET["long"]; ?>"

    function loadMap() {
        var address = {lat: parseFloat(lat), lng: parseFloat(long)};
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: address
        });

        var marker = new google.maps.Marker({
          position: address,
          map: map
        });

        geocoder = new google.maps.Geocoder();  
        codeAddress();

    }

</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYU49-pb_smdZ3D5NViNkW7ZnDADqisRM&callback=loadMap">
</script>
</html>