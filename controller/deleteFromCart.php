<?php
require_once 'PanierC.php';
include_once '../config.php';

    $panierC = new PanierC();
    $panierC->deletePanier($_GET["panier-id"]);
    header("Location: ../views/panier.php");
    exit();

?>
