 <?php
	include_once("connex.php");
	
    $numCommande=trim($_POST['numCommande']);
	$firstNameCustomer=trim($_POST['firstNameCustomer']);
	$lastNameCustomer=trim($_POST['lastNameCustomer']);
	$dateCommande=trim($_POST['dateCommande']);
	$dateEnvoiCommande=trim($_POST['dateEnvoiCommande']);
	$dateReceptionCommande=trim($_POST['dateReceptionCommande']);
	$numeroColis=trim($_POST['numeroColis']);
	
	$query_cmd ="SELECT * FROM customersorders WHERE numCommande='".$numCommande."'";
	if($reponse = ($bdd->query($query_cmd)))
	{
		if($reponse->fetchColumn()<1)
		{
			$query_cmd ="SELECT * FROM customers WHERE firstNameCustomer='".$firstNameCustomer."' and lastNameCustomer='".$lastNameCustomer."'";
			if($reponse = ($bdd->query($query_cmd)))
			{
				if($reponse->fetchColumn()<1)
				{
					?>
					<div class="alert alert-error">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						Ooops! This Customer dont exist.
					</div>
					<?php				
				}
				else
				{	
					$query_cmd ="SELECT * FROM customers WHERE firstNameCustomer='".$firstNameCustomer."' and lastNameCustomer='".$lastNameCustomer."'";
					$reponse = ($bdd->query($query_cmd));
					$donnees=$reponse->fetch();
					$idCustomer=$donnees['idCustomer'];
					
					$query_cmd = "INSERT INTO customersorders VALUES('".$numCommande."','".$idCustomer."','".$dateCommande."','".$dateEnvoiCommande."','".$dateReceptionCommande."','".$numeroColis."')";
					$bdd->exec($query_cmd) or die($msg."<br />Error Customer order!<br />");
					?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						Well done! The reccord is saved successfully.
					</div>
					<?php	
				}
			}
		}
		else{
			?>
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Ooops! This Order's number already exists.
			</div>
			<?php
		}
	}	
?>