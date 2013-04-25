 <?php
	include_once("connex.php");
	
    $numCommande=trim($_POST['numCommande']);
	$dateCommande=trim($_POST['dateCommande']);
	$dateReceptionCommande=trim($_POST['dateReceptionCommande']);
	$numeroColis=trim($_POST['numeroColis']);
	
	$query_cmd ="SELECT * FROM orders WHERE numCommande='".$numCommande."'";
	if($reponse = ($bdd->query($query_cmd)))
	{
		if($reponse->fetchColumn()<1)
		{
			$query_cmd = "INSERT INTO orders VALUES('".$numCommande."','".$dateCommande."','".$dateReceptionCommande."','".$numeroColis."')";
			$bdd->exec($query_cmd) or die($msg."<br />Error Order!<br />");
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Well done! The reccord is saved successfully.
			</div>
			<?php
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