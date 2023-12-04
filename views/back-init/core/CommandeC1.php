<?PHP
include "../config.php";
class CommandeC {
function afficherCommandeC ($Commande){
		echo "idCom: ".$Commande->getidCom()."<br>";
		echo "idClient: ".$Commande->getidClient()."<br>";
		
		echo "prTotal: ".$Commande->getprtotal()."<br>";
		echo "etatCom: ".$Commande>getetatCom()."<br>";
		//) values (:cin, :nom,:prenom,:nbH,:tarifH)";
	}
	
	function ajouterCommande($Commande){
		$sql="insert into commande (idCom,idClient,prTotal,etatCom) values (:idCom,:idClient,:prTotal,:etatCom)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        
        $idCom=$idCom->getidCom();
        $idClient=$idClient->getidClient();
      
        $prTotal=$prTotal->getprtotal();
        $etatCom=$etatCom->getetatCom();
       
        

		$req->bindValue('idCom',$idCom);
		$req->bindValue(':idClient',$idClient);
	
		$req->bindValue(':prTotal',$prTotal);
		$req->bindValue(':etatCom',$etatCom);
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherCommande(){
		//$sql="SElECT * From ReclamationRendezvous e inner join formationphp.ReclamationRendezvous a on e.cin= a.cin";
		$sql="SElECT * From commande";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerCommande($idCom){
		$sql="DELETE FROM commande where idCom=:idCom";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idCom',$idCom);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierCommande($Commande,$idCom){
		$sql="UPDATE commande SET idCom=:idCom,idClient=:idClient,prtotal=:prtotal,etatCom=:etatCom WHERE idCom=:idCom";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $idCom=$Commande->getidCom();
        $idClient=$Commande->getidClient();

        $prTotal=$Commande->getprtotal();
        $etatCom=$Commande->getetatCom();

   
		$datas = array(':idCom'=>$idCom,':idClient'=>$idClient, ':prTotal'=>$prTotal, ':etatCom'=>$etatCom);
		$req->bindValue(':idCom',$idCom);
		$req->bindValue(':idClient',$idClient);
		
		$req->bindValue(':prTotal',$prTotal);
		$req->bindValue(':etatCom',$etatCom);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererCommande($idCom){
		$sql="SELECT * from commande where idCom=$idCom";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	

	function recherche($recherche){
		
		$sql="SELECT * FROM commande WHERE idCom LIKE '%".$recherche."%' ORDER BY idCom ASC";
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