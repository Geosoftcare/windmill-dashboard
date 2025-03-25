<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // Google Maps API Key 
    $GOOGLE_API_KEY = 'AIzaSyCkbQle_h40JIBtKNhYeAfLpLgs0JCbRvI';

    // Address from which the latitude and longitude will be retrieved 
    $address = '1 Culwell Street, Wolverhampton';

    // Formatted address 
    $formatted_address = str_replace(' ', '+', $address);

    // Get geo data from Google Maps API by address 
    $geocodeFromAddr = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$formatted_address}&key={$GOOGLE_API_KEY}");

    // Decode JSON data returned by API 
    $apiResponse = json_decode($geocodeFromAddr);

    // Retrieve latitude and longitude from API data 
    $latitude  = $apiResponse->results[0]->geometry->location->lat;
    $longitude = $apiResponse->results[0]->geometry->location->lng;


    $formatted_address  = $apiResponse->results[0]->formatted_address;

    // Render the latitude and longitude of the given address 
    echo 'Latitude: ' . $latitude;
    echo '<br/>Longitude: ' . $longitude;
    ?>
</body>

</html>