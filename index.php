<?php
    
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Heir Force</title>
        <link href="css/style.css" rel="stylesheet">
        <style>
            html { 
                  background: url(img/background.jpg) no-repeat center center fixed; 
                  -webkit-background-size: cover;
                  -moz-background-size: cover;
                  -o-background-size: cover;
                  background-size: cover;
                }
           
            #linkSwitch {
                color:#FF0000;
            }
      </style>
    </head>
    
    <body>
        <div id="wrapper">
            <div id="header"><h1>Welcome To Heir Force</h1></div>
        
            <div id="loginForm">
                <p id="linkSwitch">
                    <?php
                        if(isset($_GET['error'])) { 
                            echo $_GET['error']; 
                        }else if(isset($_GET['logout'])) {
                            echo $_GET['logout'];     
                        }
                
                    ?>
                </p>
                <form action="login.php" method="post">
                    Username: <input type="text" name="username"/><br />
                    Password: <input type="password" name="password"/><br />
                    <input type="submit" value="Login"/>
                </form>
            </div>   
            
        </div>
    </body>
</html>