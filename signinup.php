<?php
    include('dbconnect.php');
    if(isset($_POST['signup']))
    {
        $username = $_POST['signup-username'];
        $email = $_POST['signup-email'];
        $password = $_POST['signup-password'];

        $query = mysqli_query($con, "Insert into userr (username, email, upassword) values ('$username', '$email', '$password')");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Page</title>
    <link rel="stylesheet" type="text/css" href="SignUp.css">
</head>
<body style="background-image: url('webpics/sbg.jpg'); background-size: 1600px;">
    <div class="container" id="signin-container">
        <form name="f1" onsubmit="return validation()" action="authentication.php" method="post">
        <h2>Sign In Here</h2>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button name="signin">Sign In</button>
        <div class="toggle" onclick="toggleForm()">Don't have an account? Sign Up</div>
        </form>
    </div>

    <script>
        function validation()
        {
            var user = document.f1.username.value;
            var ps = document.f1.password.value;
            if(user.length == "" && ps.length == "")
            {
                alert("Username and Password are required");
                return false;
            }
            else
            {
                if(user.length == "")
                {
                    alert("Username is required");
                    return false;
                }
                if(ps.length == "") 
                {
                    alert("Password is required");
                    return false;
                }
            }
        }
    </script>

    <div class="container" id="signup-container" style="display:none;">
        <form method="POST">
        <h2>Sign Up Here</h2>
        <input type="text" id="signup-username" name="signup-username" placeholder="Username">
        <input type="email" id="signup-email" name="signup-email" placeholder="Email">
        <input type="password" id="signup-password" name="signup-password" placeholder="Password">
        <button type="submit" name="signup">Sign Up</button>
        <div class="toggle" onclick="toggleForm()">Already have an account? Sign In</div>
        </form>
    </div>

    <script>
        function toggleForm() {
            const signInContainer = document.getElementById('signin-container');
            const signUpContainer = document.getElementById('signup-container');
            if (signInContainer.style.display === "none") {
                signInContainer.style.display = "block";
                signUpContainer.style.display = "none";
            } else {
                signInContainer.style.display = "none";
                signUpContainer.style.display = "block";
            }
        }
    </script>
</body>
</html>
