<?PHP
include "config.php";
class PubliciteC {
function afficherPubliciteC ($Publicite){
		echo "id_pub: ".$Publicite->getId_pub()."<br>";
		echo "typepub: ".$Publicite->getTypepub()."<br>";
		echo "imagepub: ".$Publicite->getImagepub()."<br>";
		echo "nompub: ".$Publicite->getNompub()."<br>";
		echo "prix_sans_remise: ".$Publicite->getPrixsansremise()."<br>";
        echo "prix_avec_remise: ".$Publicite->getPrixavecremise()."<br>";
		echo "descriptionpub: ".$Publicite->getDescriptionpub()."<br>";
		echo "quantitepub: ".$Publicite->getQuantitepub()."<br>";
	
	}
	
	function ajouterPubliciteC($Publicite){
		$sql="INSERT INTO publicite (id_pub,typepub,imagepub,nompub,prix_sans_remise,prix_avec_remise,descriptionpub,quantitepub,ida) 
			VALUES (:id_pub,:typepub,:imagepub,:nompub,:prix_sans_remise,:prix_avec_remise,:descriptionpub,:quantitepub,:ida)";
			
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    'id_pub' => $Publicite->getId_pub(),
                    'typepub' => $Publicite->getTypepub(),
                    'imagepub' => $Publicite->getImagepub(),
					'nompub' => $Publicite->getNompub(),
					'prix_sans_remise' => $Publicite->getPrixsansremise(),
					'prix_avec_remise' => $Publicite->getPrixavecremise(),
					'descriptionpub' => $Publicite->getDescriptionpub(),	
                    'quantitepub' => $Publicite->getQuantitepub(),	
                    'ida' => $Publicite->getIda(),	
		
			]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}		
		
	}

	function affichersinglepub($id_pub){

		$sql="SElECT * From pub where id_pub= $id_pub";
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
		
		$sql="SElECT * From pub";
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
		$sql="UPDATE pub SET id_pub=:id_pub,typepub=:typepub,imagepub=:imagepub,nompub=:nompub,prix_sans_remise=:prix_sans_remise,prix_avec_remise=:prix_avec_remise ,descriptionpub=:descriptionpub  ,quantitepub=:quantitepub WHERE id_pub=:id_pub";
		
		$db = config::getConnexion();
		
try{		
        $req=$db->prepare($sql);
        $id_pub=$Publicite->getId_pub();
        $typepub=$Publicite->getTypepub();
        $imagepub=$Publicite->getImagepub();
        $nompub=$Publicite->getNompub();
        $prix_sans_remise=$Publicite->getPrixsansremise();
        $prix_avec_remise=$Publicite->getPrixavecremise();
        $descriptionpub=$Publicite->getDescriptionpub();
		$quantitepub=$Publicite->getQuantitepub();
   
		$datas = array(':id_pub'=>$id_pub,':typepub'=>$typepub,':imagepub'=>$imagepub,':nompub'=>$nompub,':prix_sans_remise'=>$prix_sans_remise,':prix_avec_remise'=>$prix_avec_remise,':descriptionpub'=>$descriptionpub,':quantitepub'=>$quantitepub);
		$req->bindValue('id_pub',$id_pub);
		$req->bindValue(':typepub',$typepub);
		$req->bindValue(':imagepub',$imagepub);
		$req->bindValue(':nompub',$nompub);
		$req->bindValue(':prix_sans_remise',$prix_sans_remise);
        $req->bindValue(':prix_avec_remise',$prix_avec_remise);
		$req->bindValue(':descriptionpub',$descriptionpub);
		$req->bindValue(':quantitepub',$quantitepub);

		
            $s=$req->execute();
			
          
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererpublicite($id_pub){
		$sql="SELECT * from pub where id_pub=$id_pub";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function tribytypepub($typepub){
		$sql="SELECT * from pub where typepub='$typepub'";
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
        $Publicite = $db->query('SELECT * FROM pub ORDER BY id_pub DESC LIMIT '.$depart.','.$prodparpage);
        return $Publicite;
        }

	

		function gettypeBytype()
    {
       $sql = "SELECT typepub, COUNT(*) AS nombre FROM pub GROUP BY typepub";
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
        $query = "SELECT * FROM pub WHERE id_pub = :id_article"; // Assuming the id_pub is the correct column name
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





    // function ajouterPubliciteC($Publicite){
    //     $db = config::getConnexion();
    //     $db->beginTransaction(); // Start a transaction
    
    //     try {
    //         // Insert into pub table
    //         $sqlPub = "INSERT INTO Publicite (id_pub, typepub, imagepub, nompub, prix_sans_remise, prix_avec_remise, descriptionpub, quantitepub) 
    //                    VALUES (:id_pub, :typepub, :imagepub, :nompub, :prix_sans_remise, :prix_avec_remise, :descriptionpub, :quantitepub)";
    //         $reqPub = $db->prepare($sqlPub);
            
    //         // Bind values
    //         $reqPub->bindValue(':id_pub', $Publicite->getId_pub());
    //         $reqPub->bindValue(':typepub', $Publicite->getTypepub());
    //         $reqPub->bindValue(':imagepub', $Publicite->getImagepub());
    //         $reqPub->bindValue(':nompub', $Publicite->getNompub());
    //         $reqPub->bindValue(':prix_sans_remise', $Publicite->getPrixsansremise());
    //         $reqPub->bindValue(':prix_avec_remise', $Publicite->getPrixavecremise());
    //         $reqPub->bindValue(':descriptionpub', $Publicite->getDescriptionpub());
    //         $reqPub->bindValue(':quantitepub', $Publicite->getQuantitepub());
    
    //         $reqPub->execute();
    
    //         // Insert into catalogue table
    //         $sqlCatalogue = "INSERT INTO catalogue (id_article, type, image, nom, prix, description, quantite) 
    //                          VALUES (:id_article, :type, :image, :nom, :prix, :description, :quantite)";
    //         $reqCatalogue = $db->prepare($sqlCatalogue);
            
    //         // Assuming $Publicite is an instance of the Catalogue class, otherwise modify accordingly
    //         $reqCatalogue->bindValue(':id_article', $Publicite->getId_article());
    //         $reqCatalogue->bindValue(':type', $Publicite->getType());
    //         $reqCatalogue->bindValue(':image', $Publicite->getImage());
    //         $reqCatalogue->bindValue(':nom', $Publicite->getNom());
    //         $reqCatalogue->bindValue(':prix', $Publicite->getPrix());
    //         $reqCatalogue->bindValue(':description', $Publicite->getDescription());
    //         $reqCatalogue->bindValue(':quantite', $Publicite->getquantite());
    
    //         $reqCatalogue->execute();
    
    //         // If all queries succeed, commit the transaction
    //         $db->commit();
    //         echo "Records inserted successfully.";
    //     } catch (Exception $e) {
    //         // If any query fails, roll back the transaction
    //         $db->rollBack();
    //         echo 'Erreur: ' . $e->getMessage();
    //     }
    // }
    
}









?>