<?php
//Error 1)The map is not rendering--php tag
$lat1 = "55.677855";
$lon1 = "12.569008";
$lat2 = "55.677922";
$lon2 = "12.571465";
$lat3 = "55.677069";
$lon3 = "12.571208";
$lat4 = "55.677057";
$lon4 = "12.568837";

$str = '{ "type": "FeatureCollection",
            "features": [
                { "type": "Feature",
                    "geometry": {
                        "type": "Polygon",
                    
                        "coordinates": [
                            [ 
                                ['.$lon1.', '.$lat1.'],
                                ['.$lon2.', '.$lat2.'],
                                ['.$lon3.', '.$lat3.'],
                                ['.$lon4.', '.$lat4.']
                            ]
                        ]

                    },
                    "properties": {
                        "prop0": "value0",
                        "prop1": {"this": "that"}
                    }
                }
            ]
        }';

function geoJson($str) {
    return "JSON.parse(".json_encode($str).");";
}

/*
A common use of JSON is to read data from a web server,
 and display the data in a web page.
 Objects in PHP can be converted into JSON by using the PHP function json_encode():
Use JSON.parse() to convert the result into a JavaScript object:

Error 2) -We wanted to draw a nice polygon around our office. But for some reason
        the polygon is being drawn in the wrong location. Even though the
        coordinates are correct.

"coordinates": [
                    [ 
                        ['.$lat1.', '.$lon1.'],
                        ['.$lat2.', '.$lon2.'],
                        ['.$lat3.', '.$lon3.'],
                        ['.$lat4.', '.$lon4.']
                    ]
                ]
Maps Locations take in latitude,longitude, 
while GeoJSON positions/coordinates are longitude/latitude. 

To ensure that GeoJSON coordinates are in the correct order, 
we need to swap the order of the latitude and longitude values 
when constructing the GeoJSON object.Reverse the numbers in GeoJSON coordinates.

 */
