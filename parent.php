<?php
    
    
?>

<!DOCTYPE HTML>
<html>
    <meta charset="UTF-8">
    <head>
        <title>Parents</title>
    </head>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
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
        
    </script>
    <body>
        <div id="wrapper">
            <h1>Parent and Child Information</h1>
            <form>
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
                    First Name: <input type="text" name="cFirstName" require/><br />
                    Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                    Last Name: <input type="text" name="cLastName" require/><br />
                
                    <h4>Parent's Information</h4>
                    First Name: <input type="text" name="pFirstName" require/><br />
                    Last Name: <input type="text" name="pLastName" require/><br />
                    Relation: <input type="text" name="pRelation" require/><br />
                    Contact Number: <input type="text" name="pNumber" require/><br />
                    </fieldset>
                </div>
               
                    <br /><br />
                    
                <div id="information2">
                    <fieldset>
                        <legend>2</legend>
                    <h4>Child's Information</h4>
                    First Name: <input type="text" name="cFirstName" require/><br />
                    Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                    Last Name: <input type="text" name="cLastName" require/><br />
                
                    <h4>Parent's Information</h4>
                    First Name: <input type="text" name="pFirstName" require/><br />
                    Last Name: <input type="text" name="pLastName" require/><br />
                    Relation: <input type="text" name="pRelation" require/><br />
                    Contact Number: <input type="text" name="pNumber" require/><br />
                    </fieldset>
                </div>
                
                    <br /><br />
                    
                <div id="information3">
                    <fieldset>
                        <legend>3</legend>
                    <h4>Child's Information</h4>
                    First Name: <input type="text" name="cFirstName" require/><br />
                    Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                    Last Name: <input type="text" name="cLastName" require/><br />
                
                    <h4>Parent's Information</h4>
                    First Name: <input type="text" name="pFirstName" require/><br />
                    Last Name: <input type="text" name="pLastName" require/><br />
                    Relation: <input type="text" name="pRelation" require/><br />
                    Contact Number: <input type="text" name="pNumber" require/><br />
                    </fieldset>
                </div>
                
                    <br /><br />
                    
                <div id="information4">
                    <fieldset>
                        <legend>4</legend>
                    <h4>Child's Information</h4>
                    First Name: <input type="text" name="cFirstName" require/><br />
                    Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                    Last Name: <input type="text" name="cLastName" require/><br />
                
                    <h4>Parent's Information</h4>
                    First Name: <input type="text" name="pFirstName" require/><br />
                    Last Name: <input type="text" name="pLastName" require/><br />
                    Relation: <input type="text" name="pRelation" require/><br />
                    Contact Number: <input type="text" name="pNumber" require/><br />
                    </fieldset>
                </div>
                
                    <br /><br />
                
                <div id="information5">
                    <fieldset>
                        <legend>5</legend>
                    <h4>Child's Information</h4>
                    First Name: <input type="text" name="cFirstName" require/><br />
                    Middle Initial:<input type="text" name="cMiddleInit" maxlength="1" size="2"/><br />
                    Last Name: <input type="text" name="cLastName" require/><br />
                
                    <h4>Parent's Information</h4>
                    First Name: <input type="text" name="pFirstName" require/><br />
                    Last Name: <input type="text" name="pLastName" require/><br />
                    Relation: <input type="text" name="pRelation" require/><br />
                    Contact Number: <input type="text" name="pNumber" require/>
                    </fieldset>
                </div>
                </div>
                <input type="submit" name="finish" value="Submit" id="submitButton"/>
            </form>
            
      </div>
    </body>
    
    <script>
        $('#childrenAmount').change(updateFormAmount);
    </script>
</html>