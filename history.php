<?php
    session_start();
    require('includes/session.php');
    require('includes/connect.php');  
    require('includes/childFunctions.php');    
    $dbConn = getConnection();

    $sql = "SELECT * FROM history";
    $stmt = pg_query($dbConn, $sql);
    $result = pg_fetch_all($stmt);
    $Data = array();
    $size = 0;
    if(!empty($result)) {
        foreach($result as $i) {
            $child = getChildInformation($i['childid']); //child's info
            
            $kid = array();
            $kid[] = $child['1'] . " " . $child['3'];
            $kid[] = $i['confirmationcode'];
            $kid[] = $i['datepresent'];
            $Data[] = $kid;
            
            $size++;        
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
                <h1>History Panel</h1>
                <nav>
                    <a href="admindash.php">Checked In</a> 
                    <a href="history.php">History</a> 
                    <a href="logout.php">Logout</a>
                </nav>
                <br />
                <table border="7"><!----------- Start Inserted table ----------->

    <?php
    //Row <->
    //Col ^|V
    /*This table Displays the history of all the childern that have gone to the program
     *      This also table is formated as the following:
     *          First for loop displays the table header.
     *          Second for loop displays each of the child's information Row by Row.
     */
            $Header = ["Child Name", "Confirmation Code", "Date Present"];
            
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