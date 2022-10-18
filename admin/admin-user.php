<?php
require_once '../config/config.php';
?>

<?php
$sql = "SELECT * FROM user";
$query = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khách hàng</title>
</head>

<body>
    <h1>Quản lý khách hàng</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name customer</th>
                <th>Email</th>
                <th>Number phone</th>
                <th>Address</th>
            </tr>
        </thead>
        <?php $i = 1;
        while ($row = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['userName']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['address']; ?></td>
            </tr>
        <?php }; ?>
    </table>

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

</body>

</html>