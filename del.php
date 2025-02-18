<?php
    include('dbconnect.php');
    if(isset($_GET['delid']))
    {
        $id = $_GET['delid'];
        $sql = mysqli_query($con, "delete from product where product_id='$id'");
        if($sql)
        {
            echo "<script type='text/javascript'> document.location ='update.php'; </script>";
        }
    }
?>