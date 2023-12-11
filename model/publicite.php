<?PHP
class Publicite{
	private $id_pub;
	private $type;
	private $image;
	private $nom;
	private $prix;
    private $prix_avec_remise;
	private $description;
	private $quantite;
	private $id_article;

	function __construct($id_pub,$type,$image,$nom,$prix,$prix_avec_remise,$description,$quantite,$id_article){
		$this->id_pub=$id_pub;
		$this->type=$type;
		$this->image=$image;
		$this->nom=$nom;
		$this->prix=$prix;
        $this->prix_avec_remise=$prix_avec_remise;
		$this->description=$description;
		$this->quantite=$quantite;
		$this->id_article=$id_article;

	}
	
	function getId_pub(){
		return $this->id_pub;
	}
	function getTypepub(){
		return $this->type;
	}
	function getImagepub(){
		return $this->image;
	}
	function getNompub(){
		return $this->nom;
	}
	function getPrixsansremise(){
		return $this->prix;
	}
    function getPrixavecremise(){
		return $this->prix_avec_remise;
	}
	function getDescriptionpub(){
		return $this->description;
	}
	function getQuantitepub(){
		return $this->quantite;
	}
	function getId_article(){
		return $this->id_article;
	}

	function setId_pub($id_pub){
		$this->id_pub=$id_pub;
	}
	function setTypepub($type){
		$this->type=$type;
	}
	function setImagepub($image){
		$this->image=$image;
	}
	function setNompub($nom){
		$this->nom=$nom;
	}
	function setPrixsansremise($prix){
		$this->prix=$prix;
	}
    function setPrixavecremise($prix_avec_remise){
		$this->prix_avec_remise=$prix_avec_remise;
	}
		function setDescriptionpub($description){
		$this->description=$description;
	}
	function setQuantitepub($quantite){
		$this->quantite=$quantite;
	}
	function setId_article($id_article){
		$this->id_article=$id_article;
	}
	
}
?>