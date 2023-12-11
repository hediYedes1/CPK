<?php

class Panier {
    private $id;
    private $user_id;
    private $produit_id;

    public function __construct($id, $user_id, $produit_id) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->produit_id = $produit_id;
    }

    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getProduitId() {
        return $this->produit_id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function setProduitId($produit_id) {
        $this->produit_id = $produit_id;
    }
}

?>
