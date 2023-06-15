<?php
 session_start();
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 
 
  // Connect to the database
  $host = "localhost";
  $username = "id20917606_root";
  $password = "Kamal256@";
  $db_name = "id20917606_noteverse";
  $connection = mysqli_connect($host, $username, $password, $db_name) or die('Database connection error: ' . mysqli_connect_error());
// Retrieve the note ID and updated content from the form
$noteId = $_POST['noteId'];
$updatedContent = $_POST['updatedContent'];

// Perform the database update
$query = "UPDATE notes SET note = '$updatedContent' WHERE id = $noteId";
$result = mysqli_query($connection, $query);

// Check if the update was successful
if ($result) {
    // Redirect or perform any other desired action upon successful update
    // For example, you can redirect back to the main page:
    header("Location: index.php");
    exit();
} else {
    // Handle the case where the update fails
    // Display an error message or perform any other desired action
    echo "Error updating note: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
