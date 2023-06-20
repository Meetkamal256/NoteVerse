<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        h1 {
            color: white;
        }

        .contactForm {
            border: 1px solid white;
            border-radius: 15px;
            margin-top: 50px;
            padding: 20px;
        }

        .btn {
            margin-top: 20px;
        }
        
        .body {
            background-color: white;
        }
    </style>
</head>

<body>
    <!-- navigation-bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
        <img src="icons/logo.png" alt="Logo" style="width: 80px; height:60px">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>></button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="offset-sm-1 col-sm-10 contactForm">
                <h1>Contact us:</h1>
                <?php
                
                // Error messages
                $missingName = '<p><strong>Please enter your name!</strong></p>';
                $missingEmail = '<p><strong>Please enter your email address!</strong></p>';
                $invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
                $missingMessage = '<p><strong>Please enter a message!</strong></p>';
                
                // If the user has submitted the form
                if (isset($_POST["submit"])) {
                    // Initialize the errors variable
                    $errors = '';
                    
                    // Check for errors
                    if (empty($_POST["contactName"])) {
                        $errors .= $missingName;
                    } else {
                        $contactName = filter_var($_POST["contactName"], FILTER_SANITIZE_STRING);
                    }
                    if (empty($_POST["contactEmail"])) {
                        $errors .= $missingEmail;
                    } else {
                        $contactEmail = filter_var($_POST["contactEmail"], FILTER_SANITIZE_EMAIL);
                        if (!filter_var($_POST["contactEmail"], FILTER_VALIDATE_EMAIL)) {
                            $errors .= $invalidEmail;
                        }
                    }
                    if (empty($_POST["contactMessage"])) {
                        $errors .= $missingMessage;
                    } else {
                        $contactMessage = filter_var($_POST["contactMessage"], FILTER_SANITIZE_STRING);
                    }
                    
                    // If there are any errors
                    if ($errors) {
                        // Print error message
                        $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
                    } else {
                        $to = "meetkamal256@gmail.com";
                        $subject = "Contact";
                        $message = "
        <p>Name: $contactName.</p>
        <p>Email: $contactEmail.</p>
        <p>Message:</p>
        <p><strong>$contactMessage</strong></p>";
                        $headers = "Content-type: text/html";
                        if (mail($to, $subject, $message, $headers)) {
                            $resultMessage = '<div class="alert alert-success">Thanks for your message. We will get back to you as soon as possible!</div>';
                            // Redirect outside of HTML block
                            header("Location: thanksforyourmessage.php");
                            exit; // Add exit to terminate the script after redirection
                        } else {
                            $resultMessage = '<div class="alert alert-warning">Unable to send Email. Please try again later!</div>';
                        }
                    }
                    echo $resultMessage;
                }
                ?>
                <form method="post">
                    <div class="form-group mb-3">
                        <input type="text" name="contactName" id="contactName" placeholder="Name" class="form-control" value="<?php if (isset($_POST["contactName"])) echo $_POST["contactName"]; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="contactEmail" id="contactEmail" placeholder="Email" class="form-control" value="<?php if (isset($_POST["contactEmail"])) echo $_POST["contactEmail"]; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="contactMessage" id="contactMessage" placeholder="Message" class="form-control" rows="5"><?php if (isset($_POST["contactMessage"])) echo $_POST["contactMessage"]; ?></textarea>
                    </div>
                    <input type="submit" name="submit" class="btn btn-success btn-lg" value="Send Message">
                
                </form>
            </div>
        </div>
    </div>
</body>

</html>