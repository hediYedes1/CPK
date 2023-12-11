<?php

class Commande {
    private $id;
    private $user_id;
    private $produit_id;
    private $total_quantity;
    private $total_price;
    private $status;

    // Getter for id
    public function getId() {
        return $this->id;
    }

    // Setter for id
    public function setId($id) {
        $this->id = $id;
    }

    // Getter for user_id
    public function getUserId() {
        return $this->user_id;
    }

    // Setter for user_id
    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    // Getter for produit_id
    public function getProduitId() {
        return $this->produit_id;
    }

    // Setter for produit_id
    public function setProduitId($produit_id) {
        $this->produit_id = $produit_id;
    }

    // Getter for total_quantity
    public function getTotalQuantity() {
        return $this->total_quantity;
    }

    // Setter for total_quantity
    public function setTotalQuantity($total_quantity) {
        $this->total_quantity = $total_quantity;
    }

    // Getter for total_price
    public function getTotalPrice() {
        return $this->total_price;
    }

    // Setter for total_price
    public function setTotalPrice($total_price) {
        $this->total_price = $total_price;
    }

    // Getter for status
    public function getStatus() {
        return $this->status;
    }

    // Setter for status
    public function setStatus($status) {
        $this->status = $status;
    }
}

?>
