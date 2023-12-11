<?php
require_once 'CommandeC.php';
include_once '../config.php';
use PHPMailer\PHPMailer\PHPMailer;
require_once __DIR__."/../config.php";
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';


    $commandeC = new CommandeC();
    $commandeC->updateCommande($_GET["id"],"processed");
    $alert = '';
$mail = new PHPMailer(true);
try{

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'p8490466@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'cxifeavvuhksltvr'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';
  
    $mail->setFrom('p8490466@gmail.com'); // Gmail address which you used as SMTP server
  
  
    $mail->addAddress("hamza.farhani@esprit.tn"); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
     
    $mail->isHTML(true);
    $mail->Subject = "alerte";
    $mail->Body = "    
    <div style='font-size: 25px; color:black;'><h3>Hello client <br> votre commande a été apprové.<br><br>Admin.</h3></div>";			  
    $mail->send();
    $alert = '<div id="hideMe" class="alert-success">
                 <span>Message envoyé! Merci de nous contacter.</span>
                </div>';
  } catch (Exception $e){
    $alert = '<div id="hideMe" class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
    header("Location: ../views/Commande.php?msg=non");
    exit();

?>
