<?php
    
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title></title>
        <link href="css/stylesheet.css" rel="stylesheet"/>
    </head>
    
    <body>
        <p>
            <?php
                if(isset($_GET['error'])) { 
                    echo $_GET['error']; 
                }
                
            ?>
        </p>
        
        <form action="login.php" method="post">
            Username: <input type="text" name="username"/>
            Password: <input type="text" name="password"/>
            <input type="submit" value="Login"/>
        </form>
    </body>
</html>