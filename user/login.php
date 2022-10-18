<?php
session_start();
?>

<?php
require_once '../config/config.php';
?>

<?php
if (isset($_POST['login'])) {
    $user = htmlspecialchars($_POST['userName']);
    $pass = htmlspecialchars($_POST['pass']);
    $sql = "SELECT * FROM user WHERE userName = '$user'";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($query);
    $hash = $row['password'];
    if (password_verify($pass,$hash)) {
        $_SESSION['login']['userID'] = $row['userID'];
        header('location: ../index.php');
    } else {
        echo "Logged in unsuccessfully";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <h1>User login</h1>
    <table>
        <form action="" method="post">
            <tr class="mb-3">
                <td> <label for="">Username</label> </td>
                <td> <input type="text" name="userName"> </td>
            </tr>
            <tr class="mb-3">
                <td> <label for="">Password</label> </td>
                <td> <input type="password" name="pass"> </td>
            </tr>
            <tr>
                <td><input class="btn btn-primary" type="submit" value="Login" name="login"></td>
            </tr>
        </form>
        <tr>
            <td><a href="register.php"><button class="btn btn-primary">Register</button></a></td>
        </tr>
        <tr>
            <td><a href="logout.php"><button class="btn btn-primary">Logout</button></a></td>
        </tr>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>