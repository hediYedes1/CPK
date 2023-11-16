<?PHP
include "../model/catalogue.php";
include "../controller/CatalogueC.php";

if (isset($_GET['id_article']) and isset($_GET['type']) and isset ($_GET['image']) and isset ($_GET['nom']) and isset ($_GET['prix']) and isset ($_GET['description'])  and isset ($_GET['quantite']) ){
$Catalogue=new Catalogue(($_GET['id_article']),($_GET['type']),($_GET['image']),($_GET['nom']),($_GET['prix']),($_GET['description']),($_GET['quantite']) );
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3

$CatalogueC=new CatalogueC();
$CatalogueC->ajouterCatalogueC($Catalogue);
header('Location: ../back/catalogue.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>