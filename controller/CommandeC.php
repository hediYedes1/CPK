<?php

class CommandeC {

    function getAllCommandeByUserId($userId) {
        $sql = "SELECT * FROM commande e inner join Catalogue p on e.produit_id = p.id_article WHERE e.user_id = :user_id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':user_id', $userId);
        try {
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function getAllCommandes() {
        $sql = "SELECT * FROM commande e inner join Catalogue p on e.produit_id = p.id_article";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function deleteCommande($id) {
        $sql = "DELETE FROM commande WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function addCommande($userId, $produitId, $totalQuantity, $totalPrice, $status) {
        $sql = "INSERT INTO commande (user_id, produit_id, total_quantity, total_price, status) 
                VALUES (:user_id, :produit_id, :total_quantity, :total_price, :status)";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':user_id', $userId);
        $req->bindValue(':produit_id', $produitId);
        $req->bindValue(':total_quantity', $totalQuantity);
        $req->bindValue(':total_price', $totalPrice);
        $req->bindValue(':status', $status);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function updateCommande($id,$status) {
        $sql = "UPDATE commande 
                SET status = :status
                WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        $req->bindValue(':status', $status);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

}
?>
