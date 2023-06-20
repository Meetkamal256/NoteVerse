<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the
head; any other head content must come *after* these tags
-->
    <title>
        Profile
    </title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of
HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the
page via file:// -->
    <!--[if lt IE 9]>
<script
src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.
js">
</script><script
src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js">
</script>
<![endif]-->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript
plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/j
query.min.js">
    </script>
    
    <!-- Include all compiled plugins (below), or include
individual files as needed -->
    <script src="js/bootstrap.min.js">
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Cedarville+Cursive&family=Montserrat:wght@900&family=Recursive&family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
    <style>
        .container {
            margin-top: 100px;
        }
        
        #notepad,
        #allNote,
        #done {
            display: none;
        }
        
        .buttons {
            margin-bottom: 16px;
        }
        
        textarea {
            width: 100%;
            max-width: 100%;
            font-size: 20px;
            line-height: 1.5em;
            border-left-width: 20px;
            border-color: #13D4B5;
            color: #13D4B5;
            padding: 10px;
            background-image: url(images/pexels-madison-inouye-1101122.jpg);
        }
    </style>
</head>

<body>
    <!-- navigation-bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
        <img src="icons/logo1.png" alt="Logo" style="width: 80px; height:60px">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>></button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
            <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="">Logged in as <b>username</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- container -->
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-condensed">
                        <tr data-bs-target="#updateUsername" data-bs-toggle="modal">
                            <td>Username:</td>
                            <td>Value</td>
                        </tr>
                        <tr data-bs-target="#updateEmail" data-bs-toggle="modal">
                            <td>Email:</td>
                            <td>Value</td>
                        </tr>
                        <tr data-bs-target="#updatePassword" data-bs-toggle="modal">
                            <td>Password:</td>
                            <td>hidden</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- update username form -->
    <form method="post" id="updateUsernameForm">
        <div class="modal fade" id="updateUsername" tabindex="-1" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Username:</h4>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                    
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="username">Username:</label>
                            <input type="text" name="updateUsername" id="updateUsername" class="form-control" maxlength="40">
                        
                        
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <div>
                            <button type="button" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <!-- update email form -->
    <form method="post" id="updateEmailForm">
        <div class="modal fade" id="updateEmail" tabindex="-1" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Email:</h4>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                    
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="username">Enter a new Email:</label>
                            <input type="email" name="updateEmail" id="updateEmail" class="form-control" maxlength="40" value="email value">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <div>
                            <button type="button" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
      
      <!-- update Password form -->
      <form method="post" id="updatePasswordForm">
        <div class="modal fade" id="updatePassword" tabindex="-1" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Enter Current and New password:</h4>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                    
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="currentPassword" class="sr-only"></label>
                            <input type="password" name="currentPassword" id="currentPassword" placeholder="Your Current Password" class="form-control" maxlength="40">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="sr-only"></label>
                            <input type="password" name="password" id="password" placeholder="Choose a Password" class="form-control" maxlength="40">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password2" class="sr-only"></label>
                            <input type="password" name="password2" id="password2" placeholder="Comfirm Password" class="form-control" maxlength="40">
                        </div>
                    
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <div>
                            <button type="button" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    
    <!-- footer -->
    <div class="footer">
        <div class="container-fluid">Copyright &copy; <?php $today = date("Y");
                                                        echo $today ?></div>
    </div>
</body>

</html>