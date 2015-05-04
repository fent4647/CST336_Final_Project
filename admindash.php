<?php
    session_start();
    require('includes/session.php');
    require('includes/connect.php');  
    require('includes/childFunctions.php');    
    $dbConn = getConnection();

    $sql = "SELECT * FROM currently_present";
    $stmt = pg_query($dbConn, $sql);
    $result = pg_fetch_all($stmt);
    $Data = array();

    if(!empty($result)) {
        foreach($result as $i) {
            $child = getChildInformation($i['0']); // childs info
            $cpTable = checkChildParentTable($i); // get parents info
            
            $parent = getParentInformation($cpTable['0']);
            
            $kid = array();
            $kid[] = "Present";
            $kid[] = $child['1'] . " " . $child['3'];
            $kid[] = $child['6'] . " " .  $child['7'] . " " .  $child['8'];
            $kid[] = $parent['1'] . " " . $parent['2'];
            $kid[] = $parent['3'];
            $Data[] = $kid;  
          
            
        }
    }
    
    
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link href="css/style.css" rel="stylesheet">
        <title></title>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <h1>Admin Panel</h1>
                <nav>
                    <a href="">Main</a>
                    <a href="">Checked In</a>
                    <a href="">Checkout</a>
                    <a href="logout.php">Logout</a>
                </nav>
                <br />
                <table border="7"><!----------- Start Inserted table ----------->

    <?php
    //Row <->
    //Col ^|V
    /*This table Displays each Child's Informaton including: isPresent, child's Name,
     *      Allergies, Emergency contact's Name, and Emergency Contact Phone Number.
     *      This also table is formated as the following:
     *          First for loop displays the table header.
     *          Second for loop displays each of the child's information Row by Row.
     */
            $Header = ["Present", "Child Name", "Allergies", "Emergency Contact Name", "Emergency Contact Number"];
            
            //$i = 0;
      foreach ($Header as $header){

          echo "<td>";
          echo $header;
          echo "</td>";
          }//closes foreach Loop */
    //====================================================================
    
    foreach ($Data as $data){    
        echo"<tr>";
        //echo "<td>";
        foreach($data as $kid){
            echo "<td>";
            echo $kid;
            echo "</td>" ;  
        }
        /*for($i = 0; $i < $header; $i++){
            echo "<td>";
            echo $data[$i];
            echo "</td>" ;   
        } //*/
        //echo $data[$1];
        //echo "</td>";
        echo"</tr>";
    }//closes foreach Loop *///
    

        ?>

        </table><!-----------End  Inserted table ------------------------------->
                
            </div>
            
            
            <div id="body">
                <br />

            </div>
            
            <div id="footer">
                
            </div>
        </div>
    </body>
</html>