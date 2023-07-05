<?php
//Error 1)The map is not rendering--php tag
require("map-stuff.php");
?>

<!DOCTYPE html>
<html lang='en'>
<head>
<!--Error 3) Once the above is fixed, let's get the map sized to the viewport so that
there are no gaps and scrolling.
Adding the <meta> tag with the viewport content will help to ensure that the map is sized properly to fit the
 viewport without any gaps or unnecessary scrolling. -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>A super cool map</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
          integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="
          crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
            integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="
            crossorigin=""></script>
    <style>
        #map {
            width:100%;
            heigth:100vh;
            background-color:red;
        }
    </style>
</head>
<body class="full-width">
<div style='position:relative;width:100%;height:100%;'>
    <div id='map' style='width:100%;height:100vh;will-change: transform;'></div>
</div>

    <script>


        var map = L.map('map').setView([<?=$lat1;?>, <?=$lon1;?>], 18);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Show polygon at the Trophy Office
        //incorrect //Error 1)The map is not rendering geoJson 
        //var geojson = L.geoJson(<?=geoJson($str);?>).addTo(map);
        //The geoJson($str) function call is surrounded by PHP tags?= and? >, 
        //but it needs to output a valid JavaScript object.
        //correct !
        var geojson = L.geoJson(<?=$str;?>).addTo(map);
        //Directly outputting the value of $str as a JavaScript object. 
        //This will allow Leaflet to parse it as a valid GeoJSON object and render the polygon on the map.

    </script>
</body>
</html>