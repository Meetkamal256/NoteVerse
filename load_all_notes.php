<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 
// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$db_name = "notesVerse";
$connection = mysqli_connect($host, $username, $password, $db_name) or die('Database connection error: ' . mysqli_connect_error());

// check if user is logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    echo '<div class="no-notes">You are not logged in.</div>';
    exit;
}

// retrieve the email for logged in user
$userId = $_SESSION['user_id'];

// Fetch notes for the logged in user from the database
$query = "SELECT * FROM notes WHERE user_id='$userId'";
$result = mysqli_query($connection, $query);

// Check if there are any notes
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $noteId = $row['id'];
        $noteContent = $row['note'];
        $noteDateTime = $row['time'];
        
        // Output each note as a separate div
        echo '<div class="note">';
        echo '<div class="note-content">' . $noteContent . '</div>';
        echo '<div class="note-datetime">' . $noteDateTime . '</div>';
        echo '<button class="edit-note btn btn-primary btn-sm" data-note-id="' . $noteId . '">Edit</button>';
        echo '<a href="delete_note.php?note_id=' . $noteId . '" class="delete-note btn btn-danger btn-sm" data-note-id="' . $noteId . '">Delete</a>';
        echo '</div>';
    }
} else {
    // No notes found
    echo '<div class="no-notes">No notes found.</div>';
}

// Close the database connection
mysqli_close($connection);
?>
