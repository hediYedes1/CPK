<?php
require_once "../../controller/reclamationc.php";
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
                echo '<option value="' . $reclamation['id_rec'] . '">' . $reclamation['id_rec'] . '</option>';
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
        <li><?= $reponse_rec['id_rep'] ?> - <?= $reponse_rec['contenu'] ?> - <?=$reponse_rec['date'] ?> -<?= $reponse_rec['id_rec'] ?> </li>
        <?php } ?>
        </ul>
        <?php } 
        else{?>
        <h2>pas de reponse </h2>
        <?php } ?>
        </body>
        </html>
        









        <form action="" method="POST">
                              <strong> <label for="reclamation">Sélectionnez une réclamation</label></strong> 
                                <select name="reclamation" id="reclamation">
                                    <?php 
            foreach($reclamations as $reclamation) {
                echo '<option value="' . $reclamation['id_rec'] . '">' . $reclamation['id_rec'] . '</option>';
            }
        ?>
                                </select>
                                <input type="submit" value="Rechercher" name="search"  class="btn btn-warning">
                            </form>

                            <?php
if (isset($list)) {
    ?>
                            <br>

                            <?php if (!empty($list)) { ?>
                            <p>Réponses correspondantes à la réclamation sélectionnée</p>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>ID Réponse</th>
                                        <th>Contenu</th>
                                        <th>Date</th>
                                        <th>ID Réclamation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list as $reponse_rec) { ?>
                                    <tr>
                                        <td><?= $reponse_rec['id_rep'] ?></td>
                                        <td><?= $reponse_rec['contenu'] ?></td>
                                        <td><?= $reponse_rec['date'] ?></td>
                                        <td><?= $reponse_rec['id_rec'] ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php } else { ?>
                            <p>Aucune réponse trouvée pour la réclamation sélectionnée.</p>
                            <?php } ?>
                            <?php } ?>