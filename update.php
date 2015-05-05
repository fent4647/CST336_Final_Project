<?php
// This is the ADMIN DASH UPDATE V2.0 
// This page displays The current child checked in. 
// Allows user to update their information if needed..

/* Requirements */
    session_start();
    require('includes/session.php');
    require('includes/connect.php');  
    require('includes/childFunctions.php');    
    $dbConn = getConnection();
/* Requirements */
    

     if(isset($_GET["submit"])) {
         
        $sql = "UPDATE child 
        SET (firstname, middlename, lastname, foodallergies, allergydescription, concerns, concernsdescription, birthdate)
        = ($1, $2, $3, $4, $5, $6, $7, $8)
        WHERE childid = $9";
         
        pg_query_params($dbConn, $sql, array($_GET['firstName'],
                                            $_GET['middleName'],
                                            $_GET['lastName'],
                                            $_GET['allergies'],
                                            $_GET['allergiesDescription'],
                                            $_GET['concerns'],
                                            $_GET['concernsDescription'],
                                            $_GET['birthday'],
                                            $_GET['childId']));
       header("Location: admindash.php?updated=Update Completed!");
    }

    $results = getChildInformation($_GET['childId']);

?>

<!DOCTYPE HTML>
<html>
    <head>
        
        <meta charset="UTF-8"/>
        <title>Admin Dash</title>
        <link href="css/main_stylesheet.css" rel="stylesheet" />
        <link href="css/admindash_stylesheet.css" rel="stylesheet" />
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
        
    
        <script>
            
            function submitButton(val) {
                
                if(val) { $('#submitButton').css('display', 'inline'); }
                else { $('#submitButton').css('display', 'none'); }
                
            }
        
            function checkValid() {
                var $num = $('#birthday').val();
                
                if(!/^\d{2}-\d{2}-\d{4}$/.test($num)) {
                
                    $('#correctFormat').html('Please enter the correct format. 12-25-1969');
                    $('#correctFormat').css('color', '#FF0000');
                    $('#birthday').focus();
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
            
            <div id="header">
                
                <h1 id="heading_panel">Admin Panel</h1>
                   
                <nav id="navigation_panel">
                        
                    <a href="mainhome.php">Main Home</a>
                    <a href="admindash.php">Checked In</a>
                    <a href="history.php">History</a>
                    <a href="includes/logout.php">Logout</a>
                        
                </nav>
                
            </div> <!-- HEADER -->
            
            <div id="form">
               
                <form>
                 
                    <input type="hidden" name="childId" value="<?= $results['0'] ?>" />
                
                    First Name: <input type="text" name="firstName" id="firstName" value="<?= $results['1'] ?>" required/><br /> 
                    Middle Name: <input type="text" name="middleName" id="middleName" value="<?= $results['2'] ?>" /><br />
                    Last Name: <input type="text" name="lastName" id="lastName" value="<?= $results['3'] ?>"  required/><br />
                    Food Allergies: <input type="number" name="allergies" id="allergies" placeholder="1 for YES, 0 for NO" min="0" max="1" value="<?= $results['6'] ?>"  /><br />
                    Allergy Description: <input name="allergiesDescription" id="allergiesDescription" value="<?= $results['7'] ?>" placeholder="Can't eat meat, what a vegan." cols="50" rows="10"><br/>
                    Concerns: <input type="number" name="concerns" id="concerns" value="<?= $results['8'] ?>" min="0" max="1" placeholder="1 for YES, 0 for NO"/><br />
                    ConcernsDescription: <input name="concernsDescription" id="concernsDescription" value="<?= $results['9'] ?>" placeholder="He'll Do Alot of Flips." cols="50" rows="10"><br/>
                    Birthday: <input type="text" name="birthday" id="birthday" placeholder="12-25-1969" value="<?= $results['10'] ?>" /><span id="correctFormat"></span><br />
                
                    <input class='mysubmitbutton' type="submit" name="submit" value="Submit" id="submitButton"/>
                
                </form>
               
            </div> <!-- FORM -->
            
        </div> <!-- WRAPPER -->
        
    </body>
    
    <script> 
        
        $('#birthday').change(checkValid); 
        
        // Check to see if their empty..if so add 0 
        if($('#allergies').val() == '') { $('#allergies').val("0"); }
        if($('#concerns').val() == '') { $('#concerns').val("0"); }
        
    </script>
    
</html>

    

    
    