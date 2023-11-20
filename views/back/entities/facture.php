<?PHP
class Facture{
	private $idFac;
	private $idClient;
	private $quArt;
	private $prTotal;
	private $etatFac;
	private $modPai;


	function __construct($idFac,$idClient,$quArt,$prTotal,$etatFac,$modPai){
		$this->idFac=$idFac;
		$this->idClient=$idClient;
		$this->quArt=$quArt;
		$this->prTotal=$prTotal;
		$this->etatFac=$etatFac;
		$this->modPai=$modPai;


	}
	
	function getidFac(){
		return $this->idFac;
	}
	function getidClient(){
		return $this->idClient;
	}
	function getquArt(){
		return $this->quArt;
	}
	function getprtotal(){
		return $this->prTotal;
	}
	function getetatFac(){
		return $this->etatFac;
	}
	function getmodPai(){
		return $this->modPai;
	}

	function setIdCom($idFac){
		$this->idFac=$idFac;
	}
	function setIdClient($idClient){
		$this->idClient=$idClient;
	}
	function setquArt($quArt){
		$this->quArt=$quArt;
	}
	function setprtotal($prtotal){
		$this->prTotal=$prTotal;
	}
	function setetatFac($etatFac){
		$this->etatFac=$etatFac;
	}
	function setmodPai($modPai){
		$this->modPai=$modPai;
	}
		
}

?>