<?php
    //require('includes/session.php');
    require('includes/connect.php');
    session_start();

    $dbConn = getConnection();

    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
    $stmt = pg_query($dbConn, $sql);
    $results = pg_fetch_row($stmt);

    if(pg_field_is_null($results)) {
        header("Location: mainhome.php?error=ADMIN LOGIN FAILED");
    }else {
        $_SESSION['username'] = $results['username'];
        $_SESSION['name'] = $results['first_name'] . " " . $results['last_name'];
        
        header("Location: admindash.php");
    }
?>