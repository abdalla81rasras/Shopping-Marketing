<?php
$conn_main_admin = mysqli_connect("localhost","root","","zanzon");
if(!$conn_main_admin){
    die("Error Connection !!".mysqli_connect_error($conn_main_admin));
}
?>