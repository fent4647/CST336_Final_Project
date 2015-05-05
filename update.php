<?php
    session_start();
    require('includes/session.php');
    require('includes/connect.php');  
    require('includes/childFunctions.php');    
    $dbConn = getConnection();
/*
 * To change this template use Tools | Templates.
 */
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link href="css/style.css" rel="stylesheet">
        <title>Update</title>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <h1>Update</h1>
                <nav>
                    <a href="admindash.php">Checked In</a>
                    <a href="history.php">History</a>
                    <a href="logout.php">Logout</a>
                </nav>
                <br />
      
            </div>
            
            
            <div id="body">
                <br />

            </div>
            
            <div id="footer">
                
            </div>
        </div>
    </body>
</html>