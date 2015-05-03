<?php
    session_start();
    require('includes/session.php');
    require('includes/connect.php');
    $dbConn = getConnection();


    function getParentChildId() {
        global $dbConn;
        $sql = "SELECT * FROM child_parent_table WHERE parentid = " . $_SESSION['parentId'];
                        $stmt = pg_query($dbConn, $sql);  
                        $idResults = pg_fetch_all_columns($stmt);
        return $idResults;
    }

    function getChildResults($item) {
        global $dbConn;
        $sql = "SELECT * FROM child WHERE childid = " . $item['0'];
        $stmt = pg_query($dbConn, $sql);
        $childResults = pg_fetch_row($stmt);
        return $childResults;
    }
?>

<!DOCTYPE HTML>
<html>
    <meta charset="UTF-8">
    <head>
        <title>Parents</title>
    </head>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/hide.js"></script>
    <script type="text/javascript" src="js/checkValid.js"></script>
    <style>
        #information1, #information2, #information3, #information4, #information5, #childrenSubmitButton, #childrenAmount, #checkBoxes, #results {
            display:none;
        }
    </style>
    <script>
        function hideAll() {
            $('#information1, #information2, #information3, #information4, #information5')
                .css('display', 'none');
        }
        
        function displayChildren() {
            $('#childrenAmount, #childrenSubmitButton, #checkBoxes, #results')
                .css('display', 'inline');
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
                case "1":
                    $('#information1, #data').css('display', 'block');
                    break;
                default:
            }
        }
        
        function checkParentInformation() {
            $.ajax({
                type: "get",
                url: "http://ringo-finance.codio.io:3000/CST336_Final_Project/includes/parentdb.php",
                dataType: "json",
                data: {"firstName": $('#pFirstName').val().toLowerCase(), "lastName": $('#pLastName').val().toLowerCase()},
                success: function(data, status) {
                    if(data['exists']) {
                        displayChildren();
                        hideParent();
                    }else {
                        sessionStorage.setItem('parentFirstName', $('#pFirstName').val().toLowerCase());
                        sessionStorage.setItem('parentLastName', $('#pLastName').val().toLowerCase());
                        window.location.replace("http://ringo-finance.codio.io:3000/CST336_Final_Project/newParent.php");
                    }
                },
                complete: function(data, status) {
                    
                }
            });
        }
        
    </script>
    <body>
        <div id="wrapper">
            <h1>Parent and Child Information</h1>
                <div id="parentInformation">
                    
                    <fieldset>
                 <h4>Parent's Information</h4>
                    First Name: <input type="text" name="pFirstName" id="pFirstName" placeholder="Anna" required/><br />
                    Last Name: <input type="text" name="pLastName" id="pLastName" placeholder="Voes" required/><br />
                    
                    <input type="submit" name="finish" value="Submit" id="parentSubmitButton"/>
                 </fieldset>
                </div>
                <br />
            
                <div id="data">
                <form action="child.php">
                    
                    <?php 
                        $idResults = getParentChildId();

                        if(isset($idResults)) {
                            foreach($idResults as $item) {
                                $childResults = getChildResults($item);
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
                </div>
               
                    <br /><br />
                    
                <div id="information2">
                    <fieldset>
                        <legend>2</legend>
                    <h4>Child's Information</h4>
                    First Name: <input type="text" name="firstnames[]"/><br />
                    Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                    Last Name: <input type="text" name="lastnames[]"/><br />
                
                    </fieldset>
                </div>
                
                    <br /><br />
                    
                <div id="information3">
                    <fieldset>
                        <legend>3</legend>
                    <h4>Child's Information</h4>
                    First Name: <input type="text" name="firstnames[]"/><br />
                    Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                    Last Name: <input type="text" name="lastnames[]"/><br />
                
                    </fieldset>
                </div>
                
                    <br /><br />
                    
                <div id="information4">
                    <fieldset>
                        <legend>4</legend>
                    <h4>Child's Information</h4>
                    First Name: <input type="text" name="firstnames[]"/><br />
                    Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                    Last Name: <input type="text" name="lastnames[]"/><br />
                
                    </fieldset>
                </div>
                
                    <br /><br />
                
                <div id="information5">
                    <fieldset>
                        <legend>5</legend>
                    <h4>Child's Information</h4>
                    First Name: <input type="text" name="firstnames[]"/><br />
                    Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                    Last Name: <input type="text" name="lastnames[]" ><br />
                
                    </fieldset>
                </div>
            
                
                <input type="submit" name="finish" value="Submit" id="childrenSubmitButton"/>
                    
            </div>
            
                </form>
      </div>
    </body>
    
    <script>
        $('#pNumber').change(checkValid);
        $('#childrenAmount').change(updateFormAmount);
        $('#parentSubmitButton').click(checkParentInformation);
    </script>
</html>