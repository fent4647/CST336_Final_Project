<?php
    function getConnection() {
        $host = "mlc104.csumb.edu";
        $dbname = "airforce";
        $user = "root";
        $pass = "s3cr3t";
        
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $dbConn;
    }
?>