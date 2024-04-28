<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Map</title>
    <!-- Include Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.css"/>
    <style>
        #map { height: 400px; }
    </style>
</head>
<body>
    <?php include './navbar.php'; ?>
    <div class="container mt-5">
        <h1 class="mb-4">Event Map</h1>
        <div id="map" class="mb-4"></div>

        <table id="event-table" class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Event Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Description</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Load event data from JSON files
                $events = json_decode(file_get_contents('../data/events.json'), true);
                $places = json_decode(file_get_contents('../data/places.json'), true);

                // Create a lookup table for places
                $placesLookup = array();
                foreach ($places as $place) {
                    $placesLookup[$place['place_id']] = $place;
                }

                // Populate table with event data
                foreach ($events as $event): 
                    // Check if the selected location exists in the places data
                    if (isset($placesLookup[$event['selectedLocation']])) {
                        $place = $placesLookup[$event['selectedLocation']];
                ?>
                    <tr class="event-row" data-lat="<?= $place['latitude'] ?>" data-lng="<?= $place['longitude'] ?>">
                        <td><?= $event['eventName'] ?></td>
                        <td><?= $event['eventDate'] ?></td>
                        <td><?= $event['eventTime'] ?></td>
                        <td><?= $event['eventDescription'] ?></td>
                        <td><?= $place['place_name'] ?></td>
                    </tr>
                <?php 
                    }
                endforeach; 
                ?>
            </tbody>
        </table>
    </div>

    <!-- Include Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables JavaScript -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.js"></script>
    <!-- Include Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Initialize Leaflet map
        var map = L.map('map').setView([40.712776, -74.005974], 10); // Default to a default location

        // Add tile layer (OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Function to add markers to the map
        function addMarkers() {
            // Get all event rows
            var eventRows = document.querySelectorAll('.event-row');
            eventRows.forEach(function(row) {
                var lat = parseFloat(row.getAttribute('data-lat'));
                var lng = parseFloat(row.getAttribute('data-lng'));

                // Add marker to map for each event
                L.marker([lat, lng]).addTo(map)
                    .bindPopup(row.querySelector('td:first-child').innerText);
            });
        }

        // Function to update map view when table row is clicked
        function updateMapView(event) {
            var lat = parseFloat($(this).data('lat'));
            var lng = parseFloat($(this).data('lng'));

            // Center map on clicked marker and zoom in
            map.setView([lat, lng], 15);
        }

        // When the document is ready
        $(document).ready(function() {
            // Call the addMarkers function to add markers to the map
            addMarkers();

            // Initialize DataTable with search and filter options
            $('#event-table').DataTable({
                "searching": true,
                "ordering": true,
                "paging": true,
                "lengthChange": false,
                "info": true
            });

            // Attach event listener to event rows to update map view when clicked
            $('#event-table').on('click', '.event-row', updateMapView);
        });
    </script>
</body>
</html>
