<?php
require_once 'CommandeC.php';
include_once '../config.php';


if (isset($_POST['selectedProducts'])) {
    // Decode the JSON data sent via AJAX
    $selectedProducts = json_decode($_POST['selectedProducts'], true);

    // Assuming you have a CommandeC object
    $commandeC = new CommandeC();

    // Replace the following with your logic to save the data to the database
    // For example, you might associate the article_id data with a user and set a status
    $userId = 1; // Replace with the actual user ID
    $status = 'pending'; // Replace with the desired status

    // Save each product from the selectedProducts array
    foreach ($selectedProducts as $product) {
        $commandeC->addCommande($userId, $product['id_article'], $product['total_quantity'], $product['total_price'], $status);
    }

    // Respond to the AJAX request (optional)
    echo 'Data saved successfully';
} else {
    // Handle errors or redirect to an error page
    echo 'Error: Data not received';
}
?>
