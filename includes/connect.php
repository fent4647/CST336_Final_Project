<?php
    function getConnection() {
       
        $host = "heroku-postgres-25563edd.herokuapp.com"; 
        $user = "mfenton@csumb.edu"; 
        $pass = "fent4647"; 
        $db = "heroku-postgres-25563edd"; 

        $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
         or die ("Could not connect to server\n"); 

        $query = "SELECT VERSION()"; 
        $rs = pg_query($con, $query) or die("Cannot execute query: $query\n"); 
        $row = pg_fetch_row($rs);

        echo $row[0] . "\n";
    
        return $con;
        
    }
?>