<?php

	session_start();
	include_once("connex.php");
	
    $firstNameCustomer=trim($_POST['firstNameCustomer']);
	$lastNameCustomer=trim($_POST['lastNameCustomer']);
	$emailCustomer=trim($_POST['emailCustomer']);
	$telCustomer1=trim($_POST['telCustomer1']);
	$telCustomer2=trim($_POST['telCustomer2']);
	$adressCustomer=trim($_POST['adressCustomer']);
	
	$query_cmd ="SELECT * FROM customers WHERE (firstNameCustomer='".$firstNameCustomer."') and (lastNameCustomer='".$lastNameCustomer."')";
	if($reponse = ($bdd->query($query_cmd)))
	{
		if($reponse->fetchColumn()<1)
		{	
			//$query_cmd = "INSERT INTO customers (firstNameCustomer,lastNameCustomer,emailCustomer)VALUES('".$firstNameCustomer."','".$lastNameCustomer."','".$emailCustomer."')";
			//$query_cmd = "INSERT INTO customers (firstNameCustomer,lastNameCustomer)VALUES('".$firstNameCustomer."','".$lastNameCustomer."')";
			$query_cmd = "INSERT INTO customers (firstNameCustomer,lastNameCustomer,emailCustomer,telCustomer1,telCustomer2,adressCustomer)VALUES('".$firstNameCustomer."','".$lastNameCustomer."','".$emailCustomer."','".$telCustomer1."','".$telCustomer2."','".$adressCustomer."')";
			$bdd->exec($query_cmd) or die($msg."<br />Error Customer!<br />");
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Well done! The reccord is saved successfully.
			</div>
			<?php
		}
		else
		{
		?>
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Ooops! The customer already exists.
			</div>
		<?php
		}
	}
?>