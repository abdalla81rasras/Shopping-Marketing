<?php
$conn_store_admin = mysqli_connect("localhost","root","","vendor_zanzon");
if(!$conn_store_admin){
    die("Error Connection !!".mysqli_connect_error($conn_store_admin));
}
?>