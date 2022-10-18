<?php
    $connect = mysqli_connect('localhost', 'root', '', 'cosmestic_clarins');
    if($connect){
        mysqli_query($connect, "SET NAMES 'UTF8'");
    }
?>