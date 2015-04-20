<?php
    
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Hare</title>
        <link href="css/stylesheet.css" rel="stylesheet">
        
    </head>
    
    <body>
        <div id="wrapper">
            <div id="header"><h1>Welcome To HareSomthing</h1></div>
        
            <p>Please Login...</p>
            
            <div id="loginForm">
                <p>
                    <?php
                        if(isset($_GET['error'])) { 
                        echo $_GET['error']; 
                        }
                
                    ?>
                </p>
                <form action="login.php" method="post">
                    Username: <input type="text" name="username"/><br />
                    Password: <input type="text" name="password"/>
                    <input type="submit" value="Login"/>
                </form>
            </div>   
            
        </div>
    </body>
</html>