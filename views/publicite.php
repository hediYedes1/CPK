<?PHP
include "../controller/PubliciteC.php";

$PubliciteC=new PubliciteC();


	
$id_article = isset($_GET["id"]) ? $_GET["id"] :null;


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


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
  <script src="lib/chart-master/Chart.js"></script>
 
   <style type="text/css">
    body {
  font-family: 'Open Sans', sans-serif;
}

h1, h2, h3, h4, h5, h6 {
  font-weight: 300;
}

p {
  color: #999;
}

strong {
  color: #333;
}

#wrapper {
  width: 100%;
  max-width: 600px;
  margin: 0 auto;
  text-align: center;
  padding: 30px 0;
}



.page-head-image img {
  border-radius: 50%;
}

#form-trabalhe {
  margin-top: 30px;
  text-align: left;
}

label {
  font-weight: normal;
  margin-top: 15px;
}

input {
  border: 2px solid #CCC !important;
  height: 35px;
  border-radius: 3px;
  max-width: 100%;
}

.input-group-addon {
  border: 2px solid #CCC !important;
  border-right: 0px !important;
}

.btn {
  border: 0;
  border-radius: 3px;
  margin-top: 20px;
}

.form-group {
  margin-bottom: 0;
  text-align: left;
}
  </style>

</script>
  
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        
      </div>
      
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <body>

    <?php require('header.php'); ?>

<?php require('aside.php'); ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>ajouter publicite</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="consulterpublicite.php">consulter publicite</a></li>
          <li class="breadcrumb-item"><a href="statproduit.php">statistique de publicite</a></li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

              <!--/ col-md-4 -->
             
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
          <div class="col-lg  ds">
            <!--COMPLETED ACTIONS DONUTS CHART-->
            <div class="donut-main">
              
            <!--NEW EARNING STATS -->
            
            <!--new earning end-->
            <!-- RECENT ACTIVITIES SECTION -->
            
            <!-- USERS ONLINE SECTION -->
         <div id="wrapper" class="container">
  
  
  
  <h1>publicite</h1>
 

  <form id="form-work" class="" action="ajoutpublicite.php" method="POST" name="f">

      
      <fieldset>
      
      <input type="hidden" name="id_article" value="<?php echo $_GET["id"]; ?>">


            <div class="form-group">
            <div class="col-md-6">
              <label class="control-label" for="tel">Pourcentage</label>
              <div class="input-group">
              <input id="prix" name="prix_avec_remise" class="form-control" placeholder="pourcentage" type="text">
                <span id="myprix"></span>
              </div>
            </div>


          </div>


          <br>
           <br>

          <div class="form-group">
            <div class="col-md-12">
            <a href="../views/consulterpublicite.php?id=<?PHP echo $row['id_article']; ?>">
            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block info">Ajouter</button>
            </a>  
            </div>
          </div>
            
            <td><a href="../views/publicitefront.php" style=" color:white; margin-left: 250px";  class="btn btn-warning">
            Retour au Front</a></td>   
      </fieldset> 
    </form>
</div>




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
  <!-- <script  src="../js/cs.js"></script>  -->
 

  <!-- Template Main JS File -->
  <script src="assetss/js/main.js"></script>


</body>

</html>
