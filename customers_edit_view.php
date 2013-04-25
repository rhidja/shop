<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_customers.js"></script>
<?php
	session_start();
	include_once("connex.php");
	
    $firstNameCustomer=trim($_POST['firstNameCustomer']);
	$lastNameCustomer=trim($_POST['lastNameCustomer']);
	
	$query_cmd ="SELECT * FROM customers WHERE firstNameCustomer='".$firstNameCustomer."' and lastNameCustomer='".$lastNameCustomer."'";
	if($reponse = ($bdd->query($query_cmd)))
	{
		if($reponse->fetchColumn()<1)
		{
		?>
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Ooops! This customer didn't exist.
			</div>
		<?php
		}
		else
		{
			$query_cmd ="SELECT * FROM customers WHERE firstNameCustomer='".$firstNameCustomer."' and lastNameCustomer='".$lastNameCustomer."'";
			$reponse = ($bdd->query($query_cmd));
			$donnees = $reponse->fetch();
			$idCustomer=$donnees['idCustomer'];
			$emailCustomer=$donnees['emailCustomer'];
			$telCustomer1=$donnees['telCustomer1'];
			$telCustomer2=$donnees['telCustomer2'];
			$adressCustomer=$donnees['adressCustomer'];		
			?>
			<form id="editCustomerFormView" class="form-horizontal"><legend>Edit customer</legend>
				<div class="control-group">
					<label class="control-label" for="firstNameCustomer">First name</label>
					<div class="controls">
						<input type="text" id="firstNameCustomer" name="firstNameCustomer" placeholder="First name" value="<?php echo $firstNameCustomer;?>" required></input>
					</div>
				</div>
				
				<div class="control-group" hidden>
					<label class="control-label" for="firstNameCustomerOld">First name</label>
					<div class="controls">
						<input type="text" id="firstNameCustomerOld" name="firstNameCustomerOld" placeholder="First name" value="<?php echo $firstNameCustomer;?>" required></input>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="lastNameCustomer">Last name</label>
					<div class="controls">
						<input type="text" id="lastNameCustomer" name="lastNameCustomer" placeholder="Last name" value="<?php echo $lastNameCustomer;?>" required></input>
					</div>
				</div>
				
				<div class="control-group" hidden>
					<label class="control-label" for="lastNameCustomerOld">Last name</label>
					<div class="controls">
						<input type="text" id="lastNameCustomerOld" name="lastNameCustomerOld" placeholder="Last name" value="<?php echo $lastNameCustomer;?>" required></input>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="emailCustomer">Email</label>
					<div class="controls">
						<input type="email" id="emailCustomer" name="emailCustomer" placeholder="ex@gmail.com" value="<?php echo $emailCustomer;?>"></input>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="telCustomer1">Telephone 1</label>
					<div class="controls">
						<input type="text" id="telCustomer1" name="telCustomer1" placeholder="06.22.99.47.26" value="<?php echo $telCustomer1;?>"></input>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="telCustomer2">Telephone 2</label>
					<div class="controls">
						<input type="text" id="telCustomer2" name="telCustomer2" placeholder="06.22.99.47.26" value="<?php echo $telCustomer2;?>"></input>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="adressCustomer">Adresse</label>
					<div class="controls">
						<textarea rows="3" id="adressCustomer" name="adressCustomer" placeholder="Adresse" value="<?php echo $adressCustomer;?>"></textarea>
					</div>
				</div>
				
				<div class="control-group">
					<div class="controls">
						<button type="submit" id="editCustomerFormView_submit" class="btn"><i class="icon-ok-sign"></i>Submit</button>
						<button type="submit" id="editCustomerFormView_delete" class="btn"><i class="icon-trash"></i>Delete</button>
					</div>
				</div>
			</form>
			<div id="listItemsClt">
			<?php
			include_once("customers_orders_list.php");
			?>
			</div>
			<?php
		}	
	}	
?>


