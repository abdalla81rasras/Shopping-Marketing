<?php
$conn=mysqli_connect("localhost","root","","vendor_zanzon");
if(!$conn){
    die("Error Connection !!".mysqli_connect_error($conn));
}
?>