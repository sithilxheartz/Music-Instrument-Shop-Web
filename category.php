<?php
include('dbconnect.php');

$category = "";
if (isset($_GET['category'])) {
    $category = mysqli_real_escape_string($con, $_GET['category']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($category); ?> - Rhythm Music</title>
    <link rel="stylesheet" href="rythmmusic.css">
</head>
<body style="background-color: beige;">
    <ul>
        <li><a class="logo-image"><img src="webpics/logo.jpg" height="46"></a></li>
        <li><a href="homef.php">Home</a></li>
        <li class="dropdown">
                <a href="" class="dropbtn">Instruments</a>
                <div class="dropdown-content">
                    <a href="category.php?category=Guitar">Guitar</a>
                    <a href="category.php?category=Piano">Piano</a>
                    <a href="category.php?category=Drum">Drum</a>
                    <a href="category.php?category=Tabla">Tabla</a>
                    <a href="category.php?category=Organ">Organ</a>
                    <a href="category.php?category=Flute">Flute</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Accessories</a>
                <div class="dropdown-content">
                    <a href="category.php?category=Sticks">Sticks</a>
                    <a href="category.php?category=Strings">Strings</a>
                    <a href="category.php?category=Picks">Picks</a>
                    <a href="category.php?category=Seats">Seats</a>
                    <a href="category.php?category=Amplifier">Amplifier</a>
                    <a href="category.php?category=Mixer">Mixer</a>
                </div>    
            </li>
            <li><a href="aboutus.html">About us</a></li>
            <li><a href="contact.html">Contact</a></li>
        <li class="login"><a href="signinup.php">Log In</a></li>
        <li class="cart"><a href="#cart">Cart</a></li>
        <li class="search-container">
            <form action="search.php" method="GET">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">Search</button>
            </form>
        </li>
    </ul>
    <br>
    <div style="padding-left: 15px; font-family: monospace;">
        <h1><?php echo htmlspecialchars($category); ?> Products</h1>
    </div>
    <div class="gallery-container">
        <?php
        if ($category != "") {
            $res = mysqli_query($con, "SELECT * FROM product WHERE category='$category'");
            if (mysqli_num_rows($res) > 0) {
                while($row = mysqli_fetch_assoc($res)) {
        ?>
        <div class="gallery-item">
            <a href="detail.php?product_id=<?php echo $row['product_id']; ?>">
                <img style="width: 354px;" src="webpics/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
            </a>
            <div class="desc"><?php echo $row['name']; ?><br>Rs.<?php echo number_format($row['price'], 2); ?></div>
        </div>
        <?php
                }
            } else {
                echo "<p>No products found in this category.</p>";
            }
        } else {
            echo "<p>Please select a category.</p>";
        }
        ?>
    </div>
    <footer style="margin-top: 400px;">
            <div class="footer-container">
                <div class="footer-part">
                    <h3>About Us</h3>
                    <p>Discover Rhythm Music Center for quality instruments, expert staff, repair services, and accessories to support your musical journey!</p>
                </div>
                <div class="footer-part">
                    <h3>Follow Us</h3>
                    <ul>
                        <li style="padding-left: 25%;"><a href=""><img src="webpics/dribble.png" width="30px" height="30px"></a></li>
                        <li><a href=""><img src="webpics/instagram.png" width="30px" height="30px"></a></li>
                        <li><a href=""><img src="webpics/telegram.png" width="30px" height="30px"></a></li>
                    </ul>
                </div>
                <div class="footer-part">
                    <h3>Contact</h3>
                    <p><img src="webpics/pngwing.com (1).png" width="20px" height="20px" alt="Mobile Icon" style="vertical-align: middle; margin-top: -3px;"> rhythmmusic@gmail.com</p>
                    <p><img src="webpics/pngwing.com.png" width="20px" height="20px" alt="Mobile Icon" style="vertical-align: middle; margin-top: -3px;"> 077 660 8899</p>
                </div>
            </div>
        </footer>
</body>
</html>
