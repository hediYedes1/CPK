<?php
include "../../controller/reclamationc.php";

$c = new reclamationC();
$id_rec = isset($_GET['id']) ? $_GET['id'] : null;
if ($id_rec !== null) {
$tab = $c->afficherreclamation_selon_id_($id_rec);}

?>
<!DOCTYPE html>
<style>
/* Reset some default styles for better consistency */
body,
h1,
h2,
h3,
p,
table {
    margin: 0;
    padding: 0;
}

/* Apply a background color to the body */
body {
    background-color: #f8f9fa;
}

/* Header styles */
header {
    background-color: #007bff;
    color: #ffffff;
    padding: 10px;
}

/* Page title styles */
.pagetitle {
    margin: 20px 0;
}

/* Table styles */
.table {
    width: 100%;
    background-color: #ffffff;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.table th,
.table td {
    border: 1px solid #dee2e6;
    padding: 10px;
    text-align: left;
}

.table th {
    background-color: #007bff;
    color: #ffffff;
}

/* Alternating row colors for better readability */
.table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Button styles */
.table td form input[name="update"],
.table td button {
    background-color: #28a745;
    color: #ffffff;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}

.table td form input[name="delete"],
.table td button {
    background-color: #dc3545;
    color: #ffffff;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}

/* Back to top button styles */
.back-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    font-size: 24px;
    color: #007bff;
    background-color: #ffffff;
    border: 1px solid #007bff;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
}

.back-to-top:hover {
    background-color: #007bff;
    color: #ffffff;
}
</style>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tables / Data - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <img src="img.png" style="width: 60px; height: 60px;">
        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">

                <span class="d-none d-lg-block">LocalArt</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>


                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>





                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="hedi.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">Y.Hedi</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Hedi Yedes</h6>
                            <span>developpeur web</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>Mon Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>se deconnecter</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="tablerec.php" class="active">
                            <i class="bi bi-circle"></i><span>Data Tables reclamations</span>
                        </a>
                    </li>
                </ul>
                <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="tablereponse.php" class="active">
                            <i class="bi bi-circle"></i><span>Data Tables reponse</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="http://localhost/last%20khedma/views/NiceAdmin/stat.php">
                            <i class="bi bi-circle"></i><span>ApexCharts</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Charts Nav -->


            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="users-profile.html">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-faq.html">
                    <i class="bi bi-question-circle"></i>
                    <span>F.A.Q</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-error-404.html">
                    <i class="bi bi-dash-circle"></i>
                    <span>Error 404</span>
                </a>
            </li><!-- End Error 404 Page Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a
                            href="http://localhost/last%20khedma/views/addreclamation.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="tablerec.php">Tables</a></li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Datatables</h5>
                            <p>voici le tableau qui affiche les details d'une reclamation
                                </p>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Attribut</th>
                                        <th scope="col">Valeur</th>
                                    </tr>

                                </thead>
                                <tbody>
                                <?php foreach ($tab as $reclamation) { ?>
                                    <tr>
                                        <td>id_rec</td>
                                        <td><?= $reclamation['id_rec']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>nom</td>
                                        <td><?= $reclamation['nom']; ?></td>
                                    </tr>
                                    <tr>
                                    <td>sujet</td>
                                    <td><?= $reclamation['sujet']; ?></td>
                                    </tr>
                                    <tr>
                                    <td>texte</td>
                                    <td><?= $reclamation['texte']; ?></td>
                                    </tr>
                                    <tr>
                                    <td>date</td>
                                    <td><?= $reclamation['date']; ?></td>
                                    </tr>
                                </tbody>
                                <tr>
                                    <th scope="col">id_rec</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">sujet</th>
                                    <th scope="col">texte</th>
                                    <th scope="col">date</th>

                                </tr>
                              
                                <?php } ?>
                                </tbody>
                            </table>
                            <div style="text-align: right; margin-top: 10px;">
                            <button type="button" class="btn btn-primary">
                                <a  style="color: white;" href="http://localhost/last%20khedma/views/NiceAdmin/tablerec.php" >Retourner a la liste</a>
                            </button>
                        </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>




    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>