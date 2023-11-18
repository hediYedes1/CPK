<?php
include '../Controller/ReponseReclamationC.php';
$reponseC = new reponseC();

// Check if "id_rec" is set in the URL or in POST data
$id_rep = $_REQUEST["id_rep"] ?? null; //get and post

if ($id_rep !== null) {
    $reponseC->deletereponse($id_rep);
  //  header('Location:listreclamation.php');
    header('Location:http://localhost/last%20khedma/views/NiceAdmin/tablereponse.php');
} else {
    echo "Error: Missing 'id_rep' parameter.";
    // You can also redirect the user to an error page or another location.
}
?>
