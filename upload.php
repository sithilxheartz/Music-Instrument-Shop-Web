<?php
    include('dbconnect.php');
    if(isset($_POST['upload']))
    {
        $name = $_POST['productname'];
        $price = $_POST['productprice'];
        $image = $_POST['productimage'];
        $description = $_POST['producdescription'];
        $category = $_POST['productcategory'];

        $query = mysqli_query($con, "Insert into product (name, price, image, description, category) values ('$name', '$price', '$image', '$description', '$category')");
        if($query)
        {
            echo "<script>alert('succes')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Upload</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body style="background-image: url('webpics/abg.jpg');">
<ul>
            <li><a class="logo-image"><img src="webpics/logo.jpg" height="46"></a></li>
            <li><a class="active" href="#home">Upload Product</a></li>
            <li><a href="update.php">Update Product</a></li>
            <li style="float: right;"><a href="homef.php">Log Out</a></li>
            <li style="float: right;"><a href="preview.php">Preview</a></li>
        </ul>
    <div class="profile">
        <h1>Upload Product</h1>
        <form method="POST">
            <div class="profile-info">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="productname" required>
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
                <input type="number" id="productPrice" name="productprice" required>
            </div>
            <div class="profile-info">
                <label for="productName">Product Image:</label>
                <input type="file" id="productimage" name="productimage" required>
            </div>
            <div class="profile-info">
                <label for="productName">Product Description:</label>
                <input type="text" id="producdescription" name="producdescription" required>
            </div>
            <button class="button button1" type="submit" name="upload">Upload Product</button>
        </form>
    </div>
</body>
</html>
