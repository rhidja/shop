 <?php
	session_start();
	include_once("connex.php");
	
    $numCommande=trim($_POST['numCommande']);
	
	$query_cmd = "SELECT * FROM customersorders WHERE numCommande='".$numCommande."'";
	if($reponse = ($bdd->query($query_cmd)))
	{
		if($reponse->fetchColumn()<1)
		{
			?>
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Ooops! This Order's number dont exist.
			</div>
			<?php		
		}
		else
		{
			$query_cmd = "DELETE FROM customersorders WHERE numCommande ='".$numCommande."'";
			$bdd->exec($query_cmd) or die($msg."<br />Error customer orders!<br />");
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Well done! The reccord is deleted successfully.
			</div>
		<?php
		}
	}	
?>