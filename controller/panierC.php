<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/hamza/config.php";
include_once  $_SERVER['DOCUMENT_ROOT'] . "/hamza//Model/panier.php";

class panierC
{
    function ajouterAuxPanier($panier)
    {
        $sql = "INSERT INTO panier (user_id, produit_id, quantite, prix, prix_total ) 
        VALUES (:user_id,:pro_id,:quantite, :prix,:prixT)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'user_id' => $panier->getUserId(),
                'pro_id' => $panier->getproduit_id(),
                'quantite' => $panier->getQuantite(),
                'prix' => $panier->getprix(),
                'prixT' => $panier->getprix_total(),
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function afficherPanier()
    {
        $sql = "SELECT * FROM panier";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    function panierUser($id)
    {
        $sql = "SELECT * from panier where user_id=$id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $article = $query->fetchAll();
            return $article;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    function panierFront($id)
    {
        $sql = "SELECT * from panier where user_id=$id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $article = $query->fetch();
          
            return 0;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
  
    function modifierPanier($id_p,$action)
    {
        try {

            $db = config::getConnexion();
            if($action==1)
            {$sql = "UPDATE panier SET quantite = quantite + 1 , prix_total = prix_total + prix  WHERE panier_id=:id ";
            
            }
            if($action==0) {$sql = "UPDATE panier SET quantite = quantite - 1 , prix_total = prix_total - prix  WHERE panier_id=:id ";
              
            }
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id_p,
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function supprimerItem($id)
    {
        $sql = "DELETE FROM panier WHERE panier_id=:id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    
}

