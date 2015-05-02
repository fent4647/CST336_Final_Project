<?php
    session_start();
    require('includes/session.php');
    require('includes/connect.php');
    $dbConn = getConnection();

    if(isset($_GET['submit'])) {
        $sql = "INSERT INTO parent (firstname, lastname, phonenumber, city, address) VALUES ($1, $2, $3, $4, $5)";
        pg_query_params($dbConn, $sql, array(strtolower($_GET['pFirstName']), strtolower($_GET['pLastName']), strtolower($_GET['pNumber']), strtolower($_GET['pCity']), strtolower($_GET['pAddress'])));
        header("Location: childInfo.php");
    }
?>

<!DOCTYPE HTML>
<html>
    <meta charset="UTF-8">
    <head>
        <title>Parents</title>
    </head>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/hide.js"></script>
    <script type="text/javascript" src="js/checkValid.js"></script>
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
    <body>
        <div id="wrapper">
            <form>
                 First Name: <input type="text" name="pFirstName" id="pFirstName" required/><br />
                 Last Name: <input type="text" name="pLastName" id="pLastName" required/><br />
                 Address: <input type="text" name="pAddress" id="pAddress" placeholder="555 Something Way" required/><br />
                 City: <input type="text" name="pCity" id="pCity" value="Salinas" required/><br />
                 Contact Number: <input type="text" name="pNumber" id="pNumber" placeholder="(555)555-5555" required/>
                <span id="correctFormat"></span><br />
                <input type="submit" name="submit" value="Submit" id="submitButton"/>
            </form>
      </div>
    </body>
    
    <script>
       $('#pFirstName').val(sessionStorage.getItem('parentFirstName'));
       $('#pLastName').val(sessionStorage.getItem('parentLastName'));
       $('#pNumber').change(checkValid);
    </script>
</html>