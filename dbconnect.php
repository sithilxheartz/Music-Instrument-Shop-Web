<?php
    $con = mysqli_connect("localhost", "root", "", "rhythmmusic");
    if($con == false)
    {
        die("Connection Error". mysqli_connect_error());
    }
?>