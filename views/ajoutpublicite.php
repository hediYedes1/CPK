<?php
include "../model/publicite.php";
include "../controller/PubliciteC.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required fields are set
    if (isset($_POST['prix_avec_remise'])) {
        // Retrieve id_article from $_POST
        $id_article =  $_POST["id_article"];

        $PubliciteC = new PubliciteC();
        $PubliciteC->ajouterPubliciteC($_POST['prix_avec_remise'], $id_article);
        header('Location: ../views/consulterpublicite.php');
    } else {
        echo "Veuillez vérifier les champs.";
    }
}
?>
