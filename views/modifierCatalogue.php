<?PHP

include "../model/catalogue.php";
include "../controller/CatalogueC.php";
if (isset($_GET['id'])){
  $CatalogueC=new CatalogueC();
    $result=$CatalogueC->recupererCatalogue($_GET['id']);
  foreach($result as $row){
    $id=$row['id_article'];
    $type=$row['type'];
    $image=$row['image'];
    $nom=$row['nom'];
    $prix=$row['prix'];
    $description=$row['description'];
    $quantite=$row['quantite'];
       
}
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
      <h1>modidier produit</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../views/consulterproduit.php">consulter produits</a></li>
          <li class="breadcrumb-item"><a href="../views/catalogue.php">ajouter produits</a></li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

             
             
              <div class="col-lg ds">
            <!--COMPLETED ACTIONS DONUTS CHART-->
            <div class="donut-main">
      
        
          <form method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Id article</label>
      <input type="text" class="form-control" id="inputEmail4" value="<?PHP echo $id ?>" name="id_article" placeholder="id_article">
    </div>
    <div class="form-group">
        <div class="form-group col-md-12">
        <label >Type</label>
      <select name="type" class="form-control" name="type" value="">
      <option>choisir le type ..</option>
                <option>Art</option>
                <option>Culture</option>
              </select>
  </div>

  </div>
  <div class="form-group">
    <div class="form-group col-md-6">
    <label for="inputAddress">Image</label>
      <td><img src="../img/<?php echo $row['image'];?>" width="100" height="100"></td>
      <input type="file" name="image">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">nom</label>
    <input type="text" class="form-control" id="inputAddress" value="<?PHP echo $nom ;?>" name="nom" placeholder="nom">
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label >prix</label>
         <input type="float" class="form-control" id="inputAddress" value="<?PHP echo $prix ;?>" name="prix" placeholder="prix">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">Description</label>
      <input type="text" class="form-control"  value="<?PHP echo  $description ;?>"  name="description" id="description">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label >quantite</label>
         <input type="float" class="form-control" id="inputAddress" value="<?PHP echo $quantite ;?>" name="quantite" placeholder="quantite">
    </div>
  </div>

  <div class="form-group">
  </div>
<!--<input type="hidden" name="id_article" value="<?PHP echo $_GET['id'];?>">-->
  <button type="submit"   name="modifier" class="btn btn-success">Confirmer la Modification</button>
</form>

                <?PHP
  }
if (isset($_POST['modifier'])){


  $catalogue= new Catalogue($_POST['id_article'],$_POST['type'],$_POST['image'],$_POST['nom'],$_POST['prix'],$_POST['description'],$_POST['quantite']);
  var_dump($catalogue);
  $CatalogueC->modifierCatalogue($catalogue,$_POST['id_article']);
  echo $_POST['id_article'];
echo ("<script LANGUAGE='JavaScript'>window.location.href='../views/consultercatalogue.php';</script>");

}
?> 
                
            
      </div></div></section>
    </section>
    <!--main content end-->
    <!--footer start-->
    
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
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