<?php
    require('connect.php');
    $dbConn = getConnection();
    
    $checkNames = array();
    
    $firstNames = $_GET['firstnames'];
    $lastNames = $_GET['lastnames'];
    for($i = 0; $i < sizeOf($lastNames); $i++) {
        $sql = "SELECT * FROM child WHERE firstname = $1 AND lastname = $2";
        $stmt = pg_query_params($dbConn, $sql, array($firstNames[$i], $lastNames[$i]));
        $res = pg_fetch_row($stmt);
		
        if(!empty($res)) {
            $checkName['exists'] = true;
        }else {
            $checkName['exists'] = false;  
        }
        
	}

    echo json_encode($checkName);
?>