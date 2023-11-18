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
 /*
    public function getSubjectsBySubject()
    {
       
       $sql = "SELECT
       sujet,
       COUNT(*) AS nombre
   FROM reclamation
   WHERE sujet IN ('Signaler un texte abus', 'Signaler un problème', 'autres')
   GROUP BY sujet";
        $db = config::getConnexion();
        try {
            $statement = $db->query($sql);
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            header('Content-Type: application/json');
            echo json_encode($data);
        } catch (PDOException $e) {
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(["error" => "Internal Server Error"]);
        }
    }
*/



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


    function addreponse($reponse)
    {
        $sql = "INSERT INTO reponse_rec  
        VALUES (NULL, :contenu, :date)";//, baad texte
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
               
                'contenu' => $reponse->getcontenu(),
                
                'date' => $reponse->getdate(),
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
$reponseController = new reponseC();

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'getSubjects') {
        $reclamationController->getSubjectsBySubject();
        exit; // Important to exit to prevent further execution
    }
    // Add more actions if needed
}

header('HTTP/1.1 400 Bad Request');
//echo json_encode(["error" => "Invalid Request"]);