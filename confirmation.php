<?php
    session_start();
    require('includes/session.php');
    require('includes/connect.php');
    require('includes/childFunctions.php');
    $dbConn = getConnection();
    

    
    $codes = $_GET['code'];
    $firstNames = $_GET['firstnames'];
    $lastNames = $_GET['lastnames'];
    
    // Get child ID
    for($i = 0; $i < sizeof($firstNames); $i++) {
        $res = checkChildsExistance($i, $firstNames, $lastNames);

        // UPDATE currently_present TABLE
        $sql = "UPDATE currently_present SET confirmationcode = $1 WHERE childid = $2";
        pg_query_params($dbConn, $sql, array($codes[$i], $res['0']));
        
        // Add to HISTORY table
        $sql = "INSERT INTO history (childid, confirmationcode) VALUES ($1, $2)";
        pg_query_params($dbConn, $sql, array($res['0'], $codes[$i]));
                    
    }

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
      
        <meta charset="UTF-8"/>
        <title>Heir Force</title>
        <link href="css/main_stylesheet.css" rel="stylesheet" />
        <link href="css/confirmation_stylesheet.css" rel="stylesheet" />
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
        
            <h1 id="header">Confirmation #'s</h1>
            
            <div id="table">
            
                <table border=1>
            
                    <tr>
                        <th>Child Name</th>
                        <th>Their Confirmation Code</th>
                    </tr>
            
                    <?php 

                    if(sizeof($firstNames) == 0) { header("Location: mainhome.php"); }
                    else {
                        
                        for($i = 0; $i < sizeof($firstNames); $i++) {
                
                            // Display Their Codes
                            echo "<tr>";
                            echo "<td>" . $firstNames[$i] . "</td>";
            
            
                             // GET THE Childs ConfirmationCodes
                            $res = checkChildsExistance($i, $firstNames, $lastNames); // get child
                            $sql = "SELECT confirmationcode FROM currently_present WHERE childid = $1";
                            $stmt = pg_query_params($dbConn, $sql, array($res['0']));
                            $result = pg_fetch_row($stmt);
                            echo "<td>" . $result['0'] . "</td>";
                            echo "</tr>";
                        }
                
                    }
                
                    ?>
            
                </table>
                
            </div> <!-- TABLE -->
            
            <button class="mysubmitbutton" onclick="location.href='mainhome.php'" id="confirm">Confirm</button>

        </div>
    
    </body>
</html>