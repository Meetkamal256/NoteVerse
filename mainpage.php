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
        main page
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
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cedarville+Cursive&family=Montserrat&family=Recursive&display=swap" rel="stylesheet">
    <style>
        .container {
            margin-top: 125px;
        }
        
        /* #notepad,
        #allNote,
        #done {
            display: none;
        }
         */
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
                    <a class="nav-link" href="note">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact us</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">My notes</a>
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
                <div class="buttons">
                    <button type="button" class="btn btn-info btn-lg" id="addNote">Add notes</button>
                    <button type="button" class="btn btn-info btn-lg float-end" id="edit">Edit</button>
                    <button type="button" class="btn btn-info btn-lg" id="allNote">All notes</button>
                    <button type="button" class="btn btn-success btn-lg float-end" id="done">Done</button>
                </div>
                <div id="notepad">
                    <textarea rows="10"></textarea>
                </div>
            </div>
        </div>
    </div>
        <!-- footer -->
        <div class="footer">
            <div class="container-fluid">Copyright &copy; <?php $today = date("Y");
                                                            echo $today ?></div>
        </div>
</body>

</html>