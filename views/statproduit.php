<?php

include "../controller/CatalogueC.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Charts / ApexCharts - NiceAdmin Bootstrap Template</title>
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
      <h1>statistique de produits</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="catalogue.php">ajouter produits</a></li>
          <li class="breadcrumb-item"><a href="consultercatalogue.php">consulter produits</a></li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <p>LocalArt, You can check the <a href="../views/cataloguefront.php" target="_blank">official website</a> for more products</p>

    <section class="section">
      <div class="row">

       
             

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Column Chart</h5>

              <!-- Column Chart -->
              <div id="columnChart"></div>


              

              <script>
              //  document.addEventListener("DOMContentLoaded", () => {
              //     new ApexCharts(document.querySelector("#columnChart"), {
              //       series: [{
              //         name: 'Net Profit',
              //         data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
              //       }, {
              //         name: 'Revenue',
              //         data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
              //       }, {
              //         name: 'Free Cash Flow',
              //         data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
              //       }],
              //       chart: {
              //         type: 'bar',
              //         height: 350
              //       },
              //       plotOptions: {
              //         bar: {
              //           horizontal: false,
              //           columnWidth: '55%',
              //           endingShape: 'rounded'
              //         },
              //       },
              //       dataLabels: {
              //         enabled: false
              //       },
              //       stroke: {
              //         show: true,
              //         width: 2,
              //         colors: ['transparent']
              //       },
              //       xaxis: {
              //         categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
              //       },
              //       yaxis: {
              //         title: {
              //           text: '$ (thousands)'
              //         }
              //       },
              //       fill: {
              //         opacity: 1
              //       },
              //       tooltip: {
              //         y: {
              //           formatter: function(val) {
              //             return "$ " + val + " thousands"
              //           }
              //         }
              //       }
              //     }).render();
              //   });
                </script>




                

<!-- Ajoutez ceci avant la balise </body> -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    fetch('/gestionpro/controller/CatalogueC.php?action=gettype')
      .then(response => response.json())
      .then(data => {
        if (Array.isArray(data)) {
          renderChart(data);
        } else {
          console.error('Invalid data format:', data);
        }
      })
      .catch(error => console.error('Error fetching data:', error));

    function renderChart(data) {
      new ApexCharts(document.querySelector("#columnChart"), {
        series: [{
          name: 'Produits',
          data: data.map(item => item.nombre)
        }],
        chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: data.map(item => item.type),
        },
        yaxis: {
          title: {
            text: 'Nombre de produits'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function(val) {
              return val + " produits";
            }
          }
        }
      }).render();
    }
  });
</script>

              <!-- End Column Chart -->

            </div>
          </div>
        </div>
        </div>
         </section>

     </main><!-- End #main -->
        

       
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>LocalArt</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <strong><span>Ghaith</span></strong>
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