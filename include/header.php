<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7f51584e70.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo">
            <a href="./index.php"><img src="image/Clarins-Symbol.png" alt="" width="250"></a>            
        </div>
        <div class="menu">
            <li class="sub-menu"><a href="">WHAT'S NEW</a>
                <ul class="sub-menu-1">
                    <li>WHAT'S NEW
                        <ul>
                            <li><a href="">View All</a></li>
                            <li><a href="">Just Arrived</a></li>
                            <li><a href="">Summer Essentials</a></li>
                            <li><a href="">Best Seller</a></li>
                            <li><a href="">Top Rated</a></li>
                            <li><a href="">Onlive Exclusives</a></li>
                            <li><a href="">Luxury Sizes</a></li>
                        </ul>
                    </li>
                    <li>HIGHLIGHTS
                        <ul>
                            <li><a href="">Beauty Flash Balm</a></li>
                            <li><a href="">Super Restorative</a></li>
                            <li><a href="">We Know Skin</a></li>
                        </ul>
                    </li>
                </ul>

            </li>
            <li><a href="">SKINCARE</a>
                <ul class="sub-menu-1">
                    <li><a href="category.php">FACE</a></li>
                    <li><a href="">BODY CARE</a></li>
                    <li><a href="">MEN</a></li>
                    <li><a href="">SUN</a></li>
                </ul>
            </li>
            <li><a href="">MAKE UP</a>
                <ul class="sub-menu-1">
                    <li><a href="">FACE</a></li>
                    <li><a href="">EYES</a></li>
                    <li><a href="">LIPS</a></li>
                </ul>
            </li>
            <li><a href="">GIFTS</a></li>
            <li><a href="">OFFERS</a></li>
            <li><a href="">SPA & VIRTUAL SERVICES</a></li>
            <li><a href="">WORLD OF CLARINS</a></li>
        </div>
        <div class="others">
            <li><input type="text" placeholder="Search"> <i class="fas fa-search"></i></li>
            <li><a class="fa-solid fa-phone-volume"></a></li>
            <li>
                <?php
                    if(!isset($_SESSION['login']['userID'])){
                        echo "<a class='fa-solid fa-right-to-bracket' href='user/login.php'></a>";
                    } else {
                        echo "<a class='fa-solid fa-right-from-bracket' href='user/logout.php'></a>";
                    }
                ?>


            </li>
            <li><a class="fa-solid fa-bag-shopping" href="cart.php"></a></li>
        </div>
    </header>
</body>
</html>

