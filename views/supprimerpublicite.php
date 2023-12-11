<?PHP
include "../controller/PubliciteC.php";
$PubliciteC=new PubliciteC();
if (isset($_POST["id_pub"])){
	$PubliciteC->supprimerpubliciteC($_POST["id_pub"]);
	header('Location: ../views/consulterpublicite.php');
}

?>