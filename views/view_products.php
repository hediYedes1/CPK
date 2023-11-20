<?php
include 'composants/connect.php';
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = create_unique_id();
    setcookie('user_id', $user_id, time() + 60 * 60 * 24 * 30);
}
if(isset($_POST['add_to_cart'])){

    $id = create_unique_id();
    $product_id = $_POST['product_id'];
    $product_id = filter_var($product_id, FILTER_SANITIZE_STRING);
    $qty = $_POST['qty'];
    $qty = filter_var($qty, FILTER_SANITIZE_STRING);
    
    $verify_cart = $conn->prepare("SELECT * FROM `panier` WHERE user_id = ? AND product_id = ?");   
    $verify_cart->execute([$user_id, $product_id]);
 
    $max_cart_items = $conn->prepare("SELECT * FROM `panier` WHERE user_id = ?");
    $max_cart_items->execute([$user_id]);
 
    if($verify_cart->rowCount() > 0){
       $warning_msg[] = 'Déjà Ajouté au panier!';
    }elseif($max_cart_items->rowCount() == 10){
       $warning_msg[] = 'Panier Saturé!';
    }else{
 
       $select_price = $conn->prepare("SELECT * FROM `produits` WHERE id = ? LIMIT 1");
       $select_price->execute([$product_id]);
       $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);
 
       $insert_cart = $conn->prepare("INSERT INTO `panier`(id, user_id, product_id, prix,quantite) VALUES(?,?,?,?,?)");
       $insert_cart->execute([$id, $user_id, $product_id, $fetch_price['prix'], $qty]);
       $success_msg[] = 'Ajouté au panier!';
    }
 
 }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- header section starts -->
    <?php include 'composants/header.php'; ?>
    <!-- header section ends -->
    <!-- view products section starts -->
    <section class="products">
        <h1 class="heading">all products</h1>
        <div class="box-container">

<?php 
   $select_products = $conn->prepare("SELECT * FROM `produits`");
   $select_products->execute();
   if($select_products->rowCount() > 0){
      while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){
?>
<form action="" method="POST" class="box">
   <img src="uploaded_files/<?= $fetch_prodcut['image']; ?>" class="image" alt="">
   <h3 class="name"><?= $fetch_prodcut['name'] ?></h3>
   <input type="hidden" name="product_id" value="<?= $fetch_prodcut['id']; ?>">
   <div class="flex">
      <p class="price"><i class="fas fa-indian-rupee-sign"></i><?= $fetch_prodcut['prix'] ?></p>
      <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
   </div>
   <input type="submit" name="add_to_cart" value="add to cart" class="btn">
   <a href="checkout.php?get_id=<?= $fetch_prodcut['id']; ?>" class="delete-btn">buy now</a>
</form>
<?php
   }
}else{
   echo '<p class="empty">no products found!</p>';
}
?>

</div>
    </section>
    <!-- view products section ends -->

    <!-- sweet alert cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- modifier fichier js -->
    <script src="js/script.js"></script>
    <?php include 'composants/alert.php'; ?>
</body>

</html>