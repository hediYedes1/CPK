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


    function addreponse($reponse, $id_rec)
    {
        $sql = "INSERT INTO reponse_rec (contenu, date, id_rec) VALUES (:contenu, :date, :id_rec)";
        $sql2 = "UPDATE reclamation SET etat = 1 WHERE id_rec = :id_rec";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'contenu' => $reponse->getcontenu(),
                'date' => $reponse->getdate(),
                'id_rec' => $id_rec,
            ]);
    
            $query2 = $db->prepare($sql2);
            $query2->execute([
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
function trireponse(){
    $sql="SELECT * FROM reponse_rec order by contenu ASC";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur:'. $e->getMessage());
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

    function Recherche($contenu){
        $sql="SELECT * from reponse_rec where contenu like '".$contenu."%' ";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }
    }

    public function afficher_reponse_selon_id($id_rec){
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM reponse_rec WHERE id_rec = :id");
            $query->execute(['id' => $id_rec]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo  $e->getMessage();
        }
    }


}
   
    

