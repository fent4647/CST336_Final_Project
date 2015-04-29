<?php
    session_start();
    //require('includes/session.php');
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
            $kid1 = ["true", "Child1", "None", "Parent1" , "(831)555-6541"];
            $kid2 = ["true", "Child2", "Yogurt", "Parent7" , "(831)555-8841"];
            $kid3 = ["true", "Child3", "Air", "Parent44" , "(831)555-3458"];
            $kid4 = ["true", "Child4", "Water", "Parent0" , "(831)555-9722"];
            $kid5 = ["true", "Child5", "Falling", "Yo' Parent" , "(831)555-1628"];
            $Data = [$kid1, $kid2, $kid3, $kid4 , $kid5];
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
                <!--
                <table border = '7'><!----------- Start Inserted table -----------
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
        $Data = ["true", "Child1", "None", "Parent1" , "(831)555-1754"];

    foreach ($Header as $header){
            echo "<td>";
            echo $header;
            echo "</td>";
        }//closes foreach Loop */
//====================================================================
echo"<tr>";
        foreach ($Data as $data){
            echo "<td>";
            echo $data;
            echo "</td>";
        }//closes foreach Loop *///
echo"</tr>";

    ?>

        </table><!-----------End  Inserted table ------------------------------->
            </div>
            
            <div id="footer">
                
            </div>
        </div>
    </body>
</html>