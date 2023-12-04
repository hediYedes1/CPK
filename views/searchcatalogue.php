<?php
require_once "../controller/CatalogueC.php";
$Catalogue = new CatalogueC();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['catalogue']) && isset($_POST['search'])) {
        $id_article = $_POST['catalogue']; // Corrected variable name
        $list = $Catalogue->afficher_publicite_selon_id_de_article($id_article);
    }
}
$tab = $Catalogue->affichercat();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Recherche de publicite</title>
</head>
<body>
    <h1>Recherche de publicite par catalogue</h1>
    <form action="" method="POST">
        <label for="catalogue">Sélectionne un produit</label>
        <select name="catalogue" id="catalogue">
            <?php 
            foreach($tab as $row){
                echo '<option value="' . $row['id_article'] . '">' . $row['nom'] . '' . $row['type'] . '' . $row['image'] . '' . $row['prix'] . '' . $row['description'] . '' . $row['quantite'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Rechercher" name="search">
    </form>


<?php
if (isset($list)){
?>
<br>
<h2>publicite correspondants au produit selectionne</h2>
<ul>
    <?php foreach ($list as $Publicite){ ?>
        <li> <?= $Publicite['nompub'] ?> - <?=$Publicite['id_pub'] ?></li>
        <?php } ?>
        </ul>
        <?php } ?>
        </body>
        </html>