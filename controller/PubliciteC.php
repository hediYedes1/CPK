<?PHP
include "config.php";
class PubliciteC {
function afficherPubliciteC ($Publicite){
		echo "id_pub: ".$Publicite->getId_pub()."<br>";
		echo "type: ".$Publicite->getTypepub()."<br>";
		echo "image: ".$Publicite->getImagepub()."<br>";
		echo "nom: ".$Publicite->getNompub()."<br>";
		echo "prix: ".$Publicite->getPrixsansremise()."<br>";
        echo "prix_avec_remise: ".$Publicite->getPrixavecremise()."<br>";
		echo "description: ".$Publicite->getDescriptionpub()."<br>";
		echo "quantite: ".$Publicite->getQuantitepub()."<br>";
	
	}
	
    function ajouterPubliciteC($prix_avec_remise, $id_article) {
        $sql = "INSERT INTO pub (prix_avec_remise, id_article) VALUES (:prix_avec_remise, :id_article)";
        
        try {
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            $req->bindParam(':prix_avec_remise', $prix_avec_remise, PDO::PARAM_INT);
            $req->bindParam(':id_article', $id_article, PDO::PARAM_INT);
            $req->execute();
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    

	function affichersinglepub($id_pub){

		$sql="SELECT *,(c.prix*(e.prix_avec_remise/100)) as prix_avec_remise  From pub e inner join  Catalogue c on e.id_article = c.id_article where e.id_pub= $id_pub";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	
	function afficherpublicite(){
		
		$sql="SELECT *,(c.prix*(e.prix_avec_remise/100)) as prix_avec_remise  From pub e inner join  Catalogue c on e.id_article = c.id_article";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerpubliciteC($id_pub){
		$sql="DELETE FROM pub where id_pub=:id_pub";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_pub',$id_pub);
		try{
            $req->execute();
      
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierpublicite($Publicite,$id_pub){
		$sql="UPDATE pub SET id_pub=:id_pub,type=:type,image=:image,nom=:nom,prix=:prix,prix_avec_remise=:prix_avec_remise ,description=:description,quantite=:quantite WHERE id_pub=:id_pub";
		
		$db = config::getConnexion();
		
try{		
        $req=$db->prepare($sql);
        $id_pub=$Publicite->getId_pub();
        $type=$Publicite->getTypepub();
        $image=$Publicite->getImagepub();
        $nom=$Publicite->getNompub();
        $prix=$Publicite->getPrixsansremise();
        $prix_avec_remise=$Publicite->getPrixavecremise();
        $description=$Publicite->getDescriptionpub();
		$quantite=$Publicite->getQuantitepub();
   
		$datas = array(':id_pub'=>$id_pub,':type'=>$type,':image'=>$image,':nom'=>$nom,':prix'=>$prix,':prix_avec_remise'=>$prix_avec_remise,':description'=>$description,':quantite'=>$quantite);
		$req->bindValue('id_pub',$id_pub);
		$req->bindValue(':type',$type);
		$req->bindValue(':image',$image);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prix',$prix);
        $req->bindValue(':prix_avec_remise',$prix_avec_remise);
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
	function recupererpublicite($id_pub){
		$sql="SELECT *,(c.prix*(e.prix_avec_remise/100)) as prix_avec_remise  From pub e inner join  Catalogue c on e.id_article = c.id_article where e.id_pub=$id_pub";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function tribytypepub($type){
		$sql="SELECT * from pub where type='$type'";
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
        $prodsTotalesReq = $db->query('SELECT id_pub FROM pub');
        $prodsTotales = $prodsTotalesReq->rowCount();
        $prodsTotales = ceil($prodsTotales/$prodparpage);
        return $prodsTotales;
        }
        function pagination($prodparpage,$depart)
        {
        $db = config::getConnexion();
        $Publicite = $db->query('SELECT *,(c.prix*(e.prix_avec_remise/100)) as prix_avec_remise  From pub e inner join  Catalogue c on e.id_article = c.id_article ORDER BY e.id_pub DESC LIMIT '.$depart.','.$prodparpage);
        return $Publicite;
        }

	

		function gettypeBytype()
    {
       $sql = "SELECT type, COUNT(*) AS nombre FROM pub GROUP BY type";
//        $sql = "SELECT
//        type,
//        COUNT(*) AS nombre
//    FROM publicit
//    WHERE typepub IN ('Art', 'Culture')
//    GROUP BY typepub";
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

    public function getPubliciteByArticleId($id_article) {
        $query = "SELECT *,(c.prix*(e.prix_avec_remise/100)) as prix_avec_remise  From pub e inner join  Catalogue c on e.id_article = c.id_article WHERE e.id_article = :id_article"; // Assuming the id_pub is the correct column name
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($query);
            $stmt->bindParam(":id_article", $id_article);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle the exception, e.g., log or return an error response
            return false;
        }
    }


}









?>