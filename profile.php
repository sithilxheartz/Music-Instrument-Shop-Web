<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="rythmmusic.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .profile {
            max-width: 50%;
            background-color: violet;
            padding: 20px;
            margin: auto;
            margin-top: 200px;
            margin-bottom: 200px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            opacity: 0.9;
        }
        .profile h2 {
            text-align: center;
            color: white;
        }
        .profile-info {
            margin-top: 20px;
            color: white;
            text-align: center;
        }
        .profile-info label {
            font-weight: bold;
        }
        .profile-info p {
            margin: 5px 0;
        }
        .button {
            background-color: red; /* Green */
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }
        .button1 {
            background-color: white; 
            color: black; 
            border: 2px solid black;
            border-radius: 8px;
            margin-top: 20px;
            margin: auto;
        }
        
        .button1:hover {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body style="background-image: url('webpics/bg.jpg');">
    <ul style="background-color: violet;">
        <li><a class="logo-image"><img src="webpics/logo.jpg" height="46"></a></li>
        <li><a href="loggedhome.php">Home</a></li>
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
        <li class="login"><a class="active" href="profile.php">Profile</a></li>
        <li class="cart"><a href="#cart">Cart</a></li>
        <li class="search-container">
            <form action="loggedsearch.php" method="GET">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">Search</button>
            </form>
        </li>
    </ul>

    <div class="profile">
        <h2>User Profile</h2>
        <div class="profile-info">
            <label>Username: <?php echo $_SESSION['username']; ?></label>
            <br>
            <br>
            <label>Email: <?php echo $_SESSION['email']; ?></label>
            <br>
            <br>
            <button class="button button1"><a style="text-decoration: none;" href="homef.php">Log Out</a></button>
        </div>
    </div>

    <footer style="background-color: violet;">
        <div class="footer-container">
            <div class="footer-part">
                <h3>About Us</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla auctor, vestibulum magna sed, convallis ex.</p>
            </div>
            <div class="footer-part">
                <h3>Follow Us</h3>
                <ul style="background-color: violet;">
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
