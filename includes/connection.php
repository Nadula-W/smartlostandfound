<?php
$conn = new mysqli("localhost", "root", "", "smartlostfound", 3307);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
