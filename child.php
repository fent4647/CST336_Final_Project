<?php
    session_start();
    require('includes/connect.php');
    $dbConn = getConnection();
    

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
    $sqlCheck = "SELECT * FROM child_parent_table WHERE parentid = " . $_SESSION['parentId'] . " AND childid = " . $res['0'];
    $stmt = pg_query($dbConn, $sqlCheck);
    $in = pg_fetch_row($stmt);
    
    return $in;
}

// Child in CURRENTLY_PRESENT table
function checkPresent() {
    global $dbConn;
    $checkPresent = "SELECT childid FROM currently_present WHERE childid = " . $res['0'];
    $stmt = pg_query($dbConn, $checkPresent);
    $isPresent = pg_fetch_row($stmt);
    
    return $isPresent;
}


/* EOF FUNCTION TABLES */



    $checkNames = array();
    $noMatch = array();

    $firstNames = $_GET['firstnames'];
    $midNames = $_GET['cMiddleInit'];
    $lastNames = $_GET['lastnames'];

    
    // check to see if child is there..
    // if so .. add to parentsID / Child Id
    for($i = 0; $i < $_GET['children']; $i++) {
        $res = checkChildsExistance($i, $firstNames, $lastNames);

        // This will start adding and checking the tables
        if(!empty($res)) { 
            $in = checkChildParentTable($res);
            
            // Not already connected with a parent-child
            if(empty($in)) {
                // Adds to child_parent_table if not in there..
                $sqlInsert = "INSERT INTO child_parent_table (parentid, childid) VALUES (" . $_SESSION['parentId'] . ", " . $res['0'] .")";
                pg_query($dbConn, $sqlInsert);
            }
            
            // check to see if already present
            $isPresent = checkIfPresent($res);
            
            if(empty($isPresent)) {
                // Add to check in table
                $present = "INSERT INTO currently_present (childid, confirmationcode) VALUES (" . $res['0'] . ", " . ($res['0']*7) .  " )";
                pg_query($dbConn, $present);
                echo $firstNames[$i] . " " . $lastNames[$i] . " confirmation Code: " . $res['0']*7;
            }else {
                echo "Sorry, " . $firstNames[$i] . " " . $lastNames[$i] . " is currently logged in.. <br/><br/>" ;
            }
            
         }else {
            //Store non child in database in array then add after checking through each child.
            //$noMatch['firstName'] = $firstNames[$i];
            //$noMatch['middleInit'] = $midNames[$i];
            //$noMatch['lastName'] = $lastNames[$i];
            
         }
    }

   // for($i = 0; $i < sizeof($noMatch); $i++) {
       // echo $noMatch['firstName'] . " " . $noMatch['middleInit'] . " " . $noMatch['lastName'];
    //}
	
?>