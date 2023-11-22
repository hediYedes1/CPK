<?php
include '../Controller/commandC.php';
include '../Controller/panierC.php';

$id = $_GET['id'];
$prixT=$_GET['p'];
$panierC = new panierC();
$panier = $panierC->panierUser($id);

/**/

$command = new command(
    null,
    $id,
    date("Y-m-d"),
    $prixT,
    "Non livre"
  );
$commandC= new commandC();
$db = config::getConnexion();
$commandC->ajouterCommand($command);
foreach($panier as $p)
{
  $commandC->ajouterCommandDetail($p);
    $panierC->supprimerItem($p["panier_id"]);
}

header('Location:shop.php');


?>