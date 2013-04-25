<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_products.js"></script>
<?php 
	include_once("connex.php");
	$orderby = trim($_POST['orderby']);
?>

	<h3>List of products</h3>
<table class="table table-hover">
	<tr>
		<td class="span3"><a  href="#" id="TriNomProduit" > Name : </a></td>
		<td class="span3"><a  href="#" id="TriCategorie" > Type : </a></td>
		<td class="span3"><a  href="#" id="TriMarque" > Brand : </a></td>
	</tr>
	<?php
		$query_cmd 	= 'SELECT * FROM items ORDER BY '.$orderby.' DESC ';
		$reponse 	= $bdd->query($query_cmd);
		while($donnees 	= $reponse->fetch())
		{
			$nomProduit=$donnees['nomProduit'];
			$typeProduit	=$donnees['typeProduit'];
			$marqueProduit	=$donnees['marqueProduit'];
			echo '<tr>
					<td>'.$nomProduit.'</td>
					<td>'.$typeProduit.'</td>
					<td>'.$marqueProduit.'</td>
				 </tr>';
		}	
	?>
</table>