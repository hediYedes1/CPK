<?php  
include "../controller/PubliciteC.php";


$sql="SELECT * from pub where id_pub='".$_GET['id']."'";
		$db = config::getConnexion();
				$liste=$db->query($sql);


$PubliciteC=new PubliciteC();
$tab=$PubliciteC->recupererpublicite($_GET['id']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>LocalArt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/logo-local-art.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo-local-art.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/shop-single.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
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
    <?php require('menu.php'); ?>

    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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









<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">


					  <!-- Products tab & slick -->
                      <div class="col-md-12">
            <div class="row">
              <div class="products-tabs">



                <!-- tab -->
                <!-- <div id="tab2" class="tab-pane fade in active"> -->
                  <div class="products-slick" data-nav="#slick-nav-2">

<?php foreach($tab as $row){
  $pourcentage=round(((($row['prix']-$row['prix_avec_remise'])*100)/($row['prix'])));

   ?>
                    
                    <!-- product -->
                    <div class="product">
                      <div class="product-img">
                        <img src="img/<?PHP echo $row['image']; ?>" alt="">
                        <div class="product-label">
                          
                        </div>
                      </div>
                      <div class="product-body">
                       
                        <center><table><tr>
                      
                        <h3 class="product-name"><u>Nom :<?PHP echo $row['nom']; ?></u></h3>
                        <p class="product-category">Type :<?PHP echo $row['type']; ?></p>
                        <p class="product-category">Description :<?PHP echo $row['description']; ?></p>
                          <td><h4 class="product-price"  >Prix sans remise :<strike style="color: red; "><?PHP echo $row['prix'].' TND'; ?></strike></h4></td>
                          <td><pre style="background: none;border: none;">       </pre></td>
                          <td><h4 class="product-price" style="color: red; ">Prix avec remise :<?PHP echo $row['prix_avec_remise'].' TND'; ?></h4></td>
                          <h4 class="product-price" style="color: red; font-size: 30px; ">Pourcentage :<?PHP echo '-'.$pourcentage.'%'; ?></h4>
                        </tr></table></center>
                        
                      </div>
                      <div class="row pb-3">
                                    <div class="col d-grid">
                                    <a href="../controller/addCommandeBuy.php?produit_id=<?PHP echo $row['id_article']; ?>&total_price=<?PHP echo $row['prix_avec_remise']; ?>" class="btn btn-success btn-lg" >Buy</a>
                                    </div>
                                </div>
                         
                      </div>
                    
                      <li>
                                      
                            

                                        
                        </li>  
                      
                    </div>
                    <!-- /product -->
<?php } ?>

                    
                  </div>
                  <div id="slick-nav-2" class="products-slick-nav"></div>
                </div>
                <!-- /tab -->
              </div>
            </div>
          </div>
          <!-- /Products tab & slick -->
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->





        <style>
        /* Reset some default margin and padding */
        body,
        h1,
        h2,
        h3,
        p,
        ul {
            margin: 0;
            padding: 0;
        }

        /* Basic styling for the product section */
        .section {
            background-color: #f8f9fa;
            padding: 50px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: -15px;
        }

        .col-md-12 {
            width: 100%;
        }

        .products-tabs {
            width: 100%;
        }

        .products-slick {
            display: flex;
        }

        .product {
            width: 30%;
            margin: 15px;
            background-color: #fff;
            border: 1px solid #e0e0e0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-img {
            position: relative;
        }

        .product-img img {
            width: 100%;
            height: auto;
        }

        .product-details {
            padding: 15px;
        }

        .product-label {
            position: absolute;
            top: 0;
            left: 0;
            background-color: #28a745;
            color: #fff;
            padding: 5px 10px;
            font-weight: bold;
        }

        .product-body h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .product-category,
        .product-price {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .product-price {
            color: red;
        }

        .row.pb-3 {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn {
            width: 100%;
        }

        .btn-lg {
            padding: 15px;
            font-size: 18px;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .btn-success:hover {
            background-color: #218838;
        }
    </style>







		<!-- SECTION -->
		<!-- SECTION -->
	

    <!-- Start Footer -->
    <?php require('footer.php'); ?>

    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->

    <!-- Start Slider Script -->
    <script src="assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Slider Script -->

</body>

</html>