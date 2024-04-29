<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.72.0">
    <title>Dimeline</title>

    <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/blog/">



    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
  <link rel="stylesheet" href="styles.css">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
  
</head>

<body>
    <?php include './navbar.php';?>
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
                    <input type="time" class="form-control" id="eventTime" name="eventTime" required>
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
            <button type="submit" class="btn btn-primary">Add Event</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
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
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>