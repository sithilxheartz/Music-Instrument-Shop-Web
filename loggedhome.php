<?php
    include('dbconnect.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rhythm Music</title>
        <link rel="stylesheet" href="rythmmusic.css">
    </head>
    <body style="background-color: beige;">
        <ul>
            <li><a class="logo-image"><img src="webpics/logo.jpg" height="46"></a></li>
            <li><a class="active" href="#home">Home</a></li>
            <li class="dropdown">
                <a href="" class="dropbtn">Instruments</a>
                <div class="dropdown-content">
                    <a href="loggedcategory.php?category=Guitar">Guitar</a>
                    <a href="loggedcategory.php?category=Piano">Piano</a>
                    <a href="loggedcategory.php?category=Drum">Drum</a>
                    <a href="loggedcategory.php?category=Tabla">Tabla</a>
                    <a href="loggedcategory.php?category=Oragan">Organ</a>
                    <a href="loggedcategory.php?category=Flute">Flute</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Accessories</a>
                <div class="dropdown-content">
                    <a href="loggedcategory.php?category=Sticks">Sticks</a>
                    <a href="loggedcategory.php?category=Strings">Strings</a>
                    <a href="loggedcategory.php?category=Picks">Picks</a>
                    <a href="loggedcategory.php?category=Seats">Seats</a>
                    <a href="loggedcategory.php?category=Amplifier">Amplifier</a>
                    <a href="loggedcategory.php?category=Mixer">Mixer</a>
                </div>    
            </li>
            <li><a href="loggedaboutus.html">About us</a></li>
            <li><a href="loggedcontact.html">Contact</a></li>
            <li class="login"><a href="profile.php">Profile</a></li>
            <li class="cart"><a href="#cart">Cart</a></li>
            <li class="search-container">
            <form action="loggedsearch.php" method="GET">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">Search</button>
            </form>
            </li>
        </ul>
        <br>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="webpics/banner1.png" style="width:100%">
                <div class="text">Caption Text</div>
            </div>
            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="webpics/banner2.png" style="width:100%">
                <div class="text">Caption Two</div>
            </div>
            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="webpics/banner3.png" style="width:100%">
                <div class="text">Caption Three</div>
            </div>
        </div>
        <br>
        <div style="text-align:center">
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span> 
        </div>
        <script>
            let slideIndex = 0;
            showSlides();

            function showSlides() {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                }
                slideIndex++;
                if (slideIndex > slides.length) {slideIndex = 1}    
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";  
                dots[slideIndex-1].className += " active";
                setTimeout(showSlides, 7000); // Change image every 2 seconds
            }
        </script>
        <div style="padding-left: 15px; font-family: monospace;">
            <h1>Hot Deals...</h1>
        </div>
        <div class="gallery-container">
            <div class="gallery-item">
                <a target="_blank" href="img_5terre.jpg">
                    <img src="webpics/electric_acoustic_crop.jpg" alt="Cinque Terre" width="600" height="400">
                </a>
                <div class="desc">Acoustic Guitar<br>Rs.72,500.00</div>
            </div>
            <div class="gallery-item">
                <a target="_blank" href="img_forest.jpg">
                    <img src="webpics/61lPiQTeZiL._AC_UF1000,1000_QL80_.jpg" alt="Forest" width="600" height="400">
                </a>
                <div class="desc">Tabla<br>Rs.89,000.00</div>
            </div>
            <div class="gallery-item">
                <a target="_blank" href="img_lights.jpg">
                    <img src="webpics/60_3c672d6d-3b85-4c5d-a4b9-979cee74362a.jpg" alt="Northern Lights" width="600" height="400">
                </a>
                <div class="desc">Flute<br>Rs.1,377.00</div>
            </div>
            <div class="gallery-item">
                <a target="_blank" href="img_mountains.jpg">
                    <img src="webpics/03e2b00549ea76c15870b73cadfffdc4.jpg_960x960q80.jpg_.webp" alt="Mountains" width="600" height="400">
                </a>
                <div class="desc">Organ<br>Rs.170,884.00</div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div style="font-family: serif;">
            <h1 style="text-align: center; font-size: 500%;"><b>Our Products</b></h1>
        </div>
        <div class="gallery-container">
            <?php
                $res = mysqli_query($con, "SELECT * FROM product");
                while($row = mysqli_fetch_assoc($res)) {
            ?>
            <div class="gallery-item">
                <a href="loggeddetail.php?product_id=<?php echo $row['product_id']; ?>">
                    <img style="width: 354px;" src="webpics/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                </a>
                <div class="desc"><?php echo $row['name']; ?><br>Rs.<?php echo number_format($row['price'], 2); ?></div>
            </div>
            <?php } ?>
        </div>
        <footer>
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
