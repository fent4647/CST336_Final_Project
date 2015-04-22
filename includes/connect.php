<?php
    function getConnection() {
       
        $host = "ec2-107-22-161-155.compute-1.amazonaws.com"; 
        $user = "sfxistwrxroeeu"; 
        $pass = "kqoZQ6lfHoy9NXDo0vj3YHauoU"; 
        $db = "d73kadsn4uujk8"; 

        $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
         or die ("Could not connect to server\n"); 
       
        /*
        $query = "SELECT VERSION()"; 
        $rs = pg_query($con, $query) or die("Cannot execute query: $query\n"); 
        $row = pg_fetch_row($rs);

        echo $row[0] . "\n";
        */ 
        
        return $con;
        
    }
?>