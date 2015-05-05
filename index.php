<?php
    //Project Made By:
    //Thane Fenton (@saymtfmtfmtf)
    //Maritza Abzun
    //Caeser Gavilan
    //Dale ..
    //
    //This is the Index Page
    //
    //Finished 5/6/2015
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Heir Force</title>
        <link href="css/main_stylesheet.css" rel="stylesheet" />
        <link href="css/homepage_stylesheet.css" rel="stylesheet" />
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        
        <style>
            
            html { 
                  background: url(img/background.jpg) no-repeat center center fixed; 
                  -webkit-background-size: cover;
                  -moz-background-size: cover;
                  -o-background-size: cover;
                  background-size: cover;
            }
            
      </style>
        
        
    </head>
    
    <body>
        
        <div id="wrapper">
            
            <div id="header">
                
                <h1 id="title">Welcome To Heir Force</h1>
                <h3 id="login_header">Click Here To Login</h3>
                
            </div>
            
            
            <p id="link_switch">
                    
                    <?php
                        
                        if(isset($_GET['error'])) {  echo $_GET['error'];  }
                        else if(isset($_GET['logout'])) { echo $_GET['logout']; }
                
                    ?>
                    
            </p>
            
            <div id="login_form">
                
               <div id="form">

                    <form action="login.php" method="post">
                    
                        <span>Username: <input type="text" name="username"/></span>
                        <span>Password: <input type="password" name="password"/></span>
                        <span><input class="mysubmitbutton" type="submit" value="Login"/></span>
                    
                    </form>
                 
                </div> <!-- FORM -->
                
            </div> <!-- LOGIN FORM -->
         
        </div> <!-- WRAPPER -->
        
    </body>
    
    <script>
        $('#login_header').click(function(){
            $('#link_switch').css('display', 'none');
            $('#login_form').slideToggle();  
        });
    </script>
</html>