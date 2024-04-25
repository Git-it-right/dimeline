<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery and jQuery UI CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/styles.css">
</head>

<body>
    <?php include './navbar.php'; ?>
    <div class="container mt-5">


        <!-- Add Person Form -->
        <div class="mb-4">
            <h2>Add Person</h2>
            <form id="addPersonForm" action="../backend/people.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="personName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="personName" name="personName" required>
                </div>
                <div class="mb-3">
                    <label for="birthDate" class="form-label">Birth Date</label>
                    <input type="text" class="form-control datepicker" id="birthDate" name="birthDate" required>
                </div>
                <!-- <div class="mb-3">
              <label for="deathDate" class="form-label">Death Date (if applicable)</label>
              <input type="date" class="form-control" id="deathDate" name="deathDate">
            </div> -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="profilePicture" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control" id="profilePicture" name="profilePicture">
                </div>
                <button type="submit" name="addPerson" class="btn btn-primary">Add Person</button>
            </form>
        </div>

        <!-- People Table -->
        <div>
            <h2>People</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Birth Date</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include your PHP file containing functions
                    include '../backend/people.php';

                    // Retrieve all people
                    $people = getAllPeople();

                    // Loop through each person and display their information in the table rows
                    foreach ($people as $person) {
                        echo "<tr>";
                        echo "<td>" . $person['person_name'] . "</td>";
                        echo "<td>" . $person['birth_date'] . "</td>";
                        echo "<td>" . ($person['description'] ?? '') . "</td>"; // Check if description is set
                        // Add a link to the profile page with the person's ID as a query parameter
                        echo '<td><a href="profile.php?id=' . $person['person_id'] . '" class="btn btn-primary">Info</a></td>';
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS (optional, if you need Bootstrap functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize datepicker
        $(function() {
            $(".datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                changeYear: true,
                changeMonth: true,
                yearRange: "-100:+0" // Allow selection of dates up to 100 years ago
            });
        });
    </script>
</body>

</html>