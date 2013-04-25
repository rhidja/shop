<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_parcels.js"></script>
<?php
include_once("connex.php");
?>

<form id="editParcelForm" class="form-horizontal"><legend>Edit Parcel</legend>
	
	<div class="control-group">
		<label class="control-label" for="idColis">Parcel's Id</label>
		<div class="controls">
			<select name="idColis" id="idColis">
	        <option value="">----------</option>
			<?php
				$query_cmd = 'SELECT * FROM colis';
				$reponse = $bdd->query($query_cmd);
				while ($donnees = $reponse->fetch())
				{
					$idColis = $donnees['idColis'];
					echo '<option value="'.$idColis.'">'.$idColis.'</option>';
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