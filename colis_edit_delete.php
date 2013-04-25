<?php
	session_start();
	include_once("connex.php");
	
    $idColis=trim($_POST['idColis']);
	
	$query_cmd = "SELECT * FROM colis WHERE idColis='".$idColis."'";
	if($reponse = ($bdd->query($query_cmd)))
	{
		$query_cmd = "DELETE FROM colis WHERE idColis ='".$idColis."'";
		$bdd->exec($query_cmd) or die($msg."<br />Error Colis!<br />");
		?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
				Well done! The reccord is deleted successfully.
		</div>
		<?php
	}	
?>