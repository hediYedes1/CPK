<?PHP
include "../controller/CatalogueC.php";
$CatalogueC=new CatalogueC();
if (isset($_POST["id_article"])){
	$CatalogueC->supprimerCatalogueC($_POST["id_article"]);
	header('Location: ../views/consultercatalogue.php');
}

?>