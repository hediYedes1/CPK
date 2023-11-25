<?php

include __DIR__ . '/../config.php';

class reponseC
{

    public function listreponse()
    {
        $sql = "SELECT * FROM reponse_rec";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listreponseunique($id_rep)
{
    $sql = "SELECT * FROM reponse_rec WHERE id_rep = :id_rep";
    $db = config::getConnexion();
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_rep', $id_rep, PDO::PARAM_INT);
        $stmt->execute();
        $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $liste;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}



    function deletereponse($id_rep)
    {
        $sql = "DELETE FROM reponse_rec WHERE id_rep = :id_rep";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        //$req->bindValue(':id_rec', $ide);
        $req->bindValue(':id_rep', $id_rep, PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addreponse($reponse,$id_rec)
    {
        $sql = "INSERT INTO reponse_rec  
        VALUES (NULL, :contenu, :date , :id_rec )";//, baad texte
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
               
                'contenu' => $reponse->getcontenu(),
                
                'date' => $reponse->getdate(),
                'id_rec' => $id_rec,
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

function showreponse($id_rep)
{
    $sql = "SELECT * FROM reponse_rec WHERE id_rep = :id_rep";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id_rep', $id_rep, PDO::PARAM_INT);
        $query->execute();
        $reponse = $query->fetch();
        return $reponse;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

    function updateReponse($reponse, $id_rep )
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reponse_rec SET                
                    contenu = :contenu,                    
                    date:= date 
                WHERE id_rep= :id_rep' 
            );
            
            $query->execute([
                'id_rep' => $id_rep,
               
                'contenu' => $reponse->getcontenu(),
                
                
                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
          echo 'Error :'.  $e->getMessage();
        }
    }
   
    
}
