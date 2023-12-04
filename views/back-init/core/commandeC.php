<?php
include "../config.php";

/**
 * Created by PhpStorm.
 * User: Boussoukaya
 * Date: 12/04/2018
 * Time: 22:37
 */
class commandeC {

    public function showcommandes()
    {
        $db = config::getConnexion();
        $req1= $db->query("SELECT * FROM Commande ");
        return $req1->fetchAll();
    }
    public  function  deletesinglecommande($id)
    {
        $db = config::getConnexion();
        $req=$db->query("DELETE FROM Commande WHERE idCom=$id");
    }

    public  function modifiersinglecommande($id)
    {
        $db = config::getConnexion();
        $req=$db->query("UPDATE Commande SET etatCom='Valide' WHERE idCom=$id");


    }

    public  function affichercommande($id)
    {
        $db = config::getConnexion();
        $req1= $db->query("SELECT * FROM Commande WHERE ID_commande=$id");
        return $req1->fetchAll();
    }

    public function afficherdetailcommande($id)
    {
        $db = config::getConnexion();
        $req1= $db->query("SELECT * FROM Ligne_Commande INNER JOIN Commande  ON Ligne_Commande.ID_commande=Commande.ID_commande INNER JOIN Products ON Ligne_Commande.ID_Produit=Products.ID_Product WHERE Commande.ID_commande=$id");
        return $req1->fetchAll();
    }
    public function CountCommandeDone()
    {
        $db = config::getConnexion();
        $req1= $db->query("SELECT * FROM Commande Where etatCom='En Cours' ");
        return $req1->rowCount();
    }
    public function CountCommandeNotDone()
    {
        $db = config::getConnexion();
        $req1= $db->query("SELECT * FROM Commande Where etatCom='Valide'");
        return $req1->rowCount();
    }

}