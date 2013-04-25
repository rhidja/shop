<?php	
    
	include_once("connex.php");
	$numCommande=trim($_POST['numCommande']);
	$numCommandeOld=trim($_POST['numCommandeOld']);
	$firstNameCustomer=trim($_POST['firstNameCustomer']);
	$lastNameCustomer=trim($_POST['lastNameCustomer']);
	$dateCommande=trim($_POST['dateCommande']);
	$dateEnvoiCommande=trim($_POST['dateEnvoiCommande']);
	$dateReceptionCommande=trim($_POST['dateReceptionCommande']);
	$numeroColis=trim($_POST['numeroColis']);
	
	if($numCommande==$numCommandeOld)
	{
		$query_cmd ="SELECT * FROM customers WHERE firstNameCustomer='".$firstNameCustomer."' and lastNameCustomer='".$lastNameCustomer."'";
		if($reponse = ($bdd->query($query_cmd)))
		{
			// Teste d'existance du client dans la base de donnees et recuperer son "idCustomer"
			if($reponse->fetchColumn()<1) 
			{
				?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					Ooops! This customer dont exist.
				</div>
				<?php
			}
			else
			{
				// Recuperation de l'"idCustomer"
				$query_cmd ="SELECT * FROM customers WHERE firstNameCustomer='".$firstNameCustomer."' and lastNameCustomer='".$lastNameCustomer."'";
				$reponse = ($bdd->query($query_cmd));
				$donnees = $reponse->fetch();
				$idCustomer=$donnees['idCustomer'];
				
				
				$query_cmd ="SELECT * FROM customersorders WHERE numCommande='".$numCommande."'";
				$reponse = ($bdd->query($query_cmd));
				$donnees=$reponse->fetch();
				if(($idCustomer!=$donnees['idCustomer'])or
				   ($numeroColis!=$donnees['numeroColis'])or
				   ($dateCommande!=$donnees['dateCommande'])or
				   ($dateEnvoiCommande!=$donnees['dateEnvoiCommande'])or
				   ($dateReceptionCommande!=$donnees['dateReceptionCommande']))
				{
					$query_cmd = 'UPDATE customersorders SET idCustomer="'.$idCustomer.'",dateCommande="'.$dateCommande.'",dateEnvoiCommande="'.$dateEnvoiCommande.'",dateReceptionCommande="'.$dateReceptionCommande.'",numeroColis="'.$numeroColis.'" WHERE numCommande="'.$numCommande.'"';
					$bdd->exec($query_cmd) or die($msg."<br />Error Colis!<br />");
				}
				?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					Well done! The reccord is apdated successfully.
				</div>
				<?php
			}
		}	
	}
	else // Cas ou le numeroe de commande est modifie.
	{
		$query_cmd ="SELECT * FROM customersorders WHERE numCommande='".$numCommande."'";
		if($reponse = ($bdd->query($query_cmd)))
		{
			if($reponse->fetchColumn()<1) 
			{
				$query_cmd ="SELECT * FROM customers WHERE firstNameCustomer='".$firstNameCustomer."' and lastNameCustomer='".$lastNameCustomer."'";
				if($reponse = ($bdd->query($query_cmd)))
				{
					// Teste d'existance du client dans la base de donnees et recuperer son "idCustomer"
					if($reponse->fetchColumn()<1) 
					{
						?>
						<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							Ooops! This customer dont exist.
						</div>
						<?php
					}
					else
					{
						// Recuperation de l'"idCustomer"
						$query_cmd ="SELECT * FROM customers WHERE firstNameCustomer='".$firstNameCustomer."' and lastNameCustomer='".$lastNameCustomer."'";
						$reponse = ($bdd->query($query_cmd));
						$donnees = $reponse->fetch();
						$idCustomer=$donnees['idCustomer'];
						$query_cmd = 'UPDATE customersorders SET numCommande="'.$numCommande.'",idCustomer="'.$idCustomer.'",dateCommande="'.$dateCommande.'",dateEnvoiCommande="'.$dateEnvoiCommande.'",dateReceptionCommande="'.$dateReceptionCommande.'",numeroColis="'.$numeroColis.'" WHERE numCommande="'.$numCommandeOld.'"';
						$bdd->exec($query_cmd) or die($msg."<br />Error Colis!<br />");
						?>
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							Well done! The reccord is apdated successfully.
						</div>
						<?php
					}
				}
			}
			else
			{
				?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					Ooops! This order number already exists.
				</div>
				<?php
			}
		}	
	}
?>		