<?php
// This is the ADMIN DASH HISTOTRY PAGE
// This page displays all the childrens information that has clocked in.

/* Requirements */
    session_start();
    require('includes/session.php');
    require('includes/connect.php');  
    require('includes/childFunctions.php');    
    $dbConn = getConnection();
/* Requirements */

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
        
        <meta charset="UTF-8"/>
        <title>Admin Dash</title>
        <link href="css/main_stylesheet.css" rel="stylesheet" />
        <link href="css/admindash_stylesheet.css" rel="stylesheet" />
        
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        
        <style>
            
            html { 
                  background: url(img/background.jpg) no-repeat center center fixed; 
                  -webkit-background-size: cover;
                  -moz-background-size: cover;
                  -o-background-size: cover;
                  background-size: cover;
            }
            
            #data_table { 
                width:328px;
                margin:auto;
            }
            
        </style>
        
    </head>
    
    <body>
        
        <div id="wrapper">
            
            <div id="header">
                
                <h1 id="heading_panel">Admin Panel</h1>
                   
                <nav id="navigation_panel">
                        
                    <a href="mainhome.php">Main Home</a>
                    <a href="admindash.php">Checked In</a>
                    <a href="history.php">History</a>
                    <a href="includes/logout.php">Logout</a>
                        
                </nav>
                
            </div> <!-- HEADER -->
            
            
            <div id="data_table">

                <!----------- Start Inserted table ----------->
            
                <table border="7">
                
                    <?php
                    
                        if(isset($_GET['checkedout'])) { echo "<h5>" . $_GET['checkedout'] . "</h5>"; }
        
                        /*This table Displays each Child's Informaton including: isPresent, child's Name,
                            *      Allergies, Emergency contact's Name, and Emergency Contact Phone Number.
                            *      This also table is formated as the following:
                            *          First for loop displays the table header.
                            *          Second for loop displays each of the child's information Row by Row.
                        */
                        $Header = ["Child Name", "Confirmation Code", "Date Present"];
            
                        foreach ($Header as $header) {
                            
                            echo "<td>";
                            echo $header;
                            echo "</td>";
                            
                        }//closes foreach Loop */
    
                    //====================================================================
                    //
                        if(sizeof($Data) > 0) {
                            
                            foreach ($Data as $data) {   
                                
                                echo"<tr>";
                                
                                foreach($data as $kid){
                                    
                                    echo "<td>";
                                    echo $kid;
                                    echo "</td>" ;  
                                    
                                }
                                
                                echo"</tr>";
                                
                            }//closes foreach Loop *///
                        }else {
                            
                            echo "<tr>";
                            echo "<td  colspan='7' style='color:#FF0000; font-size:3em;' >";
                            echo "Currently, no one is checked in.";
                            echo "</td>";
                            echo "</tr>";
                            
                        }
    
                    ?>

                </table>
            
                <!-----------End  Inserted table ------------------------------->
           
            </div> <!-- Data Table -->
            
        </div> <!-- WRAPPER -->
        
    </body>
</html>