<?php
require_once '../config/config.php';
?>

<?php
session_start();

if (isset($_POST['submit'])) {
    $aName = htmlspecialchars($_POST['adminName']);
    $pass = htmlspecialchars($_POST['password']);
    $sql = "SELECT * FROM admin WHERE adminName = '$aName' AND password = '$pass'";
    $rs = mysqli_query($connect, $sql);

    if (mysqli_num_rows($rs) == 1) {
        $_SESSION['login']['aName'] = $aName;
        header('location: admin.php');
    } else {
        echo "Đăng nhập thất bại";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <title>Đăng nhập quản lý trang</title>
</head>

<body>
    <h1>Đăng nhập quản lý trang</h1>
    <form action="login.php" method="post">
        <table style="width: 500px">
            <tr>
                <td>
                    <label for="">Admin name</label>
                </td>
                <td>
                    <input type="text" name="adminName" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Password</label></td>
                </td>
                <td>
                    <input type="password" name="password" required>    
                </td>
            </tr>
            <tr>
                <input class="btn btn-primary btn-block mb-4" type="submit" name="submit" value="Đăng nhập">
            </tr>
        </table>     
    </form>
</body>
<script src="../bootstrap/js/bootstrap.js"></script>
<style>
     *{
        margin: auto;
        width: 500px;
     }
</style>
</html>