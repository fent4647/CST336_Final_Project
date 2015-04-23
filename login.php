<?php
    session_start();
    require('includes/connect.php');
    $dbConn = getConnection();

    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
    $namedParams = array();
    $namedParams[':username'] = $_POST['username'];
    $namedParams[':password'] = $_POST['password'];
    $stmt = pg_query_params($dbConn, $sql, $namedParams);
    $result = pg_fetch_row($stmt);
    print_r($result);
        
   /*     
    if(pg_field_is_null($result)) {
        header("Location: index.php?error=WRONG USERNAME/PASSWORD");
    }else {
       header("Location: mainhome.php");
    }
*/
?>