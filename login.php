<?php
    require('includes/connect.php');
    $dbConn = getConnection();

    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute(array(
            ":username"=>$username;
            ":password"=>$password;
    ));
    $results = $stmt->fetch();    
    

    if(empty($results)) {
        header("Location: index.php?error=WRONG USERNAME/PASSWORD");
    }else {
        header("Location: mainhome.php");
    }

?>