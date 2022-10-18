<?php
require_once 'config/config.php';
?>

<?php
session_start();
?>

<!-- Nội dung hiển thị -->
<?php
$id = $_GET['id'];
$sql_show = "SELECT * FROM products WHERE ProductID = $id";
$query_show = mysqli_query($connect, $sql_show);
$row_show = mysqli_fetch_assoc($query_show);
?>
<!-- Đẩy nội dung lên giỏ hàng -->
<?php
if (isset($_POST['submit'])) {
    if ($_SESSION['login']['userID']) {
        $quantity = $_POST['quantity'];
        $userID = $_SESSION['login']['userID'];
        $sql_up = "INSERT INTO orders (productID, quantity, userID)
                    VALUE ($id, $quantity, $userID)";
        $query_up = mysqli_query($connect, $sql_up);
    } else{
        header('location: user/login.php');
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7f51584e70.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Clarins product</title>
</head>

<body>
    <!------------------------------------------ header--------------------------------- -->
    <header>
    <?php
        include('include/header.php');
    ?>
    </header>
    <!-------------------------------------------body------------------------------------->
    <section class="product">
        <div class="container">
            <div class="product-top">
                <p>Home | Skincare | Face | Beauty Flash Peel</p>
            </div>
            <div class="product-content row">
                <div class="product-content-left row">
                    <div class="product-content-left-big-img">
                        <img src="admin/image/<?php echo $row_show['Image']; ?>">
                    </div>
                    <div class="product-content-left-small-img">
                        <img src="image/sp1-1.jpg">
                        <img src="image/sp1-2.webp">
                        <img src="image/sp1-3.webp">
                        <img src="image/sp1-5.webp">
                        <img src="image/sp1-6.webp">
                        <img src="image/sp1-7.webp">
                    </div>
                </div>
                <div class="product-content-right">
                    <h1><?php echo $row_show['ProductName']; ?></h1><br>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                    <p><?php echo $row_show['Description']; ?>.</p>
                    <p><span class="price">£<?php echo $row_show['Price']; ?></span></p>
                    <p><span>£76.00 / 100 ml</span></p>
                    <div class="endow row">
                        Or 4 payments of £9.50 with
                        <img height="15px" style="margin-left: 5px" src="image/clearpay.png">
                    </div>
                    <p><span>50 ml</span></p>
                    <form action="" method="post">
                        <div class="buy-number">
                            <input type="number" min="1" value="1" name="quantity">
                            <input type="submit" value="Add to bag" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <!------------------------- -----------------footer------------------------------------>
    <footer>
    <?php
        include('include/footer.php');
    ?>
    </footer>
</body>
<script>
    // Thay hình nền theo chu kì hoặc nhấn nút
    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img");
    const imgContainer = document.querySelector(".aspect-ratio-169");
    const dotItem = document.querySelectorAll('.dot');
    let imgNumber = imgPosition.length;
    let index = 0;
    imgPosition.forEach(function(image, index) {
        image.style.left = index * 100 + "%";
        dotItem[index].addEventListener('click', function() {
            slider(index);
        })
    });

    function imgSlide() {
        index++;
        if (index >= imgNumber) {
            index = 0
        };
        imgContainer.style.left = '-' + index * 100 + '%';
        slider(index);
    };

    function slider(index) {
        imgContainer.style.left = '-' + index * 100 + '%';
        const dotActive = document.querySelector('.active');
        dotActive.classList.remove("active");
        dotItem[index].classList.add("active");
    }
    setInterval(imgSlide, 5000);
</script>

</html>