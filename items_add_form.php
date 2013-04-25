 <div id="addItemForm" class="control-group" title="Add item to the list" hidden="true">
	
	<select name="nomProduit" id="nomProduit" required focus>
		<option value="">----------</option>
		<?php 
			$query_cmd 	= 'SELECT * FROM items';
			$reponse 	= $bdd->query($query_cmd);
			while($donnees 	= $reponse->fetch())
			{
				$nomProduit	=$donnees['nomProduit'];
				echo '<option value="'.$nomProduit.'">'.$nomProduit.'</option>';
			}	
		?>
	</select>

	<select name="nomParfum" id="nomParfum" required focus>
		<option value="">----------</option>
		<?php 
			$query_cmd 	= 'SELECT * FROM perfums';
			$reponse 	= $bdd->query($query_cmd);
			while($donnees 	= $reponse->fetch())
			{
				$nomParfum	=$donnees['nomParfum'];
				echo '<option value="'.$nomParfum.'">'.$nomParfum.'</option>';
			}	
		?>
	</select>
	<input type="text" name="prixProduit" id="prixProduit" placeholder="Price ..." required focus/>
	<input type="text" name="quantiteProduit" id="quantiteProduit" placeholder="Quantity ..." required focus/>
</div>