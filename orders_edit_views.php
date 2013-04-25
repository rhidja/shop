<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_orders.js"></script>

<?php
	include_once("connex.php");
	$numCommande	= trim($_POST['numCommande']);
	$query_cmd 	= 'SELECT * FROM orders WHERE numCommande="'.$numCommande.'"';
	$reponse 	= $bdd->query($query_cmd);
	$donnees 	= $reponse->fetch();
	$dateCommande			=$donnees['dateCommande'];
	$dateReceptionCommande	=$donnees['dateReceptionCommande'];
	$codeColis				= $donnees['codeColis'];
?>

<form id="editOrderFormViews" class="form-horizontal"><legend><h3>Edit order</h3></legend>

	<div class="control-group" hidden>
		<label class="control-label" for="numCommandeOld">Order's number</label>
		<div class="controls">
			<input type="text" name="numCommandeOld" id="numCommandeOld"  <?php echo'value="'.$numCommande.'"' ?> required aurofocus/>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="numCommande">Order's number</label>
		<div class="controls">
			<input type="text" name="numCommande" id="numCommande"  <?php echo'value="'.$numCommande.'"' ?> required aurofocus/>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="codeColis">Parcel's code</label>
		<div class="controls">
			<input type="text" name="codeColis" id="codeColis" <?php echo'value="'.$codeColis.'"' ?> />
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="dateCommande">Sent date</label>
		<div class="controls">
			<div id="datetimepicker3" class="input-append">
				<input type="text" id="dateCommande" name="dateCommande" data-format="yyyy-MM-dd" <?php echo'value="'.$dateCommande.'"' ?>></input>
				<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
			</div>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="dateReceptionCommande">Received date</label>
		<div class="controls">
			<div id="datetimepicker4" class="input-append">
				<input type="text" id="dateReceptionCommande" name="dateReceptionCommande" data-format="yyyy-MM-dd" <?php echo'value="'.$dateReceptionCommande.'"' ?>></input>
				<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
			</div>
		</div>
	</div>
	
	
	<div class="control-group">
		<div class="controls">
			<button	type="submit" id="editOrderFormViews_sbmt" class="btn"><i class="icon-ok-sign"></i>Submit</button>
			<button	type="submit" id="editOrderFormViews_delt" class="btn"><i class="icon-trash"></i>Delete</button>
		</div>
	</div>
</form>

<!-- Two button to add items or perfum-->
<h3>Items list</h3> 
<div class="control-group">
	<div class="controls">
		<button type="button" id="addItemOrders"   name="addItemOrders"    class="btn"><i class="icon-plus"></i>Add item</button>
		<button type="button" id="deleteItemOrders" name="deleteItemOrders"  class="btn"><i class="icon-trash"></i>Delete item</button>
		<button type="button" id="addPerfum" name="addPerfum"  class="btn offset5"><i class="icon-plus"></i>Add Perfum</button>
	</div>
</div>

<!-- Add new item to the order-->

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

<!-- Display items of the order   -->
<table id="ordersItemsList" class="table table-striped">
	<tr>
		<td class="span1"></td>
		<td class="span3">Items    : </td>
		<td class="span3">Perfum   : </td>
		<td class="span1"> Price :</td>
		<td class="span1"> Quantity   : </td>
	</tr>
	<?php
		$query_cmd = 'SELECT * FROM ordersitemslist WHERE numCommande="'.$numCommande.'"';
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

<!-- Add new perfum-->
<div id="addPerfumForm" class="control-group" title="Add new perfum" hidden="true">
	<input type="text" id="nomParfumDialog" name="nomParfumDialog" class="span3"  >
</div>