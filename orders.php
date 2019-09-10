<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
    $nav ='includes/nav.php';
}
else {
    $nav ='includes/navconnected.php';
    $idsess = $_SESSION['id'];
}


require 'includes/header.php';
require $nav; ?>

<div class="container-fluid product-page">
    <div class="container current-page">
        <nav>
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="index" class="breadcrumb">E-Commerce</a>
                    <a href="orders" class="breadcrumb">Orders</a>
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="container scroll">
    <table class="highlight striped">
        <thead>
        <tr>
            <th data-field="name">Name</th>
            <th data-field="quantity">Quantity</th>
            <th data-field="date">Date</th>
            <th data-field="status">Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include 'db.php';

        //get users
        $queryuser = "SELECT command.id as id, name, quantity, dat, statut FROM command, product WHERE product.id = command.id_product and id_user=".$_SESSION['id'];
        $resultuser = $connection->query($queryuser);
        if ($resultuser->num_rows > 0) {
            // output data of each row
            while($rowuser = $resultuser->fetch_assoc()) {
                $id = $rowuser['id'];
                $productname = $rowuser['name'];
                $quantity = $rowuser['quantity'];
                $dat = $rowuser['dat'];
                $statu = $rowuser['statut'];
                ?>
                <tr>
                    <td><?= $productname; ?></td>
                    <td><?= $quantity; ?></td>
                    <td><?= $dat; ?></td>
                    <td><?= $statu; ?></td>
                </tr>
            <?php }}  ?>
        </tbody>
    </table>
</div>

<?php require 'includes/footer.php'; ?>
