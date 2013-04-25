<?php
	session_start();
	include_once("connex.php");
	
    $firstNameCustomer=trim($_POST['firstNameCustomer']);
	$firstNameCustomerOld=trim($_POST['firstNameCustomerOld']);
	$lastNameCustomer=trim($_POST['lastNameCustomer']);
	$lastNameCustomerOld=trim($_POST['lastNameCustomerOld']);
	$emailCustomer=trim($_POST['emailCustomer']);
	$telCustomer1=trim($_POST['telCustomer1']);
	$telCustomer2=trim($_POST['telCustomer2']);
	$adressCustomer=trim($_POST['adressCustomer']);
	
	if (($firstNameCustomer==$firstNameCustomerOld)and($lastNameCustomer==$lastNameCustomerOld))
	{
		$query_cmd ="SELECT * FROM customers WHERE (firstNameCustomer='".$firstNameCustomer."') and 
					                               (lastNameCustomer='".$lastNameCustomer."')";
		if($reponse = ($bdd->query($query_cmd)))
		{
			$donnees = $reponse->fetch();
			if(($emailCustomer!=$donnees['emailCustomer'])or($telCustomer1!=$donnees['telCustomer1'])or
			($telCustomer2!=$donnees['telCustomer2'])or($adressCustomer!=$donnees['adressCustomer']))
			{
				$query_cmd = 'UPDATE customers SET emailCustomer="'.$emailCustomer.'",telCustomer1="'.$telCustomer1.'",telCustomer2="'.$telCustomer2.'",adressCustomer="'.$adressCustomer.'" WHERE (firstNameCustomer="'.$firstNameCustomer.'") and (lastNameCustomer="'.$lastNameCustomer.'")';
				$bdd->exec($query_cmd) or die($msg."<br />Error Customers!<br />");
			}
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Well done! The changes are saved successfully.
			</div>
			<?php
		}
	}
	else
	{
		$query_cmd ="SELECT * FROM customers WHERE (firstNameCustomer='".$firstNameCustomer."') and 
					                               (lastNameCustomer='".$lastNameCustomer."')";
		if($reponse = ($bdd->query($query_cmd)))
		{
			if($reponse->fetchColumn()<1)
			{
				$query_cmd = 'UPDATE customers SET firstNameCustomer="'.$firstNameCustomer.'",
												   lastNameCustomer="'.$lastNameCustomer.'",
												   emailCustomer="'.$emailCustomer.'",
												   telCustomer1="'.$telCustomer1.'",
												   telCustomer2="'.$telCustomer2.'",
												   adressCustomer="'.$adressCustomer.'" 
							  WHERE (firstNameCustomer="'.$firstNameCustomerOld.'") and 
							       (lastNameCustomer="'.$lastNameCustomerOld.'")';
				$bdd->exec($query_cmd) or die($msg."<br />Error Customers!<br />");
				?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					Well done! The changes are saved successfully.
				</div>
				<?php				
			}
			else
			{
				?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					Ooops! This customers already exists.
				</div>
				<?php
			}
		}
	}
?>	