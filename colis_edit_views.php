 <script type="text/javascript" src="js/script.js"></script>
 <script type="text/javascript" src="js/script_parcels.js"></script>

<?php
	include_once("connex.php");
	$idColis	= trim($_POST['idColis']);
	$query_cmd 	= 'SELECT * FROM colis WHERE idColis="'.$idColis.'"';
	$reponse 	= $bdd->query($query_cmd);
	$donnees 	= $reponse->fetch();
	$dateEnvoiColis		=$donnees['dateEnvoiColis'];
	$dateReceptionColis	=$donnees['dateReceptionColis'];
	$codeColis	= $donnees['codeColis'];
?>

<form id="editParcelFormViews" class="form-horizontal"><legend>Edit parcel</legend>

	<div class="control-group" hidden>
		<label class="control-label" for="idColisOld">Parcel's Id</label>
		<div class="controls">
			<input type="text" name="idColisOld" id="idColisOld"  <?php echo'value="'.$idColis.'"' ?>></input>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="idColis">Parcel's Id</label>
		<div class="controls">
			<input type="text" name="idColis" id="idColis"  <?php echo'value="'.$idColis.'"' ?> required aurofocus></input>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="codeColis">Parcel's code</label>
		<div class="controls">
			<input type="text" name="codeColis" id="codeColis" <?php echo'value="'.$codeColis.'"' ?> />
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="dateEnvoiColis">Sent date</label>
		<div class="controls">
			<div id="datetimepicker3" class="input-append">
				<input type="text" id="dateEnvoiColis" name="dateEnvoiColis" data-format="yyyy-MM-dd" <?php echo'value="'.$dateEnvoiColis.'"' ?>></input>
				<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
			</div>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="dateReceptionColis">Receved date</label>
		<div class="controls">
			<div id="datetimepicker4" class="input-append">
				<input type="text" id="dateReceptionColis" name="dateReceptionColis" data-format="yyyy-MM-dd" <?php echo'value="'.$dateReceptionColis.'"' ?>></input>
				<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
			</div>
		</div>
	</div>
	
	
	
	<div class="control-group">
		<div class="controls">
			<button type="submit" id="editParcelFormViews_sbmt" class="btn"><i class="icon-ok-sign"></i>Submit</button>
			<button type="submit" id="editParcelFormViews_delt" class="btn"><i class="icon-trash"></i>Delete</button>
		</div>
	</div>
</form>

<div id="dialog-message-saved" title="Parcel updated" hidden="true">
	<p>
		<span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
		Your parcel is updated successfully.
	</p>
</div>

<!-- Two button :  one for adding items to the parcel and the other one to add perfum-->
<div class="control-group">
	<div class="controls">
		<button type="button" id="addItemColis"   name="addItemColis"    class="btn"><i class="icon-plus"></i>Add item</button>
		<button type="button" id="deletItemColis" name="deletItemColis"  class="btn"><i class="icon-trash"></i>Delete Item</button>
		<button type="button" id="addPerfum" name="addPerfum"  class="btn offset5"><i class="icon-plus"></i>Add Perfum</button>
	</div>
</div>

<!-- hidden input to add new perfum-->
<div id="addPerfumForm" class="control-group" title="Add new perfum" hidden="true">
	<input type="text" id="nomParfumDialog" name="nomParfumDialog" class="span3"  >
</div>

<!-- Hidden form to add new items to the parcel's list of items-->
<div id="addItemForm" class="control-group" title="Add item to the list" hidden="true">
	<select name="nomProduit" id="nomProduit" required focus>
		<option value="">Item's name ...</option>
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
			
	<input type="text" name="quantiteProduit" id="quantiteProduit" placeholder="Quantity ..." required focus/>
</div>

<!-- Table to display items on the selected parcel-->

<table id="colisItemsList" class="table table-striped">
	<tr>
		<td class="span1"></td>
		<td class="span3">Items    : </td>
		<td class="span3">Perfum   : </td>
		<td class="span1"> Quantity   : </td>
	</tr>
	<?php
		$query_cmd = 'SELECT * FROM colisitemslist WHERE idColis="'.$idColis.'"';
		$reponse = $bdd->query($query_cmd);
		
		while ($donnees = $reponse->fetch())
		{
			$nomProduit 	= $donnees['nomProduit'];
			$nomParfum 		= $donnees['nomParfum'];
			$quantiteProduit= $donnees['quantiteProduit'];
			echo '<tr><td><input type="checkbox"/></td><td>'.$nomProduit.'</td><td>'.$nomParfum.'</td><td>'.$quantiteProduit.'</td></tr>';
		}
    ?>
</table>