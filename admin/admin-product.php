<?php
require_once '../config/config.php';
?>
 
<?php
    session_start();
    if(!($_SESSION['login']['aName'])){
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
</head>

<body>
    <a href="logout.php"><button>Đăng xuất</button></a>
    <?php
    if (isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {
            case 'danh sach':
                require_once 'sanpham/danhsach.php';
                break;
            case 'them':
                require_once 'sanpham/them.php';
                break;
            case 'sua':
                require_once 'sanpham/sua.php';
                break;
            case 'xoa':
                require_once 'sanpham/xoa.php';
                break;
            default :
                require_once 'sanpham/danhsach.php';
                break;
        }
        
    } else {require_once 'sanpham/danhsach.php';}
    ?>
</body>

</html>