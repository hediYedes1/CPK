<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . "/hamza/config.php";
include_once  $_SERVER['DOCUMENT_ROOT'] . "/hamza//Model/command.php";
class commandC
{
    function ajouterCommand($command)
    {
        $sql = "INSERT INTO commands (user_id , date,prix_total,etat ) 
        VALUES (:user_id,:d,:p,:e)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'user_id' => $command->getUserId(),
                'd' => $command->getDate(),
                'p' => $command->getprix_total(),
                'e' => $command->getEtat(),
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    function ajouterCommandDetail($panier)
    {
        $sql = "INSERT INTO command_details (command_id , product_id,quantite,prix,prix_total ) 
        VALUES (:c,:p,:q,:p1,:pt)";
        $db = config::getConnexion();
        $id = $db->lastInsertId();
        $integer = intval($id);
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'c' => $integer,
                'p' => $panier["panier_id"],
                'q' => $panier["quantite"],
                'p1' => $panier["prix"],
                'pt' => $panier["prix_total"],
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    function afficherCommand()
    {
        $sql = "SELECT * FROM commands";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    function commandUser($id)
    {
        $sql = "SELECT * from command where user_id=$id";
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
    function commandFront($id)
    {
        $sql = "SELECT * from command where user_id=$id";
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
  
    function supprimerCom($id)
    {
        $sql = "DELETE FROM commands WHERE id=:id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    function update($id)
    {
        try {

            $db = config::getConnexion();
           $sql = "UPDATE commands SET etat = 'En cours'  WHERE id=:id ";
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id,
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
}

