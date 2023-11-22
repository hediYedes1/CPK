<?php

    include_once '../Model/panier.php';
    include_once '../Controller/panierC.php';
    $ip = $_GET['p_id'];
    $q = $_GET['q'];
    $iu = $_GET['u_id'];
    $p = $_GET['p'];

    $panier = new panier(
        null,
        $iu,
        $ip,
        $q,
        $p,
      $p
      );
    $panierC= new panierC();
    $db = config::getConnexion();
    $panierC->ajouterAuxPanier($panier);
    header('Location:shop.php');
?>