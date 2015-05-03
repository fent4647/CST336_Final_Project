<?php
    session_start();
  require('includes/connect.php');
  $dbConn = getConnection();
    
  $checkNames = array();
    
    $firstNames = $_GET['firstnames'];
    $midNames = $_GET['cMiddleInit'];
    $lastNames = $_GET['lastnames'];

    echo  $_SESSION['parentId'];
    // check to see if child is there..
    // if so .. add to parentsID / Child Id

    for($i = 0; $i < sizeof($firstNames); $i++) {
     
        $sql = "SELECT * FROM child WHERE firstname = $1 AND lastname = $2";
        $stmt = pg_query_params($dbConn, $sql, array($firstNames[$i], $lastNames[$i]));
        $res = pg_fetch_row($stmt);
        
        
        if(!empty($res)) { 
            $sqlInsert = "INSERT INTO child_parent_table (parentId, childId) VALUES (" . $_SESSION['parentId'] . ", $res['0'] )";
            pg_query($dbConn, $sqlInsert);
        }   
    }
    
	
?>