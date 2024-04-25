<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Timeline with Map</title>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <!-- Custom styles -->
    <style>
        #map {
            height: 400px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php include './navbar.php'; ?>

<h1>Event Timeline with Map</h1>

<!-- Map Container -->
<div id="map"></div>

<!-- Event Timeline Table -->
<table class="table">
    <thead>
        <tr>
            <th>Date</th>
            <th>Event</th>
            <th>Location</th>
            <th>Description</th>
            <th>View on Map</th>
        </tr>
    </thead>
    <tbody>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js" integrity="sha384-UESFYfXyoA04pXiCq4Zm7rXdG/AVRv+9Vz0FsQ+8ZiYVJlZD/98+PkFOIHtWzo+X" crossorigin="anonymous"></script>
        <?php
        // Read events data from JSON file
        $events_json = file_get_contents('../data/events.json');
        $events = json_decode($events_json, true);

        // Read places data from JSON file
        $places_json = file_get_contents('../data/places.json');
        $places = json_decode($places_json, true);

        // Sort events by date
        usort($events, function($a, $b) {
            return strtotime($a['eventDate']) - strtotime($b['eventDate']);
        });

        // Display events in a table and add markers to the map
        foreach ($events as $event) {
            echo '<tr>';
            echo '<td>' . $event['eventDate'] . '</td>';
            echo '<td>' . $event['eventName'] . '</td>';
            
            // Find the location details from places.json based on selectedLocation
            $selectedLocation = $event['selectedLocation'];
            $locationDetails = array_filter($places, function($place) use ($selectedLocation) {
                return $place['place_id'] == $selectedLocation;
            });
            $locationDetails = reset($locationDetails); // Get the first (and only) matching location
            
            echo '<td>' . $locationDetails['place_name'] . '</td>';
            echo '<td>' . $event['eventDescription'] . '</td>';
            echo '<td><a href="#" onclick="centerMap(' . $locationDetails['latitude'] . ', ' . $locationDetails['longitude'] . '); openVideo(); return false;">View</a></td>';
            echo '</tr>';

            // Add marker to the map
            if (!empty($locationDetails['latitude']) && !empty($locationDetails['longitude'])) {
                echo '<script>';
                echo 'L.marker([' . $locationDetails['latitude'] . ', ' . $locationDetails['longitude'] . ']).addTo(map).bindPopup("' . $event['eventName'] . '");';
                echo '</script>';
            }
        }
        ?>
    </tbody>
</table>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<!-- Initialize the map -->
<script>
    var map = L.map('map').setView([0, 0], 2); // Set initial view to center of the world with zoom level 2
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Function to center map on a specific location
    function centerMap(latitude, longitude) {
        map.setView([latitude, longitude], 12); // Zoom level 12
    }

    // Function to open YouTube video in a modal
    function openVideo() {
        var videoFrame = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body"><iframe width="560" height="315" src="https://www.youtube.com/embed/VyfLbgW5KRg?si=7NcHPxlXcqE1EEM7" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div></div></div>';
        $('#videoModal .modal-body').html(videoFrame);
        $('#videoModal').modal('show');
    }
</script>

<!-- Bootstrap JS -->



<!-- Modal for displaying embedded YouTube video -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Embedded YouTube video will be loaded here -->
            </div>
        </div>
    </div>
</div>

</body>
</html>
