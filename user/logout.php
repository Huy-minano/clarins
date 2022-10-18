<?php
    session_start();

    if($_SESSION['login']['userID']){
        unset($_SESSION['login']['userID']);
    }
    header('location: ../index.php');
?>