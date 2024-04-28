<?php
// Your PHP code here
?>

<!DOCTYPE html>
<html lang = 'en'>

<head>
<meta charset = 'UTF-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<title>Kali Linux Learning Path</title>
<!-- Bootstrap CSS -->
<link href = 'https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel = 'stylesheet'>
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8f9fa;
    color: #333;
}

.navbar-brand {
    font-size: 1.5rem;
    font-weight: bold;
    color: #007bff;
}

.navbar-toggler {
    border-color: #007bff;
}

.navbar-toggler-icon {
    background-color: #007bff;
}

.navbar-nav .nav-link {
    color: #333;
    font-size: 1.1rem;
    font-weight: bold;
    transition: color 0.3s;
}

.navbar-nav .nav-link:hover {
    color: #007bff;
}

.content-wrapper {
    padding-top: 2rem;
}

h1 {
    color: #007bff;
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 2rem;
}

@media ( max-width: 992px ) {
    .navbar-nav .nav-link {
        font-size: 1rem;
    }
}
</style>
</head>

<body>

<nav class = 'navbar navbar-expand-lg navbar-light bg-light'>
<div class = 'container'>
<a class = 'navbar-brand' href = '#'>Dimeline</a>
<button class = 'navbar-toggler' type = 'button' data-bs-toggle = 'collapse' data-bs-target = '#navbarNav' aria-controls = 'navbarNav' aria-expanded = 'false' aria-label = 'Toggle navigation'>
<span class = 'navbar-toggler-icon'></span>
</button>
<div class = 'collapse navbar-collapse' id = 'navbarNav'>
<ul class = 'navbar-nav'>
<li class = 'nav-item'>
<a class = 'nav-link' href = './people.php'>People</a>
</li>
<li class = 'nav-item'>
<a class = 'nav-link' href = './events.php'>Events</a>
</li>
<li class = 'nav-item'>
<a class = 'nav-link' href = './places.php'>Places</a>
</li>
<li class = 'nav-item'>
<a class = 'nav-link' href = './new_event.php'>New Event</a>
</li>
<li class = 'nav-item'>
<a class = 'nav-link' href = './code_notes.php'>Code Notes</a>
</li>
<li class = 'nav-item'>
<a class = 'nav-link' href = './AZ-500.php'>AZ-500</a>
</li>
<li class = 'nav-item'>
<a class = 'nav-link' href = './timeline.php'>Timeline</a>
</li>
<li class = 'nav-item'>
<a class = 'nav-link' href = './kalilinux.php'>Kali Linux</a>
</li>
<li class = 'nav-item'>
<a class = 'nav-link' href = './event_map.php'>Event Map</a>
</li>
</ul>
</div>
</div>
</nav>

<!-- Bootstrap JS -->
<script src = 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js'></script>
</body>

</html>