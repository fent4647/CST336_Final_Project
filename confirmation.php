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
    }

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Confirmation</title>
    <link href="css/style.css" rel="stylesheet"/>
    
</head>
<body>
    <div id="wrapper">
    <h1>Confirmation #</h1>
    <table>
    <tr>
         <th>Child Name</th>
         <th>Enter Confirmation Code</th>
         </tr>
     <?php 
        for($i = 0; $i < sizeof($firstNames); $i++) {
            // Display Their Codes
            echo "<tr>";
            echo "<td>" . $firstNames[$i] . "</td>";
            echo "<td>" . $codes[$i]. "</td>";
            echo "</tr>";
        }
     ?>
    </table>
    <button onclick="location.href='http://ringo-finance.codio.io:3000/CST336_Final_Project/mainhome.php'">Confirm</button>
    </div>
</body>
</html>