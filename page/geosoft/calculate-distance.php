<!doctype html>
<html lang="en">

<head>
    <title>Using the scripts in web pages</title>
    <meta charset="utf-8">
    <script type="module">
        import LatLon from 'https://cdn.jsdelivr.net/npm/geodesy@2/latlon-spherical.min.js';
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('#calc-dist').onclick = function() {
                calculateDistance();
            }
        });

        function calculateDistance() {
            const p1 = LatLon.parse(document.querySelector('#point1').value);
            const p2 = LatLon.parse(document.querySelector('#point2').value);
            const dist = parseFloat(p1.distanceTo(p2).toPrecision(4));
            document.querySelector('#result-distance').textContent = dist + ' metres';
        }
    </script>
</head>

<body>
    <form>
        Point 1: <input type="text" name="point1" id="point1" placeholder="lat1,lon1">
        Point 2: <input type="text" name="point2" id="point2" placeholder="lat2,lon2">
        <button type="button" id="calc-dist">Calculate distance</button>
        <output id="result-distance"></output>
    </form>
</body>

</html>