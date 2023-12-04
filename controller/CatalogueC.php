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
      
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierCatalogue($Catalogue,$id_article){
		$sql="UPDATE catalogue SET id_article=:id_article,type=:type,image=:image,nom=:nom,prix=:prix ,description=:description  ,quantite=:quantite WHERE id_article=:id_article";
		
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
   
		$datas = array(':id_article'=>$id_article,':type'=>$type,':image'=>$image,':nom'=>$nom,':prix'=>$prix,':description'=>$description,':quantite'=>$quantite);
		$req->bindValue(':id_article',$id_article);
		$req->bindValue(':type',$type);
		$req->bindValue(':image',$image);
			$req->bindValue(':nom',$nom);
		$req->bindValue(':prix',$prix);
	$req->bindValue(':description',$description);
	$req->bindValue(':quantite',$quantite);

		
            $s=$req->execute();
			
          
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

	

        public function gettypeBytype()
        {
            $sql = "SELECT type, COUNT(*) AS nombre FROM catalogue WHERE type IN ('Art', 'Culture') GROUP BY type";
            $db = config::getConnexion();
            try {
                $statement = $db->query($sql);
                $data = $statement->fetchAll(PDO::FETCH_ASSOC);
                header('Content-Type: application/json');
                echo json_encode($data);
            } catch (PDOException $e) {
                header('HTTP/1.1 500 Internal Server Error');
                echo json_encode(["error" => "Internal Server Error"]);
            }
        }

function Recherche($nom){
    $sql="SELECT * from catalogue where nom like '".$nom."%' ";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur:'. $e->getMessage());
    }
}


    public function affichercat(){
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM catalogue");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

	public function afficher_publicite_selon_id_de_article($id_article){
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM pub WHERE ida = :id");
            $query->execute(['id' => $id_article]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo  $e->getMessage();
        }
    }

	
}
$CatalogueC=new CatalogueC();

if (isset($_GET['action'])) {
  if ($_GET['action'] === 'gettype') {
      $CatalogueC->gettypeBytype();
      exit; // Important to exit to prevent further execution
  }
  // Add more actions if needed
}

header('HTTP/1.1 400 Bad Request');
// echo json_encode(["error" => "Invalid Request"]);







?>