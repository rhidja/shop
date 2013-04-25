<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_stocks.js"></script>
<?php 
	include_once("connex.php");
	$orderby = trim($_POST['orderby']);
?>

	<h3>Montpellier stock</h3>
<table class="table table-hover">
	<tr>
		<td class="span4"><a  href="#" id="TriNomProduit" > Name : </a></td>
		<td class="span4"><a  href="#" id="TriNomParfum" > Perfum : </a></td>
		<td class="span2"><a  href="#" id="TriNomMarque" > Brand : </a></td>
		<td class="span2"><a  href="#" id="TriCategorie" > Quantity: </a></td>
	</tr>
	<?php
		$query_cmd 	= 'SELECT items.nomProduit AS nomProduit,marqueProduit, nomParfum, SUM(quantiteProduit) AS Qtty 
		               FROM ordersitemslist, items  
					   WHERE ordersitemslist.nomProduit = items.nomProduit
					   GROUP BY nomProduit, nomParfum 
					   ORDER BY '.$orderby.', nomParfum ASC';
		$reponse 	= $bdd->query($query_cmd);
		while($donnees 	= $reponse->fetch())
		{
			$nomProduit	=$donnees['nomProduit'];
			$nomParfum	=$donnees['nomParfum'];
			$marqueProduit	=$donnees['marqueProduit'];
			$qttyProduit=$donnees['Qtty'];
			echo '<tr>
					<td>'.$nomProduit.'</td>
					<td>'.$nomParfum.'</td>
					<td>'.$marqueProduit.'</td>
					<td>'.$qttyProduit.'</td>
				 </tr>';
		}	
	?>
</table>