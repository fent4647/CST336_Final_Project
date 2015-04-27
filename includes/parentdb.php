<?php
    require('checkdatabase.php');
    $dbConn = getConnection();
    

    //$sql = "SELECT * FROM parent WHERE firstName = $1";
    
    $stmt = pg_query_params($dbConn, $sql, array($pFirstName));
    $res = pg_fetch_row($stmt);
    
    $name = array();
    if($name['firstName']) {
        
    }else {
        
    }
    array_to_json();
?>