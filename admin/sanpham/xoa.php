<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE ProductID = $id";
    $query = mysqli_query($connect, $sql);
    header('location: admin-product.php?page_layout=danhsach');
?>