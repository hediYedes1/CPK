<?php
	include '../Controller/panierC.php';
	$panierC=new panierC();
	$panierC->modifierPanier($_GET["pid"],$_GET["action"]);
	header('Location:cart.php');
?>