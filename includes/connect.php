<?php
    function getConnection() {
        
        $host = "heroku-postgres-25563edd.herokuapp.com"; //"69.195.126.106"; //
        $dbname = "heroku-postgres-25563edd";
        $user = "mfenton@csumb.edu";
        $pass = "fent4647";
        
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $dbConn;
        
    }
?>