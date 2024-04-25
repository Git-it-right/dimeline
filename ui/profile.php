<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for additional styling */
       
        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .profile-picture {
            max-width: 200px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .profile-info {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .btn-edit {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-edit:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-delete {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #bd2130;
            border-color: #bd2130;
        }
    </style>
</head>
<body>
<?php include './navbar.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4">Profile</h1>
    <?php
    // Check if person ID is provided in the URL
    if (isset($_GET['id'])) {
        // Include your PHP file containing functions
        include '../backend/people.php';

        // Retrieve person's information by ID
        $personID = $_GET['id'];
        $person = getPersonByID($personID);

        // Display profile picture if available
        if (isset($person['profile_picture'])) {
            echo '<img src="../data/profile_pictures/' . $person['profile_picture'] . '" class="img-fluid profile-picture" alt="Profile Picture">';
        }

        // Display person's information
        echo '<div class="profile-info">';
        echo '<p><strong>Name: </strong>' . $person['person_name'] . '</p>';
        echo '<p><strong>Birth Date: </strong>' . $person['birth_date'] . '</p>';
        echo '<p><strong>Description: </strong>' . ($person['description'] ?? '') . '</p>';
        echo '</div>';

        // Edit and Delete buttons
        echo '<a href="./edit_profile.php?id=' . $personID . '" class="btn btn-primary btn-edit me-2">Edit</a>';
        echo '<a href="../backend/delete_profile.php?id=' . $personID . '" class="btn btn-danger btn-delete">Delete</a>';
    } else {
        // If person ID is not provided, show an error message
        echo '<p class="text-danger">Error: Person ID not provided.</p>';
    }
    ?>
</div>

<!-- Bootstrap JS (optional, if you need Bootstrap functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
