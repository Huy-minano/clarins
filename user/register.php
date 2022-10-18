<?php
require_once '../config/config.php';
?>

<?php
if (isset($_POST['submit'])) {
    $userName = htmlspecialchars($_POST['userName']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $pass = htmlspecialchars($_POST['pass']);
    $pass1 = htmlspecialchars($_POST['pass1']);
    $sql_findName = "SELECT * FROM user WHERE userName = '$userName'";
    $findName = mysqli_query($connect, $sql_findName);
    $sql_email = "SELECT * FROM user WHERE email = '$email'";
    $findEmail = mysqli_query($connect, $sql_email);
    $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
    if (mysqli_num_rows($findName) > 0) {
        echo "Username available";
    } 
    elseif (mysqli_num_rows($findEmail) > 0) {
        echo "Email available";
    } 
    elseif ($pass != $pass1) {
        echo "Confirmation password is not correct";
    }
    else{
        $sql = "INSERT INTO user (userName, email, phone, address, password)
        VALUE ('$userName', '$email', '$phone', '$address', '$pass_hash')"; 
        $query = mysqli_query($connect, $sql);
        header("location: login.php");       
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User register</title>
</head>

<body>
    <h1>User register</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="">Username</label></td>
                <td><input type="text" name="userName"></td>
            </tr>
            <tr>
                <td><label for="">Email</label></td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td><label for="">Phone</label></td>
                <td><input type="number" name="phone"></td>
            </tr>
            <tr>
                <td><label for="">Address</label></td>
                <td><input type="text" name="address"></td>
            </tr>
            <tr>
                <td><label for="">Password</label></td>
                <td><input type="password" name="pass"></td>
            </tr>
            <tr>
                <td><label for="">Confirm password</label></td>
                <td><input type="password" name="pass1"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Register" name="submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>