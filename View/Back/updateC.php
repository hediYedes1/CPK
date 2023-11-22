<?php
	include '../../Controller/commandC.php';
	$comC=new commandC();
	$comC->update($_GET["id"]);
	header('Location:index.php');
?>