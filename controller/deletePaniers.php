<?php
require_once 'PanierC.php';
include_once '../config.php';

// Get the selected panier IDs from the AJAX request
$selectedPaniers = json_decode($_POST['selectedPaniers'], true);

// Assuming you have a PanierC object
$panierC = new PanierC();

// Use only the IDs from the $selectedPaniers array
$selectedPanierIds = array_column($selectedPaniers, 'id');

// Delete the selected paniers
foreach ($selectedPanierIds as $panierId) {
    $panierC->deletePanier($panierId);
}

// Send a response
$response = ['status' => 'success'];
header('Content-Type: application/json');
echo json_encode($response);
?>
