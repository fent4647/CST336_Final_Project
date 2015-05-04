<?php
    
/* FUNCTION TABLES */

// Child is in Child Table
function checkChildsExistance($i, $firstNames, $lastNames) {
    global $dbConn;
    $sql = "SELECT childid FROM child WHERE firstname = $1 AND lastname = $2";
    $stmt = pg_query_params($dbConn, $sql, array($firstNames[$i], $lastNames[$i]));
    $res = pg_fetch_row($stmt);
    
    return $res;
}

// Child/Parent is in CHILD_PARENT_TABLE
function checkChildParentTable($res) {
    global $dbConn;
    $sqlCheck = "SELECT * FROM child_parent_table WHERE parentid = $1 AND childid = $2";
    $stmt = pg_query_params($dbConn, $sqlCheck, array($_SESSION['parentId'], $res['0']));
    $in = pg_fetch_row($stmt);
    
    return $in;
}

// Child in CURRENTLY_PRESENT table
function checkIfPresent($res) {
    global $dbConn;
    $checkPresent = "SELECT childid FROM currently_present WHERE childid = $1";
    $stmt = pg_query_params($dbConn, $checkPresent, array($res['0']));
    $isPresent = pg_fetch_row($stmt);
    
    return $isPresent;
}


function getChildInformation($childId) {
    global $dbConn;
    $checkPresent = "SELECT * FROM child WHERE childid = $1";
    $stmt = pg_query_params($dbConn, $checkPresent, array($childId));
    $isPresent = pg_fetch_row($stmt);
    
    return $isPresent;
}


function getParentInformation($parentId) {
    global $dbConn;
    $checkPresent = "SELECT * FROM parent WHERE parent = $1";
    $stmt = pg_query_params($dbConn, $checkPresent, array($parentId));
    $isPresent = pg_fetch_row($stmt);
    
    return $isPresent;
}

/* EOF FUNCTION TABLES */
?>