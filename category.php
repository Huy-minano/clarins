<?php
require_once 'config/config.php';
?>

<?php
$sql = "SELECT * FROM products inner join categories on 
    products.CategoryID = categories.CategoryID";
$query = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7f51584e70.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Clarins category</title>
</head>

<body>
    <!------------------------------------------ header--------------------------------- -->
    <?php
        include('include/header.php');
    ?>
    <!------------------------------------------ body--------------------------------- -->
    <section class="category">
        <div class="container row">
            <div class="container-right">
                <p>Home | Skincare | Face</p>
            </div>

            <div class="container-between">
                <button><span>Filter</span><i class="fa-duotone fa-caret-down"></i></button>
            </div>
            <div class="container-left">
                <select name="" id="">
                    <option value="">BEST SELLERS</option>
                    <option value="">TOP RATED</option>
                    <option value="">PRICE HIGH TO LOW</option>
                    <option value="">PRICE LOW TO HIGH</option>
                    <option value="">PRODUCT NAME ASCENDING</option>
                    <option value="">PRODUCT NAME DESCENDING</option>
                </select>
            </div>
        </div>
        <div class="category-content row">
            <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                <a href="product.php?id=<?php echo $row['ProductID'];?>" class="category-content-item">
                    <div>
                        <img style="width: 100px;" src="admin/image/<?php echo $row['Image']; ?>">
                        <h1><?php echo $row['ProductName']; ?></h1>
                        <p><span>&#8356;</span><?php echo $row['Price']; ?></p>
                    </div>
                </a>
            <?php } ?>
        </div>
    </section>
    <!------------------------------------------footer------------------------------------>
    <?php
        include('include/footer.php');
    ?>
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