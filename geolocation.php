<!DOCTYPE html>
<html>

<head>
    <title>Get Location</title>
</head>

<body>
    <button onclick="getLocation()">Get Location</button>
    <p id="demo"></p>



    <?php
    function getCoordinates($postcode)
    {
        $address = urlencode($postcode);
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyD6PMtd0Xclj8iUbXOzQFoSjYSFYLyiVyM";
        $response = file_get_contents($url);
        $json = json_decode($response, true);

        if ($json['status'] == 'OK') {
            $latitude = $json['results'][0]['geometry']['location']['lat'];
            $longitude = $json['results'][0]['geometry']['location']['lng'];
            return array($latitude, $longitude);
        } else {
            return false;
        }
    }


    function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
    {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }

    // Example usage
    $deviceLat = 52.58695251823955; // Replace with actual device latitude
    $deviceLon = -2.132563516108729;  // Replace with actual device longitude

    $postcode = "WV1 4DJ";  // Replace with actual postcode

    list($postcodeLat, $postcodeLon) = getCoordinates($postcode);
    $distance = ROUND(haversineGreatCircleDistance($deviceLat, $deviceLon, $postcodeLat, $postcodeLon));

    echo "Distance: " . $distance . " meters";
    ?>




    <script>
        var x = document.getElementById("demo");

        window.onload = getLocation;

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
                x.innerHTML = "Latitude: " + position.coords.latitude +
                    "<br>Longitude: " + position.coords.longitude;
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
    </script>



</body>

</html>