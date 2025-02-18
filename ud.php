<?php
    include('dbconnect.php');
    if(isset($_POST['upload']))
    {
        $id = $_GET['id'];
        $name = $_POST['productname'];
        $price = $_POST['productprice'];
        $image = $_POST['productimage'];
        $description = $_POST['producdescription'];
        $category = $_POST['productcategory'];

        $query = mysqli_query($con, "update product set name='$name', price='$price', image='$image', description='$description', category='$category' where product_id='$id'");
        if($query)
        {
            echo "<script type='text/javascript'> document.location ='update.php'; </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ud</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="profile">
        <h1>Update</h1>
        <form method="POST">
            <?php
                include('dbconnect.php');
                $id = $_GET['id'];
                $query = mysqli_query($con, "select * from product where product_id = '$id'");
                while($row = mysqli_fetch_array($query))
                {
            ?>
            <div class="profile-info">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" value="<?php echo $row['name'] ?>" name="productname" required>
            </div>
            <div class="profile-info">
                <label for="productcategory">Product Category:</label>
                <select id="producdescription" name="productcategory">
                <option value="Guitar">Guitar</option>
                <option value="Piano">Piano</option>
                <option value="Drum">Drum</option>
                <option value="Tabla">Tabla</option>
                <option value="Organ">Organ</option>
                <option value="Flute">Flute</option>
                <option value="Sticks">Sticks</option>
                <option value="Seats">Seats</option>
                <option value="Amplifier">Amplifier</option>
                <option value="Mixer">Mixer</option>
                </select>
            </div>
            <div class="profile-info">
                <label for="productPrice">Product Price:</label>
                <input type="number" id="productPrice" value="<?php echo $row['price'] ?>" name="productprice" required>
            </div>
            <div class="profile-info">
                <label for="productName">Product Image:</label>
                <input type="file" id="productimage" name="productimage" required>
                <input type="text" value="<?php echo $row['image'] ?>">
            </div>
            <div class="profile-info">
                <label for="productName">Product Description:</label>
                <input type="text" id="producdescription" value="<?php echo $row['description'] ?>" name="producdescription" required>
            </div>
            <?php } ?>
            <button class="button button1" type="submit" name="upload">Update Product</button>
        </form>
    </div>
</body>
</html>