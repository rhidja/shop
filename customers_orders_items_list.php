 <table id="ordersItemsList" class="table table-striped">
	<tr>
		<td class="span1"></td>
		<td class="span3"> Product </td>
		<td class="span3"> Perfum </td>
		<td class="span1"> Price </td>
		<td class="span1"> Quantity </td>
	</tr>
	<?php
		$query_cmd = 'SELECT * FROM customersordersitems WHERE numCommande="'.$numCommande.'"';
		$reponse = $bdd->query($query_cmd);
		
		while ($donnees = $reponse->fetch())
		{
			$nomProduit 	= $donnees['nomProduit'];
			$nomParfum 		= $donnees['nomParfum'];
			$prixProduit= $donnees['prixProduit'];
			$quantiteProduit= $donnees['quantiteProduit'];
				
			echo '<tr>
					<td><input type="checkbox"></td>
					<td>'.$nomProduit.'</td>
					<td>'.$nomParfum.'</td>
					<td>'.$prixProduit.'</td>
					<td>'.$quantiteProduit.'</td>
				 </tr>';
		}
    ?>
</table>

<!--------------------------------------------------------------------------------------------->