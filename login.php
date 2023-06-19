<?php
// login.php
// start session
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$db_name = "notesVerse";
$link = mysqli_connect($host, $username, $password, $db_name) or die('Database connection error: ' . mysqli_connect_error());

// Define error messages
$missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
$missingPassword = '<p><strong>Please enter your password!</strong></p>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs
    // Initialize errors variable
    $errors = "";
    
    // Get email
    if (empty($_POST["loginEmail"])) {
        $errors .= $missingEmail;
    } else {
        $loginEmail = filter_var($_POST["loginEmail"], FILTER_SANITIZE_EMAIL);
        if (!filter_var($loginEmail, FILTER_VALIDATE_EMAIL)) {
            $errors .= $invalidEmail;
        }
    }
    
    // Get password
    if (empty($_POST["loginPassword"])) {
        $errors .= $missingPassword;
    } else {
        $loginPassword = filter_var($_POST["loginPassword"], FILTER_SANITIZE_STRING);
    }
    
    // If there are any errors, print errors
    if ($errors) {
        $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
        echo $resultMessage;
    } else {
        // No errors
        
        // Prepare variables for the query
        $loginEmail = mysqli_real_escape_string($link, $loginEmail);
        $loginPassword = mysqli_real_escape_string($link, $loginPassword);
        
        // Check if email and password match in the users table
        $sql = "SELECT * FROM users WHERE email= '$loginEmail' AND password = '$loginPassword'";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            echo '<div class="alert alert-danger">Error running the query!</div>';
            exit;
        }
        
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // User found, login successful
            $_SESSION['loggedIn'] = true;
            $_SESSION['loginEmail'] = $loginEmail;
            $_SESSION['username'] = $row['username']; // Set the logged-in username here
            $_SESSION['user_id'] = $row['id'];
            
            echo '<div class="alert alert-success">Login successful! Welcome back, ' . $row['username'] . '!</div>';
            // Redirect to the desired page after login
            header("Location: mainpage.php");
            exit;
        } else {
            // Invalid email or password
            echo '<div class="alert alert-danger">Invalid email or password. Please try again.</div>';
        }
        
    
    }
}
