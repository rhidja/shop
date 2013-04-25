<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_orders.js"></script>
<?php
include_once("connex.php");
?>

<form id="editOrderForm" class="form-horizontal"><legend>Edit Order</legend>
	
	<div class="control-group">
		<label class="control-label" for="numCommande">Order's number</label>
		<div class="controls">
			<select name="numCommande" id="numCommande">
	        <option value="">----------</option>
			<?php
				$query_cmd = 'SELECT * FROM orders';
				$reponse = $bdd->query($query_cmd);
				while ($donnees = $reponse->fetch())
				{
					$numCommande = $donnees['numCommande'];
					echo '<option value="'.$numCommande.'">'.$numCommande.'</option>';
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