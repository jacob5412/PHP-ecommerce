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
        //get orders
        $queryorder = "SELECT command.id as id, name, quantity, dat, statut FROM command, product WHERE product.id = command.id_product and command.statut='paid' and id_user=".$_SESSION['id'];
        $resultorder = $connection->query($queryorder);
        if ($resultorder->num_rows > 0) {
            // output data of each row
            while($roworder = $resultorder->fetch_assoc()) {
                $id = $roworder['id'];
                $productname = $roworder['name'];
                $quantity = $roworder['quantity'];
                $dat = $roworder['dat'];
                $statu = $roworder['statut'];
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
    <div class="center-align">
        <br>
        <a href="downloadorder.php?id=<?= $_SESSION['id']; ?>"><button type="submit" name="buy" class="btn-large meh button-rounded waves-effect waves-light ">Download</button></a>
        <br><br>
    </div>
</div>

<?php require 'includes/footer.php'; ?>
