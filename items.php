<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_products.js"></script>
<?php
include_once("connex.php");
?>
<form id="newItemForm" class="form-horizontal"><legend>New product</legend>
	
	<div class="control-group">
		<label class="control-label" for="nomProduit">Name</label>
		<div class="controls">
			<input type="text" name="nomProduit" id="nomProduit" placeholder="Product's name" required focus/>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="typeProduit">Type</label>
		<div class="controls">
			<select name="typeProduit" id="typeProduit">
				<option value="">----------</option>
				<?php 
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
				<option value="">----------</option>
				<?php 
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
			<button type="submit" id="newItemForm_submit" name="newItemForm_submit" class="btn"><i class="icon-ok-sign"></i>Submit</button>
		</div>
	</div>
	
</form>

<div id="addTypeForm" class="control-group" title="Create new type" hidden="true">
	<input type="text" id="idTypeDialog" name="idTypeDialog" class="span3"  >
</div>

<div id="addBrandForm" class="control-group" title="Create new brand" hidden="true">
	<input type="text" id="idBrandDialog" name="idBrandDialog" class="span3"  >
</div>

