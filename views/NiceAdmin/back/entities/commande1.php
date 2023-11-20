<?PHP
class Commande{
	private $idCom;
	private $idClient;
	
	private $prTotal;
	private $etatCom;


	function __construct($idCom,$idClient,$prTotal,$etatCom){
		$this->idCom=$idCom;
		$this->idClient=$idClient;
		
		$this->prTotal=$prTotal;
		$this->etatCom=$etatCom;


	}
	
	function getidCom(){
		return $this->idCom;
	}
	function getidClient(){
		return $this->idClient;
	}
	
	function getprtotal(){
		return $this->prTotal;
	}
	function getetatCom(){
		return $this->etatCom;
	}

	function setIdCom($idCom){
		$this->idCom=$idCom;
	}
	function setIdClient($idClient){
		$this->idClient=$idClient;
	}
	
	function setprtotal($prtotal){
		$this->prTotal=$prTotal;
	}
	function setetatCom($etatCom){
		$this->etatCom=$etatCom;
	}
		
}

?>