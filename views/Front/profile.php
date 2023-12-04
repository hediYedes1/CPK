<?php
// Start the session
session_start();

include 'C:/xampp/htdocs/LocalArt/Controller/userC.php';


if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

} else {
    header('Location: login.php');
    exit;
}



$user1 = new userC();
$userActual = $user1->getUserById($userId);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btn-change'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        $user1->updateUser($userId,$name,$email,$userActual['password'],$userActual['state']);


        header('Location: ' . $_SERVER['PHP_SELF']);



    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop - About Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
    <style>


         .card .icon {

            position: absolute;

            top: 0;

            left: 0;

            width: 100%;

            height: 100%;

            background: #2c73df;

        }

         .card .icon .fa {

            position: absolute;

            top: 50%;

            left: 50%;

            transform: translate(-50%, -50%);

            font-size: 80px;

            color: #fff;

        }

         .card .slide {

            width: 300px;

            height: 200px;

            transition: 0.5s;

        }

         .card .slide.slide1 {

            position: relative;

            display: flex;

            justify-content: center;

            align-items: center;

            z-index: 1;

            transition: .7s;

            transform: translateY(100px);

        }

         .card:hover .slide.slide1{

            transform: translateY(0px);

        }

         .card .slide.slide2 {

            position: relative;

            display: flex;

            justify-content: center;

            align-items: center;

            padding: 20px;

            box-sizing: border-box;

            transition: .8s;

            transform: translateY(-100px);

            box-shadow: 0 20px 40px rgba(0,0,0,0.4);

        }

         .card:hover .slide.slide2{

            transform: translateY(0);

        }

         .card .slide.slide2::after{

            content: "";

            position: absolute;

            width: 30px;

            height: 4px;

            bottom: 15px;

            left: 50%;

            left: 50%;

            transform: translateX(-50%);

            background: #2c73df;

        }

         .card .slide.slide2 .content p {

            margin: 0;

            padding: 0;

            text-align: center;

            color: #414141;

        }

         .card .slide.slide2 .content h3 {

            margin: 0 0 10px 0;

            padding: 0;

            font-size: 24px;

            text-align: center;

            color: #414141;

        }

    </style>
</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">
                LocalArt
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.html">Shop</a>
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
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- open Banner -->

    <div class="card" style="border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 5px #ccc; margin: 20px; width: 80%;">
        <div class="card-body" style="padding: 20px; font-family: Arial, sans-serif;">
            <table style="width: 100%;">
                <thead>
                <tr>
                    <th style="text-align: left; font-size: 24px; font-weight: bold; color: #333;">Info</th>
                    <th style="text-align: left; font-size: 24px; font-weight: bold; color: #333;">Edit</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="display: flex; flex-direction: column; justify-content: space-between;">
                        <span style="font-size: 20px; color: #333;"><?php echo $userActual['nom']; ?></span>
                        <span style="font-size: 18px; color: #555;"><?php echo $userActual['email']; ?></span>
                        <span class="text-muted" style="font-size: 16px; color: #999;"><?php echo $userActual['state']; ?></span>
                    </td>
                    <td id="edit-form">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="display: flex; flex-direction: column; gap: 10px;">
                            <label for="name" style="font-size: 16px; color: #333;">Name:</label>
                            <input type="text" id="name" name="name" value="<?php echo $userActual['nom']; ?>" style="border: 1px solid #ccc; border-radius: 5px; padding: 5px;">
                            <label for="email" style="font-size: 16px; color: #333;">Email:</label>
                            <input type="email" id="email" name="email" value="<?php echo $userActual['email']; ?>" style="border: 1px solid #ccc; border-radius: 5px; padding: 5px;">
                            <button type="submit" name="btn-change" style="border: none; border-radius: 5px; padding: 10px; background-color: #333; color: #fff; font-size: 16px; font-weight: bold;">Save changes</button>
                        </form>
                    </td>
                    <td>

                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        // This function toggles the edit form between changing information and changing password
        function toggleForm() {
            var checkbox = document.getElementById("switch");
            var form = document.getElementById("edit-form");
            if (checkbox.checked) {
                // Change the form to change password
                form.innerHTML = `
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="display: flex; flex-direction: column; gap: 10px;">
                    <label for="old-password" style="font-size: 16px; color: #333;">Old password:</label>
                    <input type="password" id="old-password" name="old-password" style="border: 1px solid #ccc; border-radius: 5px; padding: 5px;">
                    <label for="new-password" style="font-size: 16px; color: #333;">New password:</label>
                    <input type="password" id="new-password" name="new-password" style="border: 1px solid #ccc; border-radius: 5px; padding: 5px;">
                    <label for="confirm-password" style="font-size: 16px; color: #333;">Confirm password:</label>
                    <input type="password" id="confirm-password" name="confirm-password" style="border: 1px solid #ccc; border-radius: 5px; padding: 5px;">
                    <button type="submit" name="btn-change" style="border: none; border-radius: 5px; padding: 10px; background-color: #333; color: #fff; font-size: 16px; font-weight: bold;">Change password</button>
                </form>
            `;
            } else {
                // Change the form to change information
                form.innerHTML = `
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="display: flex; flex-direction: column; gap: 10px;">
                    <label for="name" style="font-size: 16px; color: #333;">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $userActual['nom']; ?>" style="border: 1px solid #ccc; border-radius: 5px; padding: 5px;">
                    <label for="email" style="font-size: 16px; color: #333;">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $userActual['email']; ?>" style="border: 1px solid #ccc; border-radius: 5px; padding: 5px;">
                    <button type="submit" name="btn-change" style="border: none; border-radius: 5px; padding: 10px; background-color: #333; color: #fff; font-size: 16px; font-weight: bold;">Save changes</button>
                </form>
            `;
            }
        }
    </script>




    <!-- Close Banner -->


    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Zay Shop</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            123 Consectetur at ligula 10660
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Luxury</a></li>
                        <li><a class="text-decoration-none" href="#">Sport Wear</a></li>
                        <li><a class="text-decoration-none" href="#">Men's Shoes</a></li>
                        <li><a class="text-decoration-none" href="#">Women's Shoes</a></li>
                        <li><a class="text-decoration-none" href="#">Popular Dress</a></li>
                        <li><a class="text-decoration-none" href="#">Gym Accessories</a></li>
                        <li><a class="text-decoration-none" href="#">Sport Shoes</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Home</a></li>
                        <li><a class="text-decoration-none" href="#">About Us</a></li>
                        <li><a class="text-decoration-none" href="#">Shop Locations</a></li>
                        <li><a class="text-decoration-none" href="#">FAQs</a></li>
                        <li><a class="text-decoration-none" href="#">Contact</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>


            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2021 Company Name 
                            | Designed by <a rel="sponsored" href="https://templatemo.com/page/1" target="_blank">TemplateMo</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>

    </script>
    <!-- End Script -->
</body>


</html>