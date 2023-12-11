<?php
require_once 'PanierC.php';
include_once '../config.php';
$panierC = new PanierC();
$userId = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product-id"])) {

    $productId = $_POST["product-id"];

  
    // Call the addPanier function with the necessary parameters
    $panierC->addPanier($userId, $productId);

    // Redirect or do whatever you want after adding to the cart
    header("Location: ../views/singlepage.php?id=" . $productId . "&msg=oui");
    exit();
}

if (isset($_GET["product-id"])) {

    $panierC->addPanier($userId,$_GET["product-id"]);
    header("Location: ../views/panier.php?msg=sa");
    exit();

}
?>
