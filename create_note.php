<?php
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 // Connect to the database
 $host = "localhost";
 $username = "root";
 $password = "";
 $db_name = "notesVerse";
 $connection = mysqli_connect($host, $username, $password, $db_name) or die('Database connection error: ' . mysqli_connect_error());
 
 // Check if the note content is provided
 if (isset($_POST['noteContent'])) {
     // Retrieve the note content from the form
     $noteContent = $_POST['noteContent'];
     
     // Prepare the SQL statement to insert the note into the database
     $query = "INSERT INTO notes (user_id, note, time) VALUES (1, '$noteContent', NOW())";
     
     
     // Execute the SQL statement
     $result = mysqli_query($connection, $query);
     
     // Check if the note was successfully inserted
     if ($result) {
         echo '<p>Note created successfully!</p>';
     } else {
         echo 'Error creating note: ' . mysqli_error($connection);
     }
     
     // Close the database connection
     mysqli_close($connection);
 }
?>
