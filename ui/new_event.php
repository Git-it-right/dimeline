<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Clockpicker CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .container {
            max-width: 800px; /* Adjusted max-width */
            margin: 0 auto;
        }
        .table-container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <?php include './navbar.php'; ?>
    <div class="container">
        <h1 class="mb-4">Add Event</h1>
        <form id="addEventForm" action="../backend/events.php" method="POST">
            <div class="mb-3">
                <label for="eventName" class="form-label">Event Name</label>
                <input type="text" class="form-control" id="eventName" name="eventName" required>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="eventDate" class="form-label">Event Date</label>
                    <input type="date" class="form-control" id="eventDate" name="eventDate" required>
                </div>
                <div class="col">
                    <label for="eventTime" class="form-label">Event Time</label>
                    <div class="input-group clockpicker">
                        <input type="text" class="form-control" id="eventTime" name="eventTime" required>
                        <span class="input-group-text"><i class="bi bi-clock"></i></span>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="eventDescription" class="form-label">Event Description</label>
                <textarea class="form-control" id="eventDescription" name="eventDescription" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="selectedPeople" class="form-label">Select People</label>
                <select class="form-select" id="selectedPeople" name="selectedPeople[]" multiple required>
                    <!-- People options will be populated dynamically -->
                </select>
            </div>
            <div class="mb-3">
                <label for="selectedLocation" class="form-label">Select Location</label>
                <select class="form-select" id="selectedLocation" name="selectedLocation" required>
                    <!-- Location options will be populated dynamically -->
                </select>
            </div>
            <input type="hidden" name="eventGuid" id="eventGuid">
            <button type="submit" class="btn btn-primary" name="addEvent">Add Event</button>
        </form>
    </div>

    <!-- Bootstrap-styled table for existing events -->
    <div class="container table-container">
        <h2>Existing Events</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Event Name</th>
                    <th scope="col">Event Date</th>
                    <th scope="col">Event Time</th>
                    <th scope="col">View Event</th>
                </tr>
            </thead>
            <tbody id="existingEvents">
                <!-- Existing events will be populated dynamically -->
            </tbody>
        </table>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap Clockpicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize clockpicker
            $('.clockpicker').clockpicker({
                placement: 'bottom',
                align: 'left',
                autoclose: true,
                'default': 'now'
            });

            // Function to generate GUID
            function generateGuid() {
                // GUID format: xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx
                var result = '';
                var characters = 'abcdef0123456789';
                var charactersLength = characters.length;
                for (var i = 0; i < 8; i++) {
                    result += characters.charAt(Math.floor(Math.random() * charactersLength));
                }
                result += '-';
                for (var i = 0; i < 4; i++) {
                    result += characters.charAt(Math.floor(Math.random() * charactersLength));
                }
                result += '-4';
                for (var i = 0; i < 3; i++) {
                    result += characters.charAt(Math.floor(Math.random() * charactersLength));
                }
                result += '-8' + characters.charAt(Math.floor(Math.random() * 4) + 8);
                for (var i = 0; i < 3; i++) {
                    result += characters.charAt(Math.floor(Math.random() * charactersLength));
                }
                for (var i = 0; i < 12; i++) {
                    result += characters.charAt(Math.floor(Math.random() * charactersLength));
                }
                return result;
            }

            // Set GUID value to the hidden input field
            $('#eventGuid').val(generateGuid());

            // Populate People dropdown
            $.getJSON('../data/people.json', function(data) {
                var options = '';
                $.each(data, function(key, value) {
                    options += '<option value="' + value.person_id + '">' + value.person_name + '</option>';
                });
                $('#selectedPeople').append(options); // Append options to select dropdown
            });

            // Populate Locations dropdown
            $.getJSON('../data/places.json', function(data) {
                var options = '';
                $.each(data, function(key, value) {
                    options += '<option value="' + value.place_id + '">' + value.place_name + '</option>';
                });
                $('#selectedLocation').html(options);
            });

            // Populate Existing Events table
            $.getJSON('../data/events.json', function(data) {
                var rows = '';
                $.each(data, function(key, value) {
                    rows += '<tr>';
                    rows += '<td>' + value.eventName + '</td>';
                    rows += '<td>' + value.eventDate + '</td>';
                    rows += '<td>' + value.eventTime + '</td>';
                    rows += '<td><a href="view_event.php?id=' + value.eventGuid + '" class="btn btn-primary">View Event</a></td>';
                    rows += '</tr>';
                });
                $('#existingEvents').html(rows); // Append rows to table body
            });
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
