<?php
// This is the main home page
// The user may choose from either the admin menu or checking in
// Or Loggin a new parent/child

/* Requirements */
    session_start();
    require('includes/session.php');
/* Requirements */
?>

<!DOCTYPE HTML>
<html>
    <head>
        
        <meta charset="UTF-8">
        <title>Main Home</title>
        <link href="css/main_stylesheet.css" rel="stylesheet" />
        <link href="css/mainlogin_stylesheet.css" rel="stylesheet" />
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        
        <style>
            
            html { 
                  background: url(img/background.jpg) no-repeat center center fixed; 
                  -webkit-background-size: cover;
                  -moz-background-size: cover;
                  -o-background-size: cover;
                  background-size: cover;
            }
            
        </style>
        
    </head>
    
    <body>
        
        <div id="wrapper">
            
            <a href="includes/logout.php"><img src="img/back.png" alt="Logout"/></a>
            
            <div id="panels">
                
                <a href="info.php"><img src="img/parent.png" alt="parents"><span id="parent">Parent</span></a>
                <a href="admindash.php"><img src="img/settings.png" alt="admin"><span id="admin">Admin</span></a>
            
            </div> <!-- PANELS -->
            
        </div> <!-- WRAPPER -->
        
    </body>
    
    
</html>