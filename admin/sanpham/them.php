<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản phẩm</title>
</head>
<?php

    $sql_brand = "SELECT * FROM categories";
    $query_brand = mysqli_query($connect, $sql_brand);

    if(isset($_POST['sbm'])){
        $prd_name = htmlspecialchars($_POST['ProductName']);

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        $price = htmlspecialchars($_POST['Price']);
        $quantity = htmlspecialchars($_POST['Quantity']);
        $description = htmlspecialchars($_POST['Description']);
        $categoryID = htmlspecialchars($_POST['CategoryID']);

        $sql = "INSERT INTO products (ProductName, image, Price, Quantity, Description, CategoryID)
        VALUE ('$prd_name', '$image', $price, $quantity, '$description', $categoryID)";
        $query = mysqli_query($connect, $sql);
        move_uploaded_file($image_tmp, 'image/'.$image);
        header('location: admin-product.php?page_layout=danhsach');
    }

?>

<body>
    <h1>Thêm mới sản phẩm</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="">Tên sản phẩm</label></td>
                <td><input type="text" name="ProductName" required></td>
            </tr>
            <tr>
                <td><label for="">Ảnh sản phẩm</label></td>
                <td><input type="file" name="image" required></td>
            </tr>
            <tr>
                <td><label for="">Giá sản phẩm</label></td>
                <td><input type="number" name="Price" required></td>
            </tr>
            <tr>
                <td><label for="">Số lượng sản phẩm</label></td>
                <td><input type="number" name="Quantity" required></td>
            </tr>
            <tr>
                <td><label for="">Mô tả sản phẩm</label></td>
                <td><input type="text" name="Description"></td>
            </tr>
            <tr>
                <td><label for="">Loại Sản phẩm</label></td>
                <td>
                    <select name="CategoryID" id="">
                    <?php
                    while ($row_brand = mysqli_fetch_assoc($query_brand)) { ?>
                        <option value="<?php echo $row_brand['CategoryID'] ?>" required><?php echo $row_brand['CategoryName'] ?></option>
                    <?php }  ?>
                    </select>
                </td>
            </tr>
        </table>
        <input type="submit" name="sbm" value="Thêm">

    </form>
</body>

</html>