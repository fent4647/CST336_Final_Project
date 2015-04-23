<?php
    session_start();
    require('includes/connect.php');
    $dbConn = getConnection();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = $1 AND password = $2";
    
    $stmt = pg_query_params($dbConn, $sql, array($username, $password));
    $res = pg_fetch_row($stmt);
        
    print_r($res);
   
    
     if(empty($res)) {
        header("Location: index.php?error=WRONG USERNAME/PASSWORD");
     }else {
       header("Location: mainhome.php");
     }
    
?>