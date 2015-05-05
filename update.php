<?php
    session_start();
    require('includes/session.php');
    require('includes/connect.php');  
    require('includes/childFunctions.php');    
    $dbConn = getConnection();
    
    
    $results = getChildInformation($_GET['childId']);
    

    if(isset($_GET["submit"])) {
        $sql = "UPDATE child 
        SET firstname = $1 AND middlename = $2 AND lastname = $3
        AND foodallergies = $4 AND allergydescription = $5 AND concerns = $6 
        AND concernsdescription = $7 AND birthdate = $8 
        WHERE childid = $9";
        pg_query_params($dbConn, $sql, array($_GET['firstName'],
                                            $_GET['middleName'],
                                            $_GET['lastName'],
                                            $_GET['allergies'],
                                            $_GET['allergiesDescription'],
                                            $_GET['concerns'],
                                            $_GET['concernsDescription'],
                                            $_GET['birthday']));
        
    }
    
/*
 * To change this template use Tools | Templates.
 */
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link href="css/style.css" rel="stylesheet">
        <title>Update</title>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    
    <style>
       $('#submitButton').css('display', 'inline');
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
            <div id="header">
                <h1>Update</h1>
                <nav>
                    <a href="admindash.php">Checked In</a>
                    <a href="history.php">History</a>
                    <a href="logout.php">Logout</a>
                </nav>
                <br />
      
            </div>
            
           
                <form>
                 First Name: <input type="text" name="firstName" id="firstName" value="<?= $results['1'] ?>" required/><br /> 
                 Middle Name: <input type="text" name="middleName" id="middleName" value="<?= $results['2'] ?>" /><br />
                 Last Name: <input type="text" name="lastName" id="lastName" value="<?= $results['3'] ?>"  required/><br />
                 Food Allergies: <input type="text" name="allergies" id="allergies" placeholder="Meat" value="<?= $results['6'] ?>"  /><br />
                 Allergy Description: <textarea name="allergiesDescription" id="allergiesDescription" value="<?= $results['7'] ?>" placeholder="Can't eat meat, what a vegan." cols="50" rows="10"></textarea><br/>
                 Concerns: <input type="text" name="concerns" id="concerns" value="<?= $results['8'] ?>" placeholder="Hyper, ADHD"/><br />
                 ConcernsDescription: <textarea name="concernsDescription" id="concernsDescription" value="<?= $results['9'] ?>" placeholder="He'll Do Alot of Flips." cols="50" rows="10"></textarea><br/>
                 Birthday: <input type="text" name="birthday" id="birthday" placeholder="12-25-1969" value="<?= $results['10'] ?>" /><span id="correctFormat"></span><br />
                <input type="submit" name="submit" value="Submit" id="submitButton"/>
                </form>
            
            <div id="footer">
                
            </div>
        </div>
    </body>
    <script>
       $('#firstName').val();
       $('#lastName').val();
       $('#firstName').val();
       $('#lastName').val();
       $('#firstName').val();
       $('#lastName').val();
       $('#birthday').change(checkValid);
    </script>
</html>

    

    
    