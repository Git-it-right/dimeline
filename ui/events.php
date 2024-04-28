<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map of Places</title>
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Custom styles -->
    <style>
        body {
            margin: 0;
        }
        #map {
            height: 100vh;
        }
    </style> 
    <?PHP include './navbar.php';?>
   
   
   
   
    <div id="map"></div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([26.677272592022977, -80.03697483950745], 13); // Set initial map view

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Load places from JSON file
        fetch('../data/places.json')
            .then(response => response.json())
            .then(data => {
                data.forEach(place => {
                    // Extract coordinates and name of the place
                    var latitude = place.latitude;
                    var longitude = place.longitude;
                    var name = place.place_name;

                    // Add marker for the place with popup
                    var marker = L.marker([latitude, longitude]).addTo(map)
                        .bindPopup(name);

                    marker.openPopup();

                });
            })
            .catch(error => {
                console.error('Error loading places:', error);
            });
    </script>
</body>
</html>
