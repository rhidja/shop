 <?php
	session_start();
	include_once("connex.php");
	
    $nomProduit=trim($_POST['nomProduit']);
	
	$query_cmd = "SELECT * FROM items WHERE nomProduit='".$nomProduit."'";
	if($reponse = ($bdd->query($query_cmd)))
	{
		if($reponse->fetchColumn()<1)
		{
			?>
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Ooops! This product dont exist.
			</div>
			<?php		
		}
		else
		{
			$query_cmd = "DELETE FROM items WHERE nomProduit ='".$nomProduit."'";
			$bdd->exec($query_cmd) or die($msg."<br />Error Item!<br />");
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Well done! The product is deleted successfully.
			</div>
			<?php
		}	
	}	
?>