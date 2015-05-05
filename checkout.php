<?php
// This is the ADMIN DASH Check Out Edition
// This page displays The current child checked in. 
// Allows user to check them out if they have the correct conf. code

/* Requirements */
    session_start();
    require('includes/session.php');
    require('includes/connect.php');  
    require('includes/childFunctions.php');    
    $dbConn = getConnection();
/* Requirements */
    

    if(isset($_GET["submit"])) {
        // Get child info, then the childs code for varification
        $val = getChildsCode(getChildInformation($_GET['childId'])); 
        
        // is it a match?
        if($_GET['code'] == $val['0']) {
            
            //REMOVE FROM CHILD_PARENT_TABLE
            $sql = "DELETE FROM child_parent_table WHERE childid = $1";
            pg_query_params($dbConn, $sql, array($_GET['childId']));
        
            //REMOVE FROM CURRENT_PRESENT TABLE
            $sql = "DELETE FROM currently_present WHERE childid = $1";
            pg_query_params($dbConn, $sql, array($_GET['childId']));
            
            header("Location: admindash.php?checkedout=Checked Out Successful!");
            
        }else { echo "Sorry, that is not the correct Confirmation Code.."; }
        
    }

    $results = getChildInformation($_GET['childId']); // get the childs info w/ their ID

?>

<!DOCTYPE HTML>
<html>
    <head>
        
        <meta charset="UTF-8"/>
        <title>Admin Dash</title>
        <link href="css/main_stylesheet.css" rel="stylesheet" />
        <link href="css/admindash_stylesheet.css" rel="stylesheet" />
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
            
            <div id="header">
                
                <h1 id="heading_panel">Admin Panel</h1>
                   
                <nav id="navigation_panel">
                        
                    <a href="mainhome.php">Main Home</a>
                    <a href="admindash.php">Checked In</a>
                    <a href="history.php">History</a>
                    <a href="includes/logout.php">Logout</a>
                        
                </nav>
                
            </div> <!-- HEAD ARRR! -->
            
            <form>
                
                <input type="hidden" name="childId" value="<?= $results['0'] ?>" />
                
                <!-- First Last Name -->
                <span>You are checking out <?= $results['1'] ?> <?= $results['3'] ?>..</span><br /> 
                Confirmation Code: <input type="number" min="1" name="code" require/>
                
                <input class='mysubmitbutton' type="submit" name="submit" value="Submit" id="submitButton"/>
                
            </form>
            
        </div> <!-- IM NOT A RAPPER.. -->
        
    </body>
</html>