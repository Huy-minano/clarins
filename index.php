<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7f51584e70.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Clarins</title>
</head>

<body>
    <!------------------------------------------ header--------------------------------- -->
    <?php
        include('include/header.php');
    ?>

    <!------------------------------------------ body--------------------------------- -->
    <section id="Slide">
        <div class="aspect-ratio-169">
            <img src="image/index-image1.jpg">
            <img src="image/index-image2.jpg">
            <img src="image/index-image3.jpg">
        </div>
        <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
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
    imgPosition.forEach(function (image, index) {
        image.style.left = index * 100 + "%";
        dotItem[index].addEventListener('click', function () {
            slider(index);
        })
    });
    function imgSlide() {
        index++;
        if (index >= imgNumber) { index = 0 };
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

