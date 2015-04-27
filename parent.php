<?php
    session_start();
    require('includes/session.php');
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
        #information1, #information2, #information3, #information4, #information5, #submitButton {
            display:none;
        }
    </style>
    <script>
        function hideAll() {
            $('#information1, #information2, #information3, #information4, #information5, #submitButton')
                .css('display', 'none');
        }
        
        
        function checkValid() {
            var $num = $('#pNumber').val();
            if(!/^\(\d{3}\)\d{3}-\d{4}$/.test($num)) {
                $('#correctFormat').html('Please enter the correct format. (555)555-5555');
                $('#correctFormat').css('color', '#FF0000');
                $('#pNumber').focus();
            }else {
                $('#correctFormat').empty();
            }
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
                    $('#information1, #data, #submitButton').css('display', 'block');
                    break;
                default:
                    alert("Need To Have Some Children..");
            }
        }
        
        function submit() {
            $.ajax({
                
                http://beyond-elvis.codio.io:3000/FinalProject/CST336_Final_Project/includes/parentdb.php;
                
            });
        }
        
    </script>
    <body>
        <div id="wrapper">
            <h1>Parent and Child Information</h1>
           
                <fieldset>
                 <h4>Parent's Information</h4>
                    First Name: <input type="text" name="pFirstName" id="pFirstName" placeholder="Anna" required/><br />
                    Last Name: <input type="text" name="pLastName" id="pLastName" placeholder="Voes" required/><br />
                    Relation: <input type="text" name="pRelation" id="pRelation" placeholder="Mother/Father/Brother.." required/><br />
                    Contact Number: <input type="text" name="pNumber" id="pNumber" placeholder="(555)555-5555" required/>
                    <span id="correctFormat"></span><br />
                 </fieldset>
                
                <select id="childrenAmount" name="children">
                    <option>Amount of Children</option>
                    <option name="1">1</option>
                    <option name="2">2</option>
                    <option name="3">3</option>
                    <option name="4">4</option>
                    <option name="5">5</option>
                </select>
                
                <br />
                <div id="data">
                    <div id="information1">
                    <fieldset>
                        <legend>1</legend>
                    <h4>Child's Information</h4>
                    First Name: <input type="text" name="cFirstName" required/><br />
                    Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                    Last Name: <input type="text" name="cLastName" required/><br />
                    </fieldset>
                </div>
               
                    <br /><br />
                    
                <div id="information2">
                    <fieldset>
                        <legend>2</legend>
                    <h4>Child's Information</h4>
                    First Name: <input type="text" name="cFirstName"/><br />
                    Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                    Last Name: <input type="text" name="cLastName"/><br />
                
                    </fieldset>
                </div>
                
                    <br /><br />
                    
                <div id="information3">
                    <fieldset>
                        <legend>3</legend>
                    <h4>Child's Information</h4>
                    First Name: <input type="text" name="cFirstName"/><br />
                    Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                    Last Name: <input type="text" name="cLastName"/><br />
                
                    </fieldset>
                </div>
                
                    <br /><br />
                    
                <div id="information4">
                    <fieldset>
                        <legend>4</legend>
                    <h4>Child's Information</h4>
                    First Name: <input type="text" name="cFirstName"/><br />
                    Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                    Last Name: <input type="text" name="cLastName"/><br />
                
                    </fieldset>
                </div>
                
                    <br /><br />
                
                <div id="information5">
                    <fieldset>
                        <legend>5</legend>
                    <h4>Child's Information</h4>
                    First Name: <input type="text" name="cFirstName"/><br />
                    Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                    Last Name: <input type="text" name="cLastName" ><br />
                
                    </fieldset>
                </div>
                </div>
                <input type="submit" name="finish" value="Submit" id="submitButton"/>
            
            
      </div>
    </body>
    
    <script>
        $('#pNumber').change(checkValid);
        $('#childrenAmount').change(updateFormAmount);
        $('#submitButton').change(submit);
    </script>
</html>