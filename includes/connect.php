<?php
    function getConnection() {
        
        $host = "just132.justhost.com"; //"69.195.126.106"; //
        $dbname = "saymtfco_heirforce";
        $user = "saymtfco_cg";
        $pass = "01234cg";
        
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $dbConn;
        
    }
?>