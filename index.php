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
            #information {
                width: 800px;
                margin: auto;
                background: white;
                padding: 20px;
                border-radius: 10px;
                border:4px solid black;
               }
            img {
                border-radius: 10px;
            }
            
      </style>
        
        
    </head>
    
    <body>
        <br /> <br />
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
        <br /> <br /> <br />
        <div id="information">
            
            <p align="center">Heir Force is a cool, vibrant, action-packed children's ministry. We create a warm, 
                friendly environment for children between ages 5-12. We present the word of God through 
                multimedia praise and worship,interactive puppet skits and fun activities . As Jesus said 
                "forsake not the little children from coming" Luke 18:16</p>
            
            <table align="center">
                <tr><td><img src="img/IMG_0039.jpg" alt="Sunday School" width="350px" border=7></td>
                    <td><img src="img/IMG_0041.jpg" alt="Sunday School" width="350px" border=7></td>
                </tr>
                <tr><td><img src="img/IMG_0045.jpg" alt="Sunday School" width="350px" border=7></td>
                    <td><img src="img/IMG_0047.jpg" alt="Sunday School" width="350px" border=7></td></tr>
            </table>
            
        </div>
    </body>
    
    <script>
        $('#login_header').click(function(){
            $('#link_switch').css('display', 'none');
            $('#login_form').slideToggle();  
        });
    </script>
</html>