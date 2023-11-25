<?php

include __DIR__ . '/../config.php';

class reclamationC
{

    public function listreclamation()
    {
        $sql = "SELECT * FROM reclamation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function afficher_reponse_selon_id_de_rec($id_rec){
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM reponse_rec WHERE id_rec = :id");
            $query->execute(['id' => $id_rec]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo  $e->getMessage();
        }
    }
    
    public function afficherreclamation(){
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM reclamation");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function listreclamationunique($id_rec)
    {
        $sql = "SELECT * FROM reclamation WHERE id_rec = :id_rec";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id_rec', $id_rec, PDO::PARAM_INT);
            $stmt->execute();
            $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function getSubjectsBySubject()
    {
       /* $sql = "SELECT sujet, COUNT(*) AS nombre FROM reclamation GROUP BY sujet";*/
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




    function deletereclamation($id_rec)
    {
        $sql = "DELETE FROM reclamation WHERE id_rec = :id_rec";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        //$req->bindValue(':id_rec', $ide);
        $req->bindValue(':id_rec', $id_rec, PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addreclamation($reclamation)
    {
        $sql = "INSERT INTO reclamation  
        VALUES (NULL, :nom,:sujet, :texte, :date)";//, baad texte
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $reclamation->getdate(),
                'sujet' => $reclamation->getsujet(),
                'texte' => $reclamation->gettexte(),
                'date' => $reclamation->getdates(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

function showreclamation($id_rec)
{
    $sql = "SELECT * FROM reclamation WHERE id_rec = :id_rec";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id_rec', $id_rec, PDO::PARAM_INT);
        $query->execute();
        $reclamation = $query->fetch();
        return $reclamation;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

    function updateJoueur($reclamation, $id_rec )
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamation SET 
                    nom = :nom, 
                    sujet = :sujet, 
                    texte = :texte ,
                    date:= date 
                WHERE id_rec= :id_rec' 
            );
            
            $query->execute([
                'id_rec' => $id_rec,
                'nom' => $reclamation->getdate(),
                'sujet' => $reclamation->getsujet(),
                'texte' => $reclamation->gettexte(),
                
                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
          echo 'Error :'.  $e->getMessage();
        }
    }


    
    




}
$reclamationController = new reclamationC();

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'getSubjects') {
        $reclamationController->getSubjectsBySubject();
        exit; // Important to exit to prevent further execution
    }
    // Add more actions if needed
}

header('HTTP/1.1 400 Bad Request');
//echo json_encode(["error" => "Invalid Request"]);