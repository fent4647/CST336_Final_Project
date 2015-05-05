<?php
// This is the INFO Page
// This allows the parent to check in their child 
// OR Create a New profile - also add children.

/* Requirements */
    session_start();
    require('includes/session.php');
    require('includes/connect.php');  
    require('includes/childFunctions.php');    
    $dbConn = getConnection();
/* Requirements */

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Parent/Child</title>
        <link href="css/main_stylesheet.css" rel="stylesheet" />
        <link href="css/info_stylesheet.css" rel="stylesheet" />
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="js/hide.js"></script>
        <script type="text/javascript" src="js/checkValid.js"></script>
        
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
            
            function hideAll() {
                
                $('#information1, #information2, #information3, #information4, #information5')
                    .css('display', 'none');
                
            }
        
            
            function displayChildren() {
                
                $('#childrenAmount, #childrenSubmitButton')
                    .css('display', 'inline');
                $('#wrapper').css('height', '512px');
                
            }
        
            
            function updateFormAmount() {
                
                var amount = $('#childrenAmount').val();
            
                hideAll();
            
                switch(amount) {
                    case "5":
                        $('#information5, #data').css('display', 'block');
                    case "4":
                        $('#information4, #data').css('display', 'block');
                    case "3":
                        $('#information3, #data').css('display', 'block');
                    case "2":
                        $('#information2, #data').css('display', 'block');
                        $('#wrapper').css('height', '1168px');
                    case "1":
                        $('#information1, #data').css('display', 'block');
                        break;
                    default:
                }
            }
        
        
            function checkParentInformation() {
               
                $.ajax({
                    type: "get",
                    url: "includes/parentdb.php",
                    dataType: "json",
                    data: {"firstName": $('#pFirstName').val().toLowerCase(), "lastName": $('#pLastName').val().toLowerCase()},
                    success: function(data, status) {
                        if(data['exists']) {
                            
                            displayChildren();
                            hideParent();
                            
                        }else {
                            
                            sessionStorage.setItem('parentFirstName', $('#pFirstName').val().toLowerCase());
                            sessionStorage.setItem('parentLastName', $('#pLastName').val().toLowerCase());
                            window.location.replace("newParent.php");
                            
                        }
                    },
                    complete: function(data, status) { /* EMPTY COMPLETE FUNCTION */ }
                });
                
            }
        
        </script>
        
    </head>
   
    <body>
        
        <div id="wrapper">
            
            <div id="header"><h1 id="heading">Parent and Child Information</h1></div>
            
            <a href="mainhome.php"><img style="float:left" src="img/back.png" alt="Back Button"/></a>
            
                <div id="parentInformation">
                    
                    <fieldset>
                        
                        <h4>Parent's Information</h4>
                        
                        <?php

                          if(isset($_GET['parentMade'])) {
                              
                                echo "<h5 style='color:#FF0000'>" . $_GET['parentMade'] . "</h5>";
                                echo 'First Name: <input type="text" name="pFirstName" id="pFirstName" value=' . $_GET['firstname'] . ' required/><br />';
                                echo 'Last Name: <input type="text" name="pLastName" id="pLastName" value=' . $_GET['lastname'] . ' required/><br />';
                              
                          }else {
                              
                              echo 'First Name: <input type="text" name="pFirstName" id="pFirstName" placeholder="Anna" required/><br />';
                              echo 'Last Name: <input type="text" name="pLastName" id="pLastName" placeholder="Voes" required/><br />';
                              
                          }

                        ?>
                        
                        <input class="mysubmitbutton" type="submit" name="finish" value="Submit" id="parentSubmitButton"/>
                        
                    </fieldset>
                    
                </div> <!-- PARENT INFROMATION -->
            
                <br />
            
                
            <!-- THEM CHILDRENS FORM -->
                <form action="child.php">
                    
                    <?php 

                        $idResults = getParentChildId();

                        if(!empty($idResults)) {
                            
                            foreach($idResults as $item) {
                                
                                $childResults = getChildInformation($item['1']);
                                echo "<input id='checkBoxes' type='checkbox' name='child[]' value='" . $childResults['0'] . "' >";
                                echo "<span id='results'>" . $childResults['1'] .  " " . $childResults['3'] . "</span>";
                                
                            }
                            
                        }
                    
                    ?>
                    
                    <select id="childrenAmount" name="children">
                        
                        <option>Add a Child</option>
                        <option name="1">1</option>
                        <option name="2">2</option>
                        <option name="3">3</option>
                        <option name="4">4</option>
                        <option name="5">5</option>
                        
                    </select>
                    
                    <div id="information1">
                        
                        <fieldset>
                            
                            <legend>1</legend>
                               
                            <h4>Child's Information</h4>
                            First Name: <input type="text" name="firstnames[]" required/><br />
                            Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                            Last Name: <input type="text" name="lastnames[]" required/><br />
                            
                        </fieldset>
                        
                    </div> <!-- INFORMTION 1 -->
               
                    
                    <br /><br />
                    
                    
                    <div id="information2">
                    
                        <fieldset>
                        
                            <legend>2</legend>
                    
                            <h4>Child's Information</h4>
                            First Name: <input type="text" name="firstnames[]"/><br />
                            Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                            Last Name: <input type="text" name="lastnames[]"/><br />
                
                        </fieldset>
                        
                    </div> <!-- INFORMTION 2 -->
                
                    
                    <br /><br />
                    
                    
                    <div id="information3">
                        
                        <fieldset>
                            
                            <legend>3</legend>
                    
                            <h4>Child's Information</h4>
                            First Name: <input type="text" name="firstnames[]"/><br />
                            Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                            Last Name: <input type="text" name="lastnames[]"/><br />
                
                        </fieldset>
                        
                    </div><!-- INFORMTION 3 -->
                
                    
                    <br /><br />
                    
                    
                    <div id="information4">
                        
                        <fieldset>
                            
                            <legend>4</legend>
                        
                            <h4>Child's Information</h4>
                            First Name: <input type="text" name="firstnames[]"/><br />
                            Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                            Last Name: <input type="text" name="lastnames[]"/><br />
                
                        </fieldset>
                        
                    </div><!-- INFORMTION 4 -->
                
                    
                    <br /><br />
                
                    
                    <div id="information5">
                        
                        <fieldset>
                            
                            <legend>5</legend>
                    
                            <h4>Child's Information</h4>
                            First Name: <input type="text" name="firstnames[]"/><br />
                            Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                            Last Name: <input type="text" name="lastnames[]" ><br />
                
                        </fieldset>
                        
                    </div><!-- INFORMTION 5 -->
            
                    <input class="mysubmitbutton" type="submit" name="finish" value="Submit" id="childrenSubmitButton"/>
                 
                </form>
            <!-- END OF CHILDREN FORM -->
            
        </div> <!-- WRAPPER -->
        
    </body>
    
    <script>
        
        $('#pNumber').change(checkValid);
        $('#childrenAmount').change(updateFormAmount);
        $('#parentSubmitButton').click(checkParentInformation);
        
    </script>
    
</html>