<?php
	include_once("connex.php");
	$numCommande=trim($_POST['numCommande']);
	
	$query_cmd ="SELECT * FROM customersorders WHERE numCommande='".$numCommande."'";
	if($reponse = ($bdd->query($query_cmd)))
	{
		if($reponse->fetchColumn()<1)
		{
			?>
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Ooops! This number dont exist.
			</div>
			<?php
		}
		else
		{
			$query_cmd ="SELECT * FROM customersorders WHERE numCommande='".$numCommande."'";
			$reponse = ($bdd->query($query_cmd));
			$donnees = $reponse->fetch();
			
			$idCustomer=$donnees['idCustomer'];
			$dateCommande=$donnees['dateCommande'];
			$dateEnvoiCommande=$donnees['dateEnvoiCommande'];
			$dateReceptionCommande=$donnees['dateReceptionCommande'];
			$numeroColis=$donnees['numeroColis'];
		
			$query_cmd ="SELECT * FROM customers WHERE idCustomer='".$idCustomer."'";
			if($reponse = ($bdd->query($query_cmd)))
			{
				$donnees = $reponse->fetch();
				$firstNameCustomer=$donnees['firstNameCustomer'];
				$lastNameCustomer=$donnees['lastNameCustomer'];
			}
			?>

			<form id="editCustomerOrderViewForm" name="editCustomerOrderViewForm" class="form-horizontal"><legend>Edit customer order</legend>

				<div class="control-group">
					<label class="control-label" for="numCommande">Order's number</label>
					<div class="controls">
						<input type="text" name="numCommande" id="numCommande" placeholder="Parcel's Id" required aurofocus <?php echo'value="'.$numCommande.'"' ?>></input>
					</div>
				</div>
				
				<div class="control-group" hidden>
					<label class="control-label" for="numCommandeOld">Order's number</label>
					<div class="controls">
						<input type="text" name="numCommandeOld" id="numCommandeOld" placeholder="Parcel's Id" required aurofocus <?php echo'value="'.$numCommande.'"' ?>></input>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="numeroColis">Parcel's code</label>
					<div class="controls">
						<input type="text" name="numeroColis" id="numeroColis" placeholder="Parcel's code" <?php echo'value="'.$numeroColis.'"' ?>></input>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="firstNameCustomer">First name</label>
					<div class="controls">
						<input type="text" id="firstNameCustomer" name="firstNameCustomer" placeholder="First name" required <?php echo'value="'.$firstNameCustomer.'"' ?>/>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="lastNameCustomer">Last name</label>
					<div class="controls">
						<input type="text" id="lastNameCustomer" name="lastNameCustomer" placeholder="Last name"required <?php echo'value="'.$lastNameCustomer.'"' ?>/>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="dateCommande">Order date</label>
					<div class="controls">
						<div id="datetimepicker1" class="input-append">
							<input type="text" id="dateCommande" name="dateCommande" data-format="yyyy-MM-dd" <?php echo'value="'.$dateCommande.'"' ?>></input>
							<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
						</div>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="dateEnvoiCommande">Sent date</label>
					<div class="controls">
						<div id="datetimepicker1" class="input-append">
							<input type="text" id="dateEnvoiCommande" name="dateEnvoiCommande" data-format="yyyy-MM-dd" <?php echo'value="'.$dateEnvoiCommande.'"' ?>></input>
							<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
						</div>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="dateReceptionCommande">Receved date</label>
					<div class="controls">
						<div id="datetimepicker2" class="input-append">
							<input type="text" id="dateReceptionCommande" name="dateReceptionCommande" data-format="yyyy-MM-dd" <?php echo'value="'.$dateReceptionCommande.'"' ?>></input>
							<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
						</div>
					</div>
				</div>

				<div class="control-group">
					<div class="controls">
						<button id="editCustomerOrderViewForm_submit" class="btn"><i class="icon-ok-sign"></i>Submit</button>
						<button id="editCustomerOrderViewForm_delete" class="btn"><i class="icon-trash"></i>Delete</button>
					</div>	
				</div>
			</form>
			<?php
		}
	}
?>

<!-- Two button :  one for adding items to the parcel and the other one to add perfum-->
<div class="control-group">
	<div class="controls">
		<button type="button" id="addItemOrderClt"   name="addItemOrderClt"    class="btn"><i class="icon-plus"></i>Add item</button>
		<button type="button" id="deleteItemOrderClt" name="deletItemOrderClt"  class="btn"><i class="icon-trash"></i>Delete Item</button>
		<button type="button" id="addPerfum" name="addPerfum"  class="btn offset5"><i class="icon-plus"></i>Add Perfum</button>
	</div>
</div>

<!-- Add new item to the order-->
<?php include_once("items_add_form.php");?>

<!-- Display items of the order   -->
<?php include_once("customers_orders_items_list.php");?>

<!-- Add new perfum-->
<div id="addPerfumForm" class="control-group" title="Add new perfum" hidden="true">
	<input type="text" id="nomParfumDialog" name="nomParfumDialog" class="span3"  >
</div>



<!--------------------------------------------------------------------------------------------->
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_customers_orders.js"></script>