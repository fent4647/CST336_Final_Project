<?php
    session_start();
    require('includes/session.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        
        <link href="css/style.css" rel="stylesheet"/>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <title></title>
        
        <style>
            html { 
                  background: url(img/background.jpg) no-repeat center center fixed; 
                  -webkit-background-size: cover;
                  -moz-background-size: cover;
                  -o-background-size: cover;
                  background-size: cover;
                }
            
            #wrapper {
                border: 2px solid #ffffff;
                box-shadow: 10px 10px 5px #e5e5e5;
                background:#46c8e2;
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
            
            
            a {
                text-decoration:none;
                color:#493772;
                
            }
            
            a:hover {
                color:#FF0000;
            }
            
            #adminLogin {
                display:none;
            }
            
            #hiddenButton {
                opacity:0.25;
                font-size:2em;
                float:right;
                padding:3px;
            }
            
            img {
                padding:24px;
            }
            
        </style>
        
        
    
    </head>
    
    <body onload="parentButton()">
        <div id="wrapper">
            
            <span id="operationP"></span><a href="info.php" id="parent"><img src="img/parent.png"></a>
            <span id="operationA"></span><a id="admin"><img src="img/settings.png"></a>
            <div id="adminLogin">
                <p>
                    <?php
                        if(isset($_GET['error'])) { 
                        echo $_GET['error']; 
                        }
                
                    ?>
                </p>
                <h3 id="headerTwo"></h3>
                <form action="adminLogin.php" method="post">
                    Username: <input type="text" name="username"/>
                    Password: <input type="password" name="password"/>
                    <input type="submit" value="Login"/>
                </form>
            </div>
        </div>
        
        <span id="hiddenButton">º</span>
    </body>
    
    <script>
         
        
        
         $('#hiddenButton').click(function() {
                $('#admin, #operationA, #headerTwo').css('display', 'inline');
                $('#adminLogin').slideToggle(1000);
                $('#wrapper').css('height', '512px', '!important');
         });
        
        
         $('#admin').click(function() {
             var value = confirm("Hit OK if an admin.");
             if(value) {
                 $('#adminLogin').slideToggle(1000);
             }else {
                 $('#admin, #operationA, #headerTwo, #adminLogin').css('display', 'none');
                 
             }
         });
    </script>
</html>