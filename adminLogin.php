<?php
    //require('includes/session.php');
    require('includes/connect.php');
    session_start();

    $dbConn = getConnection();

    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute(array(
            ":username"=>$username,
            ":password"=>$password
    ));
    $results = $stmt->fetch();    
    

    if(empty($results)) {
        header("Location: mainhome.php");
    }else {
        $_SESSION['username'] = $results['username'];
        $_SESSION['name'] = $results['first_name'] . " " . $results['last_name'];
        
        header("Location: admindash.php");
    }
?>