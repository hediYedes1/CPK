<?php
	include '../Controller/panierC.php';
	$panierC=new panierC();
	$panierC->supprimerItem($_GET["pid"]);
	header('Location:cart.php');
?>