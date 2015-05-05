<?php
// This is the NEW PARENT Page
// This allows the parent to create an account to check in a child

/* Requirements */
    session_start();
    require('includes/session.php');
    require('includes/connect.php');  
    require('includes/childFunctions.php');    
    $dbConn = getConnection();
/* Requirements */

    if(isset($_GET['submit'])) {
        
        $sql = "INSERT INTO parent (firstname, lastname, phonenumber, city, address) VALUES ($1, $2, $3, $4, $5)";
        
        pg_query_params($dbConn, $sql, array(strtolower($_GET['pFirstName']), strtolower($_GET['pLastName']),
                                             strtolower($_GET['pNumber']), strtolower($_GET['pCity']),
                                             strtolower($_GET['pAddress'])));
        
        header("Location: info.php?parentMade=Parent Has Been Created&firstname='" 
               . $_GET['pFirstName'] . "'&lastname= '" . $_GET['pLastName'] . "'");
        
    }

?>

<!DOCTYPE HTML>
<html>
    <head>
        
        <meta charset="UTF-8">
        <title>Create Parent</title>
        <link href="css/main_stylesheet.css" rel="stylesheet" />
        <link href="css/createparent_stylesheet.css" rel="stylesheet" />
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="js/hide.js"></script>
        <script type="text/javascript" src="js/checkValid.js"></script>
        <script src="js/external/jquery/jquery.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        
        <style>
            
            html { 
                  background: url(img/background.jpg) no-repeat center center fixed; 
                  -webkit-background-size: cover;
                  -moz-background-size: cover;
                  -o-background-size: cover;
                  background-size: cover;
            }
            
        </style>
        
    
        <script>
        
            function submitButton(val) {
                
                if(val) { $('#submitButton').css('display', 'inline'); }
                else { $('#submitButton').css('display', 'none'); }
                
            }
        
            
            function checkValid() {
                
                var $num = $('#pNumber').val();
                
                if(!/^\(\d{3}\)\d{3}-\d{4}$/.test($num)) {
                    
                    $('#correctFormat').html('Please enter the correct format. (555)555-5555');
                    $('#correctFormat').css('color', '#FF0000');
                    $('#pNumber').focus();
                    submitButton(false);
                    
                }else {
                    
                    $('#correctFormat').empty();
                    submitButton(true);
                    
                }
                
            }
            
        </script>
        
    </head>
    
    <body>
        
        <div id="wrapper">
            
            <div id="header"> <h1 id="heading">Create New Parent</h1> </div>
            
            <a href="info.php"><img style="float:left" src="img/back.png" alt="Back Button"/></a>
            
            <div id="form">
            
                <form>
                
                    First Name: <input type="text" name="pFirstName" id="pFirstName" required/><br />
                    Last Name: <input type="text" name="pLastName" id="pLastName" required/><br />
                    Address: <input type="text" name="pAddress" id="pAddress" placeholder="555 Something Way" required/><br />
                    City: <input type="text" name="pCity" id="pCity" value="Salinas" required/><br />
                    Contact Number: <input type="text" name="pNumber" id="pNumber" placeholder="(555)555-5555" required/>
                    <span id="correctFormat"></span><br />
                
                    <input class="mysubmitbutton" type="submit" name="submit" value="Submit" id="submitButton"/>
                
                </form>
            
            </div><!-- FORM -->
            
      </div> <!-- WRAPPER -->
        
    </body>
    
    <script>
       
       $('#form').slideToggle(4000, "easeOutBounce");
       $('#pFirstName').val(sessionStorage.getItem('parentFirstName'));
       $('#pLastName').val(sessionStorage.getItem('parentLastName'));
       $('#pNumber').change(checkValid);
        
    </script>
    
</html>