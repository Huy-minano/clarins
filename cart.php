<?php
session_start();
?>

<?php
require_once('config/config.php');
?>

<?php
if (isset($_SESSION['login']['userID'])) {
    $userID = $_SESSION['login']['userID'];
    $sql = "SELECT * FROM orders inner join products on 
    orders.productID = products.ProductID AND orders.userID = $userID";
    $query = mysqli_query($connect, $sql);
} else{
    header('location: user/login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>

<body>
    <h1>Cart user ID: <?php echo mysqli_fetch_assoc($query)['userID'];?></h1>

    <table>
        <thead>
            <tr>
                <th>Thứ tự</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <?php
        $i = 1;
        $sum = 0;
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <tr>
                <td><?php echo ($i++); ?></td>
                <td><?php echo $row['ProductName']; ?></td>
                <td>
                    <img style="width: 100px;" src="admin/image/<?php echo $row['Image']; ?>">
                </td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['Price']; ?></td>
                <td><a  href="user/delete-product.php?productID=<?php echo $row['productID']; ?>">Delete</a></td>
            </tr>
            <?php
            $sum += $row['quantity'] * $row['Price'];
            ?>
        <?php }; ?>
        <tr>
            <td>Total order value</td>
            <td><span> £<?php echo $sum; ?></span></td>
        </tr>
    </table>
    <button>Payment orders</button>
</body>
<style>
    * {
        margin: auto;
        width: 900px;
    }

    table,
    th,
    td {
        border: 1px solid;
    }
</style>

</html>