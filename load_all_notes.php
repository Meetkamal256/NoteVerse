<?php
// load_all_notes.php

// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$db_name = "notesVerse";
$connection = mysqli_connect($host, $username, $password, $db_name) or die('Database connection error: ' . mysqli_connect_error());

// retrieve the user ID for the logged-in user
$userId = $_SESSION['user_id'];
// Debug: Display the user ID
echo 'User ID: ' . $userId . '<br>';

// Fetch notes for the logged-in user from the database
$query = "SELECT * FROM notes WHERE user_id = '$userId'";
$result = mysqli_query($connection, $query);
// Debug: Display the number of rows returned
echo 'Number of rows: ' . mysqli_num_rows($result) . '<br>';

// Check if the query executed successfully
if (!$result) {
    die('Error executing the query: ' . mysqli_error($connection));
}

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
