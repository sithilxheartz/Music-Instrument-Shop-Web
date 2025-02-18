<?php
include('dbconnect.php');
session_start();

if (isset($_POST['signin'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $user = stripcslashes($user);
    $pass = stripcslashes($pass);

    $user = mysqli_real_escape_string($con, $user);
    $pass = mysqli_real_escape_string($con, $pass);

    $query = mysqli_query($con, "SELECT * FROM userr WHERE username = '$user' AND upassword = '$pass'");
    $rows = mysqli_num_rows($query);

    if ($rows == 1) {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['role']; // Store the role in the session

        if ($row['role'] == 'admin') {
            header("Location: upload.php"); // Redirect to admin page
        } else {
            header("Location: loggedhome.php"); // Redirect to user page
        }
        exit;
    } else {
        echo "<h2>Please check the Username or the Password</h2>";
    }
}
?>
