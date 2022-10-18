<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
</head>
<?php
    $sql = "SELECT * FROM products inner join categories on 
    products.CategoryID = categories.CategoryID";
    $query = mysqli_query($connect, $sql);
?>
<body>
    <h1>Danh sách sản phẩm</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Mô tả</th>
                <th>Loại sản phẩm</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                while($row = mysqli_fetch_assoc($query)){ ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['ProductName']; ?></td>                       
                        <td>
                            <img style="width: 100px;" src="image/<?php echo $row['Image']; ?>">
                        </td>
                        <td><?php echo $row['Price']; ?></td>
                        <td><?php echo $row['Quantity']; ?></td>
                        <td><?php echo $row['Description']; ?></td>
                        <td><?php echo $row['CategoryName']; ?></td>
                        <td><a href="admin-product.php?page_layout=sua&id=<?php echo $row['ProductID'];?>">Sửa</a></td>
                        <td><a onclick="return Del(<?php echo $row['ProductName']; ?>)" href="admin-product.php?page_layout=xoa&id=<?php echo $row['ProductID'];?>">Xóa</a></td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
    <a href="admin-product.php?page_layout=them">Thêm</a>
</body>
<script>
    function Del(name){
        return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name + "?");
    }
</script>
<style>
    *{
        margin: auto;
        width: 900px;
    }

    table,
    th,
    td {
        border: 1px solid;
    }
</style>

</html>