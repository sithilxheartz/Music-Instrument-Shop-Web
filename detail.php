<?php
    include('dbconnect.php');

    // Get product ID from URL
    $product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

    // Fetch product details
    $sql = "SELECT * FROM product WHERE product_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    $stmt->close();
    $con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="WithCart.css">
  <title>Products</title>


</head>
    <body style="background-color: antiquewhite;">

    <ul>
            <li><a class="logo-image"><img src="webpics/logo.jpg" height="46"></a></li>
            <li><a href="homef.php">Home</a></li>
            <li class="dropdown">
                <a class="dropbtn">Instruments</a>
                <div class="dropdown-content">
                    <a href="category.php?category=Guitar">Guitar</a>
                    <a href="category.php?category=Piano">Piano</a>
                    <a href="category.php?category=Drum">Drum</a>
                    <a href="category.php?category=Tabla">Tabla</a>
                    <a href="category.php?category=Oragan">Organ</a>
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
            <li class="login">
              <a id="cart-button">Cart</a>
            </li>
            <li class="search-container">
            <form action="search.php" method="GET">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">Search</button>
            </form>
            </li>
        </ul>
             <br>
            <br>
            <table>
                <?php if ($product): ?>
                <tr>
                    <th style="text-align: center; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;" colspan="2"><h1><?php echo htmlspecialchars($product['name']); ?></h1></th>
                </tr>
                <tr>
                  <td style="width: 50%; padding-left: 5%;"><img style="width: 600px;" src="webpics/<?php echo htmlspecialchars($product['image']); ?>"></td>
                  <td><h3 style="font-family:Arial, Helvetica, sans-serif;"><?php echo htmlspecialchars($product['description']); ?></h3>
                    <h3>Started at Rs.<?php echo htmlspecialchars($product['price']); ?>.00</h3>
                    </td>
                </tr>
                <?php endif; ?>
            </table>

            <div class="div-10">

                        <button class="add-to-cart" data-name="<?php echo htmlspecialchars($product['name']); ?>" data-price="<?php echo htmlspecialchars($product['price']); ?>"><h3>Add to Cart</h3></button>
                        <button><h3>Purchase</h3></button>
            </div>

            <div class="cart" id="cart">
                    <div class="cart-header">
                          <h2>Shopping Cart</h2>
                          <button class="clsbutton" id="close-cart">Close</button>
                    </div>
                        <h3>
                        <ul style="background-color: antiquewhite;" class="cart-items" id="cart-items"></ul>
                        <div class="cart-total" id="cart-total"></div>
                        </h3>
                        <button class="pur-button" id="purchase-button"><h3>Purchase</h3></button>
            </div>

<br>

        <footer>
                <div class="footer-container">

                    <div class="footer-part">
                        <h3>About Us</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla auctor, vestibulum magna sed, convallis ex.</p>
                    </div>

                    <div class="footer-part">
                        <h3>Follow Us</h3>
                        <ul>
                            <li style="padding-left: 25%;"><a href=""><img src="webpics/dribble.png"width="30px" height="30px"></a></li>
                            <li><a href=""><img src="webpics/instagram.png"width="30px" height="30px"></a></li>
                            <li><a href=""><img src="webpics/telegram.png"width="30px" height="30px" ></a></li>
                        </ul>
                    </div>

                    <div class="footer-part">
                      <h3>Contact</h3>
                      <p><img src="webpics/pngwing.com (1).png" width="20px" height="20px" alt="Mobile Icon" style="vertical-align: middle; margin-top: -3px;"> rhythmmusic@gmail.com</p>
                      <p><img src="webpics/pngwing.com.png" width="20px" height="20px" alt="Mobile Icon" style="vertical-align: middle; margin-top: -3px;"> 077 660 8899</p>
                    </div>

                </div>
        </footer>

        <script>
            const cartButton = document.getElementById('cart-button');
            const closeCartButton = document.getElementById('close-cart');
            const cart = document.getElementById('cart');
            const cartItems = document.getElementById('cart-items');
            const cartTotal = document.getElementById('cart-total');
            const purchaseButton = document.getElementById('purchase-button');

            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            let cartData = [];

            function updateCart() {
              cartItems.innerHTML = '';
              let total = 0;
              cartData.forEach(item => {
                const li = document.createElement('li');
                li.textContent = `${item.name} - Rs.${item.price} ||`;
                cartItems.appendChild(li);
                total += item.price;
              });
              cartTotal.textContent = `Total: Rs.${total}`;
            }

            cartButton.addEventListener('click', () => {
              cart.classList.add('active');
            });

            closeCartButton.addEventListener('click', () => {
              cart.classList.remove('active');
            });

            addToCartButtons.forEach(button => {
              button.addEventListener('click', () => {
                const name = button.getAttribute('data-name');
                const price = parseInt(button.getAttribute('data-price'));
                cartData.push({ name, price });
                updateCart();
              });
            });

            purchaseButton.addEventListener('click', () => {
              if (cartData.length > 0) {
                alert('Thank you for your purchase!');
                cartData = [];
                updateCart();
                cart.classList.remove('active');
              } else {
                alert('Your cart is empty!');
              }
            });
        </script>
    </body>
</html>
