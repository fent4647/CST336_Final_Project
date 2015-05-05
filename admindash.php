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
    $size = 0;
    if(!empty($result)) {
        foreach($result as $i) {
            $child = getChildInformation($i['childid']); // childs info
            
            $parentId = getParentFromChildParentTable($child['0']); // get parents info
            $parent = getParentInformation($parentId['0']);
            
            $kid = array();
            $kid[] = "Present";
            $kid[] = $child['1'] . " " . $child['3']; // FIRST AND LAST NAME
            $kid[] = $child['6'] . " " .  $child['7'] . " " .  $child['8']; //dem ALLERGIES, AND SUCH 
            $kid[] = $parent['1'] . " " . $parent['2']; // PARENTS FIRST AND LAST NAME
            $kid[] = $parent['3']; // dat PHONE # gurrl
            $kid[] = "<form action='update.php'>
                        <input type='submit' name='update' value='Update'>
                        <input type='hidden' name='childId' value=" . $child['0'] . ">
                    </form>";
            $kid[] = "<form action='checkout.php'>
                        <input type='submit' name='checkout' value='Checkout'>
                        <input type='hidden' name='childId' value=" . $child['0'] . ">
                        <input type='hidden' name='parentId' value=" . $parentId['0'] . ">
                     </form>";
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
                <h1>Admin Panel</h1>
                <nav>
                    <a href="admindash.php">Checked In</a>
                    <a href="history.php">History</a>
                    <a href="logout.php">Logout</a>
                </nav>
                <br />
                <table border="7"><!----------- Start Inserted table ----------->

    <?php
        if(isset($_GET['checkedout'])) {
            echo "<h5>$_GET['checkedout']</h5>";
        }
        
    //Row <->
    //Col ^|V
    /*This table Displays each Child's Informaton including: isPresent, child's Name,
     *      Allergies, Emergency contact's Name, and Emergency Contact Phone Number.
     *      This also table is formated as the following:
     *          First for loop displays the table header.
     *          Second for loop displays each of the child's information Row by Row.
     */
            $Header = ["Present", "Child Name", "Allergies", "Emergency Contact Name", "Emergency Contact Number", "Update Info", "Checkout"];
            
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