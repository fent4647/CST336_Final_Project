<?php
    
/* FUNCTION TABLES */

// Child is in Child Table
// Returns the childid by looking for the firstname and lastname
function checkChildsExistance($i, $firstNames, $lastNames) {
    global $dbConn;
    $sql = "SELECT childid FROM child WHERE firstname = $1 AND lastname = $2";
    $stmt = pg_query_params($dbConn, $sql, array($firstNames[$i], $lastNames[$i]));
    $res = pg_fetch_row($stmt);
    
    return $res;
}

// Get the Child/Parent information using parents id and childs is in CHILD_PARENT_TABLE
// Returns all the information fromt the child_parent_table
function checkChildParentTable($res) {
    global $dbConn;
    $sqlCheck = "SELECT * FROM child_parent_table WHERE parentid = $1 AND childid = $2";
    $stmt = pg_query_params($dbConn, $sqlCheck, array($_SESSION['parentId'], $res['0']));
    $in = pg_fetch_row($stmt);
    
    return $in;
}


// GET the parent id with just using childs ID in CHILD_PARENT_TABLE
// Returns the parentsID from the childParentTable
function getParentFromChildParentTable($id) {
    global $dbConn;
    $sqlCheck = "SELECT parentid FROM child_parent_table WHERE childid = $id";
    $stmt = pg_query($dbConn, $sqlCheck);
    $in = pg_fetch_row($stmt);
    
    return $in;
}

// GET the parent id with just using the session
// Returns the parentsID from the childParentTable
function getParentChildId() {
        $dbConn = getConnection();
        $sql = "SELECT * FROM child_parent_table WHERE parentid = " . $_SESSION['parentId'];
        $stmt = pg_query($dbConn, $sql);  
        $idResults = pg_fetch_all_columns($stmt);
        return $idResults;
    }

// Child in CURRENTLY_PRESENT table
// Returns the childsId from Currently present using the Childs Id from child Table
function checkIfPresent($res) {
    global $dbConn;
    $checkPresent = "SELECT childid FROM currently_present WHERE childid = $1";
    $stmt = pg_query_params($dbConn, $checkPresent, array($res['0']));
    $isPresent = pg_fetch_row($stmt);
    
    return $isPresent;
}

// Childs confirmation code in CURRENTLY_PRESENT table
// Returns the confirmation code using the childs id
function getChildsCode($res) {
    global $dbConn;
    $checkPresent = "SELECT confirmationcode FROM currently_present WHERE childid = $1";
    $stmt = pg_query_params($dbConn, $checkPresent, array($res['0']));
    $isPresent = pg_fetch_row($stmt);
    
    return $isPresent;
}

// Get all the Childs Information
// Returns everyhing from child table using the child id
function getChildInformation($childId) {
    global $dbConn;
    $checkPresent = "SELECT * FROM child WHERE childid = $1";
    $stmt = pg_query_params($dbConn, $checkPresent, array($childId));
    $isPresent = pg_fetch_row($stmt);
    
    return $isPresent;
}

// Gets Parents Information
// Returns All information from parent using the parent Id
function getParentInformation($parentId) {
    global $dbConn;
    $checkPresent = "SELECT * FROM parent WHERE parentid = $parentId";
    $stmt = pg_query($dbConn, $checkPresent);
    $isPresent = pg_fetch_row($stmt);
    
    return $isPresent;
}

// Gets Parents Information
// Returns All information from parent using the parent Id
function getParentInformationName($parentId) {
    global $dbConn;
    $checkPresent = "SELECT * FROM parent WHERE parentid = $parentId SORT BY lastname";
    $stmt = pg_query($dbConn, $checkPresent);
    $isPresent = pg_fetch_row($stmt);
    
    return $isPresent;
}

// Gets Information Sorted By LastName
// Returns All information from parent using the parent Id
function getChildInformationLastName($childId) {
    global $dbConn;
    $checkPresent = "SELECT * FROM child WHERE childid = $1 SORT BY lastname";
    $stmt = pg_query_params($dbConn, $checkPresent, array($childId));
    $isPresent = pg_fetch_row($stmt);
    
    return $isPresent;
}

// Gets Information Sorted By FirstName
// Returns All information from parent using the parent Id
function getChildInformationFirstName($childId) {
    global $dbConn;
    $checkPresent = "SELECT * FROM child WHERE childid = $1 SORT BY firstname";
    $stmt = pg_query_params($dbConn, $checkPresent, array($childId));
    $isPresent = pg_fetch_row($stmt);
    
    return $isPresent;
}


/* EOF FUNCTION TABLES */
?>