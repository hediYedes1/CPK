<?PHP
include "../controller/CatalogueC.php";

$produitparpage = 10;
$CatalogueC=new CatalogueC();
$pagesTotales=$CatalogueC->pagetotale($produitparpage);

if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
   $_GET['page'] = intval($_GET['page']);
   $pageCourante = $_GET['page'];
} else {
   $pageCourante = 1;
}
$depart = ($pageCourante-1)*$produitparpage;


// if(isset($_GET['search']))
// 	{
// 	$tab = $CatalogueC->Recherche($_GET['search']);
// 	} else
// 	  $CatalogueC->afficherCatalogueC ($Catalogue);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Elements - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assetss/img/favicon.png" rel="icon">
  <link href="assetss/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assetss/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assetss/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assetss/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assetss/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assetss/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assetss/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assetss/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assetss/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<?php require('header.php'); ?>

<?php require('aside.php'); ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>consulter produit</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../views/catalogue.php">ajouter produits</a></li>
          <li class="breadcrumb-item"><a href="../views/statproduit.php">statistique de produits</a></li>

        </ol>
      </nav>
    </div><!-- End Page Title -->
   


    <form method="get"> 
					<input type="text" name="search" id="search" class="form-control" placeholder="Search...">
          <button type="submit">Search</button>
				</form>

    <table class="table table-hover table-fixed">

<!--Table head-->
<thead>
  <tr>
    <th>id article</th>
    <th>Type</th>
      <th>Image</th>
      <th>Nom</th>
      <th>Prix</th>
       <th>Description</th>
       <th>quantite</th>

  </tr>
</thead>
<!--Table head-->

<!--Table body-->
<tbody>

 <?PHP

$Catalogue = $CatalogueC->pagination($produitparpage,$depart);
    while($row = $Catalogue->fetch()) {
?>
<tr>
<td><?PHP echo $row['id_article']; ?></td>
<td><?PHP echo $row['type']; ?></td>
<td><img src="../img/<?php echo $row['image'];?>" width="100" height="100"></td>
<td><?PHP echo $row['nom']; ?></td>
<td><?PHP echo $row['prix']; ?></td>
<td><?PHP echo $row['description']; ?></td>
<td><?PHP echo $row['quantite']; ?></td>



<td><form method="POST" action="../views/supprimerCatalogue.php">

<input type="submit" name="supprimer"  class="btn btn-danger"  value="supprimer">
<input type="hidden" value="<?PHP echo $row['id_article']; ?>" name="id_article">
</form>
</td>
<td><a href="modifierCatalogue.php?id=<?PHP echo $row['id_article']; ?>" style="text-decorations:none; color:white;"  class="btn btn-warning">
Modifier</a></td>
<td>
    <a href="../views/publicite.php?id=<?PHP echo $row['id_article']; ?>" 
       style="text-decoration: none; color: white;" 
       class="btn btn-success">Ajouter Publicité
    </a>
</td>

</tr>




<?PHP
}
?>

<style>
  .btn-success {
    /* Ajoutez ici vos styles personnalisés */
    background-color: #28a745; /* Couleur verte par défaut de Bootstrap */
    border-color: #28a745; /* Couleur de la bordure */
    color: #fff; /* Couleur du texte */
  }

  .btn-success:hover {
    background-color: #218838; /* Couleur de survol */
    border-color: #1e7e34; /* Couleur de la bordure au survol */
  }
</style>

 
</tbody>
<!--Table body-->


</table>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>LocalArt</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by  <strong><span>Ghaith</span></strong>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assetss/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assetss/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assetss/vendor/chart.js/chart.umd.js"></script>
  <script src="assetss/vendor/echarts/echarts.min.js"></script>
  <script src="assetss/vendor/quill/quill.min.js"></script>
  <script src="assetss/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assetss/vendor/tinymce/tinymce.min.js"></script>
  <script src="assetss/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assetss/js/main.js"></script>

</body>

</html>