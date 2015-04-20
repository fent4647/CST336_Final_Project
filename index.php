<?php
    
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Hare</title>
        <link href="css/stylesheet.css" rel="stylesheet">
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
            
            p{
                float:left;
            }
      </style>
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
                    Password: <input type="text" name="password"/><br />
                    <input type="submit" value="Login"/>
                </form>
            </div>   
            
        </div>
    </body>
</html>