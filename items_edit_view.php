<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_products.js"></script>

<?php
	include_once("connex.php");
	$nomProduit	=trim($_POST['nomProduit']);
	$query_cmd 	= 'SELECT * FROM items WHERE nomProduit="'.$nomProduit.'"';
	$reponse 	= $bdd->query($query_cmd);
	$donnees 	= $reponse->fetch();
	$typeProduit	=$donnees['typeProduit'];
	$marqueProduit	=$donnees['marqueProduit'];
?>

<form id="editItemFormView" class="form-horizontal"><legend>Edit product</legend>

	<div class="control-group" hidden>
		<label class="control-label" for="nomProduitOld">Product's name</label>
		<div class="controls">
			<input type="text" name="nomProduitOld" id="nomProduitOld" <?php echo'value="'.$nomProduit.'"' ?>>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="nomProduit">Product's name</label>
		<div class="controls">
			<input type="text" name="nomProduit" id="nomProduit" <?php echo'value="'.$nomProduit.'"' ?>>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="typeProduit">Type</label>
		<div class="controls">
			<select name="typeProduit" id="typeProduit">
				<?php
					echo '<option value="'.$typeProduit.'" selected>'.$typeProduit.'</option>';
					$query_cmd 	= 'SELECT * FROM categorie';
					$reponse 	= $bdd->query($query_cmd);
					while($donnees 	= $reponse->fetch())
					{
						$nomCategorie	=$donnees['nomCategorie'];
						echo '<option value="'.$nomCategorie.'">'.$nomCategorie.'</option>';
					}	
				?>
			</select>
			<button type="submit" id="addType" name="addType" class="btn"><i class="icon-plus"></i></button>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="marqueProduit">Brand</label>
		<div class="controls">
			<select name="marqueProduit" id="marqueProduit">
				<?php 
					echo '<option value="'.$marqueProduit.'" selected>'.$marqueProduit.'</option>';
					$query_cmd 	= 'SELECT * FROM marque';
					$reponse 	= $bdd->query($query_cmd);
					while($donnees 	= $reponse->fetch())
					{
						$nomMarque	=$donnees['nomMarque'];
						echo '<option value="'.$nomMarque.'">'.$nomMarque.'</option>';
					}	
				?>
			</select>
			<button type="submit" id="addBrand" name="addBrand" class="btn"><i class="icon-plus"></i></button>
		</div>
	</div>
	
	<div class="control-group">
		<div class="controls">
			<button type="submit" id="editItemFormView_submit" name="editItemFormView_submit" class="btn"><i class="icon-ok-sign"></i>Submit</button>
			<button type="submit" id="editItemFormView_delete" name="editItemFormView_submit" class="btn"><i class="icon-trash"></i>Delete</button>
		</div>
	</div>
	
</form>

<div id="addTypeForm" class="control-group" title="Create new type" hidden="true">
	<input type="text" id="idTypeDialog" name="idTypeDialog" class="span3"  >
</div>

<div id="addBrandForm" class="control-group" title="Create new brand" hidden="true">
	<input type="text" id="idBrandDialog" name="idBrandDialog" class="span3"  >
</div>