<?php
session_start();

require('includes/mysql_table.php');
include('db.php');

class PDF extends PDF_MySQL_Table
{
    function Header()
    {
        // Title
        $this->SetFont('Arial','',18);
        $this->Cell(0,6,'User Invoice',0,1,'C');
        $this->Ln(10);
        // Ensure table header is printed
        parent::Header();
    }
}

// Connect to database
$link = mysqli_connect('localhost','root','MyNewPass','ecommerce');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $pdf = new PDF();
    $pdf->AddPage();
    // Table
    $pdf->AddCol('name',80,'Name','L');
    $pdf->AddCol('quantity',25,'Quantity','C');
    $pdf->AddCol('dat',45,'Date','L');
    $pdf->AddCol('statut',23,'Status','L');
    $prop = array('HeaderColor'=>array(192,192,192),
        'color1'=>array(255,255,255),
        'color2'=>array(224,224,224),
        'padding'=>2);
    $pdf->Table($link,'SELECT name, quantity, dat, statut FROM command, product WHERE product.id = command.id_product and command.statut="paid" and id_user='.$id, $prop);
    $queryuname = "SELECT firstname, lastname FROM users WHERE id = '$id'";
    $result = $connection->query($queryuname);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $pdf->Ln();
            $pdf->Cell(70, 10, 'Invoice generated for '.$row['firstname'].' '.$row['lastname'], 0, 1, 'C');
        }
    }
    $pdf->Output();
}

else {
    header('Location: sign');
}

