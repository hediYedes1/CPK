<?php
include '../controller/CommandeC.php';
include_once '../config.php';
$commandeC = new CommandeC();

$list = $commandeC->getAllCommandes();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Tables / Data - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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

  <?php
// Check for the presence of the "msg" parameter
if (isset($_GET["msg"]) && $_GET["msg"] === "oui") {
    echo '<div class="alert alert-success" role="alert">Commande supprimer</div>';
}

if (isset($_GET["msg"]) && $_GET["msg"] === "nom") {
  echo '<div class="alert alert-success" role="alert">Commande approuver</div>';
}
?>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">user_id</th>
                    <th scope="col">nom de produit</th>
                    <th scope="col">description de produit</th>
                    <th scope="col">total quantity</th>
                    <th scope="col">total price</th>
                    <th scope="col">status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php

  foreach ($list as $value){
?> 	

                  <tr>
                    <td><?php echo   $value['user_id'];?></td>
                    <td><?php echo   $value['nom'];?></td>
                    <td><?php echo   $value['description'];?></td>
                    <td><?php echo   $value['total_quantity'];?></td>
                    <td><?php echo   $value['total_price'];?> DT</td>
                    <td><?php echo   $value['status'];?></td>
                    <td>
                    <?php 
      if($value['status'] == "pending") {
        echo   '<a href="../controller/approuverCommande.php?id='.$value['id'].'"><button  type="submit" class="btn btn-primary btn-xs">Approuver</button></a>';
      }
      ?>
      <a href="../controller/Cancel_Commande.php?id=<?= $value["id"]; ?>"><button type="submit" class="btn btn-danger btn-xs">supprimer</i></button></a>


                    </td>
                  </tr>

  <?php } ?>


                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="assetss/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assetss/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assetss/vendor/chart.js/chart.umd.js"></script>
  <script src="assetss/vendor/echarts/echarts.min.js"></script>
  <script src="assetss/vendor/quill/quill.min.js"></script>
  <script src="assetss/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assetss/vendor/tinymce/tinymce.min.js"></script>
  <script src="assetss/vendor/php-email-form/validate.js"></script>
  <script  src="../js/cs.js"></script>
 

  <!-- Template Main JS File -->
  <script src="assetss/js/main.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<!-- DataTables Buttons CSS and JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

<!-- jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

<script>
  $(document).ready(function() {
    var table = $('.datatable').DataTable({
      "order": [[4, "desc"]], // Order by status column in descending order
      dom: 'Bfrtip',
      buttons: [
        'excelHtml5',
        {
          extend: 'pdfHtml5',
          title: 'Commandes Report',
          customize: function(doc) {
            // Add custom styling or modifications to the PDF document if needed
          }
        }
      ]
    });

    // Trigger PDF download on button click
    $('#downloadPdfBtn').on('click', function() {
      table.button('.buttons-pdf').trigger();
    });
  });
</script>
</body>

</html>