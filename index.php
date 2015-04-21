<?php
    
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Heir Force</title>
        <link href="css/style.css" rel="stylesheet">
        <style>
            #wrapper {
                border: 2px solid #000;
                box-shadow: 10px 10px 5px #888888;
                background:#FFF;
                text-align:center;
                
                width:512px;
                height:128px;
                position: absolute;
                top:0;
                bottom: 0;
                left: 0;
                right: 0;

                margin: auto;
                padding-top:8px !important;
                padding:64px;
            }
            
            p {
                float:left;
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
                    Password: <input type="text" name="password"/><br />
                    <input type="submit" value="Login"/>
                </form>
            </div>   
            
        </div>
    </body>
</html>