<?php

include '../Controller/reclamationc.php';
include '../model/reclamation.php';
$error = "";

// create client
$reclamation = null;
// create an instance of the controller
$reclamationC = new reclamationC();


if (
    isset($_POST["nom"]) &&
    isset($_POST["sujet"]) &&
    isset($_POST["texte"]) 
    
    
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["sujet"]) &&
        !empty($_POST["texte"]) 
        
    ) {
        foreach ($_POST as $key => $value) { //parcourir 
            echo "Key: $key, Value: $value<br>";
        }
        $reclamation = new reclamation(
            null,
            $_POST['nom'],
            $_POST['sujet'],
            $_POST['texte']
            
        );

        var_dump($reclamation);
        $reclamationC->updateJoueur($reclamation, $_POST['id_rec']);
       // $reclamationC->updatereclamation($reclamation, $_POST['id_rec']);

        //header('Location:listreclamation.php');
        header('Location:http://localhost/last%20khedma/views/aboutabout.php');
    } else
        $error = "Missing information";
}
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <title>LocalArt - Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--<link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    -->

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <!--
    <link rel="stylesheet" href="assets/css/custom.css">
-->

    <!-- Load fonts style after rendering the layout styles -->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/taraji.css">
    <!-- Load map styles -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.getElementById('myForm');

        form.addEventListener('submit', function(event) {
            var nom = document.getElementById('nom').value.trim();
            var texte = document.getElementById('texte').value.trim();
            var erreurnom = document.getElementById('erreurnom');
            var erreurtexte = document.getElementById('erreurtexte');
            var isValid = true;

            // Validation pour le champ nom
            if (nom === '') {
                erreurnom.textContent = 'Le champ nom ne peut pas être vide.';
                isValid = false;
            } else {
                erreurnom.textContent = ''; // Efface le message d'erreur
            }

            // Validation pour le champ texte
            if (texte === '') {
                erreurtexte.textContent = 'Le champ texte ne peut pas être vide.';
                isValid = false;
            } else {
                erreurtexte.textContent = ''; // Efface le message d'erreur
            }

            // Si la validation n'est pas réussie, annule l'envoi du formulaire
            if (!isValid) {
                event.preventDefault();
            }
        });
    });
    </script>
</head>

<body>

    <!-- Start Top Nav -->
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
    <!-- Close Top Nav -->


    <!-- Header -->
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

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">à propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.html">boutique</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="article.html">Article</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
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
    <!-- Close Header -->

    <!-- Modal -->
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


    <!-- Start Content Page -->
          
               <!-- <a href="http://localhost/last%20khedma/views/NiceAdmin/tablerec.php"></a> -->


    <div id="error">
        <?php echo $error; ?>
    </div>
    <?php
    if (isset($_POST['id_rec'])) {
        $reclamation = $reclamationC->showreclamation($_POST['id_rec']);
    }
        
    ?>
        

    <div class="container py-5">
    <p align= "center">
                Chers client , nous sommes à votre disposition pour répondre à vos questions .
            </p>
        <div class="row py-5">
       
            <form class="col-md-9 m-auto" method="post" role="form" id="myForm" novalidate>
                <div class="row">
                    <div class="col-md-6 form-container slide-from-left">

                        <div class="form-group">

                            <label for="nom">nom</label>


                            <input type="text" id="nom" name="nom" class="form-control"
                                value="<?php echo $reclamation['nom']; ?>" />
                            <span id="erreurnom" style="color: red"></span>

                        </div>



                        <div class="form-group">
                            <label for="sujet">Sujet</label>


                            <select class="form-control" id="sujet" name="sujet">
                                <option value="Signaler un texte abus"
                                    <?php echo ($reclamation['sujet'] == 'Signaler un texte abus') ? 'selected' : ''; ?>>
                                    Signaler un texte abus</option>
                                <option value="Signaler un problème"
                                    <?php echo ($reclamation['sujet'] == 'Signaler un problème') ? 'selected' : ''; ?>>
                                    Signaler un problème</option>
                                <option value="Autres"
                                    <?php echo ($reclamation['sujet'] == 'Autres') ? 'selected' : ''; ?>>Autres</option>
                            </select>

                            <td>
                                <span id="erreursujet" style="color: red"></span>
                            </td>
                        </div>
                        <div class="form-group">
                            <label for="texte">Texte</label>
                            <input type="text" class="form-control" id="texte" rows="8" name="texte"
                                value="<?php echo $reclamation['texte']; ?>" />
                            <span id="erreurtexte" style="color: red"></span>



                        </div>


                        <br>
                        <br>
                        <br>


                        <input type="hidden" name="id_rec" value="<?php echo $reclamation['id_rec']; ?>" />

                        <button type="submit" class="btn btn-success btn-lg px-3">modifier</button>


                    </div>
                    <div class="col-md-6">
                        <img id="titre" src="image/img.jpg" alt="image" class="img slide-from-right" width="100%"
                            height="99%">
                    </div>
                </div>
            </form>
        </div>
    </div>

    

    <!-- Start Script -->

    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/contact.js"></script>
    <!--
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
-->

    <!-- End Script -->

</body>


</html>