<?php
    session_start();
    require('includes/session.php');
    require('includes/connect.php');
    $dbConn = getConnection();

    if(isset($_GET['submit'])) {
        $sql = "INSERT INTO child (firstname, lastname, middlename, concerns, birthdate) VALUES ($1, $2, $3, $4, $5)";
        //pg_query_params($dbConn, $sql, array(strtolower($_GET['cFirstName']), strtolower($_GET['cLastName']), strtolower($_GET['cMiddleInit']), strtolower($_GET['cConcerns']), $_GET['cBirthday']));
        //header("Location: childInfo.php");
    }
?>

<!DOCTYPE HTML>
<html>
    <meta charset="UTF-8">
    <head>
        <title>Child</title>
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
            var $num = $('#cBirthday').val();
            if(!/^\d{2}-\d{2}-\d{4}$/.test($num)) {
                $('#correctFormat').html('Please enter the correct format. 12-01-1969');
                $('#correctFormat').css('color', '#FF0000');
                $('#cBirthday').focus();
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
                 First Name: <input type="text" name="cFirstName" id="cFirstName" required/><br />
                 Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                 Last Name: <input type="text" name="cLastName" id="cLastName" required/><br />
                 Concerns: <input type="text" name="cConcerns" id="cConcerns" placeholder="" required/><br />
                 Birthday: <input type="text" name="cBirthday" id="cBirthday" placeholder="##-##-####" required/><br />
                 <span id="correctFormat"></span><br />
                <input type="submit" name="submit" value="Submit" id="submitButton"/>
            </form>
      </div>
    </body>
    
    <script>
       $('#pFirstName').val(sessionStorage.getItem('childFirstName'));
       $('#pLastName').val(sessionStorage.getItem('childLastName'));
       $('#cBirthday').change(checkValid);
    </script>
</html>