<?php
// login.php

// start session
session_start();

// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$db_name = "notesVerse";
$link = mysqli_connect($host, $username, $password, $db_name) or die('Database connection error: ' . mysqli_connect_error());

// Define error messages
$missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$invalidCredentials = '<p><strong>Invalid email or password!</strong></p>';
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
            $errors .= $invalidCredentials;
        }
    }
    
    // Get password
    if (empty($_POST["loginPassword"])) {
        $errors .= $missingPassword;
    } else {
        $loginPassword = $_POST["loginPassword"];
    }
    
    // If there are any errors, print errors
    if ($errors) {
        $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
        echo $resultMessage;
    } else {
        // No errors
        
        // Prepare variables for the query
        $loginEmail = mysqli_real_escape_string($link, $loginEmail);
        
        // Check if email exists in the users table
        $sql = "SELECT * FROM users WHERE email = '$loginEmail'";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            echo '<div class="alert alert-danger">Error running the query: ' . mysqli_error($link) . '</div>';
            exit;
        }
        
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // User found, check password
            if (password_verify($loginPassword, $row['password'])) {
                // Passwords match, login successful
                $_SESSION['loggedIn'] = true;
                $_SESSION['loginEmail'] = $loginEmail;
                $_SESSION['username'] = $row['username'];
                $_SESSION['user_id'] = $row['user_id'];
                
                echo '<div class="alert alert-success">Login successful! Welcome back, ' . $row['username'] . '!</div>';
                // Redirect to the desired page after login
                header("Location: mainpage.php");
                exit;
            } else {
                // Invalid password
                echo '<div class="alert alert-danger">'.$invalidCredentials.'</div>';
            }
        } else {
            // User not found
            echo '<div class="alert alert-danger">'.$invalidCredentials.'</div>';
        }
    }
}
?>
