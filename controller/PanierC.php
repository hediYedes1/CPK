<?php

class PanierC {

    function getPanierByUserId($UserId) {
        $sql = "SELECT
                    *,
                    COUNT(*) AS total_quantity,
                    SUM(c.prix) AS total_price
                FROM panier e
                INNER JOIN Catalogue c ON e.produit_id = c.id_article
                WHERE e.user_id = :id
                GROUP BY c.id_article;";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $UserId);
        try {
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }
    
    function getallPanierByUserId($UserId) {
        $sql = "SELECT * FROM panier where user_id = :user_id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':user_id', $UserId);
        try {
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }
    
    function deletePanier($id) {
        $sql = "DELETE FROM panier WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function addPanier($user_id, $produit_id) {
        $sql = "INSERT INTO panier (user_id, produit_id) VALUES (:user_id, :produit_id)";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':user_id', $user_id);
        $req->bindValue(':produit_id', $produit_id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

}
?>
