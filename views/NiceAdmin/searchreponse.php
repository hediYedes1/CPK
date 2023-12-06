<?php
require_once "../../controller/reclamationc.php";

$reclamationC = new reclamationC();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $id_rec = isset($_POST['reclamation']) ? $_POST['reclamation'] : null;
    $list = $reclamationC->afficher_reponse_selon_id_de_rec($id_rec);
}

$reclamations = $reclamationC->afficherreclamation();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recherche de réponse</title>
</head>
<body>
    <h1>Recherche de réponse par réclamation</h1>
    
    <form action="" method="POST">
        <label for="reclamation">Sélectionne une réclamation</label>
        <select name="reclamation" id="reclamation">
            <?php 
            foreach($reclamations as $reclamation){
                echo '<option value="' . $reclamation['id_rec'] . '">' . $reclamation['id_rec'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Rechercher" name="search">
    </form>

    <?php if (isset($list) && !empty($list)) { ?>
        <br>
        <h2>Réponses correspondantes à la réclamation sélectionnée</h2>
        <ul>
            <?php foreach ($list as $reponse_rec){ ?>
                <li><?= $reponse_rec['id_rep'] ?> - <?= htmlspecialchars($reponse_rec['contenu']) ?> - <?= $reponse_rec['date'] ?> - <?= $reponse_rec['id_rec'] ?> </li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <h2>Pas de réponse</h2>
    <?php } ?>
</body>
</html>

       