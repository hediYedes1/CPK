<?php
require_once "../controller/reclamationc.php";
$reclamationC = new ReclamationC();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['reclamation']) && isset($_POST['search'])) {
        $id_rec = $_POST['reclamation']; // Corrected variable name
        $list = $reclamationC->afficher_reponse_selon_id_de_rec($id_rec);
    }
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
                echo '<option value="' . $reclamation['id_rec'] . '">' . $reclamation['nom'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Rechercher" name="search">
    </form>


<?php
if (isset($list)){
?>
<br>
<h2>reponse correspondants au reclamation selectionne</h2>
<ul>
    <?php foreach ($list as $reponse_rec){ ?>
        <li> <?= $reponse_rec['contenu'] ?> - <?=$reponse_rec['id_rep'] ?></li>
        <?php } ?>
        </ul>
        <?php } ?>
        </body>
        </html>
        
