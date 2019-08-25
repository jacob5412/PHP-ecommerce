<?php

header("Content-Type: application/json; charset=UTF-8");
require("db.php");

if($_GET['req']=="products"){
    // get list of all products
    $rows = [];
    $q_products = "SELECT name as 'name' FROM product";
    $result = $connection->query($q_products);
    while($row = $result -> fetch_array()){
        $rows[] = $row['name'];
    }

    $rows = json_encode($rows);
    echo $rows;
}


?>