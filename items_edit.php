<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_products.js"></script>
<?php
include_once("connex.php");
?>

<form id="editItemForm" class="form-horizontal"><legend>Edit product</legend>
	
	<div class="control-group">
		<label class="control-label" for="nomProduit">Prodct's name</label>
		<div class="controls">
			<select name="nomProduit" id="nomProduit" name="nomProduit">
	        <option value="">----------</option>
			<?php
				$query_cmd = 'SELECT * FROM items';
				$reponse = $bdd->query($query_cmd);
				while ($donnees = $reponse->fetch())
				{
					$nomProduit = $donnees['nomProduit'];
					echo '<option value="'.$nomProduit.'">'.$nomProduit.'</option>';
	            }
	        ?>
			</select>
		</div>
	</div>
	
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn"><i class="icon-ok-sign"></i>Submit</button>
		</div>
	</div>
	
</form>