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
    <title>Confirmation</title>
    <link href="css/style.css" rel="stylesheet"/>
    <style>
            
            #wrapper {
                border: 2px solid #ffffff;
                box-shadow: 10px 10px 5px #e5e5e5;
                background:#46c8e2;
                text-align:center;
                
                width:512px;
                position: absolute;
                top:0;
                bottom: 0;
                left: 0;
                right: 0;

                margin: auto;
                
            }
            
            p {
                float:left;
            }
            
            #linkSwitch {
                color:#FF0000;
            }
        
      </style>
</head>
<body>
    <div id="wrapper">
    <h1>Confirmation #'s</h1>
    <table border=1>
    <tr>
         <th>Child Name</th>
         <th>Their Confirmation Code</th>
         </tr>
     <?php 
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
     ?>
    </table>
        <button onclick="mainhome.php'">Confirm</button>

    </div>
</body>
</html>