<?php
// This is the ADMIN DASH
// This page displays all the childrens information that is currently clocked in.

/* Requirements */
    session_start();
    require('includes/session.php');
    require('includes/connect.php');  
    require('includes/childFunctions.php');    
    $dbConn = getConnection();
/* Requirements */
  
    $sql = "SELECT * FROM currently_present";
    $stmt = pg_query($dbConn, $sql);
    $result = pg_fetch_all($stmt);
       

    $Data = array();
    $size = 0;

    if(!empty($result)) {
        
        foreach($result as $i) {
            
            $child = getChildInformation($i['childid']); // childs info
            
            $parentId = getParentFromChildParentTable($child['0']); // get parents id
            $parent = getParentInformation($parentId['0']); // get parents info
            
            $kid = array(); // temp
            
            // Hey..Add to Array to display..Yay
            
            $kid[] = "Present";
            $kid[] = $child['1'] . " " . $child['3']; // FIRST AND LAST NAME
            $kid[] = $child['6'] . " " .  $child['7'] . " " .  $child['8']; //dem ALLERGIES, AND SUCH 
            $kid[] = $parent['1'] . " " . $parent['2']; // PARENTS FIRST AND LAST NAME
            $kid[] = $parent['3']; // dat PHONE # gurrl
            
            // Creating Form Buttons..
            $kid[] = "<form action='update.php'>
                        <input class='mysubmitbutton' type='submit' name='update' value='Update'>
                        <input type='hidden' name='childId' value=" . $child['0'] . ">
                    </form>";
            
            $kid[] = "<form action='checkout.php'>
                        <input class='mysubmitbutton' type='submit' name='checkout' value='Checkout'>
                        <input type='hidden' name='childId' value=" . $child['0'] . ">
                        <input type='hidden' name='parentId' value=" . $parentId['0'] . ">
                     </form>";
            
            // Add to the real array
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
                
                <!--
                <div id="sorting_buttons">
                    
                    <span>Sort By: </span>
                    <input class="mysubmitbutton" type="submit" id="byLastName" name="byLastName" value="Last Name" />
                    <input class="mysubmitbutton" type="submit" id="byFirstName" name="byFirstName" value="First Name" />
                    <input class="mysubmitbutton" type="submit" id="byContactName" name="byContactName" value="Contact Name" />
                    
                </div> <!-- SORTING_BUTTONS -->
                
            </div> <!-- HEADER -->
            
            
            <div id="data_table">

                <!----------- Start Inserted table ----------->
            
                <table border="7">
                
                    <?php
                    
                        if(isset($_GET['checkedout'])) { echo "<h5>" . $_GET['checkedout'] . "</h5>"; }
                        else if(isset($_GET['updated'])) { echo "<h5>" . $_GET['updated'] . "</h5>"; }
                        /*This table Displays each Child's Informaton including: isPresent, child's Name,
                            *      Allergies, Emergency contact's Name, and Emergency Contact Phone Number.
                            *      This also table is formated as the following:
                            *          First for loop displays the table header.
                            *          Second for loop displays each of the child's information Row by Row.
                        */
                        $Header = ["Present", "Child Name", "Allergies", "Emergency Contact Name", "Emergency Contact Number", "Update Info", "Checkout"];
            
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
    
    <script>
        
    </script>
    
</html>