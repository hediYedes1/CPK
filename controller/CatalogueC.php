<?PHP
include "config.php";
class CatalogueC {
function afficherCatalogueC ($Catalogue){
		echo "id_article: ".$Catalogue->getId_article()."<br>";
		echo "type: ".$Catalogue->getType()."<br>";
		echo "image: ".$Catalogue->getImage()."<br>";
		echo "nom: ".$Catalogue->getNom()."<br>";
		echo "prix: ".$Catalogue->getPrix()."<br>";
		echo "description: ".$Catalogue->getDescription()."<br>";
		echo "quantite: ".$Catalogue->getquantite()."<br>";
		//) values (:cin, :nom,:prenom,:nbH,:tarifH)";
	}
	
	function ajouterCatalogueC($Catalogue){
		$sql="insert into Catalogue (id_article,type,image,nom,prix,description,quantite) values (:id_article,:type,:image,:nom,:prix,:description,:quantite)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        
        $id_article=$Catalogue->getId_article();
        $type=$Catalogue->getType();
        $image=$Catalogue->getImage();
         $nom=$Catalogue->getNom();
        $prix=$Catalogue->getPrix();
         $description=$Catalogue->getDescription();
		 $quantite=$Catalogue->getquantite();


		$req->bindValue('id_article',$id_article);
		$req->bindValue(':type',$type);
		$req->bindValue(':image',$image);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':description',$description);
		$req->bindValue(':quantite',$quantite);
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

	function affichersingle($id_article){
		//$sql="SElECT * From ReclamationRendezvous e inner join formationphp.ReclamationRendezvous a on e.cin= a.cin";
		$sql="SElECT * From catalogue where id_article= $id_article";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	
	function afficherCatalogue(){
		//$sql="SElECT * From ReclamationRendezvous e inner join formationphp.ReclamationRendezvous a on e.cin= a.cin";
		$sql="SElECT * From catalogue";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerCatalogueC($id_article){
		$sql="DELETE FROM catalogue where id_article=:id_article";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_article',$id_article);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierCatalogue($Catalogue,$id_article){
		$sql="UPDATE catalogue SET id_article=:id_article,type=:type,image=:image,nom=:nom,prix=:prix ,description=:description WHERE id_article=:id_article";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $id_article=$Catalogue->getId_article();
        $type=$Catalogue->getType();
        $image=$Catalogue->getImage();
        $nom=$Catalogue->getNom();
        $prix=$Catalogue->getPrix();
        $description=$Catalogue->getDescription();
		$quantite=$Catalogue->getquantite();
   
		$datas = array(':id_article'=>$id_article,':type'=>$type,':image'=>$image,':nom'=>$nom,':prix'=>$prix,':description'=>$description,':quantite'=>$quantite);
		$req->bindValue(':id_article',$id_article);
		$req->bindValue(':type',$type);
		$req->bindValue(':image',$image);
			$req->bindValue(':nom',$nom);
		$req->bindValue(':prix',$prix);
	$req->bindValue(':description',$description);
	$req->bindValue(':quantite',$quantite);

		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererCatalogue($id_article){
		$sql="SELECT * from catalogue where id_article=$id_article";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function tribytype($type){
		$sql="SELECT * from catalogue where type='$type'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

function pagetotale($prodparpage)
        {
        $db = config::getConnexion();
        $prodsTotalesReq = $db->query('SELECT id_article FROM catalogue');
        $prodsTotales = $prodsTotalesReq->rowCount();
        $prodsTotales = ceil($prodsTotales/$prodparpage);
        return $prodsTotales;
        }
        function pagination($prodparpage,$depart)
        {
        $db = config::getConnexion();
        $Catalogue = $db->query('SELECT * FROM catalogue ORDER BY id_article DESC LIMIT '.$depart.','.$prodparpage);
        return $Catalogue;
        }

	
}

?>