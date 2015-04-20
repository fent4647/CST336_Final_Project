<?php
    //require('includes/session.php');
    session_start();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        
        <link href="css/stylesheet.css" rel="stylesheet"/>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <title></title>
        
        <style>
            
            #wrapper {
                 border: 2px solid #000;
                box-shadow: 10px 10px 5px #888888;
                background:#FFF;
                text-align:center;
                
                width:512px;
                height:72px;
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
            
        </style>
        
        
        <script>
            function parentButton() {
                document.getElementById('parent').innerHTML = "Parent";
            }
            
            
        </script>
    
    </head>
    
    <body onload="parentButton()">
        <div id="wrapper">
            
            <span id="operationP"></span><a href="parentLogin.php" id="parent"></a>
            <span id="operationA"></span><a id="admin">Admin</a>
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
                    Password: <input type="text" name="password"/>
                    <input type="submit" value="Login"/>
                </form>
            </div>
        </div>
        
        <span id="hiddenButton">º</span>
    </body>
    
    <script>
         $("#operationP").html("Is this a ");  
         $("#operationA").html("or an "); 
         $('#headerTwo').html('Admin Login');
        
        
         $('#hiddenButton').click(function() {
                $('#admin, #operationA, #headerTwo').css('display', 'inline');
                $('#adminLogin').slideToggle(1000);
             //   $("#operationP").html("Login as ");   FIX
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