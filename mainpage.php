<?php
// mainpage.php
// start session
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header("Location: index.php");
    exit;
}

// Get the username from the session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cedarville+Cursive&family=Montserrat&family=Recursive&display=swap" rel="stylesheet">
    <style>
        .container {
            margin-top: 100px;
        }
        
        #allNoteSection {
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
            background-color: white;
            background-image: url(images/pexels-madison-inouye-1101122.jpg);
        }
        
        .note {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #f9f9f9;
        }
        
        .no-notes {
            margin-bottom: 20px;
            color: #888;
            font-style: italic;
        }
        
        .note {
            border: 2px solid #ccc;
            background-color: #f9f9f9;
            border-radius: 20px;
        }

        .note-datetime {
            font-size: 15px;
            color: #888;
            margin-top: 5px;
        }
        
        .no-notes {
            color: #888;
            font-style: italic;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
        <img src="icons/logo.png" alt="Logo" style="width: 80px; height:60px">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome back, <i><?php echo $username; ?></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <div class="buttons">
                    <?php include("create_note.php"); ?>
                    <form method="POST" id="addNoteForm" action="create_note.php">
                        <input type="hidden" name="form_submitted" value="1">
                        <button type="button" class="btn btn-info btn-lg" id="addNoteBtn">Add notes</button>
                        <button type="button" class="btn btn-info btn-lg" id="allNoteBtn">All notes</button>
                        <button type="button" class="btn btn-success btn-lg float-end" id="done">Done</button>
                        <div id="notepad">
                            <textarea name="noteContent" rows="10"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- All notes section -->
        <div id="allNoteSection">
            <?php include("load_all_notes.php"); ?>
        </div>
    </div>
    
    <!-- Update note form -->
    <form method="POST" id="updateNoteForm" action="update_note.php">
        <input type="hidden" name="noteId" id="updateNoteId">
        <input type="hidden" name="updatedContent" id="updatedContent">
    </form>
    
    <!-- Delete note form -->
    <form id="deleteNoteForm" method="POST">
        <input type="hidden" name="noteId" id="deleteNoteId">
    </form>
    <!-- Include delete_note.php -->
    <?php include("delete_note.php"); ?>
    
    <div class="footer">
        <div class="container-fluid">
            <strong class="bg-light">Copyright &copy; <?php echo date("Y"); ?></strong>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Hide the allNote section initially
            $('#allNoteSection').hide();
            $('#done').hide();
            
            // Add notes button click event
            $('#addNoteBtn').click(function() {
                // Check if the note content is empty
                if ($('textarea[name="noteContent"]').val().trim() === '') {
                    alert('Please enter note content');
                    return;
                }
                
                // Hide the notepad, addNoteBtn, and show the allNoteBtn
                $('#notepad').hide();
                $('#addNoteBtn').hide();
                $('#allNoteBtn').show();
                
                // Submit the form manually
                $('#addNoteForm').submit();
            });
            
            // All notes button click event
            $('#allNoteBtn').click(function() {
                // Hide the notepad, addNoteBtn
                $('#notepad').hide();
                $('#addNoteBtn').hide();
                $('#done').show();
                
                // Show the allNoteSection
                $('#allNoteSection').show();
                
                // Show the edit button
                $('.edit-note').show();
            });
            
            // Done button click event
            $('#done').click(function() {
                // Show the notepad, addNoteBtn
                $('#notepad').show();
                $('#addNoteBtn').show();
                $('#done').hide();
                
                // Hide the allNoteSection
                $('#allNoteSection').hide();
                
                // Hide the edit button
                $('.edit-note').hide();
            });
            
            // Edit button click event
            $(document).on('click', '.edit-note', function() {
                var noteId = $(this).attr('data-note-id');
                var noteContent = $(this).siblings('.note-content').text();

                // Replace the note content with a textarea for editing
                $(this).siblings('.note-content').html('<textarea class="edit-note-content">' + noteContent + '</textarea>');
                $(this).text('Update');
                $(this).removeClass('edit-note');
                $(this).addClass('update-note');
            });

            // Update note button click event
            $(document).on('click', '.update-note', function() {
                var noteId = $(this).attr('data-note-id');
                var updatedContent = $(this).siblings('.note-content').children('.edit-note-content').val();

                // Set the updated content in a hidden input field
                $('#updateNoteId').val(noteId);
                $('#updatedContent').val(updatedContent);

                // Submit the form to update the note
                $('#updateNoteForm').submit();
            });

            // Delete note button click event
            $('.delete-note').click(function() {
                var noteId = $(this).data('note-id');

                // Set the noteId in the deleteNoteForm
                $('#deleteNoteId').val(noteId);

                // Submit the deleteNoteForm
                $('#deleteNoteForm').submit();
            });
        });
    </script>
</body>

</html>