<?php include_once('dbconnections.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        <?php

        // MySQL database connection settings
        $servername = "localhost"; // Replace with your MySQL server name
        $username = "root";        // Replace with your MySQL username
        $password = "";            // Replace with your MySQL password
        $dbname = "geosoft"; // Replace with your database name

        // Replace with your actual Google Maps API key
        $apiKey = "AIzaSyD6PMtd0Xclj8iUbXOzQFoSjYSFYLyiVyM";

        // Establish a MySQL connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the MySQL connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Function to calculate distance between two postcodes using Google Maps API
        function getDistance($origin, $destination, $apiKey)
        {
            // Encode the postcodes for the URL
            $origin = urlencode($origin);
            $destination = urlencode($destination);

            // Google Maps Distance Matrix API URL
            $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$origin&destinations=$destination&key=$apiKey";

            // Use file_get_contents to fetch the API response
            $response = file_get_contents($url);

            // Decode the JSON response
            $data = json_decode($response, true);

            // Check if the API response is OK
            if ($data['status'] == 'OK') {
                // Extract the distance from the API response
                $distance = $data['rows'][0]['elements'][0]['distance']['text'];
                return $distance; // Return the distance value
            } else {
                return "Error: " . $data['status']; // Handle API errors
            }
        }

        // Example postcodes
        $originPostcode = "WV8 1BL"; // Replace with your origin postcode
        $destinationPostcode = "WV8 1NH"; // Replace with your destination postcode

        // Get the distance between the two postcodes
        $distance = getDistance($originPostcode, $destinationPostcode, $apiKey);

        // Insert the origin, destination, and distance into the MySQL table
        $sql = "INSERT INTO distances (origin_postcode, destination_postcode, distance) 
        VALUES ('$originPostcode', '$destinationPostcode', '$distance')";

        if ($conn->query($sql) === TRUE) {
            echo "Distance successfully recorded in the database: " . $distance;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the MySQL connection
        $conn->close();





        ?>
    </h1>

</body>

</html>