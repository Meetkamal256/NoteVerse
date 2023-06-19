<?php
 
 // Connect to the database
 $host = "localhost";
 $username = "root";
 $password = "";
 $db_name = "notesVerse";
 $connection = mysqli_connect($host, $username, $password, $db_name) or die('Database connection error: ' . mysqli_connect_error());
 
 session_start();
 
 // Check if the note content is provided
 if (isset($_POST['noteContent'])) {
     // Retrieve the note content from the form
     $noteContent = $_POST['noteContent'];
      
     // Retrieve the user ID from the session
    $userId = $_SESSION['user_id'];
    echo "User ID: " . $userId; // Debugging statement

     // Prepare the SQL statement to insert the note into the database
     $query = "INSERT INTO notes (user_id, note, time) VALUES ('$userId', '$noteContent', NOW())";
     
     
     
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
