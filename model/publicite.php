<?PHP
class Publicite{
	private $id_pub;
	private $typepub;
	private $imagepub;
	private $nompub;
	private $prix_sans_remise;
    private $prix_avec_remise;
	private $descriptionpub;
	private $quantitepub;
	private $ida;

	function __construct($id_pub,$typepub,$imagepub,$nompub,$prix_sans_remise,$prix_avec_remise,$descriptionpub,$quantitepub,$ida){
		$this->id_pub=$id_pub;
		$this->typepub=$typepub;
		$this->imagepub=$imagepub;
		$this->nompub=$nompub;
		$this->prix_sans_remise=$prix_sans_remise;
        $this->prix_avec_remise=$prix_avec_remise;
		$this->descriptionpub=$descriptionpub;
		$this->quantitepub=$quantitepub;
		$this->ida=$ida;

	}
	
	function getId_pub(){
		return $this->id_pub;
	}
	function getTypepub(){
		return $this->typepub;
	}
	function getImagepub(){
		return $this->imagepub;
	}
	function getNompub(){
		return $this->nompub;
	}
	function getPrixsansremise(){
		return $this->prix_sans_remise;
	}
    function getPrixavecremise(){
		return $this->prix_avec_remise;
	}
	function getDescriptionpub(){
		return $this->descriptionpub;
	}
	function getQuantitepub(){
		return $this->quantitepub;
	}
	function getIda(){
		return $this->ida;
	}

	function setId_pub($id_pub){
		$this->id_pub=$id_pub;
	}
	function setTypepub($typepub){
		$this->typepub=$typepub;
	}
	function setImagepub($imagepub){
		$this->imagepub=$imagepub;
	}
	function setNompub($nompub){
		$this->nompub=$nompub;
	}
	function setPrixsansremise($prix_sans_remise){
		$this->prix_sans_remise=$prix_sans_remise;
	}
    function setPrixavecremise($prix_avec_remise){
		$this->prix_avec_remise=$prix_avec_remise;
	}
		function setDescriptionpub($descriptionpub){
		$this->descriptionpub=$descriptionpub;
	}
	function setQuantitepub($quantitepub){
		$this->quantitepub=$quantitepub;
	}
	function setIda($ida){
		$this->id_pub=$ida;
	}
	
}
?>