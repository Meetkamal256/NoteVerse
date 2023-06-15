<?php
// signup-process.php
// start session
session_start();

 // Connect to the database
 $host = "localhost";
 $username = "id20917606_root";
 $password = "Kamal256@";
 $db_name = "id20917606_noteverse";
 $connection = mysqli_connect($host, $username, $password, $db_name) or die('Database connection error: ' . mysqli_connect_error());

// Define error messages
$missingUsername = '<p><strong>Please enter a username!</strong></p>';
$missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
$missingPassword = '<p><strong>Please enter a password!</strong></p>';
$invalidPassword = '<p><strong>Your password should be at least six characters long and include one capital letter and number!</strong></p>';
$differentPassword = '<p><strong>Passwords don\'t match!</strong></p>';
$missingPassword2 = '<p><strong>Please confirm your password!</strong></p>';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs
    // Initialize errors variable
    $errors = "";
    
    // Get username
    if (empty($_POST["username"])) {
        $errors .= $missingUsername;
    } else {
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    }
    
    // Get email
    if (empty($_POST["email"])) {
        $errors .= $missingEmail;
    } else {
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors .= $invalidEmail;
        }
    }
    
    // Get passwords
    if (empty($_POST["password"])) {
        $errors .= $missingPassword;
    } else {
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
        
        if (strlen($password) < 6 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
            $errors .= $invalidPassword;
        } else {
            // Check password confirmation
            if (empty($_POST["password2"])) {
                $errors .= $missingPassword2;
            } else {
                $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
                if ($password !== $password2) {
                    $errors .= $differentPassword;
                }
            }
        }
    }
    
    // If there are any errors, print errors
    if ($errors) {
        $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
        echo $resultMessage;
    } else {
        // No errors
        
        // Prepare variables for the query
        $username = mysqli_real_escape_string($link, $username);
        $email = mysqli_real_escape_string($link, $email);
        $password = mysqli_real_escape_string($link, $password);
        
        // Check if username exists in the users table and print error
        $sql = "SELECT * FROM users WHERE username= '$username'";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            echo "<div class='alert alert-danger'>" . mysqli_error($link) . "</div>";
            exit;
        }
        
        $results = mysqli_num_rows($result);
        if ($results) {
            echo '<div class="alert alert-danger">That username is already registered. Do you want to log in?</div>';
            exit;
        }
        
        // Check if email exists in users table and print error
        $sql = "SELECT * FROM users WHERE email= '$email'";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            echo '<div class="alert alert-danger">Error running the query!</div>';
            exit;
        }
        
        $results = mysqli_num_rows($result);
        if ($results) {
            echo '<div class="alert alert-danger">That email is already registered. Do you want to log in!</div>';
            exit;
        }
        
        // create a unique activation code
        $activationKey = bin2hex(openssl_random_pseudo_bytes(16));
        
        // insert user details and activation code in users tables
        $sql = "INSERT INTO users(username, email, password, activation) VALUES('$username', '$email', '$password', '$activationKey')";
        $results = mysqli_query($link, $sql);
        if (!$results) {
            echo '<div class="alert alert-danger">There was an error inserting the user details in the database</div>';
            exit;
        }
        
        // send the user an email with the link to activate.php with their email and activation code
        $to = $email;
        $subject = "Confirm Your Registration";
        $message = "Please click on this link to activate your account: \n\n";
        $message .= "http://localhost/activate.php?email=" . urlencode($email) . "&key=$activationKey";
        $headers = "From: meetkamal256@gmail.com\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        if (mail($to, $subject, $message, $headers)) {
            echo '<div class="alert alert-success">Registration successful! Please check your email to activate your account.</div>';
        } else {
            echo '<div class="alert alert-danger">There was an error sending the activation email. Please try again.</div>';
        }
    }
}
?>
