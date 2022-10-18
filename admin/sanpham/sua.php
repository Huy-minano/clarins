<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
</head>
<?php

    $id = $_GET['id'];

    $sql_brand = "SELECT * FROM categories";
    $query_brand = mysqli_query($connect, $sql_brand);
    // hiển thị sản phẩm qua id được chọn
    $sql_up = "SELECT * FROM products WHERE ProductID = $id";
    $query_up = mysqli_query($connect, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['sbm'])){
        $prd_name = htmlspecialchars($_POST['ProductName']);

        // if($_FILES['image']['name']==''){
        //     $image = $row_up['image'];
        // } else {
        //     $image = $row_up['image'];
        // }

        $image_tmp = $_FILES['image']['tmp_name'];

        $price = htmlspecialchars($_POST['Price']);
        $quantity = htmlspecialchars($_POST['Quantity']);
        $description = htmlspecialchars($_POST['Description']);
        $categoryID = htmlspecialchars($_POST['CategoryID']);

        $sql = "UPDATE products SET ProductName = '$prd_name', 
        -- Image = '$image', 
        Price = $price, 
        Quantity = $quantity, Description = '$description', CategoryID = $categoryID WHERE ProductID = $id";
        $query = mysqli_query($connect, $sql);
        move_uploaded_file($image_tmp, 'image/'.$image);
        header('location: admin-product.php?page_layout=danhsach');
    }

?>

<body>
    <h1>Chỉnh sửa sản phẩm</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="">Tên sản phẩm</label></td>
                <td><input type="text" name="ProductName" required value="<?php echo ($row_up['ProductName']); ?>"></td>
            </tr>
            <!-- <tr>
                <td><label for="">Ảnh sản phẩm</label></td>
                <td><input type="file" name="image"></td>
            </tr> -->
            <tr>
                <td><label for="">Giá sản phẩm</label></td>
                <td><input type="number" name="Price" required value="<?php echo ($row_up['Price']); ?>"></td>
            </tr>
            <tr>
                <td><label for="">Số lượng sản phẩm</label></td>
                <td><input type="number" name="Quantity" required value="<?php echo ($row_up['Quantity']); ?>"></td>
            </tr>
            <tr>
                <td><label for="">Mô tả sản phẩm</label></td>
                <td><input type="text" name="Description" value="<?php echo ($row_up['Description']); ?>"></td>
            </tr>
            <tr>
                <td><label for="">Loại sản phẩm</label></td>
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
        <input type="submit" name="sbm" value="Sửa">

    </form>
</body>

</html>