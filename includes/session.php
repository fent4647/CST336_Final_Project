<?php
// Make sure there is a session going on.. dem bishes almost got in..
    if(!isset($_SESSION['username'])) {
        header('Location: index.php');   
    }
?>