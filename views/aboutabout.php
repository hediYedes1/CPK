<?php
include "../controller/reclamationc.php";
$c = new reclamationC();
$id_rec = $_REQUEST["id_rec"] ?? null;
/*
if (isset($_GET['etat'])){

    $etat="not viewd" ;
}
else{
    $etat= "viewd";
}*/
 // get and post
$tab = $c->listreclamationunique();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    /* Ajouter ces styles pour mettre en gras la réclamation */
    /* Ajouter ces styles pour styliser les boutons */
    .btn-success,
    .btn-danger {
        margin-top: 20px;
    }

    .btn-danger a {
        color: white;
        text-decoration: none;

    }

    .btn-container .btn-success {
        margin-right: 5px;
        /* Ajoutez ou ajustez la marge ici */
    }
    </style>

    <title>LocalArt - Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/taraji.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none"
                        href="mailto:info@company.com">info@LocalArt.tn</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i
                            class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i
                            class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i
                            class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i
                            class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-success logo h1 align-self-center" style="color: brown;" href="index.html">
                LocalArt
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">À propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.html">Boutique</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="article.html">Article</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addreclamation.php">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal"
                        data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span
                            class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span
                            class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="container py-5">
    <div class="row py-5">
        <div class="col-md-9 m-auto">
            <?php if (!empty($tab)) { ?>
                <?php foreach ($tab as $reclamation) { ?>
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <strong> Réclamation #<?= $reclamation['id_rec']; ?></strong>
                            <p class="card-text">Etat: <?= $reclamation['etat'] == 0 ? 'Non traitée' : 'Traitée'; ?></p>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Nom:</strong> <?= $reclamation['nom']; ?></p>
                            <p class="card-text"><strong>Sujet:</strong> <?= $reclamation['sujet']; ?></p>
                            <p class="card-text"><strong>Date:</strong> <?= $reclamation['date']; ?></p>

                            <!-- Cadre pour le texte -->
                            <div style="border: 1px solid #ddd; padding: 10px; margin-bottom: 15px;">
                                <p class="card-text"><strong>Texte:</strong> <?= $reclamation['texte']; ?></p>
                            </div>

                            <div class="btn-container d-flex justify-content-end">
                                <?php if ($reclamation['etat'] == 0) { ?>
                                    <form method="POST" action="updatereclamation.php">
                                        <input type="submit" name="update" value="Modifier" class="btn btn-success">
                                        <input type="hidden" value="<?= $reclamation['id_rec']; ?>" name="id_rec">
                                        <input type="hidden" value="<?= $reclamation['date']; ?>" name="date">
                                    </form>
                                <?php }?>
                                <button type="button" class="btn btn-danger">
                                    <a href="deletereclamation.php?id_rec=<?= $reclamation['id_rec']; ?>"
                                        style="color: white;">Supprimer</a>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">Aucune donnée de réclamation disponible.</p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/contact.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>