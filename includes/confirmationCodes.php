<?php
    // JSON/AJAX
    // This checks to see if the Confirmation code the user hs typed in is avaliable
    // Returns TRUE if avaliable, otherwise FALSE
    
    require('connect.php');
    $dbConn = getConnection();
    
    $code = $_GET['code'];

    $sql = "SELECT confirmationcode FROM currently_present WHERE confirmationcode = $1";
    $stmt = pg_query_params($dbConn, $sql, array($code));
    $result = pg_fetch_all_columns($stmt);

    $codes = array();
    if(empty($result)) {
        $codes['free'] = true;
    }else {
        $codes['free'] = false;
    }

    echo json_encode($codes);
?>