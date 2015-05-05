<?php
// This is the CHILD Page
// This page puts the childrens information in the database
// lets the user put in the confirmationCode 

/* Requirements */
    session_start();
    require('includes/session.php');
    require('includes/connect.php');  
    require('includes/childFunctions.php');    
    $dbConn = getConnection();
/* Requirements */


    $checkNames = array();
    $noMatch = array();
    
    $notFound = false;
    $firstNames = $_GET['firstnames'];
    $lastNames = $_GET['lastnames'];
    $childId = -1;
    
    // check to see if child is there..
    // if so .. add to parentsID / Child Id
    for($i = 0; $i < $_GET['children']; $i++) {
        
        $res = checkChildsExistance($i, $firstNames, $lastNames);
        $childId = $res['0'];
        
        // Add child if not in the CHILD table
        if(empty($res)) {
            
            $sqlAddChild = "INSERT INTO child (firstname, lastname) VALUES ('" . $firstNames[$i] . "', '" . $lastNames[$i] ."')";
            pg_query($dbConn, $sqlAddChild); 
            
            $res = checkChildsExistance($i, $firstNames, $lastNames);
            $childId = $res['0'];
            
        }
        
        // This will start adding and checking the tables
        if(isset($res)) { 
            
            $in = checkChildParentTable($res);
            
            // Not already connected with a parent-child
            if(empty($in)) {
                
                // Adds to child_parent_table if not in there..
                $sqlInsert = "INSERT INTO child_parent_table (parentid, childid) VALUES ($1, $2)";
                pg_query_params($dbConn, $sqlInsert, array($_SESSION['parentId'], $res['0']));
                
            }
            
        }
    }
    
?>

<!DOCTYPE HTML>
<html>
    <head>
        
        <meta charset="UTF-8"/>
        <title>Child Information</title>
        <link href="css/main_stylesheet.css" rel="stylesheet" />
        <link href="css/child_stylesheet.css" rel="stylesheet" />
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
       
        <script>
        
            function checkValid() {
                
                $.ajax({
                type: "get",
                url: "includes/confirmationCodes.php",
                dataType: "json",
                data: {"code": $('#code').val()},
                success: function(data, status) {
                    
                    if(!data['free']) {
                        $('#valid').css({'color': '#FF0000', 'padding-left': '4px'});
                        $('#valid').html('Confirmation # Taken');
                    }else if(data['free']){
                        $('#valid').css({'color': '#00FF00', 'padding-left': '4px'});
                        $('#valid').html('Confirmation # Free');
                        
                    }
                    
                },
                complete: function(data, status) { }
                });
            }
        </script>
        
    </head>
    
    <body>
        
        <div id="wrapper">
        
            <p id="enter_code_message">Please Enter Confirmation Codes for: </p>
            
            <div id="form">
                
                <form action="confirmation.php">
        
                    <table border="1">
                        <tr>
                        <th>Child Name</th>
                        <th>Enter Confirmation Code</th>
                        </tr>
            
                        <?php 

                            for($i = 0; $i < $_GET['children']; $i++) {
                                $res = checkChildsExistance($i, $firstNames, $lastNames);
                                $isPresent = checkIfPresent($res);// Checks to see if child is checked in already
                
                
                                // If not checked in..
                                if(empty($isPresent)) {
                            
                                    // Add to check in table
                                    $present = "INSERT INTO currently_present (childid) VALUES ($1)";
                                    pg_query_params($dbConn, $present, array($res['0']));
                    
                                    // Display Their Stats
                                    echo "<tr>";
                                    echo "<td>" . $firstNames[$i] . "</td>";
                                    echo "<input type='hidden' name='firstnames[]' value='" . $firstNames[$i] . "' />";
                                    echo "<input type='hidden' name='lastnames[]' value='" . $lastNames[$i] . "' />";
                                    echo "<td><input type='number' id='code' name='code[]' min='1' require><span id='valid'></span></td>";
                                    echo "</tr>";
                            
                                }else {
                   
                                    echo "<tr>";
                                    echo "<td>" . $firstNames[$i] . "</td>";
                                    echo "<input type='hidden' value='" . $firstNames[$i] . "' />";
                                    echo "<input type='hidden' value='" . $lastNames[$i] . "' />";
                                    echo "<td>Sorry, " . $firstNames[$i] . " " . $lastNames[$i] . " is currently logged in.. </td>";
                                    echo "</tr>";
                               
                                }
                    
                            }
                    
                        ?>
                    
                        </table>
            
                    <input class="mysubmitbutton" type="submit" name="finish"/>
                
                </form>
            
            </div><!-- FORM -->
                
        </div> <!-- WRAPPER -->
        
    </body>
    
    <script> $(this).bind('input propertychange', checkValid); </script>
    
</html>
