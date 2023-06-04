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
        note app
    </title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
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
                    <a class="nav-link" href="note">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact us</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#secondModal" data-bs-toggle="modal">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- jumbotron -->
    <div class="jumbotron" id="myContainer">
        <h1>Welcome to notesVerse</h1>
        <p>Your Ultimate online notes platform</p>
        <p>Create, edit, and manage your notes easily with our intuitive app.</p>
        <p>Access your notes from anywhere, anytime</p>
        <a class="btn btn-primary btn-lg" href="#" role="button" data-bs-target="#myModal" data-bs-toggle="modal">Signup- Its free</a>
    </div>
    
    < <!-- signup form -->
        <form method="post" id="signupForm">
            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Sign up today and start using notesVerse app!</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email Address">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="Username">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password1" placeholder="Choose a password">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password2" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="password2" placeholder="Confirm password">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
        <!-- Login form -->
        <form method="post" id="loginForm">
            <div class="modal fade" id="secondModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Login</h4>
                            <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                        
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="loginEmail"></label>
                                <input type="email" name="loginEmail" id="loginEmail" placeholder="Email" class="form-control" maxlength="40">
                                <label for="loginPassword"></label>
                                <input type="text" name="loginPassword" placeholder="Password" class="form-control" maxlength="40">
                            </div>
                            <div class="checkbox">
                                <label for="rememberMe">
                                    <input type="checkbox" name="rememberMe" id="rememberMe">
                                    Remember me
                                </label>
                                <a class="float-end" href="#thirdModal" data-bs-dismiss="modal" data-bs-toggle="modal">Forgot password?</a>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-light float-start" data-bs-dismiss="modal" data-bs-target="#myModal" data-bs-toggle="modal">Register</button>
                            <div>
                                <button type="button" class="btn btn-success">Login</button>
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
        <!-- forgot password form -->
        <form method="post" class="form-group">
            <div class="modal fade" id="thirdModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Forgot password? Enter your email address</h4>
                            <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <label for="forgotmeEmail"></label>
                            <input type="email" name="forgotmeEmail" id="forgotmeEmail" placeholder="Email" class="form-control">
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-light float-start" data-bs-dismiss="modal" data-bs-target="#myModal" data-bs-toggle="modal">Register</button>
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