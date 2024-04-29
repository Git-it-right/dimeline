<?php

// Function to read JSON data from file

function readEventDataFromFile( $filename ) {
    $data = file_get_contents( $filename );
    return json_decode( $data, true );
}

// Function to find event by ID

function findEventById( $events, $id ) {
    foreach ( $events as $event ) {
        if ( isset( $event[ 'eventGuid' ] ) && $event[ 'eventGuid' ] === $id ) {
            return $event;
        }
    }
    return null;
}

// Get event ID from query parameter
$eventId = isset( $_GET[ 'id' ] ) ? $_GET[ 'id' ] : null;

// Read event data from JSON file
$events = readEventDataFromFile( '../data/events.json' );

// Find the event by ID
$event = findEventById( $events, $eventId );

// Display event information
if ( $event ) {
    echo "<h1>{$event['eventName']}</h1>";
    echo "<p>Date: {$event['eventDate']}</p>";
    echo "<p>Time: {$event['eventTime']}</p>";
    echo "<p>Description: {$event['eventDescription']}</p>";
    echo '<p>Selected People: ' . implode( ', ', $event[ 'selectedPeople' ] ) . '</p>';
    echo "<p>Selected Location: {$event['selectedLocation']}</p>";
} else {
    echo '<p>Event not found.</p>';
}

?>
