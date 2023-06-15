<?php
session_start(); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 
// Connect to the database
 $host = "localhost";
 $username = "id20917606_root";
 $password = "Kamal256@";
 $db_name = "id20917606_noteverse";
 $connection = mysqli_connect($host, $username, $password, $db_name) or die('Database connection error: ' . mysqli_connect_error());

// Fetch all notes from the database
$query = "SELECT * FROM notes";
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
