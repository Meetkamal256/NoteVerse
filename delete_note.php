<?php
 // Connect to the database
 $host = "localhost";
 $username = "root";
 $password = "";
 $db_name = "notesVerse";
 $connection = mysqli_connect($host, $username, $password, $db_name) or die('Database connection error: ' . mysqli_connect_error());

// Check if the note ID is provided
if (isset($_GET['note_id'])) {
    // Retrieve the note ID from the query parameter
    $noteId = $_GET['note_id'];
    
    // Prepare the SQL statement to delete the note from the database
    $query = "DELETE FROM notes WHERE id = $noteId";
    
    // Execute the SQL statement
    $result = mysqli_query($connection, $query);
    
    // Check if the note was successfully deleted
    if ($result) {
        echo '<p>Note deleted successfully!</p>';
    } else {
        echo 'Error deleting note: ' . mysqli_error($connection);
    }
    
    // Close the database connection
    mysqli_close($connection);
}
?>
