<?php
    include('dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Upload</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        table
        {
            border: 1px solid black;
            margin-top: 20px;
        }
        td, th
        {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <ul>
        <li><a class="logo-image"><img src="webpics/logo.jpg" height="46"></a></li>
        <li><a href="upload.php">Upload Product</a></li>
        <li><a class="active" href="update.php">Update Product</a></li>
        <li style="float: right;"><a href="homef.php">Log Out</a></li>
        <li style="float: right;"><a href="preview.php">Preview</a></li>
    </ul>
    <div>
        <table>
            <thead>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Description</th>
                <th>Category</th>
            </thead>
            <tbody>
                <?php
                    $fetch = mysqli_query($con, "select * from product");
                    $row = mysqli_num_rows($fetch);
                    if($row > 0)
                    {
                        while($r = mysqli_fetch_array($fetch))
                        {
                ?>
                <tr>
                    <td><?php echo $r['name'] ?></td>
                    <td><?php echo $r['price'] ?></td>
                    <td><img style="width: 100px;" src="webpics/<?php echo $r['image'] ?>"></td>
                    <td><?php echo $r['description'] ?></td>
                    <td><?php echo $r['category'] ?></td>
                    <td>
                        <button><a href="ud.php?id=<?php echo $r['product_id'] ?>">Update</a></button>
                        <button><a href="del.php?delid=<?php echo $r['product_id'] ?>">Delete</a></button>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>