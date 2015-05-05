<?php

// CONNECTION TO DATABASE
    function getConnection() {
       
        $host = "ec2-107-22-161-155.compute-1.amazonaws.com"; 
        $user = "sfxistwrxroeeu"; 
        $pass = "kqoZQ6lfHoy9NXDo0vj3YHauoU"; 
        $db = "d73kadsn4uujk8"; 

    
        $dbConn = pg_connect("host=$host dbname=$db user=$user password=$pass")
         or die ("Could not connect to server\n"); 
       
       /*
        $query = "SELECT VERSION()"; 
        $rs = pg_query($con, $query) or die("Cannot execute query: $query\n"); 
        $row = pg_fetch_row($rs);

        echo $row[0] . "\n";
        /*
        
        return $con;
        */ 
        /*
        $host = "173.254.28.132";
		$dbname = "saymtfco_heirforce";
		$username = "saymtfco_cg";
		$password = "01234cg";
	
		//$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		//$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
        
        try {
            $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, array(
                PDO::ATTR_TIMEOUT => "Specify your time here",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));
         echo 'Connected to database';
        }
        catch(PDOException $e)
        {
        echo "ERROR " . $e->getMessage();
        }
    */
        
        return $dbConn;
    }
?>