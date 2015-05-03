<?php
    session_start();
    require('includes/session.php');
    require('includes/connect.php');    
    $dbConn = getConnection();

    $sql = "SELECT * FROM currently_present";
    $stmt = pg_query($dbConn, $sql);
    $result = pg_fetch_all($stmt);
    
    if(!empty($result)) {
        echo sizeof($result);
       // for($i = 0; $i < sizeof($result); $i++) {
       //     $result['childId'] . " " . $result['confirmationCode'] . " " . $result['datePresent'];
       // }
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
            $kid0 = ["true", "Child1", "None", "Parent1" , "(831)555-6541"];
            $kid1 = ["true", "Child2", "Yogurt", "Parent7" , "(831)555-8841"];
            $kid2 = ["true", "Child3", "Air", "Parent44" , "(831)555-3458"];
            $kid3 = ["true", "Child4", "Water", "Parent0" , "(831)555-9722"];
            $kid4 = ["true", "Child5", "Falling", "Yo' Parent" , "(831)555-1628"];
            $Data = [$kid0, $kid1, $kid2, $kid3 , $kid4];
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