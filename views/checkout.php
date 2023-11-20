<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:user_login.php');
};

if(isset($_POST['order'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $method = $_POST['method'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $address = 'flat no. '. $_POST['flat'] .', '. $_POST['street'] .', '. $_POST['city'] .', '. $_POST['state'] .', '. $_POST['country'] .' - '. $_POST['pin_code'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];

   $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $check_cart->execute([$user_id]);

   if($check_cart->rowCount() > 0){

      $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price) VALUES(?,?,?,?,?,?,?,?)");
      $insert_order->execute([$user_id, $name, $number, $email, $method, $address, $total_products, $total_price]);

      $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
      $delete_cart->execute([$user_id]);

      $message[] = 'order placed successfully!';
   }else{
      $message[] = 'your cart is empty';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="checkout-orders">

   <form id="yourFormId" action="" method="POST">
      <h3>your orders</h3>
      <div class="display-orders">
      <?php
         $grand_total = 0;
         $cart_items[] = '';
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
               $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].' x '. $fetch_cart['quantity'].') - ';
               $total_products = implode($cart_items);
               $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
      ?>
         <p> <?= $fetch_cart['name']; ?> <span>(<?= '$'.$fetch_cart['price'].'/- x '. $fetch_cart['quantity']; ?>)</span> </p>
      <?php
            }
         }else{
            echo '<p class="empty">your cart is empty!</p>';
         }
      ?>
         <input type="hidden" name="total_products" value="<?= $total_products; ?>">
         <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
         <div class="grand-total">grand total : <span>$<?= $grand_total; ?>/-</span></div>
      </div>

      <h3>place your orders</h3>
      <div class="flex">
         <div class="inputBox">
            <span>your name :</span>
            <input type="text" id="nom" name="name" placeholder="enter your name" class="box">
         </div>
         <div class="inputBox">
            <span>your number :</span>
            <input type="number"id="numero" name="number" placeholder="enter your number" class="box" onkeypress="if(this.value.length == 10) return false;" >
         </div>
         <div class="inputBox">
            <span>your email :</span>
            <input type="email" id="email" name="email" placeholder="enter your email" class="box">
         </div>
         <div class="inputBox">
            <span>payment method :</span>
            <select name="method" class="box" required>
               <option value="cash on delivery">cash on delivery</option>
               <option value="credit card">credit card</option>
               <option value="paytm">paytm</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 01 :</span>
            <input type="text" id="adresse1" name="flat" placeholder="e.g. flat number" class="box" >
         </div>
         <div class="inputBox">
            <span>address line 02 :</span>
            <input type="text" id="adresse2" name="street" placeholder="e.g. street name" class="box" >
         </div>
         <div class="inputBox">
            <span>city :</span>
            <input type="text" id="citee" name="city" placeholder="e.g. mumbai" class="box" >
         </div>
         <div class="inputBox">
            <span>state :</span>
            <input type="text" id="state"name="state" placeholder="e.g. maharashtra" class="box" >
         </div>
         <div class="inputBox">
            <span>country :</span>
            <input type="text" id="pays" name="country" placeholder="e.g. India" class="box" >
         </div>
         <div class="inputBox">
            <span>pin code :</span>
            <input type="number" min="0" id="codepostal" name="pin_code" placeholder="e.g. 123456"  onkeypress="if(this.value.length == 6) return false;" class="box" >
         </div>
      </div>

      <input type="submit" name="order" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>" value="place order">
                  <script>
               document.addEventListener('DOMContentLoaded', function () {
            // Sélectionnez le formulaire par son ID
            var form = document.getElementById('yourFormId'); // Assurez-vous de définir l'ID de votre formulaire ici

            // Ajoutez un écouteur d'événements de soumission au formulaire
            form.addEventListener('submit', function (event) {
               // Sélectionnez le champ contenu
               var contenuField = document.getElementById('nom');
               var contenuField2 = document.getElementById('numero');
               var contenuField3 = document.getElementById('email');
               var contenuField4 = document.getElementById('adresse1');
               var contenuField5 = document.getElementById('adresse2');
               var contenuField6 = document.getElementById('citee');
               var contenuField7= document.getElementById('state');
               var contenuField8 = document.getElementById('pays');
               var contenuField9 = document.getElementById('codepostal');

               if (contenuField.value.trim() === '' || contenuField2.value.trim() === '' || contenuField3.value.trim() === '' || contenuField4.value.trim() === ''
               ||contenuField5.value.trim() === '' || contenuField6.value.trim() === '' || contenuField7.value.trim() === ''|| contenuField8.value.trim() === ''
               || contenuField9.value.trim() === '') {
               
               event.preventDefault();
               alert('Le champ "contenu" ne peut pas être vide');
               }
               // Affichez un message d'erreur ou effectuez une autre action pour informer l'utilisateur
               // Vous pouvez ajouter d'autres validations ici si nécessaire
            });
         });
         </script>

   </form>

</section>






<?php include 'components/footer.php'; ?>
<script src="js/commande.js"></script>
<script src="js/script.js"></script>

</body>
</html>