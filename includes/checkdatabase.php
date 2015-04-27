<?php
/*
 *  CheckDB: checks to see if the parents information entered is already inside
 * the database. 
 * 
 * Returns: Boolean, True if already inside the database, Otherwise False 
 *
 */
    function checkDB($dbCon) {
        $sql = "SELECT * FROM WHERE firstname = firstname AND lastname = lastname";
        pg_query_params($dbConn);
    }
?>