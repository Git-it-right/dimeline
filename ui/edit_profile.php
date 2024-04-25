<?php
// Include your PHP file containing functions
include '../backend/people.php';

// Check if person ID is provided in the URL
if ( isset( $_GET[ 'id' ] ) ) {
    // Retrieve person's information by ID
    $personID = $_GET['id'];
    $person = getPersonByID($personID);

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Process the form data
        $personName = $_POST['personName'];
        $birthDate = $_POST['birthDate'];
        $description = $_POST['description'];

        // Handle profile picture update
        $profilePicture = $_FILES['profilePicture'];
        if ($profilePicture['error'] == 0) {
            // Move uploaded profile picture to desired folder and save file path
            $targetDir = '../data/profile_pictures/';
            $profilePictureName = uniqid() . '_' . basename($profilePicture['name']);
            $targetFilePath = $targetDir . $profilePictureName;
            if (move_uploaded_file($profilePicture['tmp_name'], $targetFilePath)) {
                // Update profile picture path in the database
                $person['profile_picture'] = $profilePictureName;
            } else {
                echo 'Failed to upload profile picture!';
            }
        }

        // Call the updatePerson function with the form data
        updatePerson($personID, $personName, $birthDate, $description, $person['profile_picture']);

        // Redirect to the profile page after updating
        header('Location: profile.php?id'. "=" . $personID);
        exit;
    }
} else {
    // If person ID is not provided, show an error message
    echo '<p>Error: Person ID not provided.</p>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script href="../assets/styles.css" rel="stylesheet"></script>
</head>
<body>
<?php include './navbar.php'; ?>

<div class="container mt-5">
    <h1>Edit Profile</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="personName" class="form-label">Name</label>
            <input type="text" class="form-control" id="personName" name="personName" value="<?php echo $person['person_name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="birthDate" class="form-label">Birth Date</label>
            <input type="date" class="form-control" id="birthDate" name="birthDate" value="<?php echo $person['birth_date']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"><?php echo $person['description' ];
    ?></textarea>
    </div>
    <div class = 'mb-3'>
    <label for = 'profilePicture' class = 'form-label'>Profile Picture</label>
    <input type = 'file' class = 'form-control' id = 'profilePicture' name = 'profilePicture'>
    </div>
    <button type = 'submit' class = 'btn btn-primary'>Save Changes</button>
    </form>
    </div>

    <!-- Bootstrap JS ( optional, if you need Bootstrap functionality ) -->
    <script src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
    </body>
    </html>
