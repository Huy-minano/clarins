<?php
    session_start();

    if($_SESSION['login']['aName']){
        unset($_SESSION['login']['aName']);
    }
    header('location: login.php');
?>