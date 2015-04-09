<?php
    getConnection() {
        $host = "";
        $dbname = "";
        $user = "";
        $pass = "";
        
        $dbConn = new PDO("mysql:host:$host;dbname:$dbname;", $user, $pass);
        
        return $dbConn;
    }
?>