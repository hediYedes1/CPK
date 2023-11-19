<?php

require_once '../Controller/ReponseReclamationC.php';
require_once '../model/reponsereclamation.php';

$error = "";

// create an instance of the controller
$reponseC = new reponseC();

// check if id_rec is provided for updating
if (isset($_GET['id_rep'])) {
    $id_rep = $_GET['id_rep'];  
    $reponse = $reponseC->showreponse($id_rep);//récupère les détails de la réclamation
} else {
    $reponse = null; // for adding new reclamation
}

if ( isset($_POST["contenu"]) ) {
    if ( !empty($_POST["contenu"]) ) {
        if ($reponse) {
            // Update existing reclamation
            $reponse->setdate(date("Y-m-d H:i:s"));
            $reponse->setcontenu($_POST['contenu']);
            
            

           // $reclamationC->updateJoueur($reclamation, $id_rec);
        } else {
            // Add new reclamation
            $reponse = new reponse(null,  $_POST['contenu']);
            $reponse->setdate(date("Y-m-d H:i:s"));
            $reponseC->addreponse($reponse);
        }

      //  header('Location:listreclamation.php');
        header('location:http://localhost/last%20khedma/views/NiceAdmin/tablereponse.php');
    } else {
        $error = "Missing information";
    }
}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Form</title>
</head>
<body>

<?php if (!empty($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>

<form method="post" action="">
    <label for="contenu">Contenu de la réponse :</label>
    <textarea name="contenu" id="contenu" rows="4" cols="50"><?php echo $reponse ? $reponse->getcontenu() : ''; ?></textarea>
    <br>
    <input type="submit" value="Enregistrer">
</form>

</body>
</html>