<?php

$connection = mysqli_connect('localhost', 'root', 'MyNewPass', 'ecommerce');
if(!$connection) {
    die("Database connection failed");
}
$q = "SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO'";
$connection -> query($q);

?>
