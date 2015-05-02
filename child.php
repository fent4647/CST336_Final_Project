<?php
    session_start();
  require('includes/connect.php');
  $dbConn = getConnection();
    
  $checkNames = array();
    
    $firstNames = $_GET['firstnames'];
    $midNames = $_GET['cMiddleInit'];
    $lastNames = $_GET['lastnames'];

    echo $_SESSION['parentId'];    

    for($i = 0; $i < sizeof($firstNames); $i++) {
        echo $firstNames[$i] . " ";
    }


    // check to see if child is there..
    // if so .. add to parentsID / Child Id









  //$sql = "SELECT * FROM child WHERE firstname = $1 AND lastname = $2";
  //$stmt = pg_query_params($dbConn, $sql, array($firstNames[$i], $lastNames[$i]));
  //$res = pg_fetch_row($stmt);
	
?>