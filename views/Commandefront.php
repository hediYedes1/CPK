<?php  
include "../controller/CommandeC.php";
include_once '../config.php';
$commandeC = new CommandeC();

$tab = $commandeC->getAllCommandeByUserId(1);


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
    <link rel="stylesheet" href="assets/css/shop.css"> 

   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

</head>

<body>


       

  <!-- Your share button code -->
  <div class="fb-share-button" 
    data-href="https://www.facebook.com/LocalArt/" 
    data-layout="button_count">
  </div>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:LocalArt@gmail.com">LocalArt@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:+216 70 000 000">+216 70 000 000</a>

                    <i class="fa fa-dinar mx-2"></i>
                    <a href="dinar"><i class="navbar-sm-brand text-light text-decoration-none"></i> TND</a>
                    <i class="fa fa-iconclient mx-2"></i>
                    <a href="login.html"><i class="navbar-sm-brand text-light text-decoration-none"></i> Espace Client</a>
                       
                    
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <?php require('menu.php'); ?>


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



    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

     

            <div class="col-lg-2">

            </div>

            <div class="col-lg-9">
   
                </div>

                

					<!-- Products tab & slick -->
                   
                  
					
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">



								<!-- tab -->
                               
									<div class="products-slick" data-nav="#slick-nav-2">
                                  
                                    <?php foreach($tab as $row){
	 ?>
										<!-- product -->
										<div class="product">
                                    
                                       										<div class="product-img" >
                                                                              
                                                                             
												<img src="img/<?PHP echo $row['image']; ?>" alt="">
											
												<div class="product-label">
													
												</div>
											</div>
											<div class="product-body">
                                            <div class="col-md-4">
                        <div>
												
												<h3 class="product-name">Nom de produit :<u><?PHP echo $row['nom']; ?></u></h3>
                                              
                                               
												<center><table><tr>
													
													<td><h4 class="product-price" style="color: red; ">Prix :<?PHP echo $row['prix'].' TND'; ?></h4></td>
												</tr></table></center>
												<div class="add-to-cart">
                                                <center><p class="product-category">Total Quantity :<?PHP echo $row['total_quantity']; ?></p></center>
                                                <center><p class="product-category">Total Price :<?PHP echo $row['total_price']; ?> DT</p></center>
                                                <?php 
      if($row['status'] == "pending") {
        echo   '<center><a href="#"><button  class="add-to-cart-btn"><i ></i>Pending</button></a></center>';
      }else {
        echo   '<center><a href="#"><button  class="add-to-cart-btn"><i ></i>Processed</button></a></center>';
      }
      ?>
												

												
												
											
											</div>
										
                                            </div>
                        </div>
											
										
									
												
											</div>
										
												
											
										</div>
										<!-- /product -->

                                        <?php } ?>
										
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								
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



        <!-- <style>
    .product {
        width: 30%; /* Ajustez la largeur en fonction de vos besoins */
        margin: 10px;
        background-color: #fff;
        border: 1px solid #e0e0e0;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        display: inline-block;
    }

    .product-img img {
        width: 100%;
        height: auto;
    }

    .product-body {
        text-align: center;
        padding: 15px;
    }

    .product-name {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .product-category,
    .product-price {
        font-size: 14px;
        margin-bottom: 5px;
    }

    .add-to-cart-btn {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 10px 15px;
        text-decoration: none;
        display: inline-block;
    }
</style> -->




<style>
    .product {
        width: 30%; /* Ajustez la largeur en fonction de vos besoins */
        margin: 10px;
        background-color: #fff;
        border: 1px solid #e0e0e0;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: inline-block; /* Ajout pour aligner correctement les produits */
        height: 600px; /* Ajustez la hauteur en fonction de vos besoins */
        overflow: hidden; /* Pour s'assurer que le texte ne dépasse pas la hauteur définie */
    }

    .product-img {
        height: 60%; /* Ajustez la hauteur en fonction de vos besoins */
        overflow: hidden;
    }

    .product-img img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Assure que l'image couvre tout le conteneur tout en préservant les proportions */
    }

    .product-body {
        text-align: center;
        /* padding: 15px; */
        height: 40%; /* Ajustez la hauteur en fonction de vos besoins */
        width: 300%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .product-name {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .product-category,
    .product-price {
        font-size: 14px;
        margin-bottom: 5px;
    }

    .add-to-cart-btn {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 10px 15px;
        text-decoration: none;
        display: inline-block;
    }
</style>






<!-- 
<style>

        /* Basic styling for the product section */
      

 .products-slick {
     display: flex;
    }

    .product {
        width: 100%;
         margin: 15px;
         background-color: #fff;
         border: 1px solid #e0e0e0;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
     }


.product-img img {
    width: 100%;
    height: auto;
}



.product-body {
    text-align: center; /* Center product details */
}

.product-name {
    font-size: 18px;
    margin-bottom: 10px;
}

.product-category,
.product-price {
    font-size: 16px;
    margin-bottom: 5px;
}


.add-to-cart-btn {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 10px 20px;
    text-decoration: none;
}

</style>
 -->







		<!-- SECTION -->
		<!-- SECTION -->
	

		 <!-- Start Brands -->
		 <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Our Brands</h1>
                    <p>
                       our brands or our artist
                    </p>
                </div>
                <div class="col-lg-9 m-auto tempaltemo-carousel">
                    <div class="row d-flex flex-row">
                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-light fas fa-chevron-left"></i>
                            </a>
                        </div>
                        <!--End Controls-->

                        <!--Carousel Wrapper-->
                        <div class="col">
                            <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example" data-bs-ride="carousel">
                                <!--Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">

                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End First slide-->

                                    <!--Second slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Second slide-->

                                    <!--Third slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Third slide-->

                                </div>
                                <!--End Slides-->
                            </div>
                        </div>
                        <!--End Carousel Wrapper-->

                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-light fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Brands-->


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
</body>

</html>