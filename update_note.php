<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the user is not logged in
session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header("Location: index.php");
    exit;
}

// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$db_name = "notesVerse";
$connection = mysqli_connect($host, $username, $password, $db_name) or die('Database connection error: ' . mysqli_connect_error());

// Retrieve the note ID and updated content from the form
$noteId = $_POST['noteId'];
$updatedContent = $_POST['updatedContent'];

// Get the user_id from the session
$userId = $_SESSION['user_id'];

// Perform the database update
$query = "UPDATE notes SET note = '$updatedContent' WHERE id = $noteId AND user_id = $userId";
$result = mysqli_query($connection, $query);

// Check if the update was successful
if ($result) {
    // Redirect or perform any other desired action upon successful update
    // For example, you can redirect back to the main page:
    header("Location: mainpage.php");
    exit();
} else {
    // Handle the case where the update fails
    // Display an error message or perform any other desired action
    echo "Error updating note: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
