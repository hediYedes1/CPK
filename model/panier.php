<?php
class panier{
    private $panier_id=NULL;
    private $user_id=NULL;
    private $produit_id=NULL;
    private $quantite=NULL;
    private $prix=NULL;
    private $prix_total=NULL;

    function __construct($panier_id,$user_id,$produit_id,$quantite,$prix,$prix_total)
    {
       $this->panier_id = $panier_id;
       $this->user_id = $user_id;
       $this->produit_id = $produit_id;
       $this->quantite = $quantite;
       $this->prix = $prix;
       $this->prix_total = $prix_total;
    }
    function getPanierId(){
        return $this->panier_id;
    }
    function getUserId(){
        return $this->user_id;
    }
    function getproduit_id(){
        return $this->produit_id;
    }
    function getQuantite(){
        return $this->quantite;
    }
    function getprix(){
        return $this->prix;
    }
    function getprix_total(){
        return $this->prix_total;
    }
    function setPanierId(int $id){
        $this->panier_id = $id;
    }
    function setUserId(int $t){
        $this->user_id = $t;
    }
    function setproduit_id(int $produit_id){
        $this->produit_id = $produit_id;
    }
    function setQuantite(int $d){
        $this->quantite = $d;
    }
    function setprix(float $i){
        $this->prix = $i;
    }
    function setprix_total(float $prix_total){
        $this->prix_total = $prix_total;
    }
  
 
}
?>