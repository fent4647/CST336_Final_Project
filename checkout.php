<?php
    session_start();
    require('includes/session.php');
    require('includes/connect.php');  
    require('includes/childFunctions.php');    
    $dbConn = getConnection();
    

    if(isset($_GET["submit"])) {
        $val = getChildsCode(getChildInformation($_GET['childId']));
        if($_GET['code'] == $val['0']) {
            //REMOVE FROM CHILD_PARENT_TABLE
            $sql = "DELETE FROM child_parent_table WHERE childid = $1";
            pg_query_params($dbConn, $sql, array($_GET['childId']));
        
            //REMOVE FROM CURRENT_PRESENT TABLE
            $sql = "DELETE FROM currently_present WHERE childid = $1";
            pg_query_params($dbConn, $sql, array($_GET['childId']));
            header("Location: admindash.php?checkedout=Checked Out Successful!");
        }else { 
            echo "Sorry, that is not the correct Confirmation Code..";
        }
    }

    
    $results = getChildInformation($_GET['childId']);
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link href="css/style.css" rel="stylesheet">
        <title>Checkout</title>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <h1>Checkout</h1>
                <nav>
                    <a href="admindash.php">Checked In</a>
                    <a href="history.php">History</a>
                    <a href="logout.php">Logout</a>
                </nav>
                <br />
           
            </div>
            
            <form>
                 <input type="hidden" name="childId" value="<?= $results['0'] ?>" />
                 <span><?= $results['1'] ?> <?= $results['3'] ?></span><br /> 
                 Confirmation Code: <input type="number" min="1" name="code" require/>
                <input type="submit" name="submit" value="Submit" id="submitButton"/>
                </form>
            
            <div id="footer">
                
            </div>
        </div>
    </body>
</html>