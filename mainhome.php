<?php

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            p {
                margin:center;
            }
            
            h2 {
                border-style:round 8px solid;
                border-width:32px;
                background:#AAA;
            }
        </style>
        
        
        <script>
            function parentButton() {
                document.getElementById('parent').innerHTML = "PARENT";
            }
            
        </script>
    </head>
    <body onload="parentButton()">
        <h2 id="parent"></h2>
        <p>Admin</p>
    </body>
</html>