<!DOCTYPE html>
<html>
<head>
    <title>Map</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
        }
    </style>
</head>
<body>
    <div id="map"></div>

    <script src="https://cdn.jsdelivr.net/npm/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([-6.2088, 106.8456], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Load GeoJSON data from a file
        fetch("{{ asset('kmz/pop.geojson') }}")
            .then(response => response.json())
            .then(data => {
                L.geoJSON(data).addTo(map);
            });
    </script>
</body>
</html>
