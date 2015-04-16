<?php
    //require('includes/session.php');
    session_start();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <title></title>
        
        <style>
            
            #parent_div {
                border:none;
                border-color:#000;
                border-style:round;
            }
            p {
                color:#FF0000;
            }
        </style>
        
        
        <script>
            function parentButton() {
                document.getElementById('parent').innerHTML = "PARENT";
            }
        </script>
    
    </head>
    
    <body onload="parentButton()">
        <div id="parent_div">
            
            <h1><a href="parentLogin.php" id="parent"></a></h1>
        </div>
        
        <h6><a href="adminLogin.php">Admin</a></h6>
        
        
    </body>
    
    <script>
            
    </script>
</html>