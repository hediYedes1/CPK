<?PHP
class Panier{
	private $id_panier;
	private $id_commande;
	private $id_client;
	private $total;
	private $transporteur;
	private $date;


	function __construct($id_panier,$id_commande,$id_client,$total,$transporteur,$date){
		$this->id_panier=$id_panier;
		$this->id_commande=$id_commande;
		$this->id_client=$id_client;
		$this->total=$total;
		$this->transporteur=$transporteur;
		$this->date=$date;


	}
	
	function getid_panier(){
		return $this->id_panier;
	}
	function getid_commande(){
		return $this->id_commande;
	}
	function getid_client(){
		return $this->id_client;
	}
	function gettotal(){
		return $this->total;
	}
	function getetatCom(){
		return $this->transporteur;
	}
	function getdate(){
		return $this->date;
	}

	function setid_panier($id_panier){
		$this->id_panier=$id_panier;
	}
	function setid_commande($id_commande){
		$this->id_commande=$id_commande;
	}
	function setid_client($id_client){
		$this->id_client=$id_client;
	}
	function settotal($total){
		$this->total=$total;
	}
	function settransporteur($transporteur){
		$this->transporteur=$transporteur;
	}
	function setdate($date){
		$this->date=$date;
	}
		
}

?>