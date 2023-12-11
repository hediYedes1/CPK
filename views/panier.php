<?php
include '../controller/PanierC.php';
include_once '../config.php';
$panierC = new PanierC();

$list = $panierC->getPanierByUserId(1);
$ids = $panierC->getallPanierByUserId(1);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 , shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="assets/css/tiny-slider.css" rel="stylesheet">
		
		<title>Panier</title>
		
		
	
		<link rel="apple-touch-icon" href="assets/img/apple-icon.png">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
	<!--
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	-->
		<link rel="stylesheet" href="assets/css/templatemo.css">
		<link rel="stylesheet" href="assets/css/custom.css">
	
		<!-- Load fonts style after rendering the layout styles -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
		<link rel="stylesheet" href="assets/css/fontawesome.min.css">
	</head>

	<body>

		<!-- Start Header/Navigation -->
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

		
    <?php
// Check for the presence of the "msg" parameter
if (isset($_GET["msg"]) && $_GET["msg"] === "oui") {
    echo '<div class="alert alert-success" role="alert">Commande valider</div>';
}
?>
		<div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Image</th>
                          <th class="product-name">Produit</th>
                          <th class="product-price">Prix</th>
                          <th class="product-quantity">Quantité</th>
                          <th class="product-total">Total</th>
                          <th class="product-remove">Supprimer</th>
                        </tr>
                      </thead>
                      <tbody>
<?php
  $selectedpanier = []; 
  foreach ($ids as $value){
        $selectedpanier[] = [
          'id' => $value['id']
      ]; 
    }
  $total_price = 0;
  $selectedProducts = []; // Initialize an array to store selected products
  foreach ($list as $value){
  $total_price+=$value['total_price'];
      // Add each product to the selectedProducts array
      $selectedProducts[] = [
        'id_article' => $value['id_article'],
        'total_quantity' => $value['total_quantity'],
        'total_price' => $value['total_price'],
    ];
?> 				 
					  <tr>
                          <td class="product-thumbnail">
                          <img src="img/<?php echo $value['image']; ?>" alt="<?php echo $value['image'];?>" class="img-fluid" width="100" height="100">
                          </td>
                          <td class="product-name">
                            <h2 class="h5 text-black"><?php echo   $value['nom'];?></h2>
                          </td>
                          <td><?php echo   $value['prix'];?> DT</td>
                          <td>
                         <a href="../controller/deleteFromCart.php?panier-id=<?= $value["id"]; ?>" class="btn btn-outline-black decrease">&minus;</a>      
                        <?php echo   $value['total_quantity'];?>
                        <a href="../controller/addToCart.php?product-id=<?php echo   $value['id_article'];?>" class="btn btn-outline-black increase">&plus;</a>      
                          </td>
                          <td><?php echo   $value['total_price'];?> DT</td>
                          <td><a href="../controller/deleteFromCart.php?panier-id=<?php echo   $value['id'];?>" class="btn btn-black btn-sm">X</a></td>
                        </tr>
  <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
            <button class="btn btn-black btn-sm btn-block">Mettre A Jour Panier</button>
                    </div>
                    <div class="col-md-6">
                      <button class="btn btn-outline-black btn-sm btn-block">Continuer vos achats</button>
                    </div>
                  </div>
</div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Panier Total</h3>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black"><?php echo   $total_price;?> DT</strong>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="col-md-12">
                        <button class="btn btn-black btn-lg py-3 btn-block" onclick="validateCommande(<?php echo htmlspecialchars(json_encode($selectedProducts), ENT_QUOTES, 'UTF-8'); ?>)">Valider Commande</button>
                        </div>
                      </div>
                      <script>
           setTimeout(function () {
                window.location.reload();
            }, 2569); // 1000 milliseconds (1 second)
                            function deletePaniers(selectedPaniers) {
    // Make an AJAX request to delete the paniers
    var xhr = new XMLHttpRequest();
    var url = '../controller/deletePaniers.php';
    var params = 'selectedPaniers=' + JSON.stringify(selectedPaniers);

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            // Handle the response as needed
            if (xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    // Redirect to a success page or handle the response
                    window.location = 'panier.php?msg=oui';
                } else {
                    // Handle error
                    console.error('Error deleting paniers');
                }
            } else {
                // Handle error
                console.error('Error deleting paniers');
            }
        }
    };

    xhr.send(params);
}
function validateCommande(selectedProducts) {
    // Make an AJAX request to save the data
    var xhr = new XMLHttpRequest();
    var url = '../controller/addCommande.php';
    var params = 'selectedProducts=' + JSON.stringify(selectedProducts);

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          deletePaniers(<?php echo json_encode($selectedpanier); ?>);
            // Redirect to a success page or handle the response as needed
            window.location.href = 'panier.php?msg=oui';

            setTimeout(function () {
                window.location.reload();
            }, 1000); // 1000 milliseconds (1 second)
        
                  }
    };

    xhr.send(params);
}
</script>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		<!-- Start Footer Section -->
		<?php require('footer.php'); ?>
		<!-- End Footer -->
	
		<!-- Start Script -->
		<script src="assets/js/jquery-1.11.0.min.js"></script>
		<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/templatemo.js"></script>
		<script src="assets/js/custom.js"></script>
		<!-- End Script -->
		<!-- End Footer Section -->	
	</body>

</html>
