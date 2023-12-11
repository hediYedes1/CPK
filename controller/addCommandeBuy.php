<?php
require_once 'CommandeC.php';
include_once '../config.php';


if (isset($_GET['produit_id'])&&$_GET['total_price']) {
  

    // Assuming you have a CommandeC object
    $commandeC = new CommandeC();

    // Replace the following with your logic to save the data to the database
    // For example, you might associate the article_id data with a user and set a status
    $userId = 1; // Replace with the actual user ID
    $status = 'pending'; // Replace with the desired status

    // Save each product from the selectedProducts array
        $commandeC->addCommande($userId, $_GET['produit_id'],1, $_GET['total_price'],$status);
        header("Location: ../views/singlepage.php?id=" . $_GET['produit_id'] . "&msg=msg");
        exit();

}
?>
