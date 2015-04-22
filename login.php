<?php
    session_start();
    require('includes/connect.php');
    $dbConn = getConnection();

    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
    $stmt = pg_query($dbConn, $sql);
    $result = pg_fetch_row($stmt);

    if(pg_field_is_null($result)) {
        header("Location: index.php?error=WRONG USERNAME/PASSWORD");
    }else {
       header("Location: mainhome.php");
    }

?>