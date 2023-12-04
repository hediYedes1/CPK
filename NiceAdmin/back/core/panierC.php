<?PHP
include "../config.php";
class PanierC {
function afficherPanier ($Panier){
		echo "id_panier: ".$Panier->getid_panier()."<br>";
		echo "id_commande: ".$Panier->getid_commande()."<br>";
		echo "id_client: ".$Panier->getid_client()."<br>";
		echo "total: ".$Panier->gettotal()."<br>";
		echo "transporteur: ".$Panier>gettransporteur()."<br>";
		echo "date: ".$Panier>getdate()."<br>";
		//) values (:cin, :nom,:prenom,:nbH,:tarifH)";
	}
		function afficherPanierC(){
		//$sql="SElECT * From ReclamationRendezvous e inner join formationphp.ReclamationRendezvous a on e.cin= a.cin";
		$sql="SElECT * From panier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	
	
	function ajouterPanier($Panier){
		$sql="insert into panier (id_panier,id_commande,id_client,total,transporteur,date) values (:id_panier,:id_commande,:id_client,:total,:transporteur,:date)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        
        $id_panier=$id_panier->getid_panier();
        $id_commande=$id_commande->getid_commande();
        $id_client=$id_client->getid_client();
        $total=$total->gettotal();
        $transporteur=$transporteur->gettransporteur();
		$date=$date->getdate();       
        

		$req->bindValue('id_panier',$id_panier);
		$req->bindValue(':id_commande',$id_commande);
		$req->bindValue(':id_client',$id_client);
		$req->bindValue(':total',$total);
		$req->bindValue(':transporteur',$transporteur);
		$req->bindValue(':date',$date);
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function supprimerPanier($id_panier){
		$sql="DELETE FROM panier where id_panier=:id_panier";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_panier',$id_panier);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierPanier($Panier,$id_panier){
		$sql="UPDATE panier SET id_panier=:id_panier,id_commande=:id_commande,id_client=:id_client,total=:total,transporteur=:transporteur WHERE id_panier=:id_panier";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $id_panier=$Panier->getid_panier();
        $id_commande=$Panier->getid_commande();
		$id_client=$Panier->getid_client();
        $total=$Panier->gettotal();
        $transporteur=$Panier->gettransporteur();
        $date=$Panier->getdate();

   
		$datas = array(':id_panier'=>$id_panier,':id_commande'=>$id_commande,':id_client'=>$id_client, ':total'=>$total, ':transporteur'=>$transporteur, ':date'=>$date);
		$req->bindValue(':id_panier',$id_panier);
		$req->bindValue(':id_commande',$id_commande);
		$req->bindValue(':id_client',$id_client);
		$req->bindValue(':total',$total);
		$req->bindValue(':transporteur',$transporteur);
		$req->bindValue(':date',$date);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererPanier($id_panier){
		$sql="SELECT * from panier where id_panier=$id_panier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	

	
}

?>