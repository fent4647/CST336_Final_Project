<?php
// LOG OUT PLEASE..
    session_start();
    session_destroy();
    header('Location: ../index.php?logout=Logout Successful');
?>