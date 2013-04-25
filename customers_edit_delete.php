 <?php
	session_start();
	include_once("connex.php");
	
    $firstNameCustomer=trim($_POST['firstNameCustomer']);
	$lastNameCustomer=trim($_POST['lastNameCustomer']);
	
	$query_cmd = "SELECT * FROM customers WHERE firstNameCustomer='".$firstNameCustomer."' and lastNameCustomer='".$lastNameCustomer."'";
	if($reponse = ($bdd->query($query_cmd)))
	{
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
			$query_cmd = "DELETE FROM customers WHERE firstNameCustomer ='".$firstNameCustomer."' and lastNameCustomer='".$lastNameCustomer."'";
			$bdd->exec($query_cmd) or die($msg."<br />Error orders!<br />");
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Well done! The reccord is deleted successfully.
			</div>
			<?php
		}
	}	
?>