<?php
require_once 'CommandeC.php';
include_once '../config.php';

    $commandeC = new CommandeC();
    $commandeC->deleteCommande($_GET["id"]);
    header("Location: ../views/Commande.php?msg=oui");
    exit();

?>
