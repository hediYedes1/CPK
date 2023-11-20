<?PHP
include "../config.php";
class FactureC {
function afficherFactureC ($Facture){
		echo "idFac: ".$Facture->getidCom()."<br>";
		echo "idClient: ".$Facture->getidClient()."<br>";
		echo "quArt: ".$Facture->getquArt()."<br>";
		echo "prTotal: ".$Facture->getprtotal()."<br>";
		echo "etatFac: ".$Facture>getetatCom()."<br>";
		echo "modPai: ".$Facture>getetatCom()."<br>";
		//) values (:cin, :nom,:prenom,:nbH,:tarifH)";
	}
	
	function ajouterFacture($Facture){
		$sql="insert into Facture (idFac,idClient,quArt,prTotal,etatFac,modPai) values (:idFac,:idClient,:quArt,:prTotal,:etatFac,:modPai)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        
        $idFac=$idFac->getidFac();
        $idClient=$idClient->getidClient();
        $quArt=$quArt->getquArt();
        $prTotal=$prTotal->getprtotal();
        $etatFac=$etatFac->getetatFac();
        $modPai=$modPai->getmodPai();
       
        

		$req->bindValue('idFac',$idFac);
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':quArt',$quArt);
		$req->bindValue(':prTotal',$prTotal);
		$req->bindValue(':etatFac',$etatFac);
		$req->bindValue(':modPai',$modPai);
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherFacture(){
		//$sql="SElECT * From ReclamationRendezvous e inner join formationphp.ReclamationRendezvous a on e.cin= a.cin";
		$sql="SElECT * From Facture";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerFacture($idFac){
		$sql="DELETE FROM Facture where idFac=:idFac";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idFac',$idFac);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierFacture($Facture,$idCom){
		$sql="UPDATE Facture SET idFac=:idFac,idClient=:idClient,quArt=:quArt,prtotal=:prtotal,etatFac=:etatFac,modPai=:modPai  WHERE idFac=:idFac";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $idFac=$Facture->getidFac();
        $idClient=$Facture->getidClient();
		$quArt=$Facture->getquArt();
        $prTotal=$Facture->getprtotal();
        $etatCom=$Facture->getetatCom();
        $modPai=$Facture->getmodPai();

   
		$datas = array(':idFac'=>$idFac,':idClient'=>$idClient,':quArt'=>$quArt, ':prTotal'=>$prTotal, ':etatCom'=>$etatCom ,':modPai'=>$modPai);
		$req->bindValue(':idFac',$idFac);
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':quArt',$quArt);
		$req->bindValue(':prTotal',$prTotal);
		$req->bindValue(':etatCom',$etatCom);
		$req->bindValue(':modPai',$modPai);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererFacture($idFac){
		$sql="SELECT * from Facture where idFac=$idFac";
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