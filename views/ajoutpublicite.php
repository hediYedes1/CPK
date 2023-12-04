<?PHP

include "../model/publicite.php";
include "../controller/PubliciteC.php";

 include "../model/catalogue.php";
//  include "../controller/CatalogueC.php";



// if (isset($_GET['typepub']) and isset ($_GET['imagepub']) and isset ($_GET['nompub']) and isset ($_GET['prix_sans_remise']) and isset ($_GET['prix_avec_remise'])  and isset ($_GET['descriptionpub']) and isset ($_GET['quantitepub']) ){
// $Publicite=new Publicite(($_GET['id_pub']),($_GET['typepub']),($_GET['imagepub']),($_GET['nompub']),($_GET['prix_sans_remise']),($_GET['prix_avec_remise']),($_GET['descriptionpub']),($_GET['quantitepub']) );

// $PubliciteC=new PubliciteC();
// $PubliciteC->ajouterPubliciteC($Publicite);
// header('Location: ../views/consulterpublicite.php');
 
// }else{
// 	echo "verifier les champs";
// }


if ( isset ($_GET['prix_avec_remise']) ){
	$Publicite=new Publicite(($_GET['id_pub']),($_GET['type']),($_GET['image']),($_GET['nom']),($_GET['prix_sans_remise']),($_GET['prix_avec_remise']),($_GET['description']),($_GET['quantite']),($_GET['ida']) );
	
	$PubliciteC=new PubliciteC();
	$PubliciteC->ajouterPubliciteC($Publicite);
	header('Location: ../views/ajoutpublicite.php');
	 
	}else{
		echo "verifier les champs";
	}



?>