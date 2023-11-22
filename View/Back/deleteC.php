<?php
	include '../../Controller/commandC.php';
	$comC=new commandC();
	$comC->supprimerCom($_GET["id"]);
	header('Location:index.php');
?>