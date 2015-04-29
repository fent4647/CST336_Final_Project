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