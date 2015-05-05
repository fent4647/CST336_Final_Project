<?php
// JSON/AJAX
// Checks to see if the parents name is in the database
// Returns TRUE if the PARENT is already in the database, otherwise FALSE.

    session_start();
    require('connect.php');
    $dbConn = getConnection();
    
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $sql = "SELECT * FROM parent WHERE firstName = $1 AND lastName = $2";
    
    $stmt = pg_query_params($dbConn, $sql, array($firstName, $lastName));
    $res = pg_fetch_row($stmt);
    
    
    $_SESSION['parentId'] = $res['0'];

    $checkName = array();
    if(!empty($res)) {
        
        $checkName['exists'] = true;
       
        
    }else {
        $checkName['exists'] = false;
    }
       
    echo json_encode($checkName);
?>