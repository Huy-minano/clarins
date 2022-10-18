<?php
require_once '../config/config.php';
?>

<?php 
    $productID = $_GET['productID'];
    $sql = "DELETE FROM orders WHERE ProductID = $productID";
    $query = mysqli_query($connect, $sql);
    header('location: ../cart.php');
?>