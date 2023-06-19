<?php
session_start();
// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$db_name = "notesVerse";
$connection = mysqli_connect($host, $username, $password, $db_name) or die('Database connection error: ' . mysqli_connect_error());

// Retrieve the user ID for the logged-in user
$userId = $_SESSION['user_id'];

// Fetch notes for the logged-in user from the database
$query = "SELECT * FROM notes WHERE user_id = '$userId'";
$result = mysqli_query($connection, $query);

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
        echo '<button class="edit-note btn btn-primary btn-sm" data-note-id="' . $noteId . '" data-note-content="' . htmlspecialchars($noteContent) . '">Edit</button>';
        echo '<a href="delete_note.php?note_id=' . $noteId . '" class="delete-note btn btn-danger btn-sm" data-note-id="' . $noteId . '">Delete</a>';
        
        // Add the edit note form
        echo '<div class="edit-note-form" style="display: none;">';
        echo '<textarea class="note-content-edit">' . $noteContent . '</textarea>';
        echo '<button class="update-note btn btn-primary btn-sm" data-note-id="' . $noteId . '">Update</button>';
        echo '</div>';
        
        echo '</div>';
    }
} else {
    // No notes found
    echo '<div class="no-notes">No notes found.</div>';
}

// Close the database connection
mysqli_close($connection);
?>
