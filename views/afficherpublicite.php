<?PHP
include "../controller/PubliciteC.php";
$PubliciteC=new PubliciteC();
$tab=$PubliciteC->afficherpublicite();

?>
<table border="1">
<tr>
<td>id_pub</td>
<td>typepub</td>
<td>Imagepub</td>
<td>Nompub</td>
<td>Prix_sans_remise</td>
<td>Prix_avec_remise</td>
<td>Descriptionpub</td>
<td>quantitepub</td>

</tr>



<?PHP
foreach($tab as $row){
	
	?>
	<tr>
	<td><?PHP echo $row['id_pub']; ?></td>
	<td><?PHP echo $row['type']; ?></td>
	<td><?PHP echo $row['image']; ?></td>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['prix']; ?></td>
    <td><?PHP echo $row['prix_avec_remise']; ?></td>
	<td><?PHP echo $row['description']; ?></td>
	<td><?PHP echo $row['quantite']; ?></td>
	
	<td><form method="POST" action="supprimerpublicite.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id_pub']; ?>" name="id_pub">
	</form>
	</td>
	<td><a href="modifierpublicite.php?id=<?PHP echo $row['id_pub']; ?>">
	Modifier</a></td>
	</tr>
	
	<?PHP
}
?>	
</table>


